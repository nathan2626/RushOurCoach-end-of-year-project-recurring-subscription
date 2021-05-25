<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function index()
    {

        // Articles whose publication date is later than the current date or
        // which is not published must not appear on the site,
        // but remains administrable via the back office.

        $current_date_time = Carbon::now();

        $articles = DB::table('articles')->where([
            ['published', '=', '1'],
            ['date_of_publication', '<', $current_date_time],
        ])->orderByDesc('updated_at')->paginate(3);

        return view('/blog/articles', compact('articles'));
    }

    public function single()
    {
        return view('/blog/single_article');
    }

}
