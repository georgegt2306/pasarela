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

        return view('Promociones.index');
      
   }
   public function consulta_data(){
        $userid = \Auth::id();
          $local_per= Local::where("id_supervisor", $userid)
              ->select("id")
              ->whereNull("deleted_at")
              ->first();


          $result=Producto::join('categoria','producto.id_categoria','=','categoria.id')
                ->select('producto.*', 'categoria.nombre as nombre_categoria')
                ->where("id_local", $local_per->id)
                ->whereNull('producto.deleted_at')
                ->orderBy('producto.id')
                ->get();
      

          $titulos = [];
          $titulos[] = array('title' => '');
          $titulos[] = array('title' => 'Acciones');
          $titulos[] = array('title' => 'Nombre');
          $titulos[] = array('title' => 'Categoria');
          $titulos[] = array('title' => 'Costo');
          $titulos[] = array('title' => 'Precio');
          $titulos[] = array('title' => 'Existencia');

          $jsonenv=[];
      
        foreach ($result as $res) {

         $boton_cons=' <button title="consultar" class="btn btn-info" name="consultar" onclick="mostrarconsul('.$res->id.');"><i class="fa fa-search"></i> </button>';
  
         $boton_up=' <button  title="editar" class="btn btn-success" name="editar" onclick="mostrarmodal('.$res->id.');"><i class="fa fa-edit"></i> </button>';
    
         $boton_elim=' <button title="eliminar" class="btn btn-danger" name="eliminar" onclick="elim('.$res->id.');"><i class="fa fa-trash"></i> </button>';

   
         $button= $boton_cons.''.$boton_up.''.$boton_elim;

         $jsonenvtemp = ['',$button,$res->nombre,$res->nombre_categoria,$res->costo,$res->precio,$res->existencia];

          array_push($jsonenv, $jsonenvtemp);
        }

       return response()->json(["sms"=> $jsonenv, "titulos"=>$titulos]);   
   }
}
