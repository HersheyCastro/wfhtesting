<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFiles55Request extends FormRequest {

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
            'filename' => 'required', 
            'link' => 'required', 
            'tasks55_id' => 'required', 
            
		];
	}

	/**
    * Get the attributes that apply to the request.
    *
    * @return array
    */
	public function attributes() {
		return [
			'filename' => 'File Name', 
            'description' => 'File Description', 
            'link' => 'File link', 
            'file' => 'File', 
            '-' => 'Task', 
            
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
