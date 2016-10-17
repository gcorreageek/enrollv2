<?php

namespace App\Http\Middleware;

use Closure;

class CheckEventAvailability
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $event = \App\Event::where('prefix', $request->segment(1))->first();

        if (is_null($event)) {
            return redirect($request->segment(1) . '/error')->with([
                'error' => 'Lo sentimos, el evento solicitado no existe.'
            ]);
        }

        if ($event->closed == true) {
            return redirect($event->prefix . '/error')->with([
                'error' => 'Lo sentimos, las inscripciones están cerradas. Si aun tiene un código de inscripción sin canjear por favor acérquese a la <a href="' . url($event->url_expo) . '" target="_blank">Expo</a> para regularizar su inscripción.'
            ]);
        }

        if ($event->maintenance == true) {
            return redirect($event->prefix . '/error')->with([
                'error' => 'Lo sentimos, el sistema de inscripción se encuentra temporalmente en mantenimiento. Por favor intente nuevamente en breve.'
            ]);
        }


        return $next($request);
    }
}
