<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\categories;
use App\Models\admin\product_image;
use App\Models\admin\order_detail;
use App\Models\admin\order;


class products extends Model
{
    use HasFactory;
    protected $table = 'products';
    public function categories()
    {
        return $this->belongsTo(categories::class, 'category_id', 'id');
    }
    public function images()
    {
        return $this->hasMany(product_image::class, 'product_id', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany(order::class, 'order-detail', 'product_id', 'order_id');
    }
}
