<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id', 'customer_name', 'customer_email', 'number_of_tickets', 'category_id', 'category_type'
    ];

    // Define the polymorphic relationship
    public function category()
    {
        return $this->morphTo();
    }
}

