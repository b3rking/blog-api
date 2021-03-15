<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use Carbon\Carbon;

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
        $username = User::find($this->id)->name;
        $time = new Carbon($this->created_at);
        return [
            'title' => $this->title,
            'username' => $username,
            'image_url' => $this->image_url,
            'likes' => $this->likes + 5,
            'content' => $this->content,
            'created_at' => $time->diffInHours('America/Toronto'),
            // 'created_at' => date_format($this->created_at, 'Y-m-d'),
            'updated_at' => $this->updated_at
        ];
    }
}
