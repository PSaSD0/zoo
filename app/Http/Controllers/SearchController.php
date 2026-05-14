<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');
        $category = $request->input('category');

        $query = DB::table('products')
            ->Join('categories', 'products.id_category', '=', 'categories.id')
            ->select('products.*', 'categories.title as categories_title')
            ->where('products.title', 'like', '%' . $search . '%');

        if($sort == 'title'){
            $query->orderBy('title');
        }
        elseif($sort == 'price'){
            $query->orderBy('price');
        }

        if($category){
            $query->where('products.id_category', '=', $category);
        }

        $results = $query->get();

        $categories = DB::table('categories')->get();

        return view('searchResults', [
            'results' => $results,
            'search' => $search,
            'categories' => $categories,
            'sort' => $sort,
            'category' => $category
        ]);
    }
}
