<?php

namespace App\Http\Controllers;

use App\Pizza;
use App\User;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class ClientController extends Controller
{
    private $itemId = 0;

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

    public function postUpdateUser(Request $request, $id)
    {
        $user = User::find($id);

        if($user->email == $request->email)
        {
            $this->validate($request, array(
                'name' => 'required|string|max:50',
                'surname' => 'required|string|max:50',
                'email' => 'required|string|email|max:255',
                'phone_number' => 'required|numeric|digits_between:8,10',
                'date_of_birth' => 'nullable|dateformat:Y-m-d',
                'street' => 'required|string',
                'number' => 'required|string',
                'city' => 'required|string',
                'zipcode' => 'required|alpha_dash'
            ));
        }
        else
        {
            $this->validate($request, array(
                'name' => 'required|string|max:50',
                'surname' => 'required|string|max:50',
                'email' => 'required|string|email|max:255|unique:users',
                'phone_number' => 'required|numeric|digits_between:8,10',
                'date_of_birth' => 'nullable|dateformat:Y-m-d',
                'street' => 'required|string',
                'number' => 'required|string',
                'city' => 'required|string',
                'zipcode' => 'required|alpha_dash'
            ));
        }

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->sex = $request->sex;
        $user->address = $request->street.', '.$request->number.', '.$request->city.', '.$request->zipcode;
        $user->save();
        Session::flash('success', 'Aktualizacja danych przebiegła pomyślnie :)');

        return redirect()->route('client.edit', $user->id);
    }

//    public function getPizzaList()
//    {
//        $pizza = Pizza::all();
//
//        if(Session::has('cart'))
//        {
//            $ids[] = Session::get('cart');
//            $cart = array();
//            foreach ($ids as $i)
//                foreach($i as $x)
//                    $cart[] = Pizza::where('id', '=', $x)->get();
//
//            $rozmiary[] = Session::get('rozmiar');
//            $ilosc[] = Session::get('liczba');
//
//            return view('client.makeorder')->with('pizza', $pizza)->with('cart', $cart)->with('rozm', $rozmiary)
//                ->with('ilosc', $ilosc);
//        }
//        else
//            return view('client.makeorder')->with('pizza', $pizza);
//    }
//
//    public function postAddToCart(Request $request)
//    {
//        $id[] = $request->session()->get('cart');
//        $rozm[] = $request->session()->get('rozmiar');
//        $il[] = $request->session()->get('liczba');
//
//        $request->session()->push('cart', $request->p_id);
//        $request->session()->push('rozmiar', $request->rozmiar);
//        $request->session()->push('liczba', $request->ilosc);
//
//        return redirect()->route('client.orderonline');
//    }

    public function getPizzaList()
    {
        $pizza = Pizza::all();

        $cart = Cart::session(Auth::id())->getContent();
        if(isset($cart))
        {
            return view('client.makeorder')->with('pizza', $pizza)->with('cart', $cart);
        }
        else
            return view('client.makeorder')->with('pizza', $pizza);
    }

    public function postAddToCart(Request $request)
    {
        $pizza = Pizza::find($request->p_id);
        $price = '';
        $rozmiar = '';
        switch ($request->size)
        {
            case 'small':
                $price = $pizza->price_small;
                $rozmiar = "Mała";
                $pid = $pizza->id + 100000;
            break;

            case 'medium':
                $price = $pizza->price_medium;
                $rozmiar = "Średnia";
                $pid = $pizza->id + 200000;
            break;

            case 'large':
                $price = $pizza->price_large;
                $rozmiar = "Duża";
                $pid = $pizza->id + 300000;
            break;
        }

        Cart::session(Auth::id())->add($pid, $pizza->name, $price,
                                       $request->quantity, array('size' => $rozmiar,
                                               'ingredients' => $pizza->ingredients));
        return redirect()->route('client.orderonline');
    }

    public function getRemoveFromCart($pid)
    {
        Cart::session(Auth::id())->remove($pid);
        return redirect()->route('client.orderonline');
    }

    public function getCancelCart()
    {
        Cart::session(Auth::id())->clear();

        return redirect()->route('client.dashboard');
    }

    public function getClearCart()
    {
        Cart::session(Auth::id())->clear();

        return redirect()->route('client.orderonline');
    }
}
