<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Local;
use Validator;
use Input;

class ProductoController extends Controller
{
    public function index(){

        $categoria= Categoria::select('id','nombre')
                ->whereNull('deleted_at')->get();


         return view('Producto.index', compact('categoria'));
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

    public function store(Request $request){
        $userid = \Auth::id();
        $local_per= Local::where("id_supervisor", $userid)
              ->select("id")
              ->whereNull("deleted_at")
              ->first();
        
        try {
            DB::beginTransaction();

            $id=Producto::insertGetId(
            [ 'nombre'=>$request->nombre,
              'descripcion'=>$request->descripcion,
              'id_categoria'=>$request->categoria,
              'costo'=>$request->costo,
              'precio'=>$request->precio,
              'unidad'=>$request->unidad,
              'existencia'=>$request->existencia,
              'descuento'=>$request->descuento,
              'tasa_iva'=>$request->iva,
              'url_imagen'=>'',
              'updated_at' =>now(),
              'created_at' =>now(),
              'id_local' => $local_per->id,
              'user_updated' => $userid

            ]);
            
            $id2=$id.'.png';

            if($archivo=$request->file('file')){
                $path= asset('images/prodcutos/'.$id2);
                $archivo->move('images/prodcutos', $id2);
            }

            else{
                $path=$request->url;
            }

            Producto::where('id', $id)
              ->update(['url_imagen' => $path==null?'':$path]);


            DB::commit();
                
            return response()->json(["sms"=>true,"mensaje"=>"Se creo correctamente"]);                    
        }catch(\Exception $e){

            DB::rollBack();
            return response()->json(["sms"=>false,"mensaje"=>$e->getMessage()]);                 
        }
    }

    public function consultar($id){
       $trae_prod=Producto::join('categoria','producto.id_categoria','=','categoria.id')
                          ->select('producto.*', 'categoria.nombre as nombrecate')
                          ->where('producto.id', $id)->first();

       return view("Producto.consultar", compact('trae_prod'));
    }

}
