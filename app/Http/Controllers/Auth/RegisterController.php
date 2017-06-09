<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Request;
use Hash;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

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
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function showDealerRegistrationForm(){
        return view('auth.registerdealer');

    }

    public function register(){
        /*$name = Request::input('name');
        $email = Request::input('email');
        $password = Request::input('password');
*/
         $rules = array(
        'name'             => 'required',                        
        'email'            => 'required|email|unique:users',     
        'password'         => 'required',
        'passwordconfirm' => 'required|same:password');

         $messages = array(
         	'required' => 'O campo :attribute é de preenchimento obrigatório',
         	'same' => 'Deve ser igual a senha',
         	'unique' => 'Este e-mail já esta cadastrado em nossa base de dados'
         	);
        

$validator = Validator::make(Request::all(), $rules, $messages);
  if ($validator->fails()) {

        $messages = $validator->messages();

        return redirect('register')->withInput()->withErrors($validator);

    } else {
        
        $user = new User;
        $user->name     = Request::input('name');
        $user->email    = Request::input('email');
        $user->tipo    = Request::input('tipo');
        if($user->tipo == 'J')
        $user->localizacao    = Request::input('localizacao', null);
        $user->password = Hash::make(Request::input('password'));
        $user->save();
        
        return redirect('/')->withInput();

		}
	}
}