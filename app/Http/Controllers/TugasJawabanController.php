<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\TugasJawaban;
use Illuminate\Http\Request;

class TugasJawabanController extends Controller
{
    public function index($id){
        $tugas=Tugas::find($id);
        $jawaban=TugasJawaban::where('tugas_id',$id)->get();

        return view('tugas.jawaban',compact('tugas','jawaban'));
    }
}
