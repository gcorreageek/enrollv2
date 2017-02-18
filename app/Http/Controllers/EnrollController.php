<?php

namespace App\Http\Controllers;

use App\Application;
use App\Category;
use App\Code;
use App\Coupon;
use App\Engine;
use App\Event;
use App\Garment;
use App\Gateway;
use App\Mail\Welcome;
use App\Range;
use App\Runner;
use App\Size;
use App\Track;
use App\Transaction;
use Carbon\Carbon;
use Crypt;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use PDF;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\VarDumper\Caster\TraceStub;

class EnrollController extends Controller
{

    function __construct()
    {
        $this->middleware('availability', ['only' => ['index', 'engine', 'gateway']]);
    }


    public function index($prefix)
    {
        $event = Event::where('prefix', $prefix)->first();
        if ($event->engines->count() > 1) {
            return redirect($event->prefix . '/engine');
        } else {
            return redirect($prefix . '/' . $event->id . '/gateway');
        }
    }


    public function engine($prefix)
    {
        $event = Event::where('prefix', $prefix)->first();
        return view('frontend.engine', ['event' => $event]);
    }


    public function gateway($prefix, $engine_id)
    {
        $event = Event::where('prefix', $prefix)->first();
        $engine = Engine::find($engine_id);
        return view('frontend.gateway', ['event' => $event, 'engine' => $engine]);
    }


    public function check($prefix, $engine_id, Requests\GatewayRequest $request)
    {
        $event = Event::where('prefix', $prefix)->first();
        $engine = Engine::find($engine_id);
        $dob = Carbon::parse($request->get('dob'));
        $age = $engine->event->date->diffInYears($dob);
        $checkEngineSafeTracks = false;
        $safeTracks = null;
        $code = null;
        $gateway = null;

        // Runner ID validation
        $runner = Runner::where('doc_num', strtoupper($request->get('doc_num')))->first();
        if (!is_null($runner)) {
            foreach ($engine->event->tracks as $track) {
                if ($track->runners()->wherePivot('enrolled', true)->get()->contains($runner->id)) {
                    // ERROR: Runner already enrolled to event
                    return redirect($prefix . '/error')->with([
                        'error' => 'Lo sentimos, el documento ' . strtoupper($request->get('doc_num')) . ' ya se encuentra registrado en este evento.'
                    ]);
                }
            }
        }

        // Validate subscription code and track if assigned
        if ($request->get('pay') == 'code') {
            $gateway = Gateway::makeDummy();
            $code = $engine->codes->where('code', strtoupper($request->get('code')))->first();
            if (is_null($code)) {
                // ERROR: Code does not exist
                return redirect($prefix . '/error')->with([
                    'error' => 'Lo sentimos, el código ' . strtoupper($request->get('code')) . ' no existe.'
                ]);
            }
            if ($code->redeemed == true) {
                // ERROR: Redeemed code
                return redirect($prefix . '/error')->with([
                    'error' => 'Lo sentimos, el código ' . strtoupper($request->get('code')) . ' no está habilitado.'
                ]);
            }
            if ($code->locked == true) {
                $now = Carbon::now();
                $unlockTime = $code->updated_at->addMinutes($event->lock_lapse);
                if ($now->lt($unlockTime)) {
                    return redirect($prefix . '/error')->with([
                        'error' => 'Lo sentimos, el código ' . strtoupper($request->get('code')) . ' se encuentra temporalmente bloqueado debido a una inscripción no terminada, por favor intente nuevamente en aproximadamente ' . $event->lock_lapse . ' minutos.'
                    ]);
                }
            }
            if ($code->track_id > 0) {
                if ($code->track->categorySafe($age, $request->get('dob_year')) == false || $code->track->genderSafe($request->get('gender')) == false) {
                    // ERROR: Track is not safe for given dob and/or gender
                    return redirect($prefix . '/error')->with([
                        'error' => 'Lo sentimos, su edad y/o año de nacimiento no le permiten participar en la distancia vinculada al código ' . strtoupper($request->get('code')) . '.'
                    ]);
                }
            } else {
                $checkEngineSafeTracks = true;
            }
        }

        if ($request->get('pay') == 'gateway') {
            $code = Code::makeDummy();
            $gateway = Gateway::find($request->get('gateway'));
            $checkEngineSafeTracks = true;
        }

        // Search for available tracks for given dob and gender
        if ($checkEngineSafeTracks == true) {
            $safeTracks = $engine->getSafeTracks($age, $request->get('dob_year'), $request->get('gender'));
            if ($safeTracks->count() == 0){
                // ERROR: Engine is not safe for given dob and/or gender
                return redirect($prefix . '/error')->with([
                    'error' => 'Lo sentimos, su edad y/o año de nacimiento y/o género no le permiten participar en ninguna distancia de este evento.'
                ]);
            }
        }

        if ($request->get('pay') == 'code') {
            $code->lock();
        }

        return redirect($prefix . '/' . $engine->id . '/runner')->withInput();
    }


    public function runner($prefix, $engine_id)
    {
        if (is_null(old('dob'))) {
            return redirect($prefix . '/error')->with([
                'error' => 'Lo sentimos, se ha producido un error en su inscripción.'
            ]);
        }

        $dob = Carbon::parse(old('dob'));

        $runner = Runner::where([['doc_num', old('doc_num')], ['gender', old('gender')], ['dob', $dob->format('Y-m-d')]])->first();

        $event = Event::where('prefix', $prefix)->first();
        $engine = Engine::find($engine_id);
        $age = $event->date->diffInYears($dob);
        $safeTracks = $engine->getSafeTracks($age, $dob->year, old('gender'));
        $gateway = Gateway::makeDummy();
        $code = Code::makeDummy();
        $defaultLocation = $event->getDefaultLocation();

        if (old('pay') == 'code') {
            $code = Code::where('code', old('code'))->first();
        }

        if (old('pay') == 'gateway') {
            $gateway = Gateway::find(old('gateway'));
        }

        return view('frontend.runner', [
            'event' => $event,
            'engine' => $engine,
            'doc_type' => old('doc_type'),
            'doc_num' => old('doc_num'),
            'gender' => old('gender'),
            'dob' => $dob,
            'pay' => old('pay'),
            'code' => $code,
            'gateway' => $gateway,
            'safeTracks' => $safeTracks,
            'defaultCountry' => $defaultLocation['country'],
            'defaultState' => $defaultLocation['state'],
            'defaultProvince' => $defaultLocation['province'],
            'runner' => $runner,
            'edit_mode' => false,
        ]);
    }


    public function persistRunner($prefix, $engine_id, Requests\RunnerRequest $request)
    {
        $event = Event::where('prefix', $prefix)->first();
        $engine = Engine::find($engine_id);
        $track = Track::find($request->get('track'));
        $code = Code::makeDummy();
        $transaction = Transaction::makeDummy();
        $ticket = 0;
        $attachPivot = false;

        if ($request->get('runner_id') == 0) {
            $runner = Runner::create($request->all());
        } else {
            $runner = Runner::find($request->get('runner_id'));
            $runner->update($request->all());
        }

        $runner->doc_num = strtoupper($runner->doc_num);
        $runner->save();

        if ($request->get('pay') == 'code') {
            $code = Code::find($request->get('code_id'));
            if ($runner->tracks()->wherePivot('code_id', $code->id)->count() == 0) {
                $attachPivot = true;
            }
            $ticket = $code->id;
        }

        if ($request->get('pay') == 'gateway') {

            $gateway = Gateway::find($request->get('gateway'));

            if ($engine->coupons_enabled == true) {
                $coupon = Coupon::makeDummy(); // Correct this!!!
            } else {
                $coupon = Coupon::makeDummy();
            }

            $rate = $track->getCurrentRate(Carbon::now());

            $transaction = new Transaction;
            $transaction->gateway_id = $gateway->id;
            $transaction->track_id = $track->id;
            $transaction->price = $rate->price;
            $transaction->coupon_id = $coupon->id;
            $transaction->discount = $coupon->calculateDiscount($transaction->price);
            $transaction->amount = $transaction->price - $transaction->discount;
            $transaction->status = 0;
            $transaction->store_id = $gateway->store_id;
            $transaction->save();

            $ticket = $transaction->id;

            $attachPivot = true;
        }

        if ($attachPivot == true) {
            if ($runner->tracks()->wherePivot('track_id', $track->id)->count() == 0) {
                $track->runners()->attach($runner->id, [
                    'bib' => 0,
                    'ticket' => $ticket,
                    'code_id' => $code->id,
                    'transaction_id' => $transaction->id,
                    'category_id' => 0,
                    'size_id' => 0,
                    'nickname' => '',
                    'time_goal' => '00:00:00',
                    'time_best' => '00:00:00',
                    'event_name' => '',
                    'event_url' => '',
                    'relative_relationship' => '',
                    'relative_name' => '',
                    'relative_phone' => '',
                    'comment' => ''
                ]);
            } else {
                $track->runners()->updateExistingPivot($runner->id, [
                    'ticket' => $ticket,
                    'code_id' => $code->id,
                    'transaction_id' => $transaction->id
                ]);
            }
        }

        $encrypted_runner_id = Crypt::encrypt($runner->id);

        return redirect($event->prefix . '/' . $engine->id . '/' . $track->id . '/' . $ticket . '/' . $encrypted_runner_id . '/options');
    }


    public function options($prefix, $engine_id, $track_id, $ticket, $encrypted_runner_id)
    {
        $event = Event::where('prefix', $prefix)->first();
        $engine = Engine::find($engine_id);
        $runner = Runner::find(Crypt::decrypt($encrypted_runner_id));
        $track = Track::find($track_id);
        $sizes = $track->garment->sizes()->wherePivot('gender', $runner->gender)->get();
        $options = $runner->tracks()->wherePivot('track_id', $track->id)->first()->pivot;

        return view('frontend.options', [
            'prefix' => $prefix,
            'engine' => $engine,
            'runner' => $runner,
            'track' => $track,
            'sizes' => $sizes,
            'event' => $event,
            'ticket' => $ticket,
            'options' => $options,
        ]);
    }


    public function persistOptions($prefix, $engine_id, $track_id, $ticket, $encrypted_runner_id, Requests\OptionsRequest $request)
    {
        $event = Event::where('prefix', $prefix)->first();
        $engine = Engine::find($engine_id);
        $track = Track::find($track_id);
        $runner = Runner::find(Crypt::decrypt($encrypted_runner_id));

        $time_goal = Carbon::createFromTime((int) $request->get('hour_goal'), (int) $request->get('minute_goal'), (int) $request->get('second_goal'));
        $time_best = Carbon::createFromTime((int) $request->get('hour_best'), (int) $request->get('minute_best'), (int) $request->get('second_best'));

        $pivot = [
            'ticket' => $ticket,
            'track_id' => $track->id,
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

        $track->runners()->updateExistingPivot($runner->id, $pivot);
        $options = $runner->tracks()->wherePivot('track_id', $track->id)->first()->pivot;

        if ($options->code_id > 0) {
            return redirect($prefix . '/' . $engine->id . '/' . $track->id . '/' . $ticket . '/' . $encrypted_runner_id . '/subscribe');
        }

        if ($options->transaction_id > 0) {
            $transaction = Transaction::find($options->transaction_id);
            return view('frontend.pay')->with([
                'event' => $event,
                'engine' => $engine,
                'track' => $track,
                'runner' => $runner,
                'transaction' => $transaction
            ]);
        }

        return redirect($prefix . '/error')->with([
            'error' => 'Lo sentimos, su inscripción no pudo ser completada.'
        ]);

    }


    public function response($prefix, $engine_id, $track_id, $runner_id, $transaction_id)
    {
        $response = $_POST;

        $engine = Engine::find($engine_id);
        $track = Track::find($track_id);
        $runner = Runner::find($runner_id);
        $transaction = Transaction::find($transaction_id);
        $ticket = $transaction_id;

        $transaction->status = $response['status'];
        $transaction->card_number = $response['card_number'];
        $transaction->authorization_code = $response['authorization_code'];
        $transaction->error = $response['error_code'];
        $transaction->hash = $response['hash'];
        $transaction->message = $response['message'];
        $transaction->save();

        $encrypted_runner_id = Crypt::encrypt($runner->id);

        if ($transaction->status == 1) {
            return redirect($prefix . '/' . $engine->id . '/' . $track->id . '/' . $ticket . '/' . $encrypted_runner_id . '/subscribe');
        } else {
            return redirect($prefix . '/error')->with([
                'error' => 'Lo sentimos, la operación fue rechazada. Por favor comuníquese con su banco e intente nuevamente.'
            ]);
        }
    }


    public function subscribe($prefix, $engine_id, $track_id, $ticket, $encrypted_runner_id)
    {
        $app = Application::find(1);
        $event = Event::where('prefix', $prefix)->first();
        $engine = Engine::find($engine_id);
        $track = Track::find($track_id);
        $runner = Runner::find(Crypt::decrypt($encrypted_runner_id));
        $options = $runner->tracks()->wherePivot('ticket', $ticket)->wherePivot('track_id', $track->id)->first()->pivot;
        $code = Code::makeDummy();
        $transaction = Transaction::makeDummy();
        $gateway = Gateway::makeDummy();
        $range = Range::makeDummy();

        if ($options->code_id > 0) {
            $code = Code::find($options->code_id);
            $range = Range::find($code->range_id);
            $code->redeem();
        }

        if ($options->transaction_id > 0) {
            $transaction = Transaction::find($options->transaction_id);
            $gateway = Gateway::find($transaction->gateway_id);
            $range = $track->ranges()->wherePivot('default', true)->first();
        }

        if ($options->bib > 0) {
            $bib = $options->bib;
        } else {
            $bib = $track->generateBib($range);
        }

        $category = $track->assignCategory($event->date->diffInYears($runner->dob), $runner->dob->year, $range->id);

        DB::update("UPDATE runner_track SET enrolled = true, bib = :bib, category_id = :category_id WHERE ticket = :ticket AND track_id = :track_id", ['bib' => $bib, 'category_id' => $category->id, 'ticket' => $ticket, 'track_id' => $track->id]);

        $size = Size::find($options->size_id);
        $garment = Garment::find($track->garment_id);
        $spent = $garment->sizes()->wherePivot('gender', $runner->gender)->find($size->id)->pivot->spent;
        $garment->sizes()->wherePivot('gender', $runner->gender)->updateExistingPivot($size->id, ['spent' => $spent + 1]);

        try {
            Mail::to($runner->mail)->send(new Welcome($app, $event, $engine, $track, $runner, $code, $transaction, $gateway, $range, $category, $size, $garment));
        } catch (\Exception $e){
            $a = $e;
        }


        return redirect($prefix . '/' . $engine->id . '/' . $track->id . '/' . $ticket . '/' . $encrypted_runner_id . '/manifest');

    }


    public function manifest($prefix, $engine_id, $track_id, $ticket, $encrypted_runner_id)
    {
        $event = Event::where('prefix', $prefix)->first();
        $engine = Engine::find($engine_id);
        $track = Track::find($track_id);
        $runner = Runner::find(Crypt::decrypt($encrypted_runner_id));
        $options = $runner->tracks()->wherePivot('ticket', $ticket)->wherePivot('track_id', $track->id)->first()->pivot;
        $app = Application::find(1);
        $category = Category::find($options->category_id);
        $size = Size::find($options->size_id);
        $code = Code::makeDummy();
        $transaction = Transaction::makeDummy();
        $gateway = Gateway::makeDummy();
        $encrypted_runner_id = Crypt::encrypt($runner->id);
        $encrypted_track_id = Crypt::encrypt($track->id);

        if ($options->code_id > 0) {
            $code = Code::find($options->code_id);
        }

        if ($options->transaction_id > 0) {
            $transaction = Transaction::find($options->transaction_id);
            $gateway = Gateway::find($transaction->gateway_id);
        }

        return view('frontend.manifest', [
            'event' => $event,
            'engine' => $engine,
            'track' => $track,
            'runner' => $runner,
            'app' => $app,
            'options' => $options,
            'gateway' => $gateway,
            'size' => $size,
            'category' => $category,
            'code' => $code,
            'transaction' => $transaction,
            'encrypted_runner_id' => $encrypted_runner_id,
            'encrypted_track_id' => $encrypted_track_id
        ]);
    }


    public function verify($prefix)
    {
        $event = Event::where('prefix', $prefix)->first();
        return view('frontend.verify')->with('event', $event);
    }


    public function search($prefix, Requests\VerifyRequest $request)
    {
        $event = Event::where('prefix', $prefix)->first();
        $doc_num = $request->get('doc_num');
        $mail = $request->get('mail');
        $found_track = null;
        $ticket = 0;

        $runners = Runner::where([['doc_num', $doc_num], ['mail', $mail]]);

        if ($runners->count() == 0) {
            return redirect($prefix . '/error')->with([
                'error' => 'Lo sentimos, no existe ninguna inscripción registrada para el documento ' . $doc_num . ' y el correo ' . $mail
            ]);
        }

        foreach ($runners->get() as $runner) {
            foreach ($runner->tracks as $track) {
                if ($track->engine->event_id == $event->id && $track->pivot->enrolled == true) {
                    $found_track = $track;
                    $ticket = $track->pivot->ticket;
                }
            }
        }


        if (is_null($found_track)) {
            return redirect($prefix . '/error')->with([
                'error' => 'Lo sentimos, no existe ninguna inscripción registrada para el documento ' . $doc_num . ' y el correo ' . $mail
            ]);
        }

        $track = $found_track;
        $engine = $track->engine;

        $encrypted_runner_id = Crypt::encrypt($runner->id);

        return redirect($prefix . '/' . $engine->id . '/' . $track->id . '/' . $ticket . '/' . $encrypted_runner_id . '/manifest');
    }


    public function pdf($prefix, $engine_id, $track_id, $ticket, $encrypted_runner_id)
    {

        $decrypted_runner_id = Crypt::decrypt($encrypted_runner_id);

        $event = Event::where('prefix', $prefix)->first();
        $engine = Engine::find($engine_id);
        $track = Track::find($track_id);
        $runner = Runner::find($decrypted_runner_id);
        $options = $runner->tracks()->wherePivot('ticket', $ticket)->wherePivot('track_id', $track->id)->first()->pivot;
        $app = Application::find(1);
        $size = Size::find($options->size_id);
        $category = Category::find($options->category_id);
        $code = Code::makeDummy();
        $transaction = Transaction::makeDummy();
        $gateway = Gateway::makeDummy();

        if ($options->transaction_id > 0) {
            $transaction = Transaction::find($options->transaction_id);
            $gateway = Gateway::find($transaction->gateway_id);
        }

        if ($options->code_id > 0) {
            $code = Code::find($options->code_id);
        }

        $pdf = PDF::loadView('frontend.docs.pdf', [
            'runner' => $runner,
            'transaction' => $transaction,
            'code' => $code,
            'event' => $event,
            'engine' => $engine,
            'track' => $track,
            'options' => $options,
            'size' => $size,
            'category' => $category,
            'gateway' => $gateway,
            'app' => $app,
        ])->setPaper('a4', 'portrait');

        return $pdf->stream('manifest.pdf');
    }


    public function error($prefix)
    {
        $event = Event::where('prefix', $prefix)->first();
        if (is_null($event)) {
            $event = Event::find(1);
            $event->id = 0;
        }
        $error = session('error');
        return view('frontend.error', ['event' => $event, 'error' => $error]);
    }


    public function disclaimer($prefix)
    {
        $app = Application::find(1);
        $event = Event::where('prefix', $prefix)->first();
        $pdf = PDF::loadView('frontend.docs.disclaimer', ['app' => $app, 'event' => $event])->setPaper('a4', 'portrait');
        return $pdf->stream('disclaimer.pdf');
    }


    public function parental($prefix)
    {
        $app = Application::find(1);
        $event = Event::where('prefix', $prefix)->first();
        $pdf = PDF::loadView('frontend.docs.parental', ['app' => $app, 'event' => $event])->setPaper('a4', 'portrait');
        return $pdf->stream('parental.pdf');
    }


    public function privacy($prefix)
    {
        $app = Application::find(1);
        $event = Event::where('prefix', $prefix)->first();
        $pdf = PDF::loadView('frontend.docs.privacy', ['app' => $app, 'event' => $event])->setPaper('a4', 'portrait');
        return $pdf->stream('privacy.pdf');
    }


}


