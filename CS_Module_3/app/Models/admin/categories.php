<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\products;
use App\Models\admin\catParents;
use Carbon\Carbon;

class categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    public function products()
    {
        return $this->hasMany(products::class, 'category_id', 'id');
    }
    public function catParents()
    {
        return $this->belongsTo(catParents::class, 'catParent_id', 'id');
    }
}
