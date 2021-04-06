<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;

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
		return view('admin.posts.create', compact('categories'));
	}
}
