<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //dd($this->route('contact')) // Route ile beraber gelen id vs alabilirsin.
        //dd($this->method()); route gelen isteğin hangi method olduğu PUT, POST etc
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
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'company_id' => 'required|exists:companies,id'
        ];
    }

    public function attributes()
    {
        return [
            'company_id' => 'company',
            'email' => 'email address'
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'e-posta adresi geçerli değil',
            '*.required' => ':attribute boş bırakılamaz',
        ];
    }
}
