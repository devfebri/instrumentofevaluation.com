<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Materi;
use App\Models\User;
use Illuminate\Foundation\Console\ViewMakeCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller
{
    public function index(Request $request){
        $data = Kelas::all();
        if ($request->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($f) {
                    $button  = '<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                    $button .= '<div class="btn-group btn-group-sm" style="float: none;">';
                    $button .= '<a href="' . route('admin_kelasopen', ['id' => $f->id]) . '" class="tabledit-edit-button btn btn-sm btn-primary edit-post" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                    $button .= '<button class="tabledit-delete-button btn btn-sm btn-danger delete" data-id=' . $f->id . ' disabled style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
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
        // dd($request->all());
        $data = new Kelas();
        $data->nama_kelas = $request->nama_kelas;
        $data->save();
        return response()->json($data);
    }

    public function open($id,Request $request){

        $id=$id;
        $materi = Materi::where('kelas_id',$id)->orderBy('id','desc')->get();
        $data   = Kelas::find($id);
        $mahasiswa=User::where('role','mahasiswa')->get();
        

        if ($request->ajax()) {
            return datatables()->of($materi)
            ->addColumn('action', function ($f) {
                $button  = '<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                $button .= '<div class="btn-group btn-group-sm" style="float: none;">';
                // $button .= '<a href="' . route('admin_kelasopen', ['id' => $f->id]) . '" class="tabledit-edit-button btn btn-sm btn-primary edit-post" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                $button .= '<button class="tabledit-delete-button btn btn-sm btn-danger deletemateri" data-id=' . $f->id . '  style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
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
        return view('kelas.open',compact('data','id','materi', 'mahasiswa'));
    }

    public function tambahmateri(Request $request){
        // dd($request->all());
        if ($request->has('file_materi')) {
            $file = $request->file('file_materi');
            $filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->extension();
            $file->move(public_path() . '/storage/materi/' . auth()->user()->username, $filename);
        } else {
            $filename = null;
        }
        $data=new Materi;
        $data->kelas_id = $request->kelas_id;
        $data->user_id = auth()->user()->id;
        $data->nama_materi=$request->nama_materi;
        $data->deskripsi = $request->deskripsi;
        $data->link_materi= $request->link_materi;
        $data->file_materi = $filename;
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
}
