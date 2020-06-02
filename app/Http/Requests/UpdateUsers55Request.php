<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsers55Request extends FormRequest {

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
	 * @return array
	 */
	public function rules()
	{
		return [
            'name' => 'required', 
            // 'email' => 'required|unique:users55,email,'.$this->users55, 
            'password' => 'required', 
            'password-confirm' => 'same:password', 
            
		];
	}

	/**
    * Get the attributes that apply to the request.
    *
    * @return array
    */
	public function attributes() {
		return [
			'name' => 'Name', 
            'email' => 'Email', 
            'password' => 'Password', 
            '-' => 'Role', 
            'remember_token' => 'Remember Token', 
            
		];
	}

	/**
    * Get the messages that apply to the request.
    *
    * @return array
    */
	public function messages() {
		return [
			'regex' => 'The Mobile Number must start with 639'
		];
	}
}
