<?php

namespace App\Http\Controllers;

use App\Runner;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{


    public function runnerSearch() {
        return view('admin.runner_search');
    }


    public function runnerFound(Request $request) {
        $criteria = $request->get('criteria');

        $runners = Runner::where('doc_num', $criteria)->get();

        if ($runners->count() == 0) {
            $runners = Runner::where('name_last', 'like', $criteria . '%')->orderBy('name_last', 'asc')->get();
        }

        if ($runners->count() == 0) {
            return 'No runners found'; // correct this
        } else {
            return view('admin.runner_found')->with('runners', $runners);
        }

    }



}
