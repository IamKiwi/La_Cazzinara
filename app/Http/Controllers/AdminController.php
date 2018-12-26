<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Order;
use App\Orderitem;
use App\Pizza;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Session;
use Khill\Lavacharts\Lavacharts;

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

    /********************************************** Zarządzanie pizzami **********************************************/
    public function getPizzaList()
    {
        $pizza = Pizza::withTrashed()->paginate(5);
        return view('admin.pizzalist')->with('pizza', $pizza);
    }

    public function getSearchPizza(Request $request)
    {
        $search = $request->get('search');
        $search2 = $request->get('search2');
        $pizza = Pizza::where('name', 'like', '%'.$search.'%')->
                        where('ingredients', 'like', '%'.$search2.'%')->
                        withTrashed()->
                        paginate(5);
        return view('admin.pizzalist')->with('pizza', $pizza);
    }

    public function getAddPizza()
    {
        return view('admin.pizzaedit')->with('pizza', null);
    }

    public function postSavePizza(Request $request)
    {
        // Validate data
        $niceAttrNames = [
            'name' => 'Nazwa',
            'price_small' => 'Cena mała',
            'price_medium' => 'Cena średnia',
            'price_large' => 'Cena duża',
            'ingredients' => 'Składniki'
        ];

        $this->validate($request, [
            'name' => 'required|max:255',
            'price_small' => 'required|numeric',
            'price_medium' => 'required|numeric',
            'price_large' => 'required|numeric',
            'ingredients' => 'required|unique:pizzas,ingredients'
        ], ['required' => 'Pole :attribute jest wymagane',
            'numeric' => ':attribute musi być liczbą',
            'unique' => 'Wygląda na to, że w bazie istnieje już pizza z takimi składnikami'], $niceAttrNames);

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

        $niceAttrNames = [
            'name' => 'Nazwa',
            'price_small' => 'Cena mała',
            'price_medium' => 'Cena średnia',
            'price_large' => 'Cena duża',
            'ingredients' => 'Składniki'
        ];

        $this->validate($request, [
            'name' => 'required|max:255',
            'price_small' => 'required|numeric',
            'price_medium' => 'required|numeric',
            'price_large' => 'required|numeric',
            'ingredients' => 'required'
        ], ['required' => 'Pole :attribute jest wymagane',
             'numeric' => ':attribute musi być liczbą z przecinkiem'], $niceAttrNames);

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
        Session::flash('success', 'Pizza została usunięta z naszej oferty');

        return redirect()->route('admin.pizzalist');
    }

    public function getRestorePizza($id)
    {
        Pizza::withTrashed()->find($id)->restore();
        Session::flash('success', 'Pizza została przywrócona do naszej oferty');

        return redirect()->route('admin.pizzalist');
    }

    public function getPizzaEdit($id)
    {
        $pizza = Pizza::find($id);

        return view('admin.pizzaedit')->with('pizza', $pizza);
    }
    /********************************************** /Zarządzanie pizzami *********************************************/

    public function getUserList()
    {
        $users = User::withTrashed()->get();
        return view('admin.userlist')->with('users', $users);
    }

    public function getSearchUsers(Request $request)
    {
        $email = $request->get('email');
        $name = $request->get('name');
        $surname = $request->get('surname');
        $address = $request->get('address');
        $phone = $request->get('phone');

        $users = User::where('email', 'like', $email.'%')->
                        where('name', 'like', $name.'%')->
                        where('surname', 'like', $surname.'%')->
                        where('address', 'like', '%'.$address.'%')->
                        where('phone_number', 'like', $phone.'%')->withTrashed()->paginate(5);
        $request->flash();
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
        Session::flash('success', 'Aktualizacja danych przebiegła pomyślnie');

        return redirect()->route('admin.userlist');
    }

    public function getDeleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('success', 'Konto użytkownika zostało deaktywowane');

        return redirect()->route('admin.userlist');
    }

    public function getRestoreUser($id)
    {
        User::withTrashed()->find($id)->restore();
        Session::flash('success', 'Konto użytkownika zostało przywrócone');

        return redirect()->route('admin.userlist');
    }
    /******************************************** Zarządzanie zamówieniami ********************************************/
    public function getOrdersTrack()
    {
        $order = Order::withTrashed()->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.orderstrack')->with('order', $order);
    }

    public function getOrderDetails($id)
    {
        $orderdetails = Order::withTrashed()->where('id', $id)->orderBy('created_at', 'desc')->first()->orderitem;
        return view('admin.orderstrackdetails')->with('orderdetails', $orderdetails);
    }

    public function getSearchOrders(Request $request)
    {
        $id = $request->get('id');
        $status = $request->get('status');
        $address = $request->get('address');
        $phone = $request->get('phone');

        if($id === null)
        {
            $order = Order::where('status', 'like', '%'.$status.'%')->
            whereHas('user', function($query) use(&$address, &$phone){
                $query->where('address', 'like', '%'.$address.'%')->where('phone_number', 'like', $phone.'%');
            })->
            orderBy('created_at', 'desc')->
            paginate(5);
        }
        else
        {
            $order = Order::where('id', 'like', $id)->
            where('status', 'like', '%'.$status.'%')->
            whereHas('user', function($query) use(&$address, &$phone){
                $query->where('address', 'like', '%'.$address.'%')->where('phone_number', 'like', $phone.'%');
            })->
            orderBy('created_at', 'desc')->
            paginate(5);
        }

        return view('admin.orderstrack')->with('order', $order);
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
    /******************************************** /Zarządzanie zamówieniami *******************************************/

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
        $feedback = Feedback::withTrashed()->orderBy('created_at', 'desc')->paginate(5);

        $feedbackStats = [];
        foreach(['positive', 'neutral', 'negative'] as $g)
            $feedbackStats [] = Feedback::where('grade', $g)->count();

        return view('admin.feedbacks')->with('feedback', $feedback)->with('fs', $feedbackStats);
    }

    public function getSearchFeedbacks(Request $request)
    {
        $user = $request->get('user');
        $grade = $request->get('grade');
        $public = $request->get('public');

        $feedback = Feedback::where('grade', 'like', $grade.'%')->
        where('public', 'like', $public.'%')->
        whereHas('user', function($query) use(&$user){
            $query->where('name', 'like', '%'.$user.'%')->orwhere('surname', 'like', '%'.$user.'%');
        })->orderBy('created_at', 'desc')->paginate(5);

        $feedbackStats = [];
        foreach(['positive', 'neutral', 'negative'] as $g)
            $feedbackStats [] = Feedback::where('grade', $g)->count();
        $request->flash();

        return view('admin.feedbacks')->with('feedback', $feedback)->with('fs', $feedbackStats);
    }

    public function getSeeFeedback($id)
    {
        $feedback = Feedback::find($id);
        return Response::json($feedback);
    }

    public function getStats()
    {
        $mostOftenOrdered = DB::table('orderitems')->selectRaw('id_pizza, count(id_pizza) as c_ip')->groupBy('id_pizza')->get();
        $rejected = Order::where('status', 'Odrzucone')->count();
        $accepted = Order::where('status', 'Zrealizowane')->count();

        $pizza_ids = [];
        foreach ($mostOftenOrdered as $pid)
            $pizza_ids [] = $pid->id_pizza;

        $pizzas = Pizza::withTrashed()->find($pizza_ids);
        $pi = [];

        foreach ($pizzas as $p)
            $pi [] = $p->name;

        $moo = \Lava::DataTable();
        $moo->addStringColumn('Pizza')
            ->addNumberColumn('Ilość');

        $i = 0;
        foreach ($mostOftenOrdered as $x)
        {
            $moo->addRow([$pi[$i], $x->c_ip]);
            $i++;
        }

        \Lava::BarChart('Pizzas', $moo, [
            'title' => 'Najczęściej kupowane pizze',
            'vAxis' => ['format' => ''],
            'hAxis' => ['format' => '', 'ticks' => [0, 5, 10, 15, 20, 25, 30, 35, 40]],
            'bars' => 'horizontal',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);
        //=============================================================================================================
        $ordersStats = \Lava::DataTable();
        $ordersStats->addStringColumn('Zamówienie')
                    ->addNumberColumn('Liczba')
                    ->addRow(['Odrzucone', $rejected])
                    ->addRow(['Zrealizowane', $accepted]);

        \Lava::BarChart('OStats', $ordersStats, [
            'title' => 'Status zamówień',
            'vAxis' => ['format' => ''],
            'hAxis' => ['format' => '', 'ticks' => [0, 5, 10, 15, 20, 25, 30, 35, 40]],
            'bars' => 'horizontal',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);
        //=============================================================================================================
        $mostActive = DB::table('orders')->selectRaw('id_user, count(id_user) as c_iu')
                                               ->groupBy('id_user')->get();

        $user_ids = [];
        foreach ($mostActive as $aid)
            $user_ids [] = $aid->id_user;

        $user = User::withTrashed()->find($user_ids);
        $us = [];

        foreach ($user as $u)
            $us [] = $u->name;

        $ma = \Lava::DataTable();
        $ma->addStringColumn('User')
            ->addNumberColumn('Ilość');

        $i = 0;
        foreach ($mostActive as $x)
        {
            $ma->addRow([$us[$i], $x->c_iu]);
            $i++;
        }

        \Lava::BarChart('Users', $ma, [
            'title' => 'Zamówienia użytkowników',
            'vAxis' => ['format' => ''],
            'hAxis' => ['format' => '', 'ticks' => [0, 5, 10, 15, 20, 25, 30, 35, 40]],
            'bars' => 'horizontal',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);

        return view('admin.stats');
    }
}
