<?php

namespace App\Http\Controllers;
use App\Model\Category;
use App\Model\Customer;
use App\Model\Product;
use App\Model\Admin;
use App\Model\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class BackEndController extends Controller
{
    public function home(){
        $type = 'published';
        $data['products'] = DB::table('products')->where('type',$type)->orderBy('created_at','DESC')->limit(20)->get();
        //$data['unserved_orders'] = DB::table('tbl_order')->where('type','unserved')->orderBy('date','DESC')->paginate(20);
        $user_email = Session::get('user_email');
        if($user_email){
            return view('adminPanel.home')->with('data',$data);
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        }

        return view('adminPanel.home');
    }

    public function categories(){
        $categories = Category::orderBy('name', 'ASC')->get();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('adminPanel.categories')->with('categories',$categories);
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        }
        
    }

    public function subcategories(){
        $data = array();
        $data['categories'] = Category::all();
        $data['subcategories'] = DB::table('sub_categories')->orderBy('category_id', 'ASC')->orderBy('name','DESC')->get();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('adminPanel.sub_categories')->with('data',$data);
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        }
        
    }

    public function users(){
        $users = Customer::all();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('adminPanel.users')->with('users',$users);
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        }
        
    }

    public function products(){
        $products = DB::table('products')->orderBy('sub_category_id','ASC')->orderBy('created_at','DESC')->get();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('adminPanel.all_products')->with('products',$products);
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        } 
    }

    public function draft_products(){
        $type = 'draft';
        $products = DB::table('products')->where('type',$type)->orderBy('sub_category_id','ASC')->orderBy('created_at','DESC')->get();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('adminPanel.draft_products')->with('products',$products);
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        } 
    }

    public function published_products(){
        $type = 'published';
        $products = DB::table('products')->where('type',$type)->orderBy('sub_category_id','ASC')->orderBy('created_at','DESC')->get();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('adminPanel.published_products')->with('products',$products);
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        } 
    }

    public function store_product(Request $request){

    }
    public function admins(){
        $admins = Admin::all();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('adminPanel.admins')->with('admins',$admins);
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        }  
    }

    public function reviews(){
        $reviews = Review::all();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('adminPanel.reviews')->with('reviews',$reviews);
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        }  
    }
}
