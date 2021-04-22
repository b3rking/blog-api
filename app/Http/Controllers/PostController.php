<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\Post as ResourcePost;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response(ResourcePost::collection(Post::orderByDesc('created_at')->get()), 202)->header('Accept', 'application/json');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if( $file = $request['image_url'] ) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $input['image_url'] = 'images/'. $name;
        }

        $resultat = Post::create($input);
        if($resultat) {
            return response($resultat, 200)->header('author', 'berking');
        } else {
            return response(['message', 'something went wrong!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response($post, 200);

        // return new ResourcePost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        return response($post->update($request->all()), 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        return response($post->delete(), 200);
    }

    public function me() {
        return Post::paginate(10);
    }
}
