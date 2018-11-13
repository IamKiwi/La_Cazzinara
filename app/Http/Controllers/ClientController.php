<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function getClientPanel($id)
    {
        $user = User::find($id);
        return view('client.clientpanel')->with('user', $user);
    }
}
