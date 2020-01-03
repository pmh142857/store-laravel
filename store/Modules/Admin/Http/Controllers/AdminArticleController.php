<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestArticle;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminArticleController extends Controller
{
    // Controller trang tin tuc article
    public function index(Request $request)
    {

        //Show danh sach bai viet
        $articles = Article::whereRaw(1);
        // kiểm tra reques tìm theo tên
        if($request->name) $articles->where('a_name','like','%'.$request->name.'%');
        // phân trang
        $articles = $articles->paginate(10);
        
        $viewData = [
            'articles' => $articles

        ];

        return view('admin::article.index', $viewData);
    }

    public function create()
    {
        return view('admin::article.create');
    }

    public function store(RequestArticle $requestArticle)
    {
        $this->insertOrUpdate($requestArticle);
        return redirect()->back();
    }

    // ham sua bai viet
    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin::article.create', compact('article'));
    }

    // update
    public function update(RequestArticle $requestArticle, $id)
    {
        $this->insertOrUpdate($requestArticle, $id);
        return redirect()->back();
    }

    public function insertOrUpdate($requestArticle, $id = '')
    {
        $article = new Article();
        if ($id) $article = Article::find($id);

        $article->a_name = $requestArticle->a_name;
        $article->a_slug = str_slug($requestArticle->a_name);
        $article->a_description = $requestArticle->a_description;
        $article->a_content = $requestArticle->a_content;
        $article->a_title_seo = $requestArticle->a_title_seo ? $requestArticle->a_title_seo : $requestArticle->a_name;
        $article->a_description_seo = $requestArticle->a_description_seo ? $requestArticle->a_description_seo : $requestArticle->a_description;

        // upload hinh anh bai viet
        if ($requestArticle->hasFile('avatar')) {
            $file = upload_image('avatar');
            if (isset($file['name'])) {
                $article->a_avatar_seo = $file['name'];
            }            
        }   
        $article->save();

        // dd($requestArticle-> all());
    }

    // Ham action Delete bai viet
    public function action($action, $id)
    {
        if ($action) {
            $article = Article::find($id);
            switch ($action) {
                case 'delete':
                    $article->delete();
                    break;
                case 'active':
                    $article->a_active = $article->a_active ? 0 : 1;
                    $article->save();
                    // dd('OK');
                    break;
                    // case 'hot':
                    //     $article->pro_hot = $article->pro_hot ? 0 : 1;
                    //     $article->save();
                    //     break;
            }
            return redirect()->back();
        }
    }
}