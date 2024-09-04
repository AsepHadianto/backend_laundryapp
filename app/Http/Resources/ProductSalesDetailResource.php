<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductSalesDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sales_record_id' => $this->sales_record_id,
            'product_id' => $this->product_id,
            // 'sales_record' => new SalesRecordResource($this->whenLoaded('salesRecord')),
            // 'product' => new ProductResource($this->whenLoaded('product')),
            'quantity' => $this->quantity,
            'price' => $this->price,
            'subtotal' => $this->subtotal,
        ];
    }
}
