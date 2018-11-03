<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Support\Facades\DB;

class PagesController
{
    public function getIndex()
    {
        return view('pages.welcome');
    }

    public function getLogin()
    {
        return view('pages.login');
    }

    public function getRegister()
    {
        return view('pages.register');
    }

    public function getPizzaList()
    {
        $pizza = Pizza::paginate(5);
        return view('pages.pizzalist')->with('pizza', $pizza);
    }

    public function getGodMode()
    {
        return view('pages.godmode');
    }
}