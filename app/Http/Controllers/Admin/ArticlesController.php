<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddArticleFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = DB::table('articles')->get();

        return view('/admin/articles', compact('articles'));
    }

    public function addArticle(AddArticleFormRequest $request)
    {
        $title = $request->get('title');
        $body = $request->get('body');
        $image = $request->get('image');
        $date_of_publication = $request->get('date_of_publication');
        $published = $request->get('published');

        $params = [
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'image' => '15.png',
            'date_of_publication' => $request->get('date_of_publication'),
            'published' => $request->get('published')
        ];

        DB::table('articles')->insert([
            'title' => $params['title'],
            'body' => $params['body'],
            'image' => $params['image'],
            'date_of_publication' => $params['date_of_publication'],
            'published' => $params['published']
        ]);

        return redirect('/admin')
            ->with('status', 'Votre article a bien été créé !');

    }
}
