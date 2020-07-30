<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name'       => $this->name,
            'email'      => $this->email,
            'created_at' => $this->created_at->format('d-m-Y H:i'),
            'api_token'  => $this->api_token,
            'is_admin'   => (bool) $this->is_admin,
        ];
    }
}
