<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Models\Mindset;
use App\Models\Soal;
use Illuminate\Http\Request;

class MindsetSiswaController extends Controller
{
    public function index(){
        return view('mindsetsiswa.index');
    }

    public function openmindset($id,Request $request){
        $mindset = Mindset::find($id);
        $data = Indikator::where('mindset_id', $id)->get();
        if ($request->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($f) {
                    $button  = '<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                    $button .= '<div class="btn-group btn-group-sm" style="float: none;">';

                    $button .= '<a href="' . route('mahasiswa_kerjakansoal', ['id' => $f->id]) . '" class="tabledit-edit-button btn btn-sm btn-primary" style="float: none; margin: 5px;"onclick="return confirm(`Pengerjakan soal hanya bisa 1 kali pengerjaan saja, apakah anda yakin ingin mengerjakan soal ?`);" ><span class="">Mulai</span></a>';
                    $button .= '</div>';
                    $button .= '</div>';
                    return $button;
                })->addColumn('jml_soal', function ($f) {
                    $button  = Soal::where('indikator_id', $f->id)->count();
                    return $button;
                })
                ->rawColumns(['action', 'jml_indikator'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('mindsetsiswa.openmindset',compact('mindset','id'));
    }

    public function kerjakansoal(){
        return view('mindsetsiswa.kerjakansoal');
    }
}
