<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
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
            'body' => $this->body,
            'image' => $this->image,
            'category_id' => $this->category_id,
            'category_name' => $this->category->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'posted_at' => $this->posted_at
        ];
    }
}