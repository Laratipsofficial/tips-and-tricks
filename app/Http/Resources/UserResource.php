<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'posts_count' => $this->whenCounted('posts_count'),
            'posts' => $this->whenLoaded('posts'),
        ];
    }
}
