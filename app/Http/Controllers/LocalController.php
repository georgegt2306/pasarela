<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Local;
use Validator;
use Input;

class LocalController extends Controller
{
    public function index(){
    return view('Local.index');
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


        $v = Validator::make($request->all(),[
              'codigo'=>"required|unique:".$cstring.".locales,codigo",
            ]);


        if($v->fails()){
          $mensajedereturn=strtoupper($v->errors()->first('codigo'));
          return response()->json(["sms"=>"e_codigo" ,"mensaje" => $mensajedereturn]);     
        }else{

          $codigofinal = verificarCodigo($request->codigo,'locales',$cstring,'codigo','id',$modulo,$ilca,$url);

    try {
        DB::beginTransaction();

        $id=DB::table('locales')->insertGetId(
        [ 'codigo'=>$codigofinal,
          'nombre'=>$request->nombre,
          'direccion'=>$request->direccion,
          'coordenadax'=>$request->coordenadax,
          'coordenaday'=>$request->coordenaday,
          'telefono'=>$request->telefono,
          'extension'=>$request->extension,
          'email'=>$request->email,
          'horas'=>$request->horas,
          'orden'=>$request->orden,
          'updated_at' =>date('Ymd H:i:s'),
          'created_at' =>date('Ymd H:i:s')
        ]);
        
        $id2=$id.'.png';

            if($archivo=$request->file('file')){
                $path= asset('images/local/'.$id2);
                $archivo->move('images/local', $id2);
            }

            else{
                $path=$request->url;
            }

           DB::table('locales')
              ->where('id', $id)
              ->update(['image' => $path==null?'':$path]);


           DB::commit();
            
            return response()->json(["sms"=>true,"mensaje"=>"Se creo correctamente"]);                    

          }catch(\Exception $e) 
          {
            DB::rollBack();
            return response()->json(["sms"=>false,"mensaje"=>$e->getMessage()]);                 
          }
        }
    }


}
