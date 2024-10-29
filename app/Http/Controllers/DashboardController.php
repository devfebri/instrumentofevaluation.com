<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data=User::find(auth()->user()->id);
        return view('dashboard',compact('data'));
    }

    function updateprofile(Request $request)  {

        $data=User::find(auth()->user()->id);
        if ($request->has('avatar')) {
            // dd('avatar');
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->extension();
            $file->move(public_path() . '/storage/avatar/' . auth()->user()->username, $filename);
            $data->update(['avatar'=>$filename]);
        }
        // dd($request->all());
        $data->update([
            'name'=>$request->name,
            'nim'=>$request->nim,
            'nip' => $request->nip,
            'jk'=>$request->jk,
            'no_hp'=>$request->no_hp,
            'tmpt_lahir'=>$request->tmpt_lahir,
            'tgl_lahir'=>$request->tgl_lahir,
            'alamat'=>$request->alamat
        ]);
        return back();

    }
}
