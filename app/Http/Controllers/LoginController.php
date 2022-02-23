<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Hash;
use Session;
use App\Models\User;
use Validator;
use Auth;
use DB;

class LoginController extends Controller
{
    use AuthenticatesUsers;

  public function __construct(Request $request)
  {
    $this->middleware('guest', ['except' => 'logout']);
   
  }


    public function ingresar(Request $request)
    {

        $result=DB::table('user')
          ->where([['email', '=', $request->email]])
          ->whereNull('deleted_at')
          ->first();

      
        if (is_null($result)) {
           return response()->json(["sms"=>false,"mensaje"=>"Credenciales invalidas"]);
        } else{
              if ($result->id_tipo==1 || $result->id_tipo==2) {
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                      $request->session()->regenerate();
                      return response()->json(["sms"=>true,"mensaje"=>"Ingreso Correcto"]);
                }else{
                  return response()->json(["sms"=>false,"mensaje"=>"Credenciales invalidas"]);
                }
              }else{
                return response()->json(["sms"=>false,"mensaje"=>"Credenciales invalidas"]);
              }
        }
    }



    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
         return response()->json(["sms"=>true,"mensaje"=>"Ingreso Correcto"]);
    }

}
