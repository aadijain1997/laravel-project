<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Closure;
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
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;
    public function redirectTo()
    {
        switch(Auth::user()->role){
            case 'admin':
            return $this->redirectTo = '/admin';
                break;
            case 'author':
                return   $this->redirectTo = '/author';
                break;
            case 'reviewer':
                return $this->redirectTo = '/reviewer';
                break;
            case 'customer':
                 return   $this->redirectTo = '/customer';
                break;
            case 'reviewer1':
                return   $this->redirectTo = '/reviewer1';
                break;
            default:
                 return $this->redirectTo = '/login';
        }
         
    } 
    /**
     * Create a new controller instance.
     *
     * @return void
      */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
}
