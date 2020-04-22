<?php

namespace App\Http\Controllers;

use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Http\Request;
use App\State;
use Illuminate\Support\Facades\Storage;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states=State::all();
        return view('states.index',compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Mapper::map(20.967076, -89.62374,['zoom'=>8,'marker' => false]);
        Mapper::marker(20.967076, -89.62374,['draggable'=> true,'eventDragEnd' => 'coordenadas(maps)']);
        return view('states.create');
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
        $upload=Storage::disk('s3')->put('states/'.$image->getClientOriginalName(),$image,'public');
        $form_data = array(
            'name'       =>   $request->name,
            'short_name'        =>   $request->short_name,
            'image'            =>   $upload,
            'description'       =>   $request->description,
            'biosecurity'        =>   $request->biosecurity,
            'ext1'            =>  $request->ext1,
            'ext2'       =>   $request->ext2,
            'weather'        =>   $request->weather,
            'police_number'            =>   $request->police_number,
            'firemen_number'       =>   $request->firemen_number,
            'medical_number'        =>   $request->medical_number,
            'government_number'            =>   $request->government_number,
            'lat'       =>   $request->lat,
            'lng'        =>   $request->lng,
        );
        State::create($form_data);
        toastr()->success('Estado guardado con éxito');
        return redirect()->route('states.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $state=State::find($id);
        Mapper::map($state->lat, $state->lng,['zoom'=>8,'marker' => false]);
        Mapper::marker($state->lat, $state->lng,['draggable'=> false]);
        return view('states.show',compact('state'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $state=State::find($id);
        Mapper::map($state->lat, $state->lng,['zoom'=>8,'marker' => false]);
        Mapper::marker($state->lat, $state->lng,['draggable'=> true,'eventDragEnd' => 'coordenadas(maps)']);
        return view('states.edit',compact('state'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {

            $request->validate([
               'image'         =>  'image|max:2048'
            ]);
            $upload=Storage::disk('s3')->put('states/'.$image->getClientOriginalName(),$image,'public');

        }else{
            $upload=$image_name;
        }
        $form_data = array(
            'name'       =>   $request->name,
            'short_name'        =>   $request->short_name,
            'image'            =>   $upload,
            'description'       =>   $request->description,
            'biosecurity'        =>   $request->biosecurity,
            'ext1'            =>  $request->ext1,
            'ext2'       =>   $request->ext2,
            'weather'        =>   $request->weather,
            'police_number'            =>   $request->police_number,
            'firemen_number'       =>   $request->firemen_number,
            'medical_number'        =>   $request->medical_number,
            'government_number'            =>   $request->government_number,
            'lat'       =>   $request->lat,
            'lng'        =>   $request->lng,
        );
        State::whereId($id)->update($form_data);
        toastr()->success('Estado editado con éxito');
        return redirect()->route('states.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state=State::find($id);
        $state->delete();
        toastr()->success('Estado eliminado con éxito');
        return redirect()->route('states.index');

    }

    //Métodos para la API
    public function getStates(){
        $states=State::all();
        return response()->json($states);
    }

}
