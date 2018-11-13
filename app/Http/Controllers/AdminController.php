<?php

namespace App\Http\Controllers;

use App\Pizza;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getAdminPanel()
    {
        return view('admin.adminpanel');
    }

    public function getPizzaList()
    {
        $pizza = Pizza::paginate(5);

        return view('admin.pizzalist')->with('pizza', $pizza);
    }

    public function getPizzaEdit($id)
    {
        $pizza = Pizza::find($id);

        return view('admin.pizzaedit')->with('pizza', $pizza);
    }

    public function getUserList()
    {
        $users = User::all();

        return view('admin.userlist')->with('users', $users);
    }

    public function getUserEdit($id)
    {
        $user = User::find($id);
        $user_address = explode(',', $user->Adres);
        $adres = ['ulica' => $user_address[0],
                  'nr_lok' => $user_address[1],
                  'miasto' => str_replace(' ', '', $user_address[2]),
                  'kp' => str_replace(' ', '', $user_address[3])];
        return view('admin.useredit')->with('user', $user)->with('adres', $adres);
    }
}
