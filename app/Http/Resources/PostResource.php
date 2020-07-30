<?php

namespace App\Http\Resources;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\TagResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id'           => $this->id,
            'title'        => $this->title,
            'body'         => $this->body,
            'is_published' => (bool) $this->is_published,
            'created_at'   => $this->created_at->format('d-m-Y H:i'),
            'updated_at'   => $this->updated_at->format('d-m-Y H:i'),
            'comments'     => CommentResource::collection($this->whenLoaded('comments')),
            'category'     => new CategoryResource($this->whenLoaded('category')),
            'user'         => new UserResource($this->whenLoaded('user')),
            'tags'         => TagResource::collection($this->whenLoaded('tags')),
        ];
    }

    /**
     * Customize the outgoing response for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    public function withResponse($request, $response)
    {
        $response->header('ETag', $this->etag);
    }
}
