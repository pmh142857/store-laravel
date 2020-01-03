<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends FrontendController
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function index()
    {   
        // Lấy sản phẩm hot ra 
        // public moi lay
        $productHot = Product::where([
            'pro_hot'=>Product::HOT_ON,
            'pro_active'=>Product::STATUS_PUBLIC
        ])->limit(10)->get();

        // Show bài viết mới nhất
        $articleNews = Article::orderBy('id', 'DESC')->limit(6)->get();

        $viewData = [
            'productHot'=>$productHot,
            'articleNews' =>   $articleNews
        ];
        // dd("OK");
        return view('home.index',$viewData);
    }
}
