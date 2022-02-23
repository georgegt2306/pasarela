<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Models\User;
use Validator;

class SupervisorController extends Controller
{
   public function index(){
    return view('Supervisor.index');
   }

   public function consulta_data(){
      $result=User::where('id_tipo','2')
            ->whereNull('deleted_at')
            ->orderBy('id')
            ->get();

         $jsonenv=[];
        foreach ($result as $res) {
   
         $boton_up=' <button  title="editar" class="btn btn-success" name="editar" onclick="mostrarmodal('.$res->id.');"><i class="fa fa-edit"></i> </button>';
    
         $boton_elim=' <button title="eliminar" class="btn btn-danger" name="eliminar" onclick="elim('.$res->id.');"><i class="fa fa-trash"></i> </button>';
   
         $button= $boton_up.''.$boton_elim;

         $jsonenvtemp = ['',$button,$res->ci_ruc,$res->nombre,$res->apellido,$res->email,$res->direccion];

          array_push($jsonenv, $jsonenvtemp);
        }

       return response()->json(["sms"=> $jsonenv]);   
   }

   public function store(Request $request){
      $userid = \Auth::id();

      $validator=User::where([['email','=',$request->email_sup],['id_tipo','=','2']])
      ->whereNull('deleted_at')
      ->count();

      if($validator==1){
         return response()->json(["sms"=>false,"mensaje"=>"Email ya existe"]);
      }
      try {
         DB::beginTransaction();
         User::create([
            'id_tipo' => '2',
            'ci_ruc' => $request->ci_ruc,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email_sup,
            'password' => Hash::make($request->contra),
            'direccion' => $request->direccion,
            'user_updated' => $userid,
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
      return view('Supervisor.edit', compact('result_edit'));
   }
}
