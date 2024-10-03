<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupBookingTicket extends Model
{
    use HasFactory;
    protected $fillable = ['group_name', 'special_requests'];

    // Inverse polymorphic relation with Ticket
    public function ticket()
    {
        return $this->morphOne(Ticket::class, 'category');
    }
}
