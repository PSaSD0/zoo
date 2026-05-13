<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function articles()
    {
        $array = DB::table('articles')->get();
        return view('articles', compact('array'));
    }

    public function article($id)
    {
        $article = DB::table('articles')->where('id', '=', $id)->first();
        return view('article', compact('article'));
    }
}
