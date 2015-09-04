<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

class AuthController extends Controller
{

//  protected $redirectPath = '/';
  /**
   * Handle an authentication attempt.
   *
   * @return Response
   */
  public function authenticate(Request $request)
  {
    /*
    if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
        // Authentication passed...
        return redirect()->intended('dashboard');
    }
     */
    $this->validate($request, [
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials, $request->has('remember'))) {
      return redirect(app('session')->pull('url.intended','/'));
    }

    $request->session()->flash('error', 'Mauvais email ou mot de passe.');
    return view('auth.login');
    //return redirect('/login')->withInput($request->except('password'));
//    return ['result' => 'not ok'];
  }

  public function login() {
    if(Auth::check())
      return redirect('/');

    return view('auth.login');  
  }

  public function logout() {
    Auth::logout();
    return redirect('/');
  }
}
