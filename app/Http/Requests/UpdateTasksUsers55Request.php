<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTasksUsers55Request extends FormRequest {

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
		if(Auth::user()->roles55_id==4 || Auth::user()->roles55_id==6){
			return [];

		}
		

		return [
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
