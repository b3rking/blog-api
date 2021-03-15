<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use App\Models\Post;


class Comment extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $username = User::find($this->user_id)->name;
        $post_title = Post::find($this->post_id)->title;

        return [
            'username' => $username,
            'post_title' => $post_title,
            'content' => $this->content
        ];
    }
}
