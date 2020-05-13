<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\Auth\User;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('home')->with('candidatures', $user->candidatures);
    }
}
