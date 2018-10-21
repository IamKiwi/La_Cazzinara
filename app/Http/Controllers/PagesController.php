<?php

namespace App\Http\Controllers;

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
}