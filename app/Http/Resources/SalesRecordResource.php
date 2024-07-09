<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalesRecordResource extends JsonResource
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
            'user_id' => $this->user_id,
            // 'user' => new UserResource($this->whenLoaded('user')),
            'customer_id' => $this->customer_id,
            // 'customer' => new CustomerResource($this->whenLoaded('customer')),
            'date' => $this->date,
            'total_amount' => $this->total_amount,
        ];
    }
}
