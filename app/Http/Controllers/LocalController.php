<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Local;
use App\Models\User;
use Validator;
use Input;

class LocalController extends Controller
{
    public function index(){

     $supervisor= User::where('id_tipo','2')
                  ->select('id', 'nombre')
                  ->whereNull('deleted_at')
                  ->get();
    
    $lisup=[];

    foreach ($supervisor as $sup) {
        $local= Local::where('id_supervisor', $sup->id)
                ->select('id_supervisor')
                ->whereNull('deleted_at')
                ->count();


         if($local!=1){
            array_push($lisup, [$sup->id, $sup->nombre]);
         }     

    }

    
    return view('Local.index',compact('lisup'));
   }
   public function consulta_data(){

      $result=Local::join('user','local.id_supervisor','=','user.id')
            ->select('local.*', 'user.nombre as nombre_super')
            ->whereNull('local.deleted_at')
            ->orderBy('local.id')
            ->get();
      
      $titulos = [];
      $titulos[] = array('title' => '');
      $titulos[] = array('title' => 'Acciones');
      $titulos[] = array('title' => 'Dueño');
      $titulos[] = array('title' => 'Ruc');
      $titulos[] = array('title' => 'Nombre');
      $titulos[] = array('title' => 'Telefono');
      $titulos[] = array('title' => 'Direccion');
      $titulos[] = array('title' => 'Coordenadas');


      $jsonenv=[];
      
        foreach ($result as $res) {
          
         $boton_up=' <button  title="editar" class="btn btn-success" name="editar" onclick="mostrarmodal('.$res->id.');"><i class="fa fa-edit"></i> </button>';
    
         $boton_elim=' <button title="eliminar" class="btn btn-danger" name="eliminar" onclick="elim('.$res->id.');"><i class="fa fa-trash"></i> </button>';


         $error="'".'https://www.publicdomainpictures.net/pictures/280000/nahled/not-found-image-15383864787lu.jpg'."'";

         $imagen='<img src="'.$res->url_image.'" width="50" heigth="50" onerror="this.src='.$error.'" >';
   
         $button= $boton_up.''.$boton_elim;

         $jsonenvtemp = [$imagen,$button,$res->nombre_super,$res->ruc,$res->nombre,$res->telefono,$res->direccion, $res->latitud.'-'.$res->longitud];

          array_push($jsonenv, $jsonenvtemp);
        }

       return response()->json(["sms"=> $jsonenv, "titulos"=>$titulos]);   
   }

    public function store(Request $request){
        $userid = \Auth::id();

        $v = Validator::make($request->all(),[
              'ruc'=>"required|unique:.local,ruc",
            ]);


        if($v->fails()){
          $mensajedereturn=strtoupper($v->errors()->first('ruc'));

          return response()->json(["sms"=>false ,"mensaje" => $mensajedereturn]);     
        }


        try {
            DB::beginTransaction();

            $id=Local::insertGetId(
            [ 'ruc'=>$request->ruc,
              'id_supervisor'=>$request->superv,
              'nombre'=>$request->nombre,
              'descripcion'=>$request->descripcion,
              'telefono'=>$request->telefono,
              'direccion'=>$request->direccion,
              'latitud'=>$request->latitud,
              'longitud'=>$request->longitud,
              'url_image'=>'',
              'updated_at' =>now(),
              'created_at' =>now(),
              'id_admin' => $userid,
              'user_updated' => $userid

            ]);
            
            $id2=$id.'.png';

                if($archivo=$request->file('file')){
                    $path= asset('images/local/'.$id2);
                    $archivo->move('images/local', $id2);
                }

                else{
                    $path=$request->url;
                }

               Local::where('id', $id)
                  ->update(['url_image' => $path==null?'':$path]);


               DB::commit();
                
                return response()->json(["sms"=>true,"mensaje"=>"Se creo correctamente"]);                    

              }catch(\Exception $e) 
              {
                DB::rollBack();
                return response()->json(["sms"=>false,"mensaje"=>$e->getMessage()]);                 
              }
        
    }


}
