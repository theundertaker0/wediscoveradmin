<?php

namespace App\Http\Controllers;

use App\Location;
use App\State;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations=Location::all();
        return view('locations.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states=State::all();
        Mapper::map(20.967076, -89.62374,['zoom'=>8,'marker' => false]);
        Mapper::marker(20.967076, -89.62374,['draggable'=> true,'eventDragEnd' => 'coordenadas(maps)']);
        return view('locations.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Location::create($request->all());
        toastr()->success('Localidad guardada con éxito');
        return redirect()->route('locations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location=Location::find($id);
        Mapper::map($location->lat, $location->lng,['zoom'=>10,'marker' => false]);
        Mapper::marker($location->lat, $location->lng,['draggable'=> false]);
        return view('locations.show',compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $states=State::all();
        $location=Location::find($id);
        Mapper::map($location->lat, $location->lng,['zoom'=>10,'marker' => false]);
        Mapper::marker($location->lat, $location->lng,['draggable'=> true,'eventDragEnd' => 'coordenadas(maps)']);
        return view('locations.edit',compact('states','location'));
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
        $location=Location::find($id);
        $location->update($request->all());
        toastr()->success('Localidad editada con éxito');
        return redirect()->route('locations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location=Location::find($id);
        if($location->delete()){
            toastr()->success('Localidad eliminada con éxito');
        }else{
            toastr()->error('Hubo problemas con la eliminación, intentelo de nuevo');
        }

        return redirect()->route('locations.index');
    }
}
