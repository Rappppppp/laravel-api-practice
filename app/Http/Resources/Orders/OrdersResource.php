<?php

namespace App\Http\Resources\Orders;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrdersResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'cart_id' => $this->cart_id,
            'cd_title' => $this->cd->title,
            'cd_id' => $this->cd_id,
            'quantity' => $this->quantity,
            'created_at' => date('F j, Y H:i:s', strtotime($this->created_at)),
            'updated_at' =>  date('F j, Y H:i:s', strtotime($this->updated_at))
        ];
    }
}
