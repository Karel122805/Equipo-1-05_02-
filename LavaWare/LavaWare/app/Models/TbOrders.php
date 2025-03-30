<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbOrders extends Model
{
    protected $table = 'tb_orders'; // El nombre de la tabla
    protected $fillable = [
        'customer_name',
        'service_type',
        'quantity_kg',
        'price',
        'total',
    ];

    // Relación con las lavadoras
    public function washers()
    {
        return $this->belongsToMany(TbWasher::class, 'order_washers', 'order_id', 'washer_id');
    }

    // Relación con las secadoras
    public function dryers()
    {
        return $this->belongsToMany(TbDryingMachine::class, 'order_dryers', 'order_id', 'dryer_id');
    }

    // Relación con los productos
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id');
    }
}
