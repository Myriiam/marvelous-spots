<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'message' => $this->message,
            //'status_offer' => $this->status_offer->when('booked'),
            'guide' => UserResource::make($this->guide->user),
            //'created_at' => $this->created_at,
        ];

        return parent::toArray($request);
    }
}
