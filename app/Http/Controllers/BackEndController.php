<?php

namespace App\Http\Controllers;
use App\Model\Category;
use App\Model\SubCategory;
use App\Model\Customer;
use App\Model\Product;
use App\Model\Admin;
use App\Model\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
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
        $users = DB::table('customers')->orderBy('created_at','DESC');
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
    public function detail_product($id){
        $product = Product::where('id',$id)->first();
        return view('adminPanel.product_detail')->with('product',$product);
    }
    public function edit_product($id){
        $data = array();
        $data['categories'] = DB::table('categories')->orderBy('name','ASC')->get();
        $data['subcategories'] = DB::table('sub_categories')->orderBy('name','ASC')->get();
        $data['product'] = Product::where('id',$id)->first();
        return view('adminPanel.edit_product')->with('data',$data);
    }

    public function update_product(Request $request,$id){
        $product = Product::where('id',$id)->first();
        $data = array();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/upload');
            $image->move($destinationPath, $name);
        }
        else{
            $name = $product->image;
        }
        $data['image'] = $name;
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['discount'] = $request->discount;
        $data['stock'] = $request->stock;
        $data['detail'] = $request->detail;
        $sub_category = SubCategory::where('name',$request->subcategory)->first();
        $data['subcategory'] = $sub_category->id;
        $data['admin_id'] = Session::get('admin_id'); 
        $data['date'] =  date('Y-m-d');  
        $user_email = Session::get('user_email');
        if($user_email){
            DB::table('products')->where('id',$id)->update(['image'=>$data['image'],'name'=>$data['name'],'price'=>$data['price'],'discount' => $data['discount'],'stock' => $data['stock'],'detail'=>$data['detail'],'sub_category_id'=>$data['subcategory'],'updated_at' => $data['date'],'admin_id'=>$data['admin_id']]);
            Session::put('product_update','Product Updated Successfully');
            return Redirect::to('/admin/products');
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        }
        
       
    
    }

    public function delete_product($id){
        $user_email = Session::get('user_email');
        if($user_email){
            Product::where('id',$id)->delete();
            Session::put('product_delete','Product Deleted Successfully');
            return Redirect::to('/admin/products');
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        }
    }

    public function unpublish_product(){

    }
    public function addsupply_product($id){
        $product = Product::where('id',$id)->first();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('adminPanel.add_supply')->with('product',$product);
            return Redirect::to('admin/publishedproducts');
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        }
    }

    public function updatesupply_product($id){
        $product = Product::where('id',$id)->first();
        $add_stock = $request->add_stock;
        $stock = $product->stock;
        if($stock<0 || $stock == null)
            $stock = 0;
        $stock = $stock + $add_stock;
        $user_email = Session::get('user_email');
        if($user_email){
            DB::table('products')->where('id',$id)->update(['stock'=>$stock]);
            Session::put('supply_success','New Supply Successfully Added');
            return redirect()->back();
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
    }

    public function change_type($id){
        $item = Product::where('id',$id)->first();
        $date = date('Y-m-d');
        if($item->type == 'draft'){
            $change_type = 'published';
            $publish_date = $date;
        }
        else{
            $change_type = 'draft';
            $publish_date = null;
        }
        DB::table('products')->where('id',$id)->update(['type'=>$change_type,'published_at'=>$publish_date]);
        Session::put('change_message','Item Type Successfully Changed');
        return redirect()->back();
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

    public function add_product(){
        $data = array();
        $data['categories'] = DB::table('categories')->orderBy('name','ASC')->get();
        $data['subcategories'] = DB::table('sub_categories')->orderBy('name','ASC')->get();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('adminPanel.add_product')->with('data',$data);
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        }
    }
    public function store_product(Request $request){
        $product = new Product;
        $sub_category = SubCategory::where('name',$request->subcategory)->first();
        $product->sub_category_id = $sub_category->id;
        $product->name = $request->name;
        switch($request->submit) {
            case 'published': 
                $product->type = 'published';
                $product->created_at = date('Y-m-d');
                $product->updated_at = date('Y-m-d');
                break;
            
            case 'draft':
                $product->type = 'draft';
                $product->created_at = date('Y-m-d');
                $product->updated_at = null;
                break;
        }
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/upload');
            $image->move($destinationPath, $name);
        }
        $product->image = $name;
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->stock = $request->stock;
        $product->admin_id = Session::get('admin_id');
        $user_email = Session::get('user_email');
        if($user_email){
            $product->save();
            Session::put('add_product','Product Added Successfully');
            return Redirect::to('admin/products');
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
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
