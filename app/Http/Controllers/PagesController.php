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

    public function getPizzaListAjax()
    {
        $pizza = Pizza::paginate(5);

        $html = '';

        foreach ($pizza as $p)
        {
            $html .= '<tr><td>'.$p->name.'</td>'.
                     '<td>'.$p->ingredients.'</td>'.
                     '<td>'.$p->price_small.'</td>'.
                     '<td>'.$p->price_medium.'</td>'.
                     '<td>'.$p->price_large.'</td></tr>';
        }
        return response()->json($html);
    }

    public function getSearchPizza(Request $request)
    {
        $search = $request->input('search');
        $pizza = Pizza::where('name', 'like', '%'.$search.'%')->paginate(5);

        return view('pages.pizzalist')->with('pizza', $pizza);
    }

    public function getSearchPizzaAjax(Request $request)
    {
        $search = $request->get('query');
        $pizza = Pizza::where('name', 'like', '%'.$search.'%')->
                        orWhere('ingredients', 'like', '%'.$search.'%')->paginate(5);

        $html = '';

        foreach ($pizza as $p)
        {
            $html .= '<tr><td>'.$p->name.'</td>'.
                '<td>'.$p->ingredients.'</td>'.
                '<td>'.$p->price_small.'</td>'.
                '<td>'.$p->price_medium.'</td>'.
                '<td>'.$p->price_large.'</td></tr>';
        }
        return response()->json($html);
    }

    public function getSetDarkMode()
    {
        $mins = 60 * 24 * 365;
        return redirect()->back()->withCookie(cookie('theme', 'dark', $mins));
    }

    public function getSetLightMode()
    {
        $mins = 60 * 24 * 365;
        return redirect()->back()->withCookie(cookie('theme', 'light', $mins));
    }
}