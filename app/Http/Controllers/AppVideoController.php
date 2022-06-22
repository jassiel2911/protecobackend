<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Videos;
use Illuminate\Support\Facades\Http;

class AppVideoController extends Controller
{

    private $videos;

    public function __construct(Videos $videos)
    {

        $this->videos = $videos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $value = $request->header('referer');
        $values = explode("/", $value);
        $id = $values[4];
        $videos = $this->videos->all($id);
        return view('appMobile.crearVideo',compact('videos','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData=$request->validate([
            'ID' => 'required|numeric',
            'ID_material' => 'required|numeric',
            'titulo' => 'required',
            'link' => 'required'
        ]);
        $video = $this->videos->create($storeData);
        return redirect('videos/'.$storeData['ID_material'])->with('completado', 'El video ha sido guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $videos = $this->videos->all($id);
        return view('appMobile.mostrarVideo',compact('videos','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = $this->videos->find($id);
        return view('appMobile.editarVideo',compact('video'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $storeData=$request->validate([
            'titulo' => 'required',
            'ID_material' => 'required',
            'codigo' => 'required'
        ]);
        $video = $this->videos->update($id,$storeData);
        return redirect('videos/'.$storeData['ID_material'])->with('completado', 'El video ha sido modificado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $value = $request->header('referer');
        $values = explode("/", $value);
        $value = $values[4];
        $video = $this->videos->remove($id);
        return redirect('videos/'.$value)->with('completado', 'El video ha sido eliminado!');
    }
}
