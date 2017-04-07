<?php

namespace App\Http\Controllers;

use App\Runner;
use App\Track;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{


    public function error() {

        $error = session('error');
        $back = session('back');
        return view('admin.error')->with(['error' => $error, 'back' => $back]);
    }





}
