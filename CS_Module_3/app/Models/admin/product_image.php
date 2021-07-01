<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\products;

class product_image extends Model
{
    use HasFactory;
    protected $table = 'product_images';
    public function product()
    {
        return $this->belongsTo(products::class, 'product_id', 'id');
    }
}
