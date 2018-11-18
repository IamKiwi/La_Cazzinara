<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getClientPanel()
    {
        return view('client.clientpanel');
    }

    public function getUserEdit($id)
    {
        $user = User::find($id);

        $user_address = explode(',', $user->address);
        $address = ['street' => $user_address[0],
                  'number' => $user_address[1],
                  'city' => str_replace(' ', '', $user_address[2]),
                  'zipcode' => str_replace(' ', '', $user_address[3])];

        return view('client.useredit')->with('user', $user)->with('user_addr', $address);
    }
}
