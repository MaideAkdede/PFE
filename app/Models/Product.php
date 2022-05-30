<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function scopeDrinks($query)
    {
        $query->where('category_id', '=', 1);
    }
    public function scopeSnacks($query)
    {
        $query->where('category_id', '=', 2);
    }
}
