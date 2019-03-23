<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SubCategory;
use App\Model\Product;
use App\Model\Order;
use App\Model\OrderProduct;
use Session;
use Illuminate\Support\Facades\Redirect;
class FrontEndController extends Controller
{
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
    
    public function proceed_order(Request $request){
        
    }
}
