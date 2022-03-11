<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Models\Local;
use App\Models\Promocion;
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


          $result=Promocion::where("id_local", $local_per->id)
                ->whereNull('deleted_at')
                ->orderBy('id')
                ->get();
      

          $titulos = [];
          $titulos[] = array('title' => '');
          $titulos[] = array('title' => 'Acciones');
          $titulos[] = array('title' => 'Nombre');
          $titulos[] = array('title' => 'Precio');
          $titulos[] = array('title' => 'Fecha_ini');
          $titulos[] = array('title' => 'Fecha_fin');

          $jsonenv=[];
      
        foreach ($result as $res) {
  
         $boton_up=' <button  title="editar" class="btn btn-success" name="editar" onclick="mostrarmodal('.$res->id.');"><i class="fa fa-edit"></i> </button>';
    
         $boton_elim=' <button title="eliminar" class="btn btn-danger" name="eliminar" onclick="elim('.$res->id.');"><i class="fa fa-trash"></i> </button>';

         $error="'".asset('images/promocion.png')."'";

         $time = date("H:i:s");
         $imagen='<img src="'.$res->url_imagen.'?time='.$time.'" width="50" height="50" onerror="this.src='.$error.'" >';
         $button= $boton_up.''.$boton_elim;

         $jsonenvtemp = [$imagen,$button,$res->nombre,$res->precio,$res->fecha_ini,$res->fecha_fin];

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

            $id=Promocion::insertGetId(
            [ 'nombre'=>$request->nombre,
              'descripcion'=>$request->descripcion,
              'precio'=>$request->precio,
              'fecha_ini'=>$request->fecha_ini,
              'fecha_fin'=>$request->fecha_fin,
              'url_imagen'=>'',
              'id_local' => $local_per->id,
              'user_updated' => $userid

            ]);
            
            $id2=$id.'.png';

            if($archivo=$request->file('file')){
                $path= asset('images/promociones/'.$id2);
                $archivo->move('images/promociones', $id2);
            }

            else{
                $path=$request->url;
            }

            Promocion::where('id', $id)
              ->update(['url_imagen' => $path==null?'':$path]);


            DB::commit();
                
            return response()->json(["sms"=>true,"mensaje"=>"Se creo correctamente"]);                    
        }catch(\Exception $e){

            DB::rollBack();
            return response()->json(["sms"=>false,"mensaje"=>$e->getMessage()]);                 
        }
    }

    public function edit($id){
        $result_edit=Promocion::where('id',$id)->first();      
       
        return view('Promociones.edit', compact('result_edit'));
    }

    public function update(Request $request){
        $userid = \Auth::id(); 
        $path=$request->imagenanterior;

        if($archivo=$request->file('imagen_edit')){
            if(file_exists('images/promociones/'.$request->idunic.'.png')){
                unlink('images/promociones/'.$request->idunic.'.png'); 
            } 
            $path= asset('images/promociones/'.$request->idunic.'.png');
            $archivo->move('images/promociones', $request->idunic.'.png');
        } 

        if($request->url_edit != ''){
            if(file_exists('images/promociones/'.$request->idunic.'.png')){
                unlink('images/promociones/'.$request->idunic.'.png'); 
            } 
            $path=$request->url_edit;
        }

        try {
          DB::beginTransaction();
         
          $cons_insp_cab= Promocion::where('id', '=', $request->idunic)
          ->update(['updated_at' =>now(), 
              'nombre'=>$request->nombre_edit,
              'descripcion'=>$request->descripcion_edit,
              'fecha_ini'=>$request->fecha_ini_edit,
              'fecha_fin'=>$request->fecha_fin_edit,
              'precio'=>$request->precio_edit,
              'url_imagen' =>$path==null?'':$path,
              'user_updated' => $userid]);

            DB::commit();
                
            return response()->json(["sms"=>true,"mensaje"=>"Se edito correctamente"]);                

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(["sms"=>false,"mensaje"=>$e->getMessage()]);                 
        }
    }
    public function destroy($id){
        $userid = \Auth::id(); 
        try {

            DB::beginTransaction();

                Promocion::where('id', $id)->update([
                   'updated_at' =>now(),
                   'deleted_at' =>now(),
                   'user_updated' => $userid
                ]);

            DB::commit();
        
            return response()->json(["sms"=>true,"mensaje"=>"Se elimino correctamente"]);

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(["sms"=>false,"mensaje"=>$e->getMessage()]);                 
      }
    }    

}
