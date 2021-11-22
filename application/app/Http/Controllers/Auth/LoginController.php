<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use anlutro\LaravelSettings\Facade as Setting;
use Illuminate\Support\Facades\Log;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    protected $maxAttempts;
    protected $decayMinutes;

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->maxAttempts = Setting::get('max_login_attempts', 3);
        $this->decayMinutes = Setting::get('lockout_delay', 2);
    }


    public function login(Request $request)
    {

        if ($request->has('is_guest')) {
            if ($request->is_guest == 1) {
                $user = User::where('email', 'like', 'user%')->first();

                // if (Auth::attempt(['email' => $user->email, 'password' => $user->password])) {
                if($user){
                    Auth::loginUsingID($user->id,true);
                    $userStatus = Auth::User()->status;
                    if($userStatus==1) {
                        return redirect()->intended(url('/home'));
                    }else{
                        //Auth::logout();
                        flash('Estas temporalmente bloqueado. por favor contacta al administrador')->warning();
                        return redirect()->route('login')->withInput();
                    }
                } else {
                    //if authentication is unsuccessfull, notice how I return json parameters
                    flash('Usuario o contraseña incorrecta. Por favor intenta nuevamente')->error();
                    return redirect()->route('login')->withInput();
                }
            }
        }

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            flash('¡Estàs bloqueado! Demasiado intentos. intenta nuevamente '. setting('lockout_delay') .' mintutes later.')->warning();
            return redirect()->route('login')->withInput();
            return $this->sendLockoutResponse($request);
        }

        $credentials = $request->only('email', 'password');
        if(Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $request->remember)){
            $userStatus = Auth::User()->status;
            if($userStatus==1) {
                return redirect()->intended(url('/home'));
            }else{
                Auth::logout();
                flash('Estas temporalmente bloqueado. por favor contacta al administrador')->warning();
                return redirect()->route('login')->withInput();
            }
        }
        else {
            $this->incrementLoginAttempts($request);
            flash('Usuario o contraseña incorrecta. Por favor intenta nuevamente')->error();
            return redirect()->route('login')->withInput();
        }
        
    }

    public function guest()
    {
        Log::debug("message");
        $user = User::where('email', '=', 'user@eor.com')->first();

        // if (Auth::attempt(['email' => $user->email, 'password' => $user->password])) {
        if($user){
            Auth::login($user);
            $userStatus = Auth::User()->status;
            if($userStatus==1) {
                return redirect()->intended(url('/home'));
            }else{
                Auth::logout();
                flash('Estas temporalmente bloqueado. por favor contacta al administrador')->warning();
                return redirect()->route('login')->withInput();
            }
        } else {
            //if authentication is unsuccessfull, notice how I return json parameters
            flash('Usuario o contraseña incorrecta. Por favor intenta nuevamente')->error();
            return redirect()->route('login')->withInput();
        }

        
    }

}
