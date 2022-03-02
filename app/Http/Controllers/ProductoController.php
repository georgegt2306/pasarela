<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Models\User;
use App\Models\Local;
use App\Models\Vend_local;
use Validator;
use Input;

class ProductoController extends Controller
{
    public function index(){
      $userid = \Auth::id();
      $local_per= Local::where("id_supervisor", $userid)
                  ->select("id")
                  ->whereNull("deleted_at")
                  ->count();
      

      if ($local_per==0) {
        return back()->with('error', 'Supervisor no tiene Local');
      }else{
         return view('Vendedor.index');
      }
   }
}
