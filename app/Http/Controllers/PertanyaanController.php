<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Models\Mahasiswa;
use App\Models\MahasiswaJawaban;
use App\Models\MahasiswaNilai;
use App\Models\Mindset;
use App\Models\Soal;
use App\Models\SoalFront;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PertanyaanController extends Controller
{
    public function mindset(Request $request){
        $data = Mindset::all();
        if ($request->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($f) {
                    $button  = '<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                    $button .= '<div class="btn-group btn-group-sm" style="float: none;">';

                    if(auth()->user()->role=='admin'){
                        $button .= '<a href="' . route(auth()->user()->role. '_openmindset', ['id' => $f->id]) . '" class="tabledit-edit-button btn btn-sm btn-primary" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                    $button .= '<button class="tabledit-edit-button btn btn-sm btn-warning edit-post" data-id=' . $f->id . ' id="alertify-success" style="float: none; margin: 5px;"><span class="ti-pencil"></span></button>';
                    $button .= '<button class="tabledit-delete-button btn btn-sm btn-danger delete" data-id=' . $f->id . ' disabled style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                    }elseif(auth()->user()->role == 'mahasiswa'){
                    $button .= '<a href="' . route(auth()->user()->role . '_siswaopenmindset', ['id' => $f->id]) . '" class="tabledit-edit-button btn btn-sm btn-primary" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                    }
                    $button .= '</div>';
                    $button .= '</div>';
                    return $button;
                })->addColumn('jml_indikator', function ($f) {
                    $button  = Indikator::where('mindset_id',$f->id)->count();
                    return $button;
                })
                ->rawColumns(['action', 'jml_indikator'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('pertanyaan.mindset');
    }

    public function mindsetedit($id){
        $data = Mindset::find($id);
        return response()->json($data);
    }


    public function tambahmindset(Request $request){
        if($request->id){
            DB::table('mindset')
                ->where('id', $request->id)
                ->update(['nama_mindset' => $request->mindset]);
            $message = 'Edit';

        }else{
            $data = new Mindset;
            $data->nama_mindset = $request->mindset;
            $data->save();
            $message='Tambah';
        }

        return response()->json($message);
    }

    public function openmindset($id,Request $request){
        $mindset=Mindset::find($id);
        $data=Indikator::where('mindset_id',$id)->get();
        if ($request->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($f) {
                    $button  = '<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                    $button .= '<div class="btn-group btn-group-sm" style="float: none;">';

                    $button .= '<a href="' . route('admin_soal', ['id' => $f->id]) . '" class="tabledit-edit-button btn btn-sm btn-primary" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                    $button .= '<a href="' . route('admin_jawaban', ['id' => $f->id]) . '" class="tabledit-edit-button btn btn-sm btn-info" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                    $button .= '<button class="tabledit-edit-button btn btn-sm btn-warning edit-post" data-id=' . $f->id . ' id="alertify-success" style="float: none; margin: 5px;"><span class="ti-pencil"></span></button>';
                    $button .= '<button class="tabledit-delete-button btn btn-sm btn-danger delete" data-id=' . $f->id . '  style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                    $button .= '</div>';
                    $button .= '</div>';
                    return $button;
                })->addColumn('jml_soal', function ($f) {
                    $button  = Soal::where('indikator_id',$f->id)->count();
                    return $button;
                })
                ->rawColumns(['action', 'jml_indikator'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('pertanyaan.indikator',compact('data','id', 'mindset'));
    }
    public function indikatoredit($id)
    {
        $data = Indikator::find($id);
        // dd($id);
        return response()->json($data);
    }

    public function deleteindikator($id){
        $data=Indikator::find($id);
        $mn=MahasiswaNilai::where('indikator_id',$id);
        foreach($mn->get() as $row){
            MahasiswaJawaban::where('mahasiswa_nilai_id',$row->id)->delete();
        }
        $mn->delete();
        $data->delete();
        return response()->json($data);
    }

    public function tambahindikator (Request $request) {

        if($request->id){
            DB::table('indikator')
                ->where('id', $request->id)
                ->update(['nama_indikator' => $request->indikator]);
            $message = 'Edit';
        }else{

            $data=new Indikator;
            $data->mindset_id=$request->mindset_id;
            $data->nama_indikator=$request->indikator;
            $data->save();
            $message='tambah';
        }
        return response()->json($message);
    }

    public function soal ($id,Request $request){
        $indikator=Indikator::find($id);
        $data = Soal::where('indikator_id', $id)->get();
        if ($request->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($f) {
                    $button  = '<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                    $button .= '<div class="btn-group btn-group-sm" style="float: none;">';
                    $button .= '<button class="tabledit-edit-button btn btn-sm btn-warning edit-post" data-id=' . $f->id . ' id="alertify-success" style="float: none; margin: 5px;"><span class="ti-pencil"></span></button>';
                    $button .= '<button class="tabledit-delete-button btn btn-sm btn-danger delete" data-id=' . $f->id . '  style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                    $button .= '</div>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('pertanyaan.soal',compact('id','indikator'));

    }

    public function tambahSoal(Request $request)
    {
        $data = new Soal();
        $data->indikator_id = $request->indikator_id;
        $data->soal = $request->soal;
        $data->save();
        return response()->json($data);
    }

    public function deletesoal($id)
    {
        $data = Soal::find($id);
        $data->delete();
        return response()->json($data);
    }


    public function soalfront(Request $request){

        $data = SoalFront::orderBy('id','desc')->get();
        if ($request->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($f) {
                    $button  = '<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                    $button .= '<div class="btn-group btn-group-sm" style="float: none;">';
                    $button .= '<button class="tabledit-edit-button btn btn-sm btn-warning edit-post" data-id=' . $f->id . ' id="alertify-success" style="float: none; margin: 5px;"><span class="ti-pencil"></span></button>';
                    $button .= '<button class="tabledit-delete-button btn btn-sm btn-danger delete" data-id=' . $f->id . '  style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                    $button .= '</div>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('front.soalfront');
    }

    public function soalfronttambah(Request $request)
    {
        $data = new SoalFront();
        $data->soal = $request->soal;
        $data->save();
        return response()->json($data);
    }


    public function soalfrontdelete($id){
        $data = SoalFront::find($id);
        $data->delete();
        return response()->json($data);
    }









}
