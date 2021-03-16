<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Resources\Post as PostResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //$comments = Comment::find($this->id)->get();
        $posts = PostResource::collection(Post::where('user_id', $this->id)->get());

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'posts' => $posts,
            'token' => $this->api_token,
        ];
    }
}
