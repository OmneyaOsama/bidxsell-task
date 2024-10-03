<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupBookingRequest extends FormRequest
{
    public function rules()
    {
        return [
            'event_id' => 'required|exists:events,id',
            'group_name' => 'required|string|max:255',
            'number_of_tickets' => 'required|integer|min:1',
            'special_requests' => 'nullable|string|max:255',
        ];
    }
}
