<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
{
    public function rules()
    {
        return [
            'event_name' => 'required|string|max:255',
            'event_date_time' => 'required|date',
            'ticket_price' => 'required|numeric|min:0',
            'venue' => 'required|string|max:255',
        ];
    }
}
