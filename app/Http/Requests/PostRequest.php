<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            //

                'title' =>'required |min:3|max:100',

                'body' =>'required |min:10|max:1000',
                'image' =>$this->route('slug') ? 'image|mimes:png,jpg,jpeg|max:2048' :'required |image|mimes:png,jpg,jpeg|max:2048',
        ];
    }
}

