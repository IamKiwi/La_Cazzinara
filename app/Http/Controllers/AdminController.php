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

    public function getPizzaEdit()
    {
        $pizza = Pizza::paginate(5);

        return view('admin.pizzaedit')->with('pizza', $pizza);
    }

    public function getUserList()
    {
        $users = User::all();

        return view('admin.userlist')->with('users', $users);
    }
}
