<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;

class PostsController extends Controller
{
	public function index()
	{
		$posts = Post::all();

		return view('admin.posts.index', compact('posts'));
	}
	public function create()
	{
		$categories = Category::all();
		$tags = Tag::all();
		return view('admin.posts.create', compact('categories', 'tags'));
	}
	public function store(Request $request)
	{
		//validate es un atributo heredaro del Controller
		// 1 parametro es el Request (todos los tatos) 2 Array con las reglas de Validacion RULES, 3 un mensage para mostrar
		$this->validate($request, [
			'title' => 'required',
			'body' => 'required',
			'published_at' => 'required',
			'category' => 'required',
			'excerpt' => 'required',
			'tags' => 'required',
		]);
		//return $request->all();
		//dd($request->get('tags'));
		$post = new Post;
		$post->title = $request->title;
		$post->body = $request->body;
		$post->published_at = Carbon::parse($request->published_at);
		$post->category_id = $request->category;
		$post->excerpt = $request->excerpt;
		$post->save();

	    $post->tags()->attach($request->get('tags'));

	    return back()->with('flash', 'Tu publicación ha sido creada');
	}

}
