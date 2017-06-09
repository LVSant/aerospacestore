<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User as User;
use Auth;
use Validator;
use Request;

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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public

    function __construct()
        {
        $this->middleware('guest', ['except' => 'logout']);
        }

    public function logout(){            
            Auth::logout();
            return redirect('/');
    }
            

    public function showLoginForm()
        {
        if (!Auth::check())
            {
            return view('auth.login');
            }
          else
            {
            return redirect('/');
            }
        }

    public function login() {

//$query=  User::where();

        $rules = array(
            'email' => 'required|email', // required and must be unique in the ducks
            'password' => 'required');

        $messages = array(
            'required' => 'O campo :attribute é de preenchimento obrigatório',
            'email' => 'E-mail deve ser válido');

        $validator = Validator::make(Request::all() , $rules, $messages);


        $email = Request::input('email');
        $password = Request::input('password');

        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect('/login')->withInput()->withErrors($validator);
        } else {

            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                    return redirect('/')->withInput();
                } else {
                    $errors = array(                
                    'password' => 'Senha e/ou Login incorretos');

                    return redirect('/login')->withInput()->withErrors($errors);
                }
            }
        }

    }