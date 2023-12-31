<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    $appointmentId = $this->route('appointment') ? $this->route('appointment')->id : null;

    return [
        'full_name' => 'required|string|max:255',
        'age' => 'required|integer',
        'doctor_set_time_id' => [
            'required',
            'integer',
            'exists:doctor_set_times,id',
            $appointmentId ? Rule::unique('appointments', 'doctor_set_time_id')->ignore($appointmentId) : 'unique:appointments,doctor_set_time_id'
        ],
        'doctor_id' => 'required|integer|exists:doctors,id',
        'payment_id' => [
            'required',
            'integer',
            'exists:payments,id',
            $appointmentId ? Rule::unique('appointments', 'payment_id')->ignore($appointmentId) : 'unique:appointments,payment_id'
        ],
        'patient_id' => 'required|integer|exists:patients,id'
    ];
}

    public function messages(): array
    {
        return [
            'full_name.required' => 'The full name field is required. Please enter your full name.',
            'full_name.string' => 'The full name field must be a string. Please enter a valid full name.',
            'full_name.max' => 'The full name field must be less than or equal to 255 characters. Please enter a shorter full name.',
            'age.required' => 'The age field is required. Please enter your age.',
            'age.integer' => 'The age field must be an integer. Please enter a valid age.',
            'doctor_set_time_id.required' => 'You should choose time for that appointment.',
            'doctor_set_time_id.integer' => 'You are not authorized to access this information.',
            'doctor_set_time_id.exists' => 'You are not authorized to access this information.',
            'doctor_set_time_id.unique' => 'That time is not available. Please choose a different time.',
            'doctor_id.required' => 'Please choose the doctor you want to see.',
            'doctor_id.integer' => 'You are not authorized to access this information.',
            'doctor_id.exists' => 'You are not authorized to access this information.',
            'payment_id.required' => 'Please complete the payment first.',
            'payment_id.integer' => 'You are not authorized to access this information.',
            'payment_id.exists' => 'You are not authorized to access this information.',
            'payment_id.unique' => 'You are not authorized to access this information.',
            'patient_id.*' => 'You are not authorized to access this information.',
        ];
    }

}
