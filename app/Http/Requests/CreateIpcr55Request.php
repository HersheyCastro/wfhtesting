<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateIpcr55Request extends FormRequest {

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
            'ipcr_name' => 'required', 
            'semester' => 'required', 
            'year' => 'required', 
            'user_id' => 'required', 
            
		];
	}

	/**
    * Get the attributes that apply to the request.
    *
    * @return array
    */
	public function attributes() {
		return [
			'ipcr_name' => 'IPCR Name', 
            'semester' => 'Semester', 
            'year' => 'Year', 
            '-' => 'Status', 
            'created_by' => 'Created By', 
            'active' => 'Active', 
            'user_id' => 'User Id', 
            
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
