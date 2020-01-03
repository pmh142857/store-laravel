<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends FrontendController
{
    // Danh sach bai viet
    public function getListArticle()
    {
        // Lay ra 5 bai viet
        // $articles = Article::paginate(5);
        // Dữ liệu lớn dùng simplePaginate
        $articles = Article::simplePaginate(3);

        return view('article.index', compact('articles'));
    }
    // Chi tiet bai viet
    public function getDetailArticle(Request $request)
    {
        $arrayUrl = (preg_split("/(-)/i", $request->segment(2)));
        // dd( $arrayUrl);
        $id = array_pop($arrayUrl);
        // dd($id);
        if ($id) {
            $articleDetail = Article::find($id);
            $articles = Article::paginate(4);
            $viewData = [

                'articles' => $articles,
                'articleDetail' => $articleDetail
            ];

            return view('article.detail', $viewData);
        }
        return redirect('/');
    }
}
