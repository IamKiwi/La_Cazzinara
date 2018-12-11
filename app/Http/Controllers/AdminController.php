<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Order;
use App\Orderitem;
use App\Pizza;
use App\User;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getAdminPanel()
    {
        return view('admin.adminpanel');
    }

    public function getPizzaList()
    {
        $pizza = Pizza::paginate(5);

        return view('admin.pizzalist')->with('pizza', $pizza);
    }

    public function getAddPizza()
    {
        return view('admin.pizzaedit')->with('pizza', null);
    }

    public function postSavePizza(Request $request)
    {
        // Validate data
        $this->validate($request, array(
            'name' => 'required|max:255',
            'price_small' => 'required|min:4|max:5',
            'price_medium' => 'required|min:4|max:5',
            'price_large' => 'required|min:4|max:5',
            'ingredients' => 'required'
        ));

        // Store in DB
        $pizza = new Pizza;
        $pizza->name = $request->name;
        $pizza->price_small = $request->price_small;
        $pizza->price_medium = $request->price_medium;
        $pizza->price_large = $request->price_large;
        $pizza->ingredients = $request->ingredients;

        $pizza->save();
        Session::flash('success', 'Pomyślnie dodano pizze do bazy danych :)');

        return redirect()->route('admin.pizzalist');
    }

    public function postUpdatePizza(Request $request, $id)
    {
        $pizza = Pizza::find($id);

        $this->validate($request, array(
            'name' => 'required|max:255',
            'price_small' => 'required|min:4|max:5',
            'price_medium' => 'required|min:4|max:5',
            'price_large' => 'required|min:4|max:5',
            'ingredients' => 'required'
        ));

        $pizza->name = $request->name;
        $pizza->price_small = $request->price_small;
        $pizza->price_medium = $request->price_medium;
        $pizza->price_large = $request->price_large;
        $pizza->ingredients = $request->ingredients;

        $pizza->save();
        Session::flash('success', 'Aktualizacja danych przebiegła pomyślnie :)');

        return redirect()->route('admin.pizzalist');
    }

    public function getDeletePizza($id)
    {
        $pizza = Pizza::find($id);
        $pizza->delete();
        Session::flash('success', 'Pizza została poprawnie usunięta z bazy danych');

        return redirect()->route('admin.pizzalist');
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
        $user_address = explode(',', $user->address);
        $address = ['street' => $user_address[0],
                  'number' => $user_address[1],
                  'city' => str_replace(' ', '', $user_address[2]),
                  'zipcode' => str_replace(' ', '', $user_address[3])];

        return view('admin.useredit')->with('user', $user)->with('address', $address);
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
        $user->sex = $request->sex;
        $user->date_of_birth = $request->date_of_birth;
        $user->address = $request->street.', '.$request->number.', '.$request->city.', '.$request->zipcode;
        $user->save();
        Session::flash('success', 'Aktualizacja danych przebiegła pomyślnie :)');

        return redirect()->route('admin.userlist');
    }

    public function getDeleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('success', 'Użytkownik został poprawnie usunięty z bazy danych :)');

        return redirect()->route('admin.userlist');
    }

    public function getOrdersTrack()
    {
        $order = Order::orderBy('created_at', 'desc')->get();

        foreach ($order as $o)
            $o->user;

        return view('admin.orderstrack')->with('order', $order);
    }

    public function getOrderDetails($id)
    {
        $orderdetails = Order::where('id', $id)->orderBy('created_at', 'desc')->first()->orderitem;
        $pizzas = Orderitem::where('id_order', $id)->get();

        foreach($pizzas as $p)
            $p->pizza;

        return view('admin.orderstrackdetails')->with('orderdetails', $orderdetails);
    }

    public function getAcceptOrder($id)
    {
        $order = Order::find($id);
        $order->status = "W trakcie realizacji";
        $order->save();

        return redirect()->route('admin.orderstrack');
    }

    public function getRejectOrder($id)
    {
        $order = Order::find($id);
        $order->status = "Odrzucone";
        $order->save();

        return redirect()->route('admin.orderstrack');
    }

    public function getRefuseOrder($id)
    {
        $order = Order::find($id);
        $order->status = "Odmówione";
        $order->save();

        return redirect()->route('admin.orderstrack');
    }

    public function getOrderDone($id)
    {
        $order = Order::find($id);
        $order->status = "Zrealizowane";
        $order->save();

        return redirect()->route('admin.orderstrack');
    }

    public function getOrderPrepared($id)
    {
        $order = Order::find($id);
        $order->status = "Gotowe";
        $order->save();

        return redirect()->route('admin.orderstrack');
    }

    public function getDeleteOrder($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->route('admin.orderstrack');
    }

    public function getFinances()
    {
        $lossStatuses = ['Odmówione', 'Odrzucone'];
        $loss = Order::whereIn('status', $lossStatuses)->sum('total_price');

        $net = Order::where('status', 'Zrealizowane')->sum('total_price');

        $balance = $net - $loss;

        return view('admin.finances')->with('net', $net)
                                           ->with('loss', $loss)
                                           ->with('balance', $balance);
    }

    public function getFeedbacks()
    {
        $feedback = Feedback::orderBy('id', 'desc')->get();

        foreach ($feedback as $f)
            error_log(''.$f->order);

        return view('admin.feedbacks')->with('feedback', $feedback);
    }
}
