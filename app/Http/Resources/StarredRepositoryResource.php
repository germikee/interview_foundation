<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RepositoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($data)
    {
        return [
            'user_id' => $this->user_id,
            'name' => $this->name,
            'owner' => $this->owner,
            'description' => $this->description,
            'avatar_url' => $this->avatar_url,
        ];
    }
}
