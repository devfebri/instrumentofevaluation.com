<?php

namespace App\Http\Controllers;

use App\Models\SoalFront;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    public function simpanjawaban(Request $request){
        $totalsoal=count($request->jawaban);
        // dd($totalsoal);
        if($totalsoal==7){
            $jawaban = array_sum($request->jawaban);
            $jmlsoal = SoalFront::all()->count();
            $totalnilai = $jmlsoal * 5;
            $hasil = 1 / $totalnilai * 100 * $jawaban;
            $data=number_format($hasil,2);

        }else{
            $data = 'error';
        }
        return response()->json($data);

        // dd($totalsoal);
    }
}
