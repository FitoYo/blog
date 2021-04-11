<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function store(Post $post){
    	$this->validate(reques(), ['file' => 'requied|image|max:2048']);
    	$file = request()->file('file')->store('public');
    	$photoUrl = Storage::url($file);

    	Photo::create([
    		'url' => $photoUrl,
    		'post_id' => $post->id
    	]);
    }
}
