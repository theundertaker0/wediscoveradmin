<?php

namespace App\Http\Controllers;

use App\Definition;
use Illuminate\Http\Request;

class DefinitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $definitions=Definition::all();
        return view('definitions.index',compact('definitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('definitions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Definition::create($request->all());
        toastr()->success('Definición guardada con éxito');
        return redirect()->route('definitions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $definition=Definition::find($id);
        return view('definitions.show',compact('definition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $definition=Definition::find($id);
        return view('definition.edit',compact('definition'));
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
        $definition=Definition::find($id);
        $definition->update($request->all());
        toastr()->success('Definición editada con éxito');
        return redirect()->route('definition.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $definition=Definition::find($id);
        $definition->delete();
        toastr()->success('Definición eliminada con éxito');
        return redirect()->route('definition.index');

    }

    public function getDefinitions(){
        $definitions=Definition::all();
        return response()->json($definitions);
    }

}
