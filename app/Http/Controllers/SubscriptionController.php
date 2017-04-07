<?php

namespace App\Http\Controllers;

use App\Error;
use App\Runner;
use App\Track;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  int  $runner_id
     * @param  int  $track_id
     * @return \Illuminate\Http\Response
     */
    public function show($runner_id, $track_id)
    {
        $runner = Runner::find($runner_id);
        $track = Track::find($track_id);
        $subscription = $runner->tracks()->find($track_id)->pivot;

        return view('admin.subscription.show', ['runner' => $runner, 'track' => $track, 'subscription' => $subscription]);
    }



    public function newBib($runner_id, $track_id)
    {
        $runner = Runner::find($runner_id);
        $track = Track::find($track_id);
        $subscription = $runner->tracks()->find($track_id)->pivot;
        $bib = $subscription->bib;
        $range = $track->ranges()->where([['first', '<=', $bib], ['last', '>=', $bib]])->first();

        $new_bib = $track->generateBib($range);
        $change = Carbon::now() . ' BIB ' . $bib . ' -> ' . $new_bib;
        if (is_null($subscription->change_log)) {
            $change_log = $change;
        } else {
            $change_log = $change . '<br />' . $subscription->change_log;
        }

        $runner->tracks()->updateExistingPivot($track->id, [
            'bib' => $new_bib,
            'change_log' => $change_log
        ]);

        return redirect(url('admin/runner/' . $runner->id));
    }



    public function getNewTrack($runner_id, $track_id)
    {
        $runner = Runner::find($runner_id);
        $track = Track::find($track_id);
        $subscription = $runner->tracks()->find($track_id)->pivot;
        $dob = Carbon::parse($runner->dob);
        $age = $track->engine->event->date->diffInYears($dob);

        switch ($track->engine->event_change) {
            case 'allowAll':
                $safeTracks = $track->engine->getSafeTracks($age, $dob->year, $runner->gender);
                break;
            case 'allowDecrease':
                $now = Carbon::now();
                $currentTrackPrice = $track->getCurrentRate($now)->price;
                $safeTracks = $track->engine->getCheaperSafeTracks($age, $dob->year, $runner->gender, $track_id, $currentTrackPrice, $now);
                break;
        }

        return view('admin.subscription.new_track')->with([
            'safeTracks' => $safeTracks
        ]);
    }



    public function saveNewTrack($runner_id, $track_id, Request $request)
    {
        $runner = Runner::find($runner_id);
        $track = Track::find($track_id);
        $subscription = $runner->tracks()->find($track_id)->pivot;
        $new_track = Track::find($request->get('track'));

        if ($runner->tracks()->wherePivot('track_id', $new_track->id)->count() == 0) {

            $change = Carbon::now() . ' TRACK ' . $track->slug . ' -> ' . $new_track->slug;
            if (is_null($subscription->change_log)) {
                $change_log = $change;
            } else {
                $change_log = $change . '<br />' . $subscription->change_log;
            }

            if ($subscription->code_id > 0) {
                $code = Code::find($subscription->code_id);
                $range = Range::find($code->range_id);
            }

            if ($subscription->transaction_id > 0) {
                $range = $track->ranges()->wherePivot('default', true)->first();
            }

            if ($new_track->garment_id != $track->garment_id) {
                $size = Size::find($subscription->size_id);
                $garment = Garment::find($track->garment_id);
                $garment->returnSize($size, $runner);
                $subscription->size_id = 0;
                $error_array = ['reviewSize'];
            }

            $new_category = $new_track->assignCategory($new_track->engine->event->date->diffInYears($runner->dob), $runner->dob->year, $range->id);

            $new_bib = $new_track->generateBib($range);

            $pivot = [
                'bib' => $new_bib,
                'enrolled' => true,
                'status' => 'ok',
                'error' => Error::wrap($error_array),
                'ticket' => $subscription->ticket,
                'code_id' => $subscription->code_id,
                'transaction_id' => $subscription->transaction_id,
                'category_id' => $new_category->id,
                'size_id' => $subscription->size_id,
                'nickname' => $subscription->nickname,
                'time_goal' => $subscription->time_goal,
                'time_best' => $subscription->time_best,
                'event_name' => $subscription->event_name,
                'event_url' => $subscription->event_url,
                'relative_relationship' => $subscription->relative_relationship,
                'relative_name' => $subscription->relative_name,
                'relative_phone' => $subscription->relative_phone,
                'comment' => $subscription->comment,
                'change_log' => $change_log
            ];


            $runner->tracks()->attach($new_track->id, $pivot);
            $runner->tracks()->updateExistingPivot($track->id, [
                'status' => 'deleted',
                'change_log' => $change_log
            ]);
            return redirect('admin/runner/' . $runner->id);
        }else{
            return redirect('admin/error')->with([
                'error' => 'Lo sentimos, el cambio de Track no pudo ser completado, contactar soporte técnico',
                'back' => '<a href="' . url('admin/runner/' . $runner->id) . '">Volver a la pagina anterior</a>'
            ]);
        }
    }



    public function edit($runner_id, $track_id)
    {
        $runner = Runner::find($runner_id);
        $track = Track::find($track_id);
        $subscription = $runner->tracks()->find($track_id)->pivot;
        $sizes = $track->garment->sizes()->wherePivot('gender', $runner->gender)->get();
        $time_goal = Carbon::parse($subscription->time_goal);
        $time_best = Carbon::parse($subscription->time_best);

        return view('admin.subscription.edit', [
            'prefix' => $track->engine->event->prefix,
            'engine' => $track->engine,
            'runner' => $runner,
            'track' => $track,
            'sizes' => $sizes,
            'event' => $track->engine->event,
            'ticket' => $subscription->ticket,
            'options' => $subscription,
            'time_goal' => $time_goal,
            'time_best' => $time_best,
            'edit_mode' => true,
        ]);
    }



    public function update($runner_id, $track_id, Request $request)
    {
        $runner = Runner::find($runner_id);
        $track = Track::find($track_id);
        $subscription = $runner->tracks()->find($track_id)->pivot;
        $time_goal = Carbon::createFromTime((int) $request->get('hour_goal'), (int) $request->get('minute_goal'), (int) $request->get('second_goal'));
        $time_best = Carbon::createFromTime((int) $request->get('hour_best'), (int) $request->get('minute_best'), (int) $request->get('second_best'));

        $size = Size::find($subscription->size_id);
        $new_size = Size::find($request->get('size_id'));
        $garment = Garment::find($track->garment_id);
        $garment->returnSize($size, $runner);
        $garment->grabSize($new_size, $runner);

        $pivot = [
            'size_id' => $request->get('size_id'),
            'nickname' => $request->get('nickname'),
            'time_goal' => $time_goal->toTimeString(),
            'time_best' => $time_best->toTimeString(),
            'event_name' => $request->get('event_name'),
            'event_url' => $request->get('event_url'),
            'relative_relationship' => $request->get('relative_relationship'),
            'relative_name' => $request->get('relative_name'),
            'relative_phone' => $request->get('relative_phone'),
        ];

        $runner->tracks()->updateExistingPivot($track->id, $pivot);

        return redirect('admin/subscription/' . $runner->id . '/' . $track->id);
    }



}
