<?php

namespace App\Http\Controllers;

use App\Exports\SkorExport;
use App\Models\MahasiswaNilai;
use App\Models\Mindset;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SkorController extends Controller
{
    public function index() {
        $mindset = Mindset::all();
        foreach ($mindset as $row) {
            $skor1 = 0;
            $skor2 = 0;
            $skor3 = 0;
            $skor4 = 0;
            $skor5 = 0;
            $maxskor=0;
            $data = MahasiswaNilai::where('mindset_id', $row->id)->get();
            foreach ($data as $row1) {
                if ($row1->skor <= 20) {
                    $skor1 = ++$skor1;
                } elseif ($row1->skor <= 40) {
                    $skor2 = ++$skor2;
                } elseif ($row1->skor <= 60) {
                    $skor3 = ++$skor3;
                } elseif ($row1->skor <= 80) {
                    $skor4 = ++$skor4;
                } elseif ($row1->skor <= 100) {
                    $skor5 = ++$skor5;
                }
                $maxskor = max($skor1, $skor2, $skor3, $skor4, $skor5) + 5;

            }
            $dataskor[] = [
                'id_mindset'=>$row->id,
                'nama_mindset'=>$row->nama_mindset,
                'skor1' =>  $skor1,
                'skor2' =>  $skor2,
                'skor3' =>  $skor3,
                'skor4' =>  $skor4,
                'skor5' =>  $skor5,
                'maxskor'   => $maxskor
            ];
        }
        // dd($dataskor);

        return view('skor.index',compact('dataskor'));
    }

    public function export($id)
    {
        // $data=DB::select("select u.name,mn.user_id,mn.skor
        //     from mahasiswa_nilai mn
        //     join users as u on mn.user_id =u.id
        //     group by user_id
        // ");
        // $soal=Soal::all();
        // $key=0;
        // foreach($data as $row){
        //     $jawaban[$key]['user_id']=$row->user_id;
        //     $jawaban[$key]['nama']=$row->name;
        //     $jawaban[$key]['skor'] = $row->skor;
        //     foreach($soal as $row1){
        //         $jawaban[$key][$row1->id] ='Null';
        //         $jwb = DB::select("select mn.user_id,mn.mindset_id,mn.indikator_id,mj.soal_id,mj.jawaban
        //             from mahasiswa_jawaban mj
        //             join mahasiswa_nilai mn on mj.mahasiswa_nilai_id =mn.id
        //             where mn.user_id =?
        //         ", [$row->user_id]);
        //         foreach ($jwb as $row2) {
        //             if($row1->id==$row2->soal_id){
        //                 $jawaban[$key][$row1->id] = $row2->jawaban;
        //             }
        //         }

        //     }
        //     $jawaban[$key]['skor_total']=0;
        //     $jawaban[$key]['persentase']=0;
        //     ++$key;
        // }
        // dd($jawaban);


        $export = new SkorExport($id);
        return Excel::download($export, 'skor.xlsx');
        // return view('exports.nilai',compact('mindset','indikator'));
    }
}
