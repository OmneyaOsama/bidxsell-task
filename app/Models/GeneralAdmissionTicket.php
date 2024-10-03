<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GeneralAdmissionTicket extends Model
{
    use HasFactory;
    protected $fillable = ['seat_preference'];

    // Inverse polymorphic relation with Ticket
    public function ticket()
    {
        return $this->morphOne(Ticket::class, 'category');
    }
}
