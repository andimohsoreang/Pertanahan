<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegwaiStroreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_pelaksana' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P', // Laki-laki atau Perempuan
            'pangkat_golongan' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'status_pegawai' => 'required|in:KLHK,Non KLHK', // Status pegawai
        ];
    }

    public function messages()
    {
        return [
            'nama_pelaksana.required' => 'Nama pelaksana harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih.',
            'pangkat_golongan.required' => 'Pangkat dan golongan harus diisi.',
            'jabatan.required' => 'Jabatan harus diisi.',
            'status_pegawai.required' => 'Status pegawai harus dipilih.',
            'status_pegawai.in' => 'Status pegawai harus berupa KLHK atau Non KLHK.',
            'jenis_kelamin.in' => 'Jenis kelamin hanya bisa Laki-laki atau Perempuan.',
        ];
    }
}
