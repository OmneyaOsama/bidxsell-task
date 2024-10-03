<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VipAdmissionTicket extends Model
{
    use HasFactory;
    protected $fillable = ['backstage_access', 'complimentary_drinks'];

    // Inverse polymorphic relation with Ticket
    public function ticket()
    {
        return $this->morphOne(Ticket::class, 'category');
    }
}
