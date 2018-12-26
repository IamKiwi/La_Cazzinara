<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Pizza;
use Illuminate\Http\Request;

class PagesController
{
    public function getIndex()
    {
        $feedback = Feedback::where('grade', 'positive')->where('public', 'true')->orderByRaw('RAND()')->take(5)->get();
        return view('pages.welcome')->with('feedback', $feedback);
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

    public function getSearchPizza(Request $request)
    {
        $search = $request->get('search');
        $pizza = Pizza::where('name', 'like', '%'.$search.'%')->paginate(5);

        return view('pages.pizzalist')->with('pizza', $pizza);
    }
}