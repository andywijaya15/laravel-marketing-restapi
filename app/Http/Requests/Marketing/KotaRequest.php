<?php

namespace App\Http\Requests\Marketing;

use Illuminate\Foundation\Http\FormRequest;

class KotaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'idkota' => 'unique:m_kota,idkota',
            'nama_kota' => 'required|min:3|max:50|unique:m_kota,kota',
            'propinsi' => 'required|min:5|max:50',
        ];
    }
}
