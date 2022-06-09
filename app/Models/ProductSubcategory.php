<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductSubcategory extends Pivot
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'product_subcategory';
}
