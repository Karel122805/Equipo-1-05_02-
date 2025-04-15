<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbOrders extends Model
{
    protected $table = 'tb_orders';

    protected $fillable = [
        'customer_name',
        'service_type',
        'quantity_kg',
        'date',
        'total',
        'status'
    ];
}
