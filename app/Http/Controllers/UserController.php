<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index (Request $request){
        $data = User::where('role','!=','admin')->get();
        if ($request->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($f) {
                    $button  = '<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                    $button .= '<div class="btn-group btn-group-sm" style="float: none;">';
                    $button .= '<button class="tabledit-delete-button btn btn-sm btn-danger delete" data-id='.$f->id.'  style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                    $button .= '</div>';
                    $button .= '</div>';
                    return $button;
                })->addColumn('nim',function($f){
                    if($f->role == 'mahasiswa'){
                        $button = $f->nim;
                    }elseif($f->role == 'dosen'){
                        $button=$f->nip;
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('user.index');
    }

    public function tambah(Request $request){

        $validated = $request->validate([
            'nim' => 'unique:users',
            'no_hp' => 'unique:users'
        ]);
        $data= new User();
        if($request->role=='mahasiswa'){
            $data->mahasiswa = $request->nip;
        } elseif ($request->role == 'dosen'){
            $data->nip=$request->nip;
        }
        $data->name=$request->name;
        $data->username=$request->no_hp;
        $data->no_hp=$request->no_hp;
        $data->password=bcrypt($request->no_hp);
        $data->role=$request->role;
        $data->email=$request->email;
        $data->tmpt_lahir=$request->tmpt_lahir;
        $data->tgl_lahir=$request->tgl_lahir;
        $data->jk=$request->jk;
        $data->save();
        return response()->json($data);
    }

    public function delete($id){
        $data=User::find($id);
        $data->delete();

        return response()->json($data);
    }
}
