<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Models\Local;
use Validator;
use Input;

class PromocionesController extends Controller
{
    public function index(){

        return view('Promocion.index');
      
   }
}
