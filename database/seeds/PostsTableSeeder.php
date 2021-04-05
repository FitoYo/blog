<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Post::truncate();
    	Category::truncate();

    	$category = new Category;
    	$category->name = "Categoria A";
    	$category->save();

    	$category = new Category;
    	$category->name = "Categoria B";
    	$category->save();

    	$post = new Post;
    	$post->title = "primer post";
    	$post->excerpt = "Extrato 1 post";
    	$post->body = "<p>Contenido body del 1 post hghghghghgh</p>";
    	$post->published_at = Carbon::now()->subDays(2);
    	$post->category_id = 1;
    	$post->save();

    	$post = new Post;
    	$post->title = "segundo post";
    	$post->excerpt = "Extrato 2 post";
    	$post->body = "<p>Contenido body del 2 post hghghghghgh</p>";
    	$post->published_at = Carbon::now()->subDays(19);
    	$post->category_id = 2;
    	$post->save();

    	$post = new Post;
    	$post->title = "tercer post";
    	$post->excerpt = "Extrato 3 post";
    	$post->body = "<p>Contenido body del 3 post hghghghghgh</p>";
    	$post->published_at = Carbon::now()->subDays(5);
    	$post->category_id = 1;
    	$post->save();

    	$post = new Post;
    	$post->title = "Cuarto post";
    	$post->excerpt = "Extrato 4 post";
    	$post->body = "<p>Contenido body del 4 post hghghghghgh</p>";
    	$post->published_at = Carbon::now()->subDays(1);
    	$post->category_id = 2;
    	$post->save();
    }
}
