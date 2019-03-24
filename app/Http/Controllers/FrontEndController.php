<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SubCategory;
use App\Model\Product;
use App\Model\Order;
use App\Model\OrderProduct;
use App\Model\Review;
use Session;
use Illuminate\Support\Facades\Redirect;
class FrontEndController extends Controller
{   
    public function index(){
        $products = Product::orderBy('discount','DESC')->paginate(5);
        return view('userPanel.home')->with('products',$products);
    }

    public function flashsale(){
        $products = Product::orderBy('discount','DESC')->paginate(30);
        return view('userPanel.flashsale')->with('products',$products);
    }
    public function category($id){
        $data = array();
        $data['subcategories'] = SubCategory::where('category_id',$id)->get();
        //print_r($data);
        return view('userPanel.category')->with('data',$data);
    }

    public function checkout(){
        $data = array();
        $cartProdId = Session::get('prodId');
        $data['length'] = sizeof($cartProdId);
        for ($id = 0;$id<sizeof($cartProdId);$id++){

            $data[$id] = Product::getCartProduct($cartProdId[$id]); 
        }
        //print_r($data);
        return view('userPanel.checkout_page')->with('data',$data);
    }
    
    public function productDetails($id){
        $data['detail'] = Product::where('id',$id)->first();
        $subcategory_id = $data['detail']->sub_category_id;
        $data['subcategory'] = Product::where('sub_category_id',$subcategory_id)->get();
        $data['reviews'] = Review::where('product_id',$id)->get();
        return view('userPanel.product_detail')->with('data',$data);
    }
}
