<?php

namespace App\Http\Controllers;

use App\Runner;
use Illuminate\Http\Request;

use App\Http\Requests;

class RunnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('criteria')) {
            $criteria = $request->get('criteria');
            $runners = Runner::where('doc_num', $criteria)->get();

            if ($runners->count() == 0) {
                $runners = Runner::where('name_last', 'like', $criteria . '%')->orderBy('name_last', 'asc')->get();
            }

            if ($runners->count() == 0) {
                return view('admin.runner.index')->with([
                    'message' => '<span class="text-danger">No se encontró ningún registro que coincida con el criterio de búsqueda.</span>'
                ]);
            } else {
                return view('admin.runner.index')->with([
                    'message' => '<span class="text-success">' . $runners->count() . ' registro(s) encontrados.</span>',
                    'runners' => $runners
                ]);
            }
        } else {
            return view('admin.runner.index')->with([
                'message' => 'Ingrese un valor para realizar una búsqueda.'
            ]);
        }

        //return view('admin.runner.index');
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
        $runner = Runner::find($id);
        return view('admin.runner.show', ['runner' => $runner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $runner = Runner::find($id);
        return view('admin.runner.edit', ['runner' => $runner, 'edit_mode' => true]);
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
        $runner = Runner::find($id);
        $runner->update($request->all());

        $runner = Runner::find($id);

        return view('admin.runner.show', ['runner' => $runner]);
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

}
