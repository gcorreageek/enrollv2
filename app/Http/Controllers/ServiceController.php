<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function insights($prefix)
    {
        $event = Event::where('prefix', $prefix)->first();
        $event_quota = 0;
        $consumed_quota = 0;
        $consumed_quota_mod = 0;
        $remaining_quota = 0;
        $remaining_quota_mod = 0;

        foreach ($event->tracks as $track) {

            $track_quota = 0;
            foreach ($track->ranges as $range) {
                $track_quota += $range->pivot->quota;
            }

            $event_quota += $track_quota;
            $consumed_quota += $track->runners()->count();
            $consumed_quota_mod += $track->runners()->count() + $track->count_modifier;
            $remaining_quota += $track_quota - $track->runners()->count();
            $remaining_quota_mod += $track_quota - ($track->runners()->count() + $track->count_modifier);
        }

        return response()->json([
            'event_quota' => $event_quota,
            'consumed_quota' => $consumed_quota,
            'consumed_quota_mod' => $consumed_quota_mod,
            'remaining_quota' => $remaining_quota,
            'remaining_quota_mod' => $remaining_quota_mod
        ]);
    }


}
