<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Materi;
use App\Models\Tugas;
use App\Models\TugasJawaban;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller
{
    public function index(Request $request){
        if(auth()->user()->role=='admin'){
            $data = Kelas::all();
        }elseif(auth()->user()->role=='dosen'){
            $data=DB::table('matakuliah')
            ->select('kelas.id', 'kelas.nama_kelas')
            ->join('kelas', 'kelas.id', '=', 'matakuliah.kelas_id')
            ->where('matakuliah.dosen_id', '=',auth()->user()->id)
            ->get();
        }
        if ($request->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($f) {
                    $button  = '<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                    $button .= '<div class="btn-group btn-group-sm" style="float: none;">';
                    $button .= '<a href="' . route(auth()->user()->role.'_kelasopen', ['id' => $f->id]) . '" class="tabledit-edit-button btn btn-sm btn-primary" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                    if(auth()->user()->role=='admin'){

                        $button .= '<button class="tabledit-edit-button btn btn-sm btn-warning edit-post" data-id=' . $f->id . ' id="alertify-success" style="float: none; margin: 5px;"><span class="ti-pencil"></span></button>';
                        $button .= '<button class="tabledit-delete-button btn btn-sm btn-danger delete" data-id=' . $f->id . '  style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                    }
                    $button .= '</div>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('kelas.index');
    }

    public function tambah(Request $request)
    {
        if($request->id)
        {
            $data=Kelas::find($request->id)->update(['nama_kelas'=>$request->nama_kelas]);
            // dd($request->all());
        }else{

            $data = new Kelas();
            $data->nama_kelas = $request->nama_kelas;
            $data->save();
        }
        return response()->json($data);
    }

    public function kelasedit($id){
        $data=Kelas::find($id);
        return response()->json($data);
    }

    public function delete($id){
        $kelas=Kelas::find($id);
        Matakuliah::where('kelas_id',$id)->delete();
        Materi::where('kelas_id', $id)->delete();
        $tugas=Tugas::where('kelas_id', $id)->get();
        foreach($tugas as $row){
            TugasJawaban::where('tugas_id',$row->id)->delete();
        }
        Tugas::where('kelas_id', $id)->delete();
        User::where('kelas_id',$id)->update(['kelas_id'=>null]);
        $kelas->delete();
        return response()->json($kelas);
    }

    public function open($id,Request $request){

        // dd($id);

        if (auth()->user()->role == 'admin') {
            $materi = Materi::orderBy('id', 'desc')->get();
        } elseif (auth()->user()->role == 'dosen') {
            $materi = Materi::where('user_id',auth()->user()->id)->orderBy('id', 'desc')->get();
        } elseif(auth()->user()->role == 'mahasiswa'){
            $materi = Materi::where('kelas_id', auth()->user()->kelas_id)->where('matakuliah_id', $id)->orderBy('id', 'desc')->get();
        }

        $data   = Kelas::find($id);
        $dosen  = User::where('role','dosen')->get();

        $mahasiswa=DB::table('users')
        ->join('kelas','users.kelas_id','=','kelas.id','left')
        ->select('users.*','kelas.nama_kelas')
        ->where('users.role','mahasiswa')
        ->get();
        if ($request->ajax()) {
            return datatables()->of($materi)
                ->addColumn('action', function ($f) {
                    $button  = '<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                    $button .= '<div class="btn-group btn-group-sm" style="float: none;">';
                    $button .= '<button class="tabledit-delete-button btn btn-sm btn-danger deletemateri" data-id=' . $f->id . '  style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                    // $button .= '<a href="' . route('admin_kelasopen', ['id' => $f->id]) . '" class="tabledit-edit-button btn btn-sm btn-primary edit-post" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                    $button .= '</div>';
                    $button .= '</div>';
                    return $button;
                })
                ->addColumn('file_materi',function($f){
                    if($f->file_materi){
                        $username = User::find($f->user_id)->username;
                        $button = '<a href="' . asset('storage/materi/' . $username . '/' . $f->file_materi) . '" target="_blank" style="margin: 5px;" >'.$f->file_materi.'</a>';
                    }else{
                        $button = '';
                    }
                    return $button;
                })
                ->addColumn('link_materi', function ($f) {
                    if($f->link_materi!=null){

                        $username = User::find($f->user_id)->username;
                        $button = '<a href="'.$f->link_materi. '" target="_blank" style="margin: 5px;" class="tabledit-edit-button btn btn-sm btn-info" >Link</a>';
                    }else{
                        $button='';
                    }
                    return $button;
                })
                ->rawColumns(['action', 'file_materi','link_materi'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('kelas.open',compact('data','id','materi', 'mahasiswa','dosen'));
    }

    public function tambahmateri(Request $request){

        if ($request->has('file_materi')) {
            $file = $request->file('file_materi');
            $filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->extension();
            $file->move(public_path() . '/storage/materi/' . auth()->user()->username, $filename);
        } else {
            $filename = null;
        }
        $data=new Materi;
        $data->kelas_id     = $request->kelas_id;
        $data->matakuliah_id     = $request->matakuliah_id;
        $data->user_id              = auth()->user()->id;
        $data->nama_materi          = $request->nama_materi;
        $data->deskripsi            = $request->deskripsi;
        $data->link_materi          = $request->link_materi;
        $data->file_materi          = $filename;
        $data->save();
        return response()->json($data);
    }

    public function deletemateri($id)
    {
        $data = Materi::find($id);
        $image = '/public/materi/' . auth()->user()->username . '/' . $data->file_materi;
        // dd(Storage::exists($image));
        if (Storage::exists($image)) {
            Storage::delete($image);
        }
        $data->delete();
        return response()->json($data);
    }
    public function tambahtugas(Request $request)
    {

        if ($request->has('file_tugas')) {
            $file = $request->file('file_tugas');
            $filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->extension();
            $file->move(public_path() . '/storage/tugas/' . auth()->user()->username, $filename);
        } else {
            $filename = null;
        }
        $data = new Tugas();
        $data->kelas_id             = $request->kelas_id;
        $data->matakuliah_id        = $request->matakuliah_id;
        $data->user_id              = auth()->user()->id;
        $data->nama_tugas           = $request->nama_tugas;
        $data->deskripsi            = $request->deskripsi;
        $data->link_tugas           = $request->link_tugas;
        $data->file_tugas           = $filename;
        $data->save();
        return response()->json($data);
    }

    public function deletetugas($id)
    {
        $data = Tugas::find($id);
        $image = '/public/tugas/' . auth()->user()->username . '/' . $data->file_tugas;
        // dd(Storage::exists($image));
        if (Storage::exists($image)) {
            Storage::delete($image);
        }
        $data->delete();
        return response()->json($data);
    }


    public function tambahmahasiswa(Request $request){
        foreach($request->mahasiswa as $row){
            DB::table('users')
                ->where('id', $row)
                ->update(['kelas_id' => $request->kelas_id]);
        }
        return response()->json();
    }

    public function getMahasiswa($id,Request $request){
        $mahasiswa = DB::table('users')
        ->join('kelas', 'users.kelas_id', '=', 'kelas.id', 'left')
        ->select('users.*', 'kelas.nama_kelas')
        ->where('users.role', 'mahasiswa')
        ->where('users.kelas_id',$id)
        ->get();

        if ($request->ajax()) {
            return datatables()->of($mahasiswa)
                ->addColumn('action', function ($f) {
                    $button  = '<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                    $button .= '<div class="btn-group btn-group-sm" style="float: none;">';
                    // $button .= '<a href="' . route('admin_kelasopen', ['id' => $f->id]) . '" class="tabledit-edit-button btn btn-sm btn-primary edit-post" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                    $button .= '<button class="tabledit-delete-button btn btn-sm btn-danger deletemahasiswa" data-id=' . $f->id . '  style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                    $button .= '</div>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

    }

    public function deletemahasiswa($id){
        DB::table('users')
            ->where('id', $id)
            ->update(['kelas_id' => null]);
        return response()->json();
    }
    public function deletematakuliah($id){
        DB::table('matakuliah')
            ->where('id', $id)
            ->delete();
        return response()->json();
    }

    public function getMatakuliah($id, Request $request)
    {
        if(auth()->user()->role=='admin'){
            $matakuliah=Matakuliah::orderBy('id','desc')->get();
        }elseif(auth()->user()->role=='dosen'){
            $matakuliah=DB::table('matakuliah')
            ->select('matakuliah.id','matakuliah.nama_mk', 'matakuliah.dosen_id', 'users.name')
            ->join('kelas', 'kelas.id', '=', 'matakuliah.kelas_id')
            ->join('users', 'users.id', '=', 'matakuliah.dosen_id')
            ->where('matakuliah.dosen_id', '=', auth()->user()->id)
            ->get();
        } elseif (auth()->user()->role == 'mahasiswa'){
            $matakuliah = DB::table('matakuliah')
            ->select('matakuliah.id', 'matakuliah.nama_mk', 'matakuliah.dosen_id', 'users.name')
            ->join('kelas', 'kelas.id', '=', 'matakuliah.kelas_id')
            ->join('users', 'users.id', '=', 'matakuliah.dosen_id')
            ->where('matakuliah.kelas_id', '=', auth()->user()->kelas_id)
            ->get();
        }

        if ($request->ajax()) {
            return datatables()->of($matakuliah)
                ->addColumn('action', function ($f) {
                    $button  = '<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                    $button .= '<div class="btn-group btn-group-sm" style="float: none;">';
                    $button .= '<a href="' . route(auth()->user()->role.'_matakuliahopen', ['id' => $f->id]) . '" class="tabledit-edit-button btn btn-sm btn-primary edit-post" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';

                    if(auth()->user()->role=='admin'){
                        $button .= '<button class="tabledit-delete-button btn btn-sm btn-danger deletematakuliah" data-id=' . $f->id . '  style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                    }
                    $button .= '</div>';
                    $button .= '</div>';
                    return $button;
                })->addColumn('nama_dosen',function($f){
                    $data=User::find($f->dosen_id)->name;
                    return $data;
                })
                ->rawColumns(['action', 'nama_dosen'])
                ->addIndexColumn()
                ->make(true);
        }
    }
    public function tambahmatakuliah(Request $request)
    {
        // dd($request->all());
        $data = new Matakuliah();
        $data->kelas_id     = $request->kelas_id;
        $data->dosen_id     = $request->dosen_id;
        $data->nama_mk      = $request->nama_mk;
        $data->save();
        return response()->json($data);
    }

    public function openmatakuliah($id,Request $request)
    {
        $matakuliah=Matakuliah::find($id);
        $kelas=Kelas::find($matakuliah->kelas_id);
        $data = Materi::where('matakuliah_id', $id)->where('kelas_id',$matakuliah->kelas_id)->orderBy('id', 'desc')->get();
        return view('kelas.openmatakuliah',compact('matakuliah','data','kelas','id'));
    }

    public function getTugas($id, Request $request)
    {
        if (auth()->user()->role == 'admin') {
            $tugas = Tugas::orderBy('id', 'desc')->get();
        } elseif (auth()->user()->role == 'dosen') {
            $tugas = Tugas::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        } elseif (auth()->user()->role == 'mahasiswa') {
            $tugas = Tugas::where('kelas_id',auth()->user()->kelas_id)->where('matakuliah_id',$id)->orderBy('id', 'desc')->get();
        }

        if ($request->ajax()) {
            return datatables()->of($tugas)
                ->addColumn('action', function ($f) {
                    $button  = '<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                    $button .= '<div class="btn-group btn-group-sm" style="float: none;">';
                    // $button .= '<a href="' . route('admin_kelasopen', ['id' => $f->id]) . '" class="tabledit-edit-button btn btn-sm btn-primary edit-post" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                    $button .= '<a href="' . route(auth()->user()->role.'_tugasjawaban', ['id' => $f->id]). '" class="tabledit-edit-button btn btn-sm btn-primary edit-post" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                    if(auth()->user()->role=='dosen'){
                        $jawaban=TugasJawaban::where('tugas_id',$f->id)->count();
                        if($jawaban!=0){
                            $button .= '<button class="tabledit-delete-button btn btn-sm btn-danger deletetugas" disabled data-id=' . $f->id . '  style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                        }else{
                            $button .= '<button class="tabledit-delete-button btn btn-sm btn-danger deletetugas" data-id=' . $f->id . '  style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                        }
                    }elseif(auth()->user()->role == 'mahasiswa'){
                        $jawaban=TugasJawaban::where('user_id',auth()->user()->id)->where('tugas_id',$f->id)->count();
                        // dd($jawaban);
                        if($jawaban!=0){
                            $button .= '<button class="tabledit-delete-button btn btn-sm btn-info inputtugas" disabled data-id=' . $f->id . '  style="float: none; margin: 5px;"><span class="ti-upload"> Input</span></button>';
                        }else{
                            $button .= '<button class="tabledit-delete-button btn btn-sm btn-primary inputtugas"  data-id=' . $f->id . '  style="float: none; margin: 5px;"><span class="ti-upload"> Input</span></button>';
                        }
                    }
                    $button .= '</div>';
                    $button .= '</div>';
                    return $button;
                })
                ->addColumn('file_tugas', function ($f) {
                    if ($f->file_tugas) {
                        $username = User::find($f->user_id)->username;
                        $button = '<a href="' . asset('storage/tugas/' . $username . '/' . $f->file_tugas) . '" target="_blank" style="margin: 5px;" >' . $f->file_tugas . '</a>';
                    } else {
                        $button = '';
                    }
                    return $button;
                })
                ->addColumn('link_tugas', function ($f) {
                    if ($f->link_tugas != null) {

                        $username = User::find($f->user_id)->username;
                        $button = '<a href="' . url($f->link_tugas) . '" target="_blank" style="margin: 5px;" class="tabledit-edit-button btn btn-sm btn-info" >Link</a>';
                    } else {
                        $button = '';
                    }
                    return $button;
                })
                ->rawColumns(['action', 'file_tugas', 'link_tugas'])
                ->addIndexColumn()
                ->make(true);
        }
    }
    public function siswaopen($id)
    {
        $materi=Materi::where('kelas_id',auth()->user()->kelas_id)->get();
        $tugas=Tugas::all();
        return view('kelas.siswaopen');
    }


    public function kirimtugas(Request $request)
    {
        // dd($request->all());
        if ($request->has('file_jawaban')) {
            $file = $request->file('file_jawaban');
            $filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->extension();
            $file->move(public_path() . '/storage/tugasjawaban/' . auth()->user()->username, $filename);
        } else {
            $filename = null;
        }
        $data = new TugasJawaban();
        $data->tugas_id                 = $request->tugas_id;
        $data->user_id                  = auth()->user()->id;
        $data->deskripsi_jawaban        = $request->deskripsi_jawaban;
        $data->link_jawaban             = $request->link_jawaban;
        $data->file_jawaban             = $filename;
        $data->save();
        return response()->json($data);
    }
}
