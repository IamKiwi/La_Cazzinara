<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Order;
use App\Orderitem;
use App\Pizza;
use App\User;
use Carbon\Carbon;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Session;

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

    public function getPasswordChange()
    {
        return view('client.userpasschange');
    }

    public function getUserEdit()
    {
        $user = User::find(Auth::id());

        $user_address = explode(',', $user->address);
        $address = ['street' => $user_address[0],
                  'number' => $user_address[1],
                  'city' => str_replace(' ', '', $user_address[2]),
                  'zipcode' => str_replace(' ', '', $user_address[3])];

        return view('client.useredit')->with('user', $user)->with('user_addr', $address);
    }

    public function postPasswordChange(Request $request)
    {
        $user = User::where('id', '=', Auth::id())->first();

        $this->validate($request, [
            'current-password' => 'required',
            'new-password' => 'confirmed|required|string|min:6',
        ], [
            'current-password.required' => ':attribute jest wymagane',
            'new-password.required' => ':attribute jest wymagane',
            'new-password.confirmed' => 'Musisz potwierdzić nowe hasło',
            'new-password.min' => 'Nowe hasło musi składać się z min. 6 znaków'
        ], [
            'current-password' => 'Obecne hasło',
            'new-password' => 'Nowe hasło',
        ]);

        if(Hash::check($request->input('current-password'), $user->password) && $request->input('current-password') != '')
        {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->input('new-password'));
            $user->save();

            Session::flash('success', 'Hasło zostało pomyślnie zmienione');

            return redirect()->route('client.dashboard');
        }
        else
            return view('client.userpasschange')->withErrors(['error' => 'Obecne hasło jest niepoprawne']);
    }

    public function postUpdateUser(Request $request)
    {
        $user = User::find(Auth::id());

        $messages = ['name.required' => ':attribute jest wymagane',
                     'name.max' => ':attribute jest zbyt długie',
            'surname.required' => ':attribute jest wymagane',
            'surname.max' => ':attribute jest zbyt długie',
            'email.required' => ':attribute jest wymagany',
            'email.email' => ':attribute nie jest prawidłowym adresem e-mail',
            'email.max' => ':attribute jest zbyt długi',
            'phone_number.required' => ':attribute jest wymagany',];

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

    public function getPizzaList()
    {
        $pizza = Pizza::all();

        $cart = Cart::session(Auth::id())->getContent();
        if(isset($cart))
            return view('client.makeorder')->with('pizza', $pizza)->with('cart', $cart);
        else
            return view('client.makeorder')->with('pizza', $pizza);
    }

    public function getSearchPizza(Request $request)
    {
        $search = $request->get('search');
        $pizza = Pizza::where('name', 'like', '%'.$search.'%')->paginate(5);
        $cart = Cart::session(Auth::id())->getContent();
        if(isset($cart))
            return view('client.makeorder')->with('pizza', $pizza)->with('cart', $cart);
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
                                               'ingredients' => $pizza->ingredients,
                                               'id_pizza' => $pizza->id));
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

    public function getDoOrder()
    {
        if(Cart::session(Auth::id())->isEmpty())
            return Redirect::back()->withErrors(['msg' => 'Nie wybrałeś żadnej pizzy :(']);

        $cart = Cart::session(Auth::id())->getContent();
        return view('client.orderconfirmation')->with('cart', $cart);
    }

    public function getConfirmOrder()
    {
        Order::create([
            'id_user' => Auth::id(),
            'total_price' => Cart::session(Auth::id())->getTotal(),
            'status' => 'Oczekiwanie na potwierdzenie',
            'created_at' => Carbon::now('Europe/Warsaw')
        ]);

        $order = Order::where('id_user', Auth::id())->orderBy('created_at', 'desc')->first();
        $cart = Cart::session(Auth::id())->getContent();

        foreach ($cart as $item)
        {
            $order->orderitem()->create([
                'id_order' => $order->id,
                'id_pizza' => $item->attributes->id_pizza,
                'quantity' => $item->quantity,
                'size' => $item->attributes->size,
                'price' => $item->price,
                'created_at' => Carbon::now('Europe/Warsaw')
            ]);
        }

        Cart::session(Auth::id())->clear();
        return redirect()->route('client.ordered');
    }

    public function getOrderConfirmed()
    {
        $orderitems = Order::where('id_user', Auth::id())->orderBy('created_at', 'desc')->first()->orderitem;
        $order = Order::where('id_user', Auth::id())->orderBy('created_at', 'desc')->first();
        $pizzas = Orderitem::where('id_order', $order->id)->get();
        $pizza = [];

        foreach($pizzas as $p)
            $pizza [] = $p->pizza;

        return view('client.ordered')->with('order', $order)
                                           ->with('orderitem', $orderitems)
                                           ->with('pizza', $pizza);
    }

    public function getOrdersHistory()
    {
        $orderitems = Order::where('id_user', Auth::id())->orderBy('created_at', 'desc')->paginate(5);
        return view('client.ordershistory')->with('order', $orderitems);
    }

    public function getOrderDetails($id)
    {
        $orderdetails = Order::where('id', $id)->orderBy('created_at', 'desc')->first()->orderitem;
        $pizzas = Orderitem::where('id_order', $id)->get();

        foreach($pizzas as $p)
            $p->pizza;

        return view('client.ordershistorydetails')->with('orderdetails', $orderdetails);
    }

    public function getSendFeedback($id)
    {
        $order = Order::where('id', $id)->first();
        $oid = $order->id;
        return view('client.feedback')->with('oid', $oid);
    }

    public function getSeeFeedback($oid)
    {
        $feedback = Feedback::where('id_order', $oid)->first();
        return view('client.seefeedback')->with('feedback', $feedback);
    }

    public function postSaveFeedback(Request $request)
    {
        Feedback::create([
            'id_order' => $request->input('oid'),
            'id_user' => Auth::id(),
            'message' => $request->input('feedback'),
            'grade' => $request->input('grade'),
            'public' => $request->input('opinion_type'),
            'created_at' => Carbon::now('Europe/Warsaw'),
            'updated_at' => Carbon::now('Europe/Warsaw'),
        ]);

        Session::flash('success', 'Dziękujemy za Twoją opinię');

        return redirect()->route('client.history');
    }
}
