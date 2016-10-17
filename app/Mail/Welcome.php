<?php

namespace App\Mail;

use App\Application;
use App\Category;
use App\Code;
use App\Engine;
use App\Garment;
use App\Gateway;
use App\Range;
use App\Runner;
use App\Size;
use App\Track;
use App\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Event;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;


    public $app;
    public $event;
    public $engine;
    public $track;
    public $runner;
    public $code;
    public $transaction;
    public $gateway;
    public $range;
    public $category;
    public $size;
    public $garment;

    public $options;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Application $app, Event $event, Engine $engine, Track $track, Runner $runner, Code $code, Transaction $transaction, Gateway $gateway, Range $range, Category $category, Size $size, Garment $garment)
    {
        $this->app = $app;
        $this->event = $event;
        $this->engine = $engine;
        $this->track = $track;
        $this->runner = $runner;
        $this->code = $code;
        $this->transaction = $transaction;
        $this->gateway = $gateway;
        $this->range = $range;
        $this->category = $category;
        $this->size = $size;
        $this->garment = $garment;

        $this->options = $this->runner->tracks()->find($this->track->id)->pivot;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.welcome')->subject('Bienvenido a ' . $this->event->pre . ' ' . $this->event->name . ' ' . $this->event->date->year);
    }
}
