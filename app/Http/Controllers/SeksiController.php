<?php

namespace App\Http\Controllers;

use App\Models\Seksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;


class SeksiController extends Controller
{
    public  function  getDataSeksi()
    {
        $seksis = Seksi::all();

        return view('seksi.get', compact('seksis'));
    }

    public function getJson(Request $request)
    {
        try {
            $query = Seksi::query();

            // Filter berdasarkan nama seksi jika ada
            if ($request->filled('nama_seksi')) {
                $query->where('nama_seksi', 'like', '%' . $request->nama_seksi . '%');
            }

            $seksis = $query->get();

            // Pastikan mengubah collection ke array
            $seksiArray = $seksis->map(function ($seksi) {
                return [
                    'id' => $seksi->id,
                    'nama_seksi' => $seksi->nama_seksi,
                    'deskripsi' => $seksi->deskripsi ?? 'Tidak ada deskripsi'
                ];
            })->toArray();

            return response()->json([
                'status' => 'success',
                'data' => $seksiArray
            ]);
        } catch (\Exception $e) {
            Log::error('Error in getSeksiJson: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan dalam mengambil data',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    // Method to show the form for creating a new Seksi
    public function create()
    {
        $seksis = Seksi::all();
        return view('seksi.create', compact('seksis')); // Adjust the view path as necessary
    }

    public function store(Request $request)
    {
        try {
            Log::debug('storeSeksi method is called.');

            // Log the incoming request data
            Log::debug('Request Data:', $request->all());

            // Validate the request data
            $validated = $request->validate([
                'nama_seksi' => 'required|string|max:255|unique:seksis',
                'deskripsi' => 'nullable|string',
            ]);

            // Create a new Seksi record
            $seksi = new Seksi();
            $seksi->nama_seksi = $validated['nama_seksi'];
            $seksi->deskripsi = $validated['deskripsi'] ?? null;
            $seksi->save(); // Ini akan menggunakan method boot untuk generate ULID

            Log::debug('Seksi created successfully:', $seksi->toArray());

            return redirect()->route('seksi.get')->with('success', 'Seksi created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating Seksi: ', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', 'Failed to create Seksi: ' . $e->getMessage());
        }
    }



    public function edit($id)
    {
        try {
            $seksi = Seksi::findOrFail($id);
            return view('seksi.edit', compact('seksi'));
        } catch (\Exception $e) {
            return redirect()->route('seksi.get')
                ->with('error', 'Seksi tidak ditemukan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_seksi' => [
                'required',
                'string',
                'max:255',
                Rule::unique('seksis')->ignore($id)
            ],
            'deskripsi' => 'nullable|string'
        ]);

        try {
            $seksi = Seksi::findOrFail($id);
            $seksi->update($validatedData);

            return redirect()->route('seksi.get')
                ->with('success', 'Seksi berhasil diupdate');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal update seksi: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            // Find the Seksi by ID
            $seksi = Seksi::findOrFail($id);

            // Delete the Seksi
            $seksi->delete();

            // Log the deletion
            Log::info('Seksi deleted successfully', ['id' => $id]);

            return redirect()->route('seksis.index')->with('success', 'Seksi deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting Seksi: ' . $e->getMessage());
            return redirect()->route('seksi.get')->with('error', 'Error deleting Seksi.');
        }
    }
}
