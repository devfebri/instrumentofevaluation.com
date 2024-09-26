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

    public function perkembangan_otak (){
        return view('front.perkembangan_otak');
    }
    public function pola_pikir_berkembang (){
        return view('front.pola_pikir_berkembang');
    }
    public function pola_pikir_tetap (){
        return view('front.pola_pikir_tetap');
    }
    public function front_mindset (){
        return view('front.front_mindset');
    }
    public function indikator_pola_pikir(){
        return view('front.indikator_pola_pikir');
    }

    public function kekayaan_lokal_jambi(){
        return view('front.kekayaan_lokal_jambi');
    }
}
