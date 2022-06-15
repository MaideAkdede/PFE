<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('id')
            ->withTimestamps()
            ->using(ProductSubcategory::class);
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
