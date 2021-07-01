<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\categories;

class catParents extends Model
{
    use HasFactory;
    protected $table = 'cat_parents';
    public function categories()
    {
        return $this->hasMany(categories::class, 'catParent_id', 'id');
    }
}
