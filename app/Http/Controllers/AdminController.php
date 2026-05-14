<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function admin()
    {
        if(Auth::user()->id_role==2){
            $categories = DB::table('categories')->get();
            return view('admin', compact('categories'));
        }
        else{
            return redirect('/');
        }
    }

    public function addProduct(Request $request)
    {
        $path = $request->file('imageProduct')->store('assets/img', 'public');
        $request->file('imageProduct')->move(public_path('assets/img'), $path);

        DB::table('products')->insert([
            'title'=>$request->nameProduct,
            'description'=>$request->descriptionProduct,
            'id_category'=>$request->id_category,
            'price'=>$request->priceProduct,
            'image'=>$path,
        ]);
        return redirect()->back()->with('messageAddProduct', 'Продукт успешно добавлен');
    }

    public function addArticle(Request $request)
    {
        $path = $request->file('imageArticle')->store('assets/img', 'public');
        $request->file('imageArticle')->move(public_path('assets/img'), $path);

        DB::table('articles')->insert([
            'title'=>$request->nameArticle,
            'description'=>$request->descriptionArticle,
            'image'=>$path,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('messageAddArticle', 'Статья успешно добавлена');
    }

    public function addCategory(Request $request)
    {
        DB::table('categories')->insert(['title'=>$request->nameCategory]);
        return redirect()->back()->with('messageAddCategory', 'Категория успешно добавлена');
    }

    public function dellCategory(Request $request)
    {
        DB::table('categories')->where('id', '=', $request->id_category)->delete();
        return redirect()->back()->with('messageDellCategory', 'Категория успешно удалена');
    }
}
