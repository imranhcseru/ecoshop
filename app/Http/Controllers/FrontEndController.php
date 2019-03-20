<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SubCategory;
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

    public function cart(){
        
    }
}
