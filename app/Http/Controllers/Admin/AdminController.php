<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
  /*  public function __construct()
    {
    	$this->middleware('auth');
    }*/  //lo estamos auth en la ruta web
    public function index()
    {
    	return view('admin.dashboard');
    }

}
