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

class VendedorController extends Controller
{
   public function index(){
      return view('Vendedor.index');

   }

   public function consulta_data(){
      $userid = \Auth::id();
      $local_per= Local::where("id_supervisor", $userid)
                  ->select("id")
                  ->whereNull("deleted_at")
                  ->first();

      $result=User::join('vend_local', 'user.id','=','vend_local.id_vendedor')
            ->select("user.*", "vend_local.id_local as local")
            ->where('vend_local.id_local', $local_per->id)
            ->whereNull('user.deleted_at')
            ->orderBy('id')
            ->get();
      

      $titulos = [];
      $titulos[] = array('title' => '');
      $titulos[] = array('title' => 'Acciones');
      $titulos[] = array('title' => 'CI');
      $titulos[] = array('title' => 'Nombre');
      $titulos[] = array('title' => 'Apellido');
      $titulos[] = array('title' => 'Email');
      $titulos[] = array('title' => 'Dirección');


      $jsonenv=[];
      
        foreach ($result as $res) {
   
         $boton_up=' <button  title="editar" class="btn btn-success" name="editar" onclick="mostrarmodal('.$res->id.');"><i class="fa fa-edit"></i> </button>';
    
         $boton_elim=' <button title="eliminar" class="btn btn-danger" name="eliminar" onclick="elim('.$res->id.');"><i class="fa fa-trash"></i> </button>';
   
         $button= $boton_up.''.$boton_elim;

         $imagen='<img src="'.asset('dist/img/user.png').'" width="30" heigth="30">';

         $jsonenvtemp = [$imagen,$button,$res->ci_ruc,$res->nombre,$res->apellido,$res->email,$res->direccion];

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


      $v = Validator::make($request->all(),[
        'email'=>"required|unique:user,email",
      ]);

      if($v->fails()){
         $mensajedereturn=strtoupper($v->errors()->first('email'));
         return response()->json(["sms"=>false ,"mensaje" => $mensajedereturn]);     
      }


      try {
         DB::beginTransaction();
            
         $id_vendedor=User::insertGetId([
                        'id_tipo' => '3',
                        'ci_ruc' => $request->ci_ruc,
                        'nombre' => $request->nombre,
                        'apellido' => $request->apellido,
                        'email' => $request->email,
                        'password' => Hash::make($request->contra),
                        'direccion' => $request->direccion,
                        'updated_at' =>now(),
                        'created_at' =>now(),
                        'user_updated' => $userid
                     ]);

         Vend_local::create([
            'id_local' => $local_per->id,
            'id_vendedor' => $id_vendedor,
            'user_updated' => $userid
         ]);
         DB::commit();
         
         return response()->json(["sms"=>true, "mensaje"=>"Se creo correctamente"]);

      }catch(\Exception $e){
         DB::rollBack();
         return response()->json(["sms"=>false,"mensaje"=>$e->getMessage()]);           
      }
   }

   public function edit($id){
      $result_edit=User::where('id',$id)->first();

      return view('Vendedor.edit', compact('result_edit','id'));
   }

   public function update($id){
      $userid = \Auth::id();

      try {
         DB::beginTransaction();
            User::where('id', $id)->update([
               'ci_ruc' => Input::get('ci_ruc_edit'),
               'nombre' => Input::get('nombre_edit'),
               'apellido' => Input::get('apellido_edit'),
               'direccion' => Input::get('direccion_edit'),
               'user_updated' => $userid
            ]);
         DB::commit();
         return response()->json(["sms"=>true, "mensaje"=>"Se edito correctamente"]);
      }catch(\Exception $e){
         DB::rollBack();
         return response()->json(["sms"=>false,"mensaje"=>$e->getMessage()]);           
      }
     
   }
   public function destroy($id){
      $userid = \Auth::id();
      try 
          {
            DB::beginTransaction();

            User::where('id', $id)->update([
               'updated_at' =>now(),
               'deleted_at' =>now(),
               'user_updated' => $userid
            ]);

       DB::commit();
        
        return response()->json(["sms"=>true,"mensaje"=>"Se elimino correctamente"]);

      }catch(\Exception $e) 
      {
        DB::rollBack();
        return response()->json(["sms"=>false,"mensaje"=>$e->getMessage()]);                 
      }
   }
}
