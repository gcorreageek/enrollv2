<?php

namespace App\Http\Controllers;

use App\Runner;
use App\Track;
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



    public function newBib($runner_id, $track_id, $bib) {
        $runner = Runner::find($runner_id);
        $track = Track::find($track_id);
        $range = $track->ranges()->where([['first', '<=', $bib], ['last', '>=', $bib]])->first();

        $new_bib = $track->generateBib($range);

        $runner->tracks()->updateExistingPivot($track->id, ['bib' => $new_bib]);

        return redirect(url('admin/runner/' . $runner->id));


    }



}
