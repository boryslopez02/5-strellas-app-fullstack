<?php

namespace App\Http\Controllers;
use App\Models\Promotion;

use Illuminate\Http\Request;

class StorePromoController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()) {
            return Promotion::all();
        } else {
            return view('home');
        }
    }
}
