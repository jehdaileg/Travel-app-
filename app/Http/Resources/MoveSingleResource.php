<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MoveSingleResource extends JsonResource
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
            'code_move' => $this->code_move,
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'departure_day' => $this->departure_day,
            'country_id' => $this->country_id,
            'continent_id' => $this->continent_id,
            'province_id' => $this->province_id
        ];
    }
}
