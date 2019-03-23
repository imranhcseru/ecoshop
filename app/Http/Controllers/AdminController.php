<?php

namespace App\Http\Controllers;

use App\Model\Admin;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\AdminResource;
use Session;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkAdmin(Request $request){
        $data = array();
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $result = Admin::where('email',$data['email'])->where('password',$data['password'])->first();

        if($result){
            Session::put('user_name',$result->first_name);
            Session::put('admin_id',$result->id);
            Session::put('user_email',$data['email']);
            return Redirect::to('admin/home');
        }
        else{
            Session::put('login_failed','Credentials Did not Match');
            return redirect()->back();
        }
    }
    public function index()
    {
        return AdminResource::collection(Admin::all());
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
    public function store(Request $request){ 
        $user_email = Session::get('user_email');
        if($user_email){
            $result = Admin::where('email',$request->email)->first();
            if($result){
                Session::put('email_exist','Email already exist');
                echo Session::get('email_exist');
                return Redirect::back();
            }
            else{
                if($request->password != $request->con_password){
                    Session::put('warning','Password did not match!');
                    echo Session::get('warning');
                    return Redirect::back();   
                }
                else{
                    $admin = new Admin;
                    $admin->first_name = $request->firstname;
                    $admin->last_name = $request->lastname;
                    $admin->email = $request->email;
                    $admin->password = $request->password;
                    $admin->created_at = date('Y-m-d');
                    $admin->save();
                    Session::put('admin_success','Admin Created Successfully');
                    return Redirect::to('admin/admins');
                }
            }
        }
        else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        }
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin  $admin
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
     * @param  \App\Model\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_email = Session::get('user_email');
        if($user_email){
            Admin::where('id',$id)->delete();
            Session::put('admin_delete','Admin Deleted Successfully');
            return Redirect::to('/admin/admins');
        }else{
            Session::put('login_first','You need to log in first');
            return view('adminPanel.login');
        }
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
}
