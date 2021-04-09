<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{

    public function run()
    {
    	Post::truncate();
        Category::truncate();
        Tag::truncate();


    	$category = new Category;
    	$category->name = "Categoria A";
    	$category->save();

    	$category = new Category;
    	$category->name = "Categoria B";
    	$category->save();

    	$post = new Post;
    	$post->title = "primer post";
        $post->url = "primer-post";
    	$post->excerpt = "Extrato 1 post";
    	$post->body = "<p>Contenido body del 1 post hghghghghgh</p>";
    	$post->published_at = Carbon::now()->subDays(2);
    	$post->category_id = 1;
    	$post->save();

        $post->tags()->attach(Tag::create(['name' => 'etiqueta 11']));

    	$post = new Post;
    	$post->title = "segundo post";
        $post->url = "segundo-post";
    	$post->excerpt = "Extrato 2 post";
    	$post->body = "<p>Contenido body del 2 post hghghghghgh</p>";
    	$post->published_at = Carbon::now()->subDays(19);
    	$post->category_id = 2;
    	$post->save();

        $post->tags()->attach(Tag::create(['name' => 'etiqueta 22']));

    	$post = new Post;
    	$post->title = "tercer post";
        $post->url = "tercero-post";
    	$post->excerpt = "Extrato 3 post";
    	$post->body = "<p>Contenido body del 3 post hghghghghgh</p>";
    	$post->published_at = Carbon::now()->subDays(5);
    	$post->category_id = 1;
    	$post->save();

        $post->tags()->attach(Tag::create(['name' => 'etiqueta 33']));

    	$post = new Post;
    	$post->title = "Cuarto post";
        $post->url = "cuarto-post";
    	$post->excerpt = "Extrato 4 post";
    	$post->body = "<p>Contenido body del 4 post hghghghghgh</p>";
    	$post->published_at = Carbon::now()->subDays(1);
    	$post->category_id = 2;
    	$post->save();

        $post->tags()->attach(Tag::create(['name' => 'etiqueta 44']));
    }
}
