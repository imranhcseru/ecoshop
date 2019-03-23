<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Model\Product;
use App\Model\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $order = new Order;
        $orderProduct = new OrderProduct;
        $order->email = $request->email;
        $order->name = $request->name;
        $order->address = $request->address;
        $order->phonenumber = $request->phonenumber;
        $order->serve = 'unserved';
        $order->cardname = $request->cardname;
        $order->cardnumber = $request->cardnumber;
        $order->totalfee = $request->totalfee;
        $order->save();
        $data = array();
        $cartProdId = Session::get('prodId');
        $data['length'] = sizeof($cartProdId);
        for ($id = 0;$id<sizeof($cartProdId);$id++){
            $orderProduct->create([
                'order_id' => $order->id,
                'product_id' =>$cartProdId[$id],
                'quantity' =>1
            ]);
        }
        Session::put('prodOnCart',null);
        Session::put('prodId', null);
        Session::put('customer_order_success', 'Order Submitted Successfully');
        return Redirect::to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_email = Session::get('user_email');
        if($user_email){
            $data = array();
            $data['orderproduct'] = OrderProduct::where('order_id',$id)->get();
            $data['order'] = Order::where('id',$id)->first();
            return view('adminPanel.order_details')->with('data',$data);
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_email = Session::get('user_email');
        if($user_email){
            Order::where('id',$id)->delete();
            Session::put('order_delete','Order Deleted Successfully');
            return redirect()->back();
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        }
    }

    public function allOrders(){
        $user_email = Session::get('user_email');
        if($user_email){
            $orders = Order::all();
            return view('adminPanel.orders')->with('orders',$orders);
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        }
    }

    public function servedOrders(){
        $user_email = Session::get('user_email');
        if($user_email){
            $orders = Order::where('serve','served')->get();
            return view('adminPanel.orders_served')->with('orders',$orders);
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        }
    }

    public function unServedOrders(){
        $user_email = Session::get('user_email');
        if($user_email){
            $orders = Order::where('serve','unserved')->get();
            return view('adminPanel.orders_unserved')->with('orders',$orders);
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        }
    }

    public function serveOrder($id){
        $item = Product::where('id',$id)->first();
        $served_at = date("Y-m-d H:i:s");
        $served_by = Session::get('admin_id');
        $user_email = Session::get('user_email');
        if($user_email){
            DB::table('orders')->where('id',$id)->update(['serve'=>'served','served_at'=>$served_at,'served_by' => $served_by]);
            Session::put('serve_success','Order Served Successfully');
            return redirect()->back();
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        }
    }
}
