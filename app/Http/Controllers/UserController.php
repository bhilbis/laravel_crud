<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{
    //
    use AuthenticatesUsers;
    public function login()
    {
        return view ('page.login');
    }

    public function doLogin(Request $request)
    {
        $credential = $request->only('email', 'password');

        if (auth()->attempt($credential)){
            return redirect()->route("index");
        } else {
            return redirect()->route("login")->with("error","Email and password do not match with our records.");
        }
    }

   
    public function doLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logout Successfully');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
    ]);

        event(new Registered($user = $this->create($request->all())));

        auth()->login($user);

        return redirect()->route('login')->with('success', 'Your account has been registered and you are now logged in.');
    }

    protected function create(array $data)
    {
    return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
    ]);
    }

    public function showRegistrationForm()
    {
    return view('page.register');
    }

}
