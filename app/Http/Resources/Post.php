<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use Carbon\Carbon;
// use App\Models\Post;

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
        $username = User::find($this->user_id)->name;
        $create_time = new Carbon($this->created_at);
        $update_time = new Carbon($this->updated_at);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'username' => $username,
            'image_url' => $this->image_url,
            'likes' => $this->likes + 5,
            'content' => $this->content,
            'created_at' => $create_time->diffForHumans(['options', Carbon::JUST_NOW]),
            'updated_at' => $update_time->diffForHumans(['options', Carbon::JUST_NOW]),
        ];
    }
}
