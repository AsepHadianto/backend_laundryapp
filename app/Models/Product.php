<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name', 'price', 'category_id', 'stock'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productSalesDetails()
    {
        return $this->hasMany(ProductSalesDetail::class);
    }
}
