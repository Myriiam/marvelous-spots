<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'title' => $this->title,
            'picture' => PictureResource::make($this->pictures),
            'user' => UserResource::make($this->user),
            //'created_at' => $this->created_at,
        ];

        return parent::toArray($request);
    }
}
