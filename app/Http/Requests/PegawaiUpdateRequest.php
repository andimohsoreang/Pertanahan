<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Mengizinkan semua pengguna untuk melakukan request ini
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Menentukan aturan validasi untuk masing-masing field
        return [
            'nama_pelaksana' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P', // Validasi jenis kelamin Laki-laki atau Perempuan
            'pangkat_golongan' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'status_pegawai' => 'required|in:KLHK,Non KLHK', // Validasi status pegawai
        ];
    }

    /**
     * Mendapatkan pesan kesalahan khusus untuk setiap validasi.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nama_pelaksana.required' => 'Nama pelaksana harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih.',
            'pangkat_golongan.required' => 'Pangkat dan golongan harus diisi.',
            'jabatan.required' => 'Jabatan harus diisi.',
            'status_pegawai.required' => 'Status pegawai harus dipilih.',
            'status_pegawai.in' => 'Status pegawai hanya bisa KLHK atau Non KLHK.',
            'jenis_kelamin.in' => 'Jenis kelamin hanya bisa Laki-laki atau Perempuan.',
        ];
    }
}
