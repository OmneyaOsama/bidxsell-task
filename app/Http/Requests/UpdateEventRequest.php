<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    public function rules()
    {
        return [
            'event_name' => 'sometimes|string|max:255',
            'event_date_time' => 'sometimes|date',
            'ticket_price' => 'sometimes|numeric|min:0',
            'venue' => 'sometimes|string|max:255',
        ];
    }
}
