<?php

namespace App\Exports;

use App\Models\MahasiswaNilai;
use App\Models\Mindset;
use App\Models\Soal;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class SkorExport implements FromView
{
    protected $id;

    public function __construct( $id)
    {
        $this->id = $id;
    }


    public function view(): View
    {
        $data = DB::select("select u.name,mn.user_id,mn.skor
            from mahasiswa_nilai mn
            join users as u on mn.user_id =u.id
            where mn.mindset_id =?
            group by user_id
        ",[$this->id]);
        $soal = DB::select("select s.id,s.soal,s.indikator_id,i.mindset_id from soal s
            join indikator i on i.id =s.indikator_id
            join mindset m on m.id = i.mindset_id
            where m.id =? order by s.indikator_id asc",[$this->id]);

        $datasoal = DB::select("select m.id as id_mindset,i.id as indikator_id, m.nama_mindset,i.nama_indikator,s.soal,s.indikator_id,s.id as soal_id
                from mindset m
                left join indikator i on i.mindset_id = m.id
                left join soal s on s.indikator_id = i.id
                where m.id =? order by s.indikator_id asc", [$this->id]);

        $skormax= count($soal) * 5;
        $key = 0;
        $jawaban=[];



        foreach ($data as $row) {
            $nosoal=1;
            $total = 0;

            $jawaban[$key]['user_id'] = $row->user_id;
            $jawaban[$key]['nama'] = $row->name;
            $jawaban[$key]['skor'] = $row->skor;
            foreach ($datasoal as $row1) {
                $jawaban[$key][$nosoal] = 'Null';
                $jwb = DB::select("select mn.user_id,mn.mindset_id,mn.indikator_id,mj.soal_id,mj.jawaban
                    from mahasiswa_jawaban mj
                    join mahasiswa_nilai mn on mj.mahasiswa_nilai_id =mn.id
                    where mn.user_id =?
                ", [$row->user_id]);
                foreach ($jwb as $row2) {
                    if ($row1->soal_id == $row2->soal_id) {
                        $jawaban[$key][$nosoal] = $row2->jawaban;
                        $total=$total+$row2->jawaban;

                    }
                }
                ++$nosoal;
            }
            $jawaban[$key]['skor_total'] = $total;
            $jawaban[$key]['persentase'] = number_format($total / $skormax * 100,2);
            // dd($total * 100);
            ++$key;
        }

        // dd($jawaban);

        return view('exports.nilai', [
            'data' => MahasiswaNilai::all(),
            'mindset'=> Mindset::find($this->id),
            'indikator'=>DB::select("select m.id as id_mindset,m.nama_mindset,i.nama_indikator,(select count(soal.soal)  from soal where soal.indikator_id = i.id) as jml_soal
                from mindset m
                left join indikator i on i.mindset_id = m.id
                where m.id = ? ",[$this->id]),
            'jml_soal'=>DB::select("select count(s.soal) as jml_soal
                from mindset m
                left join indikator i on i.mindset_id = m.id
                left join soal s on s.indikator_id = i.id
                where m.id = ?",[$this->id]),
            'data_soal'=>$datasoal,
            'jawaban'=>$jawaban,
            'soal'=>$soal

        ]);
    }
}
