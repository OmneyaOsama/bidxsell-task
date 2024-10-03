<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VipAdmissionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'event_id' => 'required|exists:events,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'number_of_tickets' => 'required|integer|min:1',
            'backstage_access' => 'required|boolean',
            'complimentary_drinks' => 'required|boolean',
        ];
    }
}
