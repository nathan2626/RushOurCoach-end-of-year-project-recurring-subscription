<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ArticlesController extends Controller
{
    public function index()
    {
        return view('/blog/articles');
    }

    public function single()
    {
        return view('/blog/single_article');
    }

}
