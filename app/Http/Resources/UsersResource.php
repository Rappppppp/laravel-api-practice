<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->first_name . ' ' . $this->last_name,
            'age' => date_diff(date_create($this->birthdate), date_create('today'))->y,
            'birthdate' => $this->birthdate,
            'email' => $this->email,
            'created_at' =>  date('F j, Y H:i:s', strtotime($this->created_at))
        ];
    }
}
