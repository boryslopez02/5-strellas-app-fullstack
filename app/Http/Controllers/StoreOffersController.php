<?php

namespace App\Http\Controllers;
use App\Models\Offer;

use Illuminate\Http\Request;

class StoreOffersController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()){
            return Offer::all();
        } else {
            return view('home');
        }
    }
}
