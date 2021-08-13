<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suscription;

class SuscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin.auth');
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return Suscription::all();
        } else {
            return view('admin.managment-suscriptions');
        }
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
        $suscrip = new Suscription();
        $suscrip->name = $request->name;
        $suscrip->description = $request->description;
        $suscrip->duration = $request->duration;
        $suscrip->price = $request->price;
        $suscrip->save();
        
        return $suscrip;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $suscrip = Suscription::find($id);
        $suscrip->name = $request->name;
        $suscrip->description = $request->description;
        $suscrip->duration = $request->duration;
        $suscrip->price = $request->price;
        $suscrip->save();

        return $suscrip;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suscrip = Suscription::find($id);
        $suscrip->delete();
    }
}
