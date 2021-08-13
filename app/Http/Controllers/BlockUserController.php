<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BlockUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin.auth');
    } 

    public function block($id)
    {
        $user = User::find($id);
        $user->status = 'blocked';
        $user->save();

        return $user;
    }

    public function desblock($id)
    {
        $user = User::find($id);
        $user->status = 'active';
        $user->save();

        return $user;
    }
}
