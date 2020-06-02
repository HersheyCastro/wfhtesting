<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTasks55Request extends FormRequest {

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
            'targets55_id' => 'required', 
            'duration' => 'required', 
            
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
            'description' => 'Description', 
            '-' => 'Targets', 
            'color' => 'Color', 
            'duration' => 'Duration', 
            'percent' => 'Percent', 
            'order' => 'Order', 
            'parent_id' => 'Parent', 
            'percent_completed' => 'Percent Completed', 
            'created_by' => 'Created By', 
            'active' => 'Active', 
            'weight' => 'Weight', 
            'means_verification' => 'Means Verification', 
            'evaluation' => 'Evaluation', 
            
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
