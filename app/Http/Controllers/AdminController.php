<?php

namespace App\Http\Controllers;

use App\Model\Admin;
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
        $result = DB::table('admins')->where('email',$data['email'])->where('password',$data['password'])->first();

        if($result){
            Session::put('user_name',$result->first_name);
            Session::put('user_email',$data['email']);
            return Redirect::to('/admin/home');
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
    public function store(Request $request)
    {
        //
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
    public function edit(Admin $admin)
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
    public function destroy(Admin $admin)
    {
        //
    }


    public function home(){
        // $type = 'published';
        // $data['items'] = DB::table('tbl_item')->where('type',$type)->limit(20)->get();
        // $data['unserved_orders'] = DB::table('tbl_order')->where('type','unserved')->orderBy('date','DESC')->paginate(20);
        // $user_email = Session::get('user_email');
        // if($user_email){
        //     return view('adminPanel.home')->with('data',$data);
        // }else{
        //     Session::put('login_first','You need to log in first');
        //     return view('back_end.login');
        // }

        return view('adminPanel.home');
    }
}
