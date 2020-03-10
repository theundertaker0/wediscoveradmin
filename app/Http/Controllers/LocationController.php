<?php

namespace App\Http\Controllers;

use App\Location;
use App\State;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $request->validate([
            'image'         =>  'required|image|max:2048'
        ]);
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/locations'), $new_name);
        $form_data = array(
            'name'       =>   $request->name,
            'short_description'        =>   $request->short_description,
            'image'            =>   $new_name,
            'state_id'=>$request->state_id,
            'description'       =>   $request->description,
            'biodiversity'        =>   $request->biodiversity,
            'environmental'=> $request->environmental,
            'culture' => $request->culture,
            'archeology' => $request->archeology,
            'history' => $request->history,
            'economy' => $request->economy,
            'sustainable_development' => $request->sustainable_development,
            'demography'=>$request->demography,
            'gastronomy'=>$request->gastronomy,
            'ext1'            =>  $request->ext1,
            'ext2'       =>   $request->ext2,
            'lat'       =>   $request->lat,
            'lng'        =>   $request->lng,
        );
        Location::create($form_data);
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {

            $request->validate([
                'image'         =>  'image|max:2048'
            ]);

            $oldImg=public_path().'/images/locations/'.$image_name;
            if(@getimagesize($oldImg)){
                unlink($oldImg);
            }
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/locations'), $image_name);
        }
        $form_data = array(
            'name'       =>   $request->name,
            'short_description'        =>   $request->short_description,
            'image'            =>   $image_name,
            'state_id'=>$request->state_id,
            'description'       =>   $request->description,
            'biodiversity'        =>   $request->biodiversity,
            'environmental'=> $request->environmental,
            'culture' => $request->culture,
            'archeology' => $request->archeology,
            'history' => $request->history,
            'economy' => $request->economy,
            'sustainable_development' => $request->sustainable_development,
            'demography'=>$request->demography,
            'gastronomy'=>$request->gastronomy,
            'ext1'            =>  $request->ext1,
            'ext2'       =>   $request->ext2,
            'lat'       =>   $request->lat,
            'lng'        =>   $request->lng,
        );
        $location->update($form_data);
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


    //Funciones de la API

    public function getLocations(){
        $locations=DB::table('locations')->select('id','name','image','short_description','lat','lng')->get();
        return response()->json($locations);
    }

    public function getLocation($id){
        $location=Location::find($id);
        return response()->json($location);
    }
}
