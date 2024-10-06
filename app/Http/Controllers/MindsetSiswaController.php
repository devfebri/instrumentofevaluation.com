<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Models\MahasiswaJawaban;
use App\Models\MahasiswaNilai;
use App\Models\Mindset;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                    // $button .= '<a href="' . route('mahasiswa_kerjakansoal', ['id' => $f->id]) . '" class="tabledit-edit-button btn btn-sm btn-primary" style="float: none; margin: 5px;"onclick="return confirm(`Pengerjakan soal hanya bisa 1 kali pengerjaan saja, apakah anda yakin ingin mengerjakan soal ?`);" ><span class="">Mulai</span></a>';
                     $mahasiswanilai=MahasiswaNilai::where('mindset_id',$f->mindset_id)->where('user_id',auth()->user()->id)->where('indikator_id',$f->id)->count();
                     if($mahasiswanilai!=0){
                    $button .= '<button  class="tabledit-edit-button btn btn-sm btn-info " disabled  style="float: none; margin: 5px;" ><span class="">Selesai</span></button>';

                     }else{

                         $button .= '<button  class="tabledit-edit-button btn btn-sm btn-primary mulai" data-id="'.$f->id.'" style="float: none; margin: 5px;" ><span class="">Mulai</span></button>';
                     }
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

        $soal=Soal::all();
        return view('mindsetsiswa.kerjakansoal',compact('soal'));
    }

    public function getSoal($id){

        $data['soal']=Soal::where('indikator_id',$id)->inRandomOrder()->get();
        // dd($data['soal']);
        $data['indikator']=Indikator::find($id);
        $data['mindset']=Mindset::find($data['indikator']->mindset_id);
        return response()->json($data);

    }

    public function siswakirimtugas(Request $request){
        // dd($request->all());
        $mn=new MahasiswaNilai();
        $mn->mindset_id=$request->mindset_id;
        $mn->indikator_id=$request->indikator_id;
        $mn->user_id=auth()->user()->id;
        $mn->save();

        foreach ($request->jawaban as $key => $value) {
            // dd(explode('#', $value)[1]);
            $jwb = new MahasiswaJawaban();
            $jwb->soal_id = explode('#', $value)[1];
            $jwb->jawaban = explode('#', $value)[0];
            $jwb->mahasiswa_nilai_id = $mn->id;
            $jwb->save();
        }

        $totalsoal = count($request->jawaban);
        $totalindikatorsoal=Soal::where('indikator_id',$request->indikator_id)->count();
        if ($totalsoal == $totalindikatorsoal) {
            $jawabans = array_sum($request->jawaban);
            $totalnilai = $totalindikatorsoal * 5;
            $hasil = ($jawabans / $totalnilai) * 100;
            $data = number_format($hasil, 2);

            MahasiswaNilai::find($mn->id)->update(['skor'=>$data]);

        } else {
            $data = 'error';
        }
        return response()->json($mn);
    }

    public function mahasiswajawaban($id){
        $indikator=Indikator::find($id);
        $jawaban= DB::table('mahasiswa_nilai')
        ->select('mahasiswa_nilai.id', 'users.nim', 'users.name', 'mahasiswa_nilai.skor')
        ->join('users', 'users.id', '=', 'mahasiswa_nilai.user_id')
        ->get();
        return view('mindsetsiswa.jawaban',compact('indikator','jawaban'));
    }
}
