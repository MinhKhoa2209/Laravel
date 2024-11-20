<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
        'check_time',
        'check_date',
        'order_note'
    ];

    public function orderItems()
    {
        return $this->hasMany(Order_item::class, 'order_id', 'id');
    }

}
