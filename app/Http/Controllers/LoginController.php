<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
      //  $this->middleware('guest:admin')->except('logout');
    }

   
    public function login(Request $request)
    {
        $inputVal = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']))) {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.route');
            } else {

                return redirect()->route('pages.admin');
            }
        } else {
            return redirect()->route('login')->with('Error', 'Email / password wrong');
        }
    }
}
