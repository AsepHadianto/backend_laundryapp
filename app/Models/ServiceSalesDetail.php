<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSalesDetail extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['sales_record_id', 'service_id', 'quantity', 'subtotal'];

    public function salesRecord()
    {
        return $this->belongsTo(SalesRecord::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
