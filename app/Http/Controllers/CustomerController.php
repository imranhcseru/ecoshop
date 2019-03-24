<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\CustomerResource;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CustomerResource::collection(Customer::all());
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
    public function check(Request $request){
        $result = Customer::where('email',$request->email)->where('password',$request->password)->first();
        if($result){
            Session::put('customer_name',$result->first_name);
            Session::put('customer_id',$result->id);
            Session::put('customer_email',$result->email);
            return Redirect::to('/');
        }
        else{
            Session::put('customer_login_failed','Credentials Did not Match');
            return redirect()->back();
        }
    }
    
    public function store(Request $request)
    {
        $result = Customer::where('email',$request->email)->first();
        if($result){
            Session::put('customer_email_exist','Email already exist');
            return Redirect::back();
        }
        else{
            if($request->password != $request->con_password){
                Session::put('customer_password_warning','Password did not match!');
                return Redirect::back();   
            }
            else{
                $customer = new Customer;
                $customer->first_name = $request->firstname;
                $customer->last_name = $request->lastname;
                $customer->email = $request->email;
                $customer->phonenumber = $request->phonenumber;
                $customer->password = $request->password;
                $customer->created_at = date('Y-m-d');
                $customer->save();
                Session::put('customer_name',$request->first_name);
                Session::put('customer_email',$request->email);
                Session::put('phonenumber',$request->phonenumber);
                Session::put('customer_register_success','Customer Registered Successfully');
                return Redirect::to('/');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
