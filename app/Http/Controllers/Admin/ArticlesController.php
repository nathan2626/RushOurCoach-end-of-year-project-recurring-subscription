<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddArticleFormRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = DB::table('articles')->get();


        return view('/admin/articles', compact('articles'));
    }

    public function addArticle(Request $request)
    {
        $title = $request->get('title');
        $body = $request->get('body');
        $image = $request->get('image');
        $date_of_publication = $request->get('date_of_publication');
        $published = $request->get('published');

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required',
            'date_of_publication' => 'required',
            'published' => 'required'

        ]);

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
            ->with('status', 'Votre article a bien été créé !')
            ->with('good', '1');

    }

    public function editArticle(Request $request, $id)
    {
        $article = Article::find($id);

        if(!$article) {
            return redirect('/admin')
                ->with('status', "L'article n'exite pas !")
                ->with('good', '0');
        }

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required',
            'date_of_publication' => 'required',
            'published' => 'required'

        ]);

        $params = [
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'image' => '15.png',
            'date_of_publication' => $request->get('date_of_publication'),
            'published' => $request->get('published')
        ];

        DB::table('articles')->where([
            ['id', '=', $id]
        ])->update([
            'title' => $params['title'],
            'body' => $params['body'],
            'image' => $params['image'],
            'date_of_publication' => $params['date_of_publication'],
            'published' => $params['published']
        ]);

//        dd($article);
        return redirect('/admin')
            ->with('status', 'Votre article a bien été modifié !')
            ->with('good', '1');

    }

    public function deleteArticle($id)
    {
        $article = Article::find($id);

        if(!$article) {
            return redirect('/admin')
                ->with('status', "L'article n'exite pas !")
                ->with('good', '0');
        }

        DB::table('articles')->where('id', '=',  $id)->delete();

//        dd($article);
        return redirect('/admin')
            ->with('status', 'Votre article a bien été supprimée !')
            ->with('good', '1');

    }

}
