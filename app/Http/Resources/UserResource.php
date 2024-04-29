<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'user_nowa' => $this->user_nowa,
            'user_idkategori' => $this->user_idkategori,
            'profile' => new ProfileResource($this->profile),
        ];
    }
}
