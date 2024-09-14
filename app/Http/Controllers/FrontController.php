<?php

namespace App\Http\Controllers;

use App\Models\SoalFront;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('front.welcome');
    }
    public function pembelajaran_pjbl (){
        return view('front.pembelajaran_pjbl');
    }
    public function brainstorming (){
        return view('front.brainstorming');
    }
    public function instrumen (){
        return view('front.instrumen');
    }
    public function tespolapikir (){
        $data=SoalFront::orderBy('id','desc')->get();
        return view('front.tespolapikir',compact('data'));
    }
    public function contact (){
        return view('front.contact');
    }
}
