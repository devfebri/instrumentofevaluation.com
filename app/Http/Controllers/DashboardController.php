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
}
