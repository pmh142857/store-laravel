<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends FrontendController
{
    public function  __construct()
    {
        parent::__construct();
    }
    public function productDetail(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);
        if ($id = array_pop($url)) {

            $productDetail = Product::where('pro_active', Product::STATUS_PUBLIC)->find($id);

            $cateProduct = Category::find($productDetail->pro_category_id);

            $viewData = [
                'productDetail' => $productDetail,
                'cateProduct'   => $cateProduct
            ];
            // dd($productDetail);
        }
        return view('product.detail', $viewData);
    }
}
