<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSalesDetail extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['sales_record_id', 'product_id', 'quantity', 'subtotal'];

    public function salesRecord()
    {
        return $this->belongsTo(SalesRecord::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
