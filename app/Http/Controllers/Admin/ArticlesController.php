<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddArticleFormRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
        $image = $request->file('image');
        $date_of_publication = $request->get('date_of_publication');
        $published = $request->get('published');

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required',
            'date_of_publication' => 'required',
            'published' => 'required'

        ]);


        // IMAGE MANAGEMENT
        $count = DB::table('articles')->count()+1;

        if ($image) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);

            $imageName = $count.'.'.$image->extension();

            $image->move(public_path().'/img/', $imageName);

            $image = $imageName;
        }

        $params = [
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'image' => $image,
            'date_of_publication' => $request->get('date_of_publication'),
            'published' => $request->get('published')
        ];

//        dd($image, $params);
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

        // If I get image
        $image = $request->file('image');
        if($image) {
//            $imageDelete = $article->image;
            $imageDelete = public_path().'/img/'.$article->image;
            File::delete($imageDelete);
//            $image->move(public_path().'/img/', $imageDelete);

            $request->validate([
                'title' => 'required',
                'body' => 'required',
                'image' => 'required',
                'date_of_publication' => 'required',
                'published' => 'required'

            ]);

            // IMAGE MANAGEMENT
            $count = DB::table('articles')->count()+1;
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);

            $imageName = $count.'.'.$image->extension();

            $image->move(public_path().'/img/', $imageName);

            $image = $imageName;


            $params = [
                'title' => $request->get('title'),
                'body' => $request->get('body'),
                'date_of_publication' => $request->get('date_of_publication'),
                'published' => $request->get('published')
            ];

            DB::table('articles')->where([
                ['id', '=', $id]
            ])->update([
                'title' => $params['title'],
                'body' => $params['body'],
                'date_of_publication' => $params['date_of_publication'],
                'published' => $params['published']
            ]);

//        dd($article);
            return redirect('/admin')
                ->with('status', 'Votre article a bien été modifié !')
                ->with('good', '1');

        }

        // else
        $image = $article->image;

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'date_of_publication' => 'required',
            'published' => 'required'

        ]);


        $params = [
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'image' => $image,
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
