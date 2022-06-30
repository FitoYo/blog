<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function show(Post $post){
    	//$post = Post::findOrFail($id);

    	return view('posts.show', compact('post'));
    }
}
// finsion que cambia los espacios en blanco por otro caracter
// str_slug($post-title, '/');