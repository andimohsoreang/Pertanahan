<?php

namespace App\Http\Controllers;

use App\Models\BusinessTrip;
use App\Models\TripFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FileController extends Controller
{
    /**
     * Upload file untuk perjalanan dinas
     *
     * @param Request $request
     * @param string $tripId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadFile(Request $request, $tripId)
    {
        // Logging awal proses upload
        Log::channel('file_upload_debug')->info('Memulai Proses Upload File', [
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'trip_id' => $tripId,
            'user_id' => Auth::id(),
            'user_email' => Auth::user()->email ?? 'N/A',
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent')
        ]);

        try {
            // Validasi request
            $validatedData = $request->validate([
                'files.*' => 'required|file|max:10240', // Max 10MB per file
            ]);

            // Cari business trip
            $businessTrip = BusinessTrip::findOrFail($tripId);

            // Log detail business trip
            Log::channel('file_upload_debug')->info('Detail Business Trip', [
                'trip_details' => [
                    'id' => $businessTrip->id,
                    'nomor_spm' => $businessTrip->nomor_spm,
                    'status' => $businessTrip->status
                ]
            ]);

            // Cek apakah ada file yang diupload
            if (!$request->hasFile('files')) {
                Log::channel('file_upload_debug')->warning('Tidak Ada File yang Diupload', [
                    'trip_id' => $tripId
                ]);
                return redirect()->back()->with('error', 'Tidak ada file yang diupload');
            }

            // Proses setiap file
            $uploadedFiles = [];
            $failedFiles = [];

            foreach ($request->file('files') as $file) {
                try {
                    // Validasi individual file
                    $this->validateIndividualFile($file);

                    // Generate unique filename
                    $extension = $file->getClientOriginalExtension();
                    $fileName = Str::ulid() . '.' . $extension;

                    // Simpan file
                    $path = $file->storeAs(
                        'business-trips/' . $tripId,
                        $fileName,
                        'public'
                    );

                    // Buat record file - Gunakan status_berkas
                    $tripFile = TripFile::create([
                        'id' => Str::ulid(),
                        'business_trip_id' => $tripId,
                        'nama_file' => $file->getClientOriginalName(),
                        'path_file' => $path,
                        'mime_type' => $file->getMimeType(),
                        'ukuran_file' => $file->getSize(),
                        'status_berkas' => 'Telah Di Upload'  // Ubah dari 'status' menjadi 'status_berkas'
                    ]);

                    // Log file yang berhasil diupload
                    $uploadedFiles[] = [
                        'original_name' => $file->getClientOriginalName(),
                        'file_id' => $tripFile->id,
                        'size' => $file->getSize()
                    ];
                } catch (\Exception $fileError) {
                    // Log error untuk file individual
                    Log::channel('file_upload_debug')->error('Gagal Upload File Individual', [
                        'file_name' => $file->getClientOriginalName(),
                        'error_message' => $fileError->getMessage(),
                        'error_trace' => $fileError->getTraceAsString()
                    ]);

                    $failedFiles[] = [
                        'original_name' => $file->getClientOriginalName(),
                        'error' => $fileError->getMessage()
                    ];

                    continue;
                }
            }

            // Log ringkasan upload
            Log::channel('file_upload_debug')->info('Ringkasan Upload File', [
                'total_files_uploaded' => count($uploadedFiles),
                'total_files_failed' => count($failedFiles),
                'uploaded_files' => $uploadedFiles,
                'failed_files' => $failedFiles
            ]);

            // Tentukan pesan response
            if (count($uploadedFiles) > 0) {
                $successMessage = count($uploadedFiles) . ' file berhasil diupload';
                if (count($failedFiles) > 0) {
                    $successMessage .= '. ' . count($failedFiles) . ' file gagal diupload.';
                }
                return redirect()->back()->with('success', $successMessage);
            } else {
                return redirect()->back()->with('error', 'Tidak ada file yang berhasil diupload');
            }
        } catch (\Illuminate\Validation\ValidationException $validationError) {
            // Log error validasi
            Log::channel('file_upload_debug')->warning('Validasi Upload File Gagal', [
                'errors' => $validationError->errors(),
                'input_data' => $request->all()
            ]);

            return redirect()->back()
                ->withErrors($validationError->errors())
                ->with('error', 'Validasi file gagal');
        } catch (\Exception $e) {
            // Log error umum
            Log::channel('file_upload_debug')->critical('Error Fatal Saat Upload File', [
                'error_message' => $e->getMessage(),
                'error_code' => $e->getCode(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'stack_trace' => $e->getTraceAsString(),
                'trip_id' => $tripId
            ]);

            return redirect()->back()->with('error', 'Gagal upload file: ' . $e->getMessage());
        }
    }

    /**
     * Validasi individual file
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @throws \Exception
     */
    private function validateIndividualFile($file)
    {
        // Daftar mime type yang diizinkan
        $allowedMimeTypes = [
            'application/pdf',
            'image/jpeg',
            'image/png',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ];

        // Validasi mime type
        if (!in_array($file->getMimeType(), $allowedMimeTypes)) {
            throw new \Exception('Tipe file tidak diizinkan: ' . $file->getMimeType());
        }

        // Validasi ukuran file (maks 10MB)
        if ($file->getSize() > 10 * 1024 * 1024) {
            throw new \Exception('Ukuran file terlalu besar. Maks 10MB');
        }

        return true;
    }

    /**
     * Hapus file dari perjalanan dinas
     *
     * @param string $fileId
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    // Method lainnya tetap sama, hanya ubah 'status' menjadi 'status_berkas'

    public function deleteFile($fileId)
    {
        Log::channel('file_delete_debug')->info('Memulai Proses Hapus File', [
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'file_id' => $fileId,
            'user_id' => Auth::id(),
            'user_email' => Auth::user()->email ?? 'N/A',
            'ip_address' => request()->ip()
        ]);

        try {
            $file = TripFile::findOrFail($fileId);

            // Log detail file sebelum dihapus
            Log::channel('file_delete_debug')->info('Detail File yang Akan Dihapus', [
                'file_details' => [
                    'id' => $file->id,
                    'nama_file' => $file->nama_file,
                    'path_file' => $file->path_file,
                    'business_trip_id' => $file->business_trip_id
                ]
            ]);

            // Metode penghapusan file dengan multiple fallback
            $deletionMethods = [
                // Metode 1: Storage facade
                function($path) {
                    return Storage::disk('public')->delete($path);
                },
                // Metode 2: Filesystem langsung
                function($path) {
                    $fullPath = storage_path('app/public/' . $path);
                    return file_exists($fullPath) ? unlink($fullPath) : false;
                },
                // Metode 3: Filesystem dengan path alternatif
                function($path) {
                    $fullPath = public_path('storage/' . $path);
                    return file_exists($fullPath) ? unlink($fullPath) : false;
                }
            ];

            $fileDeleted = false;
            $deletionPath = $file->path_file;

            // Coba berbagai metode penghapusan
            foreach ($deletionMethods as $method) {
                try {
                    if ($method($deletionPath)) {
                        $fileDeleted = true;
                        Log::channel('file_delete_debug')->info('File Berhasil Dihapus', [
                            'path' => $deletionPath,
                            'method' => get_class($method)
                        ]);
                        break;
                    }
                } catch (\Exception $methodError) {
                    Log::channel('file_delete_debug')->warning('Metode Penghapusan Gagal', [
                        'path' => $deletionPath,
                        'error_message' => $methodError->getMessage()
                    ]);
                }
            }

            // Tambahan: Cek dan hapus direktori kosong
            $this->removeEmptyDirectory($file->path_file);

            // Update status dan hapus record
            $file->update(['status_berkas' => 'Belum Di Upload']);
            $file->delete();

            Log::channel('file_delete_debug')->info('Proses Penghapusan Selesai', [
                'file_deleted' => $fileDeleted
            ]);

            // Response
            if (request()->ajax()) {
                return response()->json([
                    'success' => $fileDeleted,
                    'message' => $fileDeleted
                        ? 'File berhasil dihapus'
                        : 'Gagal menghapus file dari storage'
                ]);
            }

            return redirect()->back()->with(
                $fileDeleted ? 'success' : 'error',
                $fileDeleted
                    ? 'File berhasil dihapus'
                    : 'Gagal menghapus file dari storage'
            );

        } catch (\Exception $e) {
            // Log error utama
            Log::channel('file_delete_debug')->critical('Kesalahan Fatal Saat Hapus File', [
                'file_id' => $fileId,
                'error_message' => $e->getMessage(),
                'error_trace' => $e->getTraceAsString()
            ]);

            // Response error
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menghapus file: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Gagal menghapus file: ' . $e->getMessage());
        }
    }

// Method tambahan untuk menghapus direktori kosong
    private function removeEmptyDirectory($filePath)
    {
        try {
            // Ekstrak direktori dari path file
            $directory = dirname($filePath);
            $fullPath = storage_path('app/public/' . $directory);

            // Cek apakah direktori kosong
            if (is_dir($fullPath) && count(scandir($fullPath)) <= 2) {
                rmdir($fullPath);

                Log::channel('file_delete_debug')->info('Direktori Kosong Dihapus', [
                    'directory' => $directory
                ]);
            }
        } catch (\Exception $e) {
            Log::channel('file_delete_debug')->warning('Gagal Menghapus Direktori', [
                'error_message' => $e->getMessage()
            ]);
        }
    }

// Tambahan: Method debugging
    public function debugFileStorage($fileId)
    {
        $file = TripFile::findOrFail($fileId);

        $debugInfo = [
            'file_details' => $file->toArray(),
            'storage_exists' => Storage::disk('public')->exists($file->path_file),
            'filesystem_exists' => file_exists(storage_path('app/public/' . $file->path_file)),
            'alternative_path_exists' => file_exists(public_path('storage/' . $file->path_file)),
            'full_storage_path' => storage_path('app/public/' . $file->path_file),
            'full_public_path' => public_path('storage/' . $file->path_file)
        ];

        return response()->json($debugInfo);
    }

    /**
     * Download file dari perjalanan dinas
     *
     * @param string $fileId
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse|\Illuminate\Http\RedirectResponse
     */
    public function downloadFile($fileId)
    {
        Log::channel('file_download_debug')->info('Memulai Proses Download File', [
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'file_id' => $fileId,
            'user_id' => Auth::id(),
            'user_email' => Auth::user()->email ?? 'N/A',
            'ip_address' => request()->ip()
        ]);

        try {
            $file = TripFile::findOrFail($fileId);

            // Log detail file yang akan didownload
            Log::channel('file_download_debug')->info('Detail File yang Akan Didownload', [
                'file_details' => [
                    'id' => $file->id,
                    'nama_file' => $file->nama_file,
                    'path_file' => $file->path_file,
                    'mime_type' => $file->mime_type,
                    'file_size' => $file->ukuran_file
                ]
            ]);

            // Cek keberadaan file
            if (!Storage::disk('public')->exists($file->path_file)) {
                Log::channel('file_download_debug')->warning('File Tidak Ditemukan', [
                    'path' => $file->path_file
                ]);

                return redirect()->back()->with('error', 'File tidak ditemukan');
            }

            // Log proses download
            Log::channel('file_download_debug')->info('Memulai Download File');

            // Download file
            $response = response()->download(
                storage_path('app/public/' . $file->path_file),
                $file->nama_file
            );

            Log::channel('file_download_debug')->info('Download File Berhasil');

            return $response;
        } catch (\Exception $e) {
            Log::channel('file_download_debug')->critical('Gagal Download File', [
                'error_message' => $e->getMessage(),
                'error_code' => $e->getCode(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'file_id' => $fileId,
                'stack_trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Gagal download file: ' . $e->getMessage());
        }
    }





    public function index(Request $request)
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil query parameter
        $nomorSpm = $request->input('nomor_spm');
        $namaFile = $request->input('nama_file');
        $mimeType = $request->input('mime_type');
        $statusBerkas = $request->input('status_berkas');
        $tanggalUploadDari = $request->input('tanggal_upload_dari');
        $tanggalUploadSampai = $request->input('tanggal_upload_sampai');

        // Query untuk file perjalanan dinas
        $query = TripFile::query()
            ->select('trip_files.*')
            ->leftJoin('business_trips', 'trip_files.business_trip_id', '=', 'business_trips.id')
            ->leftJoin('pics', 'business_trips.id', '=', 'pics.business_trip_id')
            ->leftJoin('employees', 'pics.employee_id', '=', 'employees.id');

        // Jika bukan superadmin, filter berdasarkan seksi
        if ($user->role !== 'superadmin' && $user->employee && $user->employee->seksi_id) {
            $query->where('employees.seksi_id', $user->employee->seksi_id);
        }

        // Filter berdasarkan Nomor SPM
        if ($nomorSpm) {
            $query->where('business_trips.nomor_spm', 'like', '%' . $nomorSpm . '%');
        }

        // Filter berdasarkan Nama File
        if ($namaFile) {
            $query->where('trip_files.nama_file', 'like', '%' . $namaFile . '%');
        }

        // Filter berdasarkan Mime Type
        if ($mimeType) {
            $query->where('trip_files.mime_type', $mimeType);
        }

        // Filter berdasarkan Status Berkas
        if ($statusBerkas) {
            $query->where('trip_files.status_berkas', $statusBerkas);
        }

        // Filter berdasarkan Rentang Tanggal Upload
        if ($tanggalUploadDari && $tanggalUploadSampai) {
            // Tambahkan waktu akhir hari untuk tanggal sampai
            $tanggalUploadSampai = Carbon::parse($tanggalUploadSampai)->endOfDay();

            $query->whereBetween('trip_files.created_at', [
                Carbon::parse($tanggalUploadDari)->startOfDay(),
                $tanggalUploadSampai
            ]);
        } elseif ($tanggalUploadDari) {
            // Jika hanya tanggal dari yang diisi
            $query->whereDate('trip_files.created_at', '>=', Carbon::parse($tanggalUploadDari)->startOfDay());
        } elseif ($tanggalUploadSampai) {
            // Jika hanya tanggal sampai yang diisi
            $query->whereDate('trip_files.created_at', '<=', Carbon::parse($tanggalUploadSampai)->endOfDay());
        }

        // Pastikan hanya file yang terkait dengan business trip
        $query->whereNotNull('business_trips.id');

        // Tambahkan distinct untuk menghindari duplikasi
        $query->distinct('trip_files.id');

        // Ambil daftar mime type unik untuk dropdown filter
        $mimeTypes = TripFile::distinct('mime_type')
            ->pluck('mime_type')
            ->filter()
            ->values();

        // Pagination dengan eager loading relasi
        $files = $query->with(['businessTrip', 'businessTrip.pics.employee'])
            ->orderBy('trip_files.created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        // Tambahkan atribut readable_size
        $files->transform(function ($file) {
            $file->readable_size = $this->formatFileSize($file->ukuran_file);
            return $file;
        });

        // Log untuk debugging
        Log::channel('file_debug')->info('File Upload List', [
            'user_id' => $user->id,
            'user_role' => $user->role,
            'seksi_id' => $user->employee->seksi_id ?? 'Tidak ada seksi',
            'total_files' => $files->total(),
        ]);

        return view('files.perdis.get', compact('files', 'mimeTypes'));
    }


// Method formatFileSize tetap sama seperti sebelumnya
    private function formatFileSize($bytes)
    {
        if ($bytes === null || $bytes === 0) return '0 B';

        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $i = 0;
        while ($bytes >= 1024 && $i < 4) {
            $bytes /= 1024;
            $i++;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
// Method download single file
    public function downloadFileTrip($fileId)
    {
        try {
            // Cari file
            $file = TripFile::findOrFail($fileId);

            // Log aktivitas download
            Log::channel('file_download_debug')->info('Memulai Download File', [
                'file_id' => $file->id,
                'nama_file' => $file->nama_file,
                'user_id' => Auth::id(),
                'ip_address' => request()->ip()
            ]);

            // Pastikan file ada di storage
            if (!Storage::disk('public')->exists($file->path_file)) {
                throw new \Exception('File tidak ditemukan di storage');
            }

            // Download file
            return Storage::disk('public')->download(
                $file->path_file,
                $file->nama_file,
                [
                    'Content-Type' => $file->mime_type,
                    'Content-Disposition' => 'attachment; filename="' . $file->nama_file . '"'
                ]
            );
        } catch (\Exception $e) {
            // Log error
            Log::channel('file_download_debug')->error('Gagal Download File', [
                'file_id' => $fileId,
                'error_message' => $e->getMessage()
            ]);

            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Gagal download file: ' . $e->getMessage());
        }
    }

// Method download semua file
    public function downloadAllFiles(Request $request)
    {
        try {
            // Gunakan filter yang sama dengan index
            $query = TripFile::with('businessTrip')
                ->select('trip_files.*')
                ->leftJoin('business_trips', 'trip_files.business_trip_id', '=', 'business_trips.id');

            // Terapkan filter sesuai request
            if ($request->input('nomor_spm')) {
                $query->where('business_trips.nomor_spm', 'like', '%' . $request->input('nomor_spm') . '%');
            }

            if ($request->input('nama_file')) {
                $query->where('trip_files.nama_file', 'like', '%' . $request->input('nama_file') . '%');
            }

            if ($request->input('mime_type')) {
                $query->where('trip_files.mime_type', $request->input('mime_type'));
            }

            if ($request->input('status_berkas')) {
                $query->where('trip_files.status_berkas', $request->input('status_berkas'));
            }

            if ($request->input('tanggal_upload')) {
                $query->whereDate('trip_files.created_at', $request->input('tanggal_upload'));
            }

            // Filter rentang tanggal
            $tanggalUploadDari = $request->input('tanggal_upload_dari');
            $tanggalUploadSampai = $request->input('tanggal_upload_sampai');

            if ($tanggalUploadDari && $tanggalUploadSampai) {
                $tanggalUploadSampai = Carbon::parse($tanggalUploadSampai)->endOfDay();

                $query->whereBetween('trip_files.created_at', [
                    Carbon::parse($tanggalUploadDari)->startOfDay(),
                    $tanggalUploadSampai
                ]);
            } elseif ($tanggalUploadDari) {
                $query->whereDate('trip_files.created_at', '>=', Carbon::parse($tanggalUploadDari)->startOfDay());
            } elseif ($tanggalUploadSampai) {
                $query->whereDate('trip_files.created_at', '<=', Carbon::parse($tanggalUploadSampai)->endOfDay());
            }

            // Ambil file yang akan didownload
            $files = $query->get();

            // Cek apakah ada file
            if ($files->isEmpty()) {
                return redirect()->back()->with('error', 'Tidak ada file untuk didownload');
            }

            // Buat nama file zip
            $zipFileName = 'trip_files_' . now()->format('YmdHis') . '.zip';
            $zipFilePath = storage_path('app/temp/' . $zipFileName);

            // Buat zip
            $zip = new \ZipArchive();
            if ($zip->open($zipFilePath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE) {
                foreach ($files as $file) {
                    $fullPath = storage_path('app/public/' . $file->path_file);

                    // Pastikan file ada
                    if (file_exists($fullPath)) {
                        $zip->addFile($fullPath, $file->nama_file);
                    }
                }
                $zip->close();
            }

            // Log aktivitas download
            Log::channel('file_download_debug')->info('Download Semua File', [
                'total_files' => $files->count(),
                'zip_file' => $zipFileName,
                'user_id' => Auth::id()
            ]);

            // Download zip
            return response()->download($zipFilePath, $zipFileName)->deleteFileAfterSend(true);

        } catch (\Exception $e) {
            // Log error
            Log::channel('file_download_debug')->error('Gagal Download Semua File', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()->back()->with('error', 'Gagal download file: ' . $e->getMessage());
        }
    }




}
