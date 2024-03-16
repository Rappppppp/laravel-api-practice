<?php

namespace App\Http\Resources\CDs;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CDsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'artist' => $this->artist,
            'genre' => $this->genre,
            'release_year' => $this->release_year,
            'quantity' => $this->quantity >= 300 ? 'Overstock: ' . $this->quantity : $this->quantity,
            'updated_at' => date('F j, Y H:i:s', strtotime($this->updated_at)) // Check last update of stock(s)
        ];
    }
}
