<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDivision55Request extends FormRequest {

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
            'division_name' => 'required', 
            'created_by' => 'required', 
            'active' => 'required', 
            
		];
	}

	/**
    * Get the attributes that apply to the request.
    *
    * @return array
    */
	public function attributes() {
		return [
			'division_name' => 'Division Name', 
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
