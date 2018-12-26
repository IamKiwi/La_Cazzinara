<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'name.required' => 'Musisz podać swoje imię',
            'name.max' => 'Imię jest zbyt długie',
            'surname.required' => 'Musisz podać swoje nazwisko',
            'surname.max' => 'Nazwisko jest zbyt długie',
            'email.required' => 'Musisz podać adres e-mail',
            'email.email' => 'Nieprawidłowy format adresu e-mail',
            'email.max' => 'E-mail jest zbyt długi',
            'email.unique' => 'Konto o podanym e-mailu już istnieje',
            'password.required' => 'Musisz podać hasło',
            'password.confirmed' => 'Musisz potwierdzić hasło',
            'password.min' => 'Hasło musi składać się z conajmniej 6 znaków',
            'phone_number.required' => 'Musisz podać numer telefonu',
            'phone_number.digits_between' => 'Numer telefonu jest nieprawidłowy',
            'phone_number.numeric' => 'Numer telefonu musi składać się z cyfr',
            'date_of_birth.dateformat' => 'Nieprawidłowa data lub nieprawidłowy format daty',
            'street.required' => 'Musisz podać ulicę',
            'number.required' => 'Musisz podać numer domu/mieszkania',
            'city.required' => 'Musisz podać miasto',
            'zipcode.required' => 'Musisz podać kod pocztowy'
        ];

        return Validator::make($data, [
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone_number' => 'required|numeric|digits_between:8,10',
            'date_of_birth' => 'nullable|dateformat:Y-m-d',
            'street' => 'required|string',
            'number' => 'required|string',
            'city' => 'required|string',
            'zipcode' => 'required|alpha_dash'
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_number' => $data['phone_number'],
            'address' => $data['street'].', '.$data['number'].', '.$data['city'].', '.$data['zipcode'],
            'sex' => $data['sex'],
            'date_of_birth' => $data['date_of_birth'],
        ]);
    }
}
