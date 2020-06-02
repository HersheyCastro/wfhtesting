<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatus55Request extends FormRequest {

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
            'status_name' => 'required', 
            
		];
	}

	/**
    * Get the attributes that apply to the request.
    *
    * @return array
    */
	public function attributes() {
		return [
			'status_name' => 'Status Name', 
            'description' => 'Description', 
            'color' => 'Color', 
            'created_by' => 'Created By', 
            'active' => 'Active', 
            
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
