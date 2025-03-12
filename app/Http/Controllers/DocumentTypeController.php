<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DocumentTypeController extends Controller
{
    public function getDocumentType()
    {
        try {
            // Log awal untuk menandai bahwa method ini dipanggil
            Log::debug('getDocumentType method called');

            // Coba mengambil semua tipe dokumen dari database
            $documentTypes = DocumentType::all();

            // Log data tipe dokumen yang berhasil diambil
            Log::debug('Document Types retrieved: ', $documentTypes->toArray());

            // Mengembalikan tampilan dengan data tipe dokumen
            return view('doctype.getDocType', compact('documentTypes'));
        } catch (\Exception $e) {
            // Menangkap error jika terjadi masalah dalam pengambilan data atau eksekusi lainnya
            Log::error('Error in getDocumentType method: ' . $e->getMessage());

            // Mencatat error detail untuk debugging
            Log::error('Error details:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Mengalihkan ke halaman dengan pesan error
            return redirect()->route('some.error.route') // Ganti dengan route yang sesuai
                ->with('error', 'Terjadi kesalahan dalam mengambil data tipe dokumen.');
        }
    }





    public function getTypeDocJson()
    {
        try {
            // Log awal untuk menandai bahwa method ini dipanggil
            Log::debug('getTypeDocJson method called');

            // Coba mengambil semua tipe dokumen dari database dalam format JSON
            $documentTypes = DocumentType::all();

            // Log data tipe dokumen yang berhasil diambil
            Log::debug('Document Types retrieved for JSON response: ', $documentTypes->toArray());

            // Mengembalikan data tipe dokumen dalam format JSON
            return response()->json($documentTypes);
        } catch (QueryException $e) {
            // Menangkap error spesifik pada query jika terjadi masalah dalam pengambilan data
            Log::error('Database query error in getTypeDocJson method: ' . $e->getMessage());

            // Mencatat error detail untuk debugging
            Log::error('Error details:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Mengembalikan response error dalam format JSON
            return response()->json(['error' => 'Terjadi kesalahan dalam mengambil data tipe dokumen.'], 500);
        } catch (\Exception $e) {
            // Menangkap error umum jika ada masalah lain dalam proses
            Log::error('Error in getTypeDocJson method: ' . $e->getMessage());

            // Mencatat error detail untuk debugging
            Log::error('Error details:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Mengembalikan response error dalam format JSON
            return response()->json(['error' => 'Terjadi kesalahan internal.'], 500);
        }
    }

    public function createDocType()
    {
        // Log: Indicating method call
        Log::debug('createDocType method called to show form.');

        try {
            // Returning the view to create a document type
            return view('doctype.createDocType');
        } catch (\Exception $e) {
            // Error Handling
            Log::error('Error occurred in createDocType method: ' . $e->getMessage());

            // Redirecting with an error message
            return redirect()->route('some.error.route') // Adjust this with your route
                ->with('error', 'An error occurred while loading the form.');
        }
    }

    public function storeDocType(Request $request)
    {
        // Log: Indicating method call
        Log::debug('storeDocType method called to store new document type.');

        try {
            // Validate input data before saving to the database
            $request->validate([
                'jenis_dokumen' => 'required|string|unique:document_types,jenis_dokumen|max:255',
            ]);

            // Log: Document type validation passed
            Log::debug('Validation passed for document type: ' . $request->jenis_dokumen);

            // Store the new document type in the database
            $documentType = DocumentType::create([
                'jenis_dokumen' => $request->jenis_dokumen,
            ]);

            // Log: Document type stored successfully
            Log::debug('Document type successfully created: ', $documentType->toArray());

            // Redirecting with success message
            return redirect()->route('type.get')->with('success', 'Document type added successfully!');
        } catch (QueryException $e) {
            // Error handling for database query related issues
            Log::error('Database query error while storing document type: ' . $e->getMessage());
            Log::error('Error details:', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);

            // Redirecting with error message
            return redirect()->route('documentType.get')->with('error', 'Database error occurred while saving document type.');
        } catch (\Exception $e) {
            // General error handling
            Log::error('Error occurred while storing document type: ' . $e->getMessage());
            Log::error('Error details:', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);

            // Redirecting with a generic error message
            return redirect()->route('type.get')->with('error', 'An unexpected error occurred.');
        }
    }


    public function editDocType($id)
    {
        // Log: Indicating that the editDocType method has been called
        Log::debug('editDocType method called for document type with ID: ' . $id);

        try {
            // Attempt to find the document type by its ID
            $documentType = DocumentType::findOrFail($id);

            // Log: Successfully found the document type
            Log::debug('Document type retrieved for editing: ', $documentType->toArray());

            // Return the view with the document type data for editing
            return view('doctype.editDocType', compact('documentType'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Error handling for document type not found
            Log::error('Document type not found with ID: ' . $id);
            Log::error('Error details:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Redirect to the document type list with an error message
            return redirect()->route('type.get')->with('error', 'Document type not found.');
        } catch (\Exception $e) {
            // General error handling
            Log::error('Error occurred in editDocType method: ' . $e->getMessage());
            Log::error('Error details:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Redirect to the document type list with a general error message
            return redirect()->route('type.get')->with('error', 'An error occurred while editing the document type.');
        }
    }



    public function updateDocType(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'jenis_dokumen' => 'required|string|unique:document_types,jenis_dokumen,' . $id . ',id|max:255', // Unik dan validasi panjang
            ]);

            // Cari document type berdasarkan ID
            $documentType = DocumentType::findOrFail($id); // Mengambil data berdasarkan ID

            // Perbarui data
            $documentType->update([
                'jenis_dokumen' => $request->jenis_dokumen, // Menyimpan perubahan pada field jenis_dokumen
            ]);

            // Log jika update berhasil
            Log::debug("Document Type updated successfully: ", $documentType->toArray());

            // Redirect ke halaman daftar dengan pesan sukses
            return redirect()->route('type.get')->with('success', 'Document Type berhasil diperbarui.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Menangani validasi error
            Log::error('Validation error during update: ' . $e->getMessage());

            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Menangani error umum
            Log::error('Error updating document type: ' . $e->getMessage());

            return redirect()->route('type.get')->with('error', 'Terjadi kesalahan saat memperbarui Document Type.');
        }
    }



    public function destroyDocType($id)
    {
        try {
            // Cari document type berdasarkan ID
            $documentType = DocumentType::findOrFail($id); // Jika tidak ditemukan, akan mengarah ke halaman 404

            // Menghapus document type dari database
            $documentType->delete();

            // Menulis log jika berhasil
            Log::debug("Document Type with ID {$id} deleted successfully.");

            // Redirect dengan pesan sukses
            return redirect()->route('type.get')->with('success', 'Document Type berhasil dihapus.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Menangani jika document type tidak ditemukan
            Log::error("Error: Document Type with ID {$id} not found.");

            return redirect()->route('documentType.get')->with('error', 'Document Type tidak ditemukan.');
        } catch (\Exception $e) {
            // Menangani error lainnya
            Log::error("Error in destroyDocType method: " . $e->getMessage());

            return redirect()->route('type.get')->with('error', 'Terjadi kesalahan saat menghapus Document Type.');
        }
    }

}
