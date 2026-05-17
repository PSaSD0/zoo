<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function home()
    {
        $contacts = DB::table('contacts')->first();

        $reviews = DB::table('reviews')
            ->join('users', 'reviews.id_user', '=', 'users.id')
            ->select('reviews.*', 'users.name as user_name')
            ->limit(3)
            ->orderBy('id', 'desc')
            ->get();

        return view('home', compact('reviews', 'contacts'));
    }

    public function store(Request $request)
    {
        $userId = Auth::check() ? Auth::id() : 1;

        DB::table('reviews')->insert([
            'id_user' => $userId,
            'comment' => $request->comment,
            'rating' => $request->rating,
            'created_at' => now(),
        ]);

        return redirect('/')->with('success', 'Спасибо за отзыв!');
    }

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

    public function contacts()
    {
        $contacts = DB::table('contacts')->first();
        return view('contacts', compact('contacts'));
    }

    public function faq()
    {
        return view('faq');
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

    public function profile($id)
    {
        if(Auth::user()){
            $user = DB::table('users')->where('id', '=', $id)->first();
            return view('profile', compact('user'));
        }
        else{
            return redirect('login');
        }
    }

    public function editProfileView($id)
    {
        $user = DB::table('users')->where('id', '=', $id)->first();
        return view('editProfileView', compact('user'));
    }

    public function editProfile($id, Request $request)
    {
        DB::table('users')->where('id', '=', $id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return redirect()->back()->with('messageEditProfile', 'Данные успешно обновлены!');
    }
}

