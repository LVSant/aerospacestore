<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Request;

class EditUserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Edit User Controller
    |--------------------------------------------------------------------------
    |
    | this controller edits the user, dãã
    */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    public function showEditUserForm(){
            $user = Auth::user();

            return view('auth.edit')->with('user', $user);
        }


        public function updateuser(){

            $user = Auth::user();
            $name = Request::input('name');
            
            if($user->tipo=='J'){
                $localizacao = Request::input('localizacao');
                $user->localizacao = $localizacao;            
            }
            $user->name = $name;

            $user->save();

            return redirect('/');

        }
}
