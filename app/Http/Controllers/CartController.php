<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Model\Product;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request){
        $prodOnCart = $request->prodOnCart;
        $prodId = $request->prodId;
        $prodOnCart = $prodOnCart +1;
        Session::put('prodOnCart',$prodOnCart);
        Session::push('prodId', $prodId);
        return Redirect::back();
    }

    public function index()
    {
        $data = array();
        $cartProdId = Session::get('prodId');
        if($cartProdId == null)
            return view('userPanel.cart')->with('data','No Product on Cart');
        else{
            $data['length'] = sizeof($cartProdId);
            for ($id = 0;$id<sizeof($cartProdId);$id++){
                $new_product = Product::getCartProduct($cartProdId[$id]); 
                array_push($data,$new_product);
                
            }
            return view('userPanel.cart')->with('data',$data);
        }
        
        
    }

    public function removeFromCart(Request $request){
        $prodOnCart = $request->prodOnCart;
        $cart_index = $request->cart_index;
        $prodOnCart = $prodOnCart - 1;
        $prodId = Session::get('prodId'); // Get the array
        array_splice($prodId, $cart_index, 1);
        Session::put('prodId', $prodId);
        Session::put('prodOnCart',$prodOnCart);
        Session::put('product_removed','1 Product Removed From Cart');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
