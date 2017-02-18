<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    //Mail::to('orlando.aparicio@icloud.com')->send(new App\Mail\Welcome);
});

Route::get('/', 'EventController@index');
Route::get('{prefix}', 'EnrollController@index');
Route::get('{prefix}/engine', 'EnrollController@engine');


Route::get('{prefix}/{engine_id}/gateway', 'EnrollController@gateway');
Route::post('{prefix}/{engine_id}/check', 'EnrollController@check');
Route::get('{prefix}/{engine_id}/runner', 'EnrollController@runner');
Route::post('{prefix}/{engine_id}/persist_runner', 'EnrollController@persistRunner');


Route::get('{prefix}/{engine_id}/{track_id}/{ticket}/{encrypted_runner_id}/options', 'EnrollController@options');
Route::post('{prefix}/{engine_id}/{track_id}/{ticket}/{encrypted_runner_id}/persist_options', 'EnrollController@persistOptions');
Route::post('{prefix}/{engine_id}/{track_id}/{runner_id}/{transaction_id}/response', 'EnrollController@response');
Route::get('{prefix}/{engine_id}/{track_id}/{ticket}/{encrypted_runner_id}/subscribe', 'EnrollController@subscribe');
Route::get('{prefix}/{engine_id}/{track_id}/{ticket}/{encrypted_runner_id}/manifest', 'EnrollController@manifest');
Route::get('{prefix}/{engine_id}/{track_id}/{ticket}/{encrypted_runner_id}/manifest/docs/pdf', 'EnrollController@pdf');


Route::get('{prefix}/docs/privacy', 'EnrollController@privacy');
Route::get('{prefix}/docs/disclaimer', 'EnrollController@disclaimer');
Route::get('{prefix}/docs/parental', 'EnrollController@parental');


Route::get('{prefix}/verify', 'EnrollController@verify');
Route::post('{prefix}/search', 'EnrollController@search');
Route::get('{prefix}/error', 'EnrollController@error');



Route::get('admin/runner_search', 'AdminController@runnerSearch');
Route::post('admin/runner_found', 'AdminController@runnerFound');
Route::get('admin/runner/{id}', 'RunnerController@show');
Route::get('admin/runner/{id}/edit', 'RunnerController@edit');
Route::post('admin/runner/{id}/update', 'RunnerController@update');

Route::get('admin/{runner_id}/{track_id}/{bib}/get_new_bib', 'AdminController@newBib');
Route::get('admin/{runner_id}/{track_id}/{bib}/get_new_track', 'AdminController@newTrack');

Route::any('admin/{prefix}/export', 'EventController@exportRunners');

