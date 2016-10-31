<?php

namespace App\Http\Controllers;

use App\Event;
use App\Runner;
use App\Track;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

use League\Csv\Writer;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('frontend.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function exportRunners($prefix, Request $request)
    {
        $event = Event::where('prefix', $prefix)->first();

        if($request->has('format')){
            $where_tracks = implode(',', $event->tracks->pluck('id')->toArray());
            $runners = DB::select('select a.id, a.name_last, a.name_first, a.gender, a.dob, a.doc_type, a.doc_num, a.mail, a.telephone, a.mobile, a.country, a.state, a.province, a.city, c.slug, b.enrolled, b.bib, e.code, b.transaction_id, CONCAT(d.min, " - ", d.max) as cat, f.name_short, b.nickname, b.time_goal, b.time_best, b.event_name, b.event_url, b.relative_relationship, b.relative_name, b.relative_phone, b.comment, b.created_at, b.updated_at from runner_track b inner join runners a on a.id = b.runner_id INNER JOIN tracks c on b.track_id = c.id INNER JOIN categories d ON b.category_id = d.id INNER JOIN sizes f ON b.size_id = f.id LEFT JOIN codes e ON b.code_id = e.id where b.track_id IN (' . $where_tracks . ') and b.enrolled = 1');
            $csv = Writer::createFromFileObject(new \SplTempFileObject());

            if($request->get('format') == 'excel_win') {
                $csv->setDelimiter(';');
                $csv->setOutputBOM(Writer::BOM_UTF8);
            }

            $csv->insertOne(['id', 'name_last', 'name_first', 'gender', 'dob', 'doc_type', 'doc_num', 'mail', 'telephone', 'mobile', 'country', 'state', 'province', 'city', 'track', 'enrolled', 'bib', 'code', 'transaction', 'category', 'size', 'nickname', 'time_goal', 'time_best', 'event', 'url', 'relative_type', 'relative_name', 'relative_phone', 'comment', 'created', 'updated']);

            foreach ($runners as $runner) {
                $csv->insertOne(json_decode(json_encode($runner), true));
            }

            $csv->output($event->prefix . '_runners.csv');

            die;
        }

        return view('admin.export');
    }
}
