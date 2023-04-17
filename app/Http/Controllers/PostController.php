<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;
use App\Http\Resources\DetailPostResource;
class PostController extends Controller
{
    public function index(){
        $posts = Post::with('user')->all();
        // return response()->json(["data"=>$posts]);
        return PostResource::collection($posts);
    }

    public function show($id){
       $post = Post::with('writer')->findOrFail($id);
       return new DetailPostResource($post);
    }
}
