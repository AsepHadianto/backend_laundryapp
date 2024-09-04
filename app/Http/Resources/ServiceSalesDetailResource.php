<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceSalesDetailResource extends JsonResource
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
            'service_id' => $this->service_id,
            // 'sales_record_id' => new SalesRecordResource($this->whenLoaded('salesRecord')),
            // 'service_id' => new ServiceResource($this->whenLoaded('service')),
            'quantity' => $this->quantity,
            'price' => $this->price,
            'subtotal' => $this->subtotal,
        ];
    }
}
