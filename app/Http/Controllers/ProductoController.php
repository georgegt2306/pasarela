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

         return view('Producto.index');
   }
}
