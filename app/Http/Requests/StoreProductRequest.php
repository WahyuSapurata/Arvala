<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'thumbnail' => 'required',
            'price' => 'required',
            'deskripsi' => 'required',
            'detail_1' => 'required',
            'detail_2' => 'required',
            'detail_3' => 'required',
            'detail_4' => 'required',
            'meta' => 'required',
            'link' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'uuid_kategori.required' => 'Kolom nama kategori harus di isi.',
            'judul_product.required' => 'Kolom judul harus di isi.',
            'thumbnail.required' => 'Kolom thumbnail harus di isi.',
            'price.required' => 'Kolom price harus di isi.',
            'deskripsi.required' => 'Kolom deskripsi harus di isi.',
            'detail_1.required' => 'Kolom detail image 1 harus di isi.',
            'detail_2.required' => 'Kolom detail image 2 harus di isi.',
            'detail_3.required' => 'Kolom detail image 3 harus di isi.',
            'detail_4.required' => 'Kolom detail image 4 harus di isi.',
            'meta.required' => 'Kolom meta harus di isi.',
            'link.required' => 'Kolom link harus di isi.',
        ];
    }
}
