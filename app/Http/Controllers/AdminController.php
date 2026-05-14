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

    public function dellProduct(Request $request)
    {
        DB::table('products')->where('id', '=', $request->id)->delete();
        return redirect()->back()->with('messageDellProduct', 'Продукт успешно удален');
    }

    public function editProductView($id)
    {
        $product = DB::table('products')->where('id', '=', $id)->first();
        $categories = DB::table('categories')->get();
        return view('editProductView', compact('product', 'categories'));
    }

    public function editProduct($id, Request $request)
    {
        DB::table('products')->where('id', '=', $id)->update([
            'title' => $request->nameProduct,
            'description' => $request->descriptionProduct,
            'id_category' => $request->id_category,
            'price' => $request->costProduct,
        ]);

        if(isset($request->image)){
            $img = $request->file('image');
            $typeImg = $img->extension();

            $uniqName = Str::random();
            $nameImg = $uniqName.'.'.$typeImg;
            $pathFolder = 'assets/img/';

            $img->move(public_path($pathFolder), $nameImg);

            DB::table('products')->where('id', '=', $id)->update([
                'image'=>$pathFolder . $nameImg
            ]);
        }
        return redirect()->back()->with('messageEditProduct', 'Товар успешно обновлен');
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

    public function dellArticle(Request $request)
    {
        DB::table('articles')->where('id', '=', $request->id)->delete();
        return redirect()->back()->with('messageDellArticles', 'Статья успешно удалена');
    }

    public function editArticleView($id)
    {
        $article = DB::table('articles')->where('id', '=', $id)->first();
        return view('editArticleView', compact('article'));
    }

    public function editArticle($id, Request $request)
    {
        DB::table('articles')->where('id', '=', $id)->update([
            'title' => $request->nameArticle,
            'description' => $request->descriptionArticle,
        ]);

        if(isset($request->image)){
            $img = $request->file('image');
            $typeImg = $img->extension();

            $uniqName = Str::random();
            $nameImg = $uniqName.'.'.$typeImg;
            $pathFolder = 'assets/img/';

            $img->move(public_path($pathFolder), $nameImg);

            DB::table('articles')->where('id', '=', $id)->update([
                'image'=>$pathFolder . $nameImg
            ]);
        }
        return redirect()->back()->with('messageEditArticle', 'Статья успешно обновлена');
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

    public function editNumber(Request $request)
    {
        DB::table('contacts')->update([
            'number' => $request->number
        ]);
        return redirect()->back()->with('messageEditNumber', 'Номер телефона успешно обновлен');
    }

    public function editEmail(Request $request)
    {
        DB::table('contacts')->update([
            'email' => $request->email
        ]);
        return redirect()->back()->with('messageEditEmail', 'Электронная почта успешно обновлена');
    }

    public function editAdress(Request $request)
    {
        DB::table('contacts')->update([
            'adress' => $request->adress
        ]);
        return redirect()->back()->with('messageEditAdress', 'Адрес успешно обновлен');
    }

    public function editMap(Request $request)
    {
        if(isset($request->image)){
            $img = $request->file('image');
            $typeImg = $img->extension();

            $uniqName = Str::random();
            $nameImg = $uniqName.'.'.$typeImg;
            $pathFolder = 'assets/img/';

            $img->move(public_path($pathFolder), $nameImg);

            DB::table('contacts')->update([
                'image'=>$pathFolder . $nameImg
            ]);
        }
        return redirect()->back()->with('messageEditMap', 'Карта успешно обновлена');
    }
}
