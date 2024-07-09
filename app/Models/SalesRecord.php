<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesRecord extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['user_id', 'customer_id', 'date', 'total_amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function productSalesDetails()
    {
        return $this->hasMany(ProductSalesDetail::class);
    }

    public function serviceSalesDetails()
    {
        return $this->hasMany(ServiceSalesDetail::class);
    }
}
