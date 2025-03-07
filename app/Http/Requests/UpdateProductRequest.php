<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'uuid_kategori' => 'required',
            'judul_product' => 'required',
            'price' => 'required',
            'deskripsi' => 'required',
            'meta' => 'required',
            'link' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'uuid_kategori.required' => 'Kolom nama kategori harus di isi.',
            'judul_product.required' => 'Kolom judul harus di isi.',
            'price.required' => 'Kolom price harus di isi.',
            'deskripsi.required' => 'Kolom deskripsi harus di isi.',
            'meta.required' => 'Kolom meta harus di isi.',
            'link.required' => 'Kolom link harus di isi.',
        ];
    }
}
