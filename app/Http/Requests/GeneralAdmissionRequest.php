<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralAdmissionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'event_id' => 'required|exists:events,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'number_of_tickets' => 'required|integer|min:1',
            'seat_preference' => 'required|string|max:255',
        ];
    }
}
