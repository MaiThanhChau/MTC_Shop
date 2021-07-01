<?php

namespace App\Models\admin;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\order_detail;
use App\Models\admin\products;

class order extends Model
{
    use HasFactory;
    protected $table = 'order';

    public function products()
    {
        return $this->belongsToMany(products::class, 'order-detail', 'order_id', 'product_id')->withPivot('quantity', 'amount');
    }
}
