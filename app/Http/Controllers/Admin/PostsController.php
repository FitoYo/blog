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
	// public function create()
	// {
	// 	$categories = Category::all();
	// 	$tags = Tag::all();
	// 	return view('admin.posts.create', compact('categories', 'tags'));
	// }
	public function store(Request $request)
	{
		$this->validate($request, ['title' => 'required']);

		$post = Post::create(['title' => $request->get('title'), 'url' => str_slug($request->get('title'),)]);

		return redirect()->route('admin.posts.edit', $post);
	}
	public function edit(Post $post){
		$categories = Category::all();
		$tags = Tag::all();
		return view('admin.posts.edit', compact('categories', 'tags', 'post'));

		//return view('admin.posts.edit', compact('post'));
	}
		public function update(Post $post, Request $request)
	{
		// validate es un atributo heredaro del Controller
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
		//$post = new Post;  //no necesitamos un nuevo Post ya que lo recibimos por Parametro
		$post->title = $request->title;
		$post->url = str_slug($request->title);
		$post->body = $request->body;
		$post->published_at = Carbon::parse($request->published_at);
		$post->category_id = $request->category;
		$post->excerpt = $request->excerpt;
		$post->save();

	    $post->tags()->sync($request->get('tags'));

	    return back()->with('flash', 'Tu publicación ha sido Guardada');
	}
}
