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

    public function catalog(Request $request)
    {
        $sort = $request->sort;
        $category = $request->category;

        $array = DB::table('products')
            ->Join('categories', 'products.id_category', '=', 'categories.id')
            ->select('products.*', 'categories.title as categories_title');

        if($sort == 'title'){
            $array->orderBy('title');
        }
        elseif($sort == 'price'){
            $array->orderBy('price');
        }

        if($category){
            $array->where('products.id_category', '=', $category);
        }

        $array = $array->get();
        $categories = DB::table('categories')->get();

        return view('catalog', compact('array', 'categories'));
    }

    public function card($id)
    {
        $card = DB::table('products')->where('id', '=', $id)->first();
        return view('card', compact('card'));
    }
}
