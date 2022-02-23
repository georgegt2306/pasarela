<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */
    "Home" => ":Inicio.",
    "accepted"         => ":attribute debe ser aceptado.",
    "active_url"       => ":attribute no es una URL válida.",
    "after"            => ":attribute debe ser una fecha posterior a :date.",
    "alpha"            => ":attribute solo debe contener letras.",
    "alpha_dash"       => ":attribute solo debe contener letras, números y guiones.",
    "alpha_num"        => ":attribute solo debe contener letras y números.",
    "array"            => ":attribute debe ser un conjunto.",
    "before"           => ":attribute debe ser una fecha anterior a :date.",
    "between"          => [
        "numeric" => ":attribute tiene que estar entre :min - :max.",
        "file"    => ":attribute debe pesar entre :min - :max kilobytes.",
        "string"  => ":attribute tiene que tener entre :min - :max caracteres.",
        "array"   => ":attribute tiene que tener entre :min - :max ítems.",
    ],
    "boolean"          => "El campo :attribute debe tener un valor verdadero o falso.",
    "confirmed"        => "La confirmación de :attribute no coincide.",
    "date"             => ":attribute no es una fecha válida.",
    "date_format"      => ":attribute no corresponde al formato :format.",
    "different"        => ":attribute y :other deben ser diferentes.",
    "digits"           => ":attribute debe tener :digits dígitos.",
    "digits_between"   => ":attribute debe tener entre :min y :max dígitos.",
    "email"            => ":attribute no es un correo válido",
    "exists"           => ":attribute es inválido.",
    "filled"           => "El campo :attribute es obligatorio.",
    "image"            => ":attribute debe ser una imagen.",
    "in"               => ":attribute es inválido.",
    "integer"          => ":attribute debe ser un número entero.",
    "ip"               => ":attribute debe ser una dirección IP válida.",
    'json'             => 'El campo :attribute debe tener una string JSON válida.',
    "max"              => [
        "numeric" => ":attribute no debe ser mayor a :max.",
        "file"    => ":attribute no debe ser mayor que :max kilobytes.",
        "string"  => ":attribute no debe ser mayor que :max caracteres.",
        "array"   => ":attribute no debe tener más de :max elementos.",
    ],
    "mimes"            => ":attribute debe ser un archivo con formato: :values.",
    "min"              => [
        "numeric" => "El tamaño de :attribute debe ser de al menos :min.",
        "file"    => "El tamaño de :attribute debe ser de al menos :min kilobytes.",
        "string"  => ":attribute debe contener al menos :min caracteres.",
        "array"   => ":attribute debe tener al menos :min elementos.",
    ],
    "not_in"           => ":attribute es inválido.",
    "numeric"          => ":attribute debe ser numérico.",
    "regex"            => "El formato de :attribute es inválido.",
    "required"         => "El campo :attribute es obligatorio.",
    "required_if"      => "El campo :attribute es obligatorio cuando :other es :value.",
    "required_with"    => "El campo :attribute es obligatorio cuando :values está presente.",
    "required_with_all" => "El campo :attribute es obligatorio cuando :values está presente.",
    "required_without" => "El campo :attribute es obligatorio cuando :values no está presente.",
    "required_without_all" => "El campo :attribute es obligatorio cuando ninguno de :values estén presentes.",
    "same"             => ":attribute y :other deben coincidir.",
    "size"             => [
        "numeric" => "El tamaño de :attribute debe ser :size.",
        "file"    => "El tamaño de :attribute debe ser :size kilobytes.",
        "string"  => ":attribute debe contener :size caracteres.",
        "array"   => ":attribute debe contener :size elementos.",
    ],
    "string"           => "The :attribute must be a string.",
    "timezone"         => "El :attribute debe ser una zona válida.",
    "unique"           => ":attribute ya ha sido registrado.",
    "url"              => "El formato :attribute es inválido.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message'],
        'genofi_codigo' => [
        'required' => 'el campo codigo es obligatorio',
        'unique'=>'Este código ya existe. Por favor, ingrese otro.'],
        'genofi_razonsocial' => [
        'required' => 'el campo razon social es obligatorio'],
          'genofi_direccion' => [
        'required' => 'el campo direccion es obligatorio'],
          'genofi_tributario' => [
        'required' => 'el campo tributario es obligatorio'],
          'genofi_ptoemision' => [
        'required' => 'el campo punto de emision es obligatorio'],
          'genofi_telefono' => [
        'required' => 'el campo telefono es obligatorio'],
          'genofi_ciudad' => [
        'required' => 'el campo ciudad es obligatorio'],
          'genofi_tipo' => [
        'required' => 'el campo tipo de oficina es obligatorio'],
          'genofi_relacional' => [
        'required' => 'el campo relacional es obligatorio'],
        'genofi_representante' => [
        'required' => 'el campo representante es obligatorio'],
        'genofi_negocio' => [
        'required' => 'el campo nombre comercial es obligatorio'],
        'genofi_tipocodclte' => [
        'required' => 'el campo tipo de cliente es obligatorio'],
        'genofi_prefijo' => [
        'required' => 'el campo prefijo es obligatorio'],
        'genofi_lineasxped' => [
        'required' => 'el campo lineas x pedido es obligatorio'],
        'genofi_etifiscal' => [
        'required' => 'el campo entidad fiscal es obligatorio'],
        'genofi_nomcltepredet' => [
        'required' => 'el campo nomenclatura es obligatorio'],
        'genofi_etirazon' => [
        'required' => 'el campo razon es obligatorio'],
        'genofi_eticontacto' => [
        'required' => 'el campo contacto es obligatorio'],
        'genofi_etireplegal' => [
        'required' => 'el campo representante legal es obligatorio'],
        'genmod_codigo' => [
        'required' => 'el campo codigo de modulo es obligatorio',
        'unique' => 'Módulo ya se ha registrado.'],
        'genofi_uuid' => [
        'required' => 'el campo codigo de oficina es obligatorio'],
        'genpof_grupo' => [
        'required' => 'El campo Grupo es obligatorio',
        'unique' => 'Este grupo ya existe'],
        'genpof_clave' => [
        'required' => 'El campo Clave es obligatorio',
        'unique' => 'Oficina - Módulo - Grupo - Clave ya se ha registrado'],
         'genpof_valor' => [
        'required' => 'el campo valor legal es obligatorio'],
         'genpof_descripcion' => [
        'required' => 'el campo descripcion legal es obligatorio'],
         'genpci_grupo' => [
        'required' => 'El campo Grupo es obligatorio',
        'unique' => 'Módulo - Grupo - Clave ya se ha registrado'],
        'genpci_clave' => [
        'required' => 'El campo Clave es obligatorio',
        'unique' => 'Módulo - Grupo - Clave ya se ha registrado'],
         'genpci_valor' => [
        'required' => 'el campo valor es obligatorio'],
         'genpci_descripcion' => [
        'required' => 'el campo descripcion es obligatorio'],  
        'facjve_codigo' => [
        'required' =>'El campo código Jefe de Venta es obligatorio',
        'unique'=> 'Esta Oficina- Código de estado ya existe'],
    'facjve_nombre' => [
    'required' => 'El campo Nombre es obligatorio'],
    'facjve_direccion' =>  [
    'required' => 'El campo Dirección es obligatorio'],
    'facjve_telefono' => [
    'required' => 'El campo Telefono es obligatorio'],
    'facjve_email'=>[
    'required' => 'El campo Email es obligatorio',
    'email' => 'Ingrese un formato válido de email'],
    'facjve_comentario'=>[
    'required' => 'El campo comentario es obligatorio' ], 
    'facsup_codigo' => [
        'required' =>'El campo codigo Supervisor es obligatorio',
        'unique'=> 'Este Código - Oficina ya existe'],
    'facsup_nombre' => [
    'required' => 'El campo Nombre es obligatorio'],
    'facsup_direccion' =>  [
    'required' => 'El campo Dirección es obligatorio'],
    'facsup_telefono' => [
    'required' => 'El campo Telefono es obligatorio'],
    'facsup_email'=>[
    'required' => 'El campo Email es obligatorio',
    'email' => 'Ingrese un formato válido de email'],
    'facsup_comentario'=>[
    'required' => 'El campo comentario es obligatorio'],
     'genrci_codigo'=>[
     'required' => 'El campo Código es obligatorio',
     'unique' => 'Tipo de Referencia - Codigo ya se ha registrado'],
    'facsup_uuid'=> [
    'required' => 'El campo codigo Supervisor es obligatorio'],
'genofi_uuid'=>[
'required' => 'El campo codigo Oficina es obligatorio'],
'facvdr_codigo'=>[
'required'=>'El campo Código Vendedor es obligatorio',
'unique'=>'Este Código-Oficina ya existe'],
'facvdr_nombre'=>[
'required'=>'El campo Nombre es obligatorio'],
'facvdr_direccion'=>[
'required'=>'El campo Dirección es obligatorio'],
'facvdr_telefono'=>[
'required'=>'El campo Teléfono es obligatorio'],
'facvdr_email'=>[
'required'=>'El campo Email es obligatorio',
'email'=>'Ingrese un formato válido de email'],
'facvdr_estventa'=>[
'required'=>'El campo Estado de Venta es obligatorio'],
'facvdr_comentario'=>[
'required'=>'El campo comentario es obligatorio'],
'facvdr_geogx'=>[
'required'=>'El campo Ubicación coordenada X es obligatorio'],
'facvdr_geogy'=>[
'required'=>'El campo Ubicación coordenada Y es obligatorio'],
'facvdr_radio'=>[
'required'=>'El campo Radio de las Coordenadas es obligatorio'],
'facvdr_colormapa'=>[
'required'=>'El campo Color del Vendedor en el Mapa es obligatorio'],
'facvdr_passwordhh'=>[
'required'=>'El campo Clave del Equipo Asignado es obligatorio'],
/*'facvdr_secpedhh'=>[
'required'=>'El campo Secuencial de Pedidos en los Equipos Móviles es obligatorio'],
'facvdr_seccobhh'=>[
'required'=>'El campo Secuencial de Cobros en los Equipos Móviles es obligatorio'],*/
'facvdr_secvisita'=>[
'required'=>'El campo Secuencial de Visitas en los Equipos Móviles es obligatorio'],
'nombre' =>[
'required'=>'El campo Nombre es obligatorio'],
'url' => [
'required'=>'El campo URL es obligatorio'],
'nick' => [
 'required'=>'El campo Nick es obligatorio',
 'unique'=>'Nick ya esta registrado'],
 'razonsocial' => [
  'required'=>'El campo Razón Social es obligatorio'],
  'direccion'=>[
  'required'=>'El campo Dirección es obligatorio'],
  'telefono'=>[
  'required'=>'El campo Telefono es obligatorio'],
  'identificacion'=>[
  'required'=>'El campo Identificación es obligatorio'],
  'conexion'=>[
  'required'=>'El campo Conexión es obligatorio'],
  'apellido'=>[
   'required'=>'El campo Apellido es obligatorio'],
  'email'=>[
   'required'=>'El campo Email es obligatorio',
   'unique'=>'Este mail ya existe'],
   'password'=>[
    'required'=>'El campo Password es obligatorio',
    'min'=>'La contraseña debe tener 1 caracter como mínimo',
    'confirmed'=>'Las contraseñas deben coincidir'],
    'rtkmov_serial'=>[
    'required'=>'El campo Serial es obligatorio',
    'unique'=>'Serial ya ha sido registrado'],
    'rtkmov_modelo'=>[
    'required'=>'El campo Modelo es obligatorio'],
    'rtkmov_descripcion'=>[
    'required'=>'El campo Descripción es obligatorio'],
    'genmod_nombre'=>[
    'required'=>'El campo Nombre es obligatorio'],
    'genrci_descripcion'=>[
    'required'=>'El campo Descripción es obligatorio'],
    'genrof_descripcion'=>[
    'required'=>'El campo Descripción es obligatorio'],
     'genrof_codigo'=>[
    'required'=>'El campo Codigo es obligatorio',
    'unique'=>'Oficina - Tipo de Referencia - Código ya se ha registrado'],
     'rtkmob_estado'=>[
     'required'=>'El campo Estado es obligatorio'],
    'genofi_ptoemision'=>[
    'required'=>'El campo Pto. de Emisión es obligatorio'],
    'rtkfre_fechadesde'=>[
    'required'=>'El campo Fecha del primer día de Programación es obligatorio'],
    'rtkfre_fechahasta'=>[
    'required'=>'El campo Fecha del último día de Programación es obligatorio'],
    'rtkfre_codigo'=>[
    'required'=>'El campo Código es obligatorio',
    'unique'=>'Código ya ha sido registrado'],
    'rtkfre_descripcion'=>[
    'required'=>'El campo Descripción es obligatorio'],
     'cxccni_codigo'=>[
    'required'=>'El campo Codigo es obligatorio'],
     'cxccni_descripcion'=>[
    'required'=>'El campo Descripcion es obligatorio'],
    'wmsope_codigo'=>[
     'required'=>'El campo Codigo es obligatorio',
     'unique'=>'Oficina - Código ya se ha registrado'],
    'wmsope_nombre'=>[
     'required'=>'El campo Nombre es obligatorio'],
     'wmsstr_codigo'=>[
     'required'=>'El campo Código es obligatorio',
     'unique' =>'Grupo - Código ya existe'],
    'wmsstr_descripcion'=>[
     'required'=>'El campo Descripcion es obligatorio'],
     'wmsbod_codigo'=>[
     'required'=>'El campo Codigo es obligatorio',
     'unique'=>'Oficina - Código ya existe'],
    'wmsbod_nombre'=>[
     'required'=>'El campo Nombre es obligatorio'],
     'wmsetr_estado'=>[
     'required'=>'El campo Estado es obligatorio',
     'unique'=>'Este tipo de transancción - codigo de estado ya existe'],
    'wmsetr_descripcion'=>[
     'required'=>'El campo Descripcion es obligatorio'],
    'wmsttg_codigo'=>[
     'required'=>'El campo Codigo es obligatorio',
     'unique'=>'Este codigo ya existe'],
    'wmsttg_descripcion'=>[
     'required'=>'El campo Descripcion es obligatorio'],
     'wmsttg_uuid'=>[
     'required'=>'El campo ID - Grupo Tipo/Transaccion es obligatorio'],
       'wmsetr_comentario'=>[
     'required'=>'El campo Comentario es obligatorio'],
     'invund_descripcion' => [
     'required' => 'El campo Descripción es obligatorio'],
     'wmsubi_codigo' => [
     'required'=> 'El campo Código es obligatorio',
     'unique' => 'Bodega - Código ya existe'],
     'wmsubi_descripcion' => [
     'required' => 'El campo Descripción es obligatorio'],
     'gentrf_codigo' => [
     'required' => 'El campo Código es obligatorio',
     'unique' => 'Módulo - Código ya existe'],
     'gentrf_descripcion' => [
     'required' => 'El campo Descripción es obligatorio'],
     'invibr_codigobarra' => [
     'required' => 'El campo Código de Barra es obligatorio',
     'unique' => 'Código de barra ya existe'],
     'invitm_codigo' => [
     'required' => 'El campo Código es obligatorio',
     'unique' => 'Código de Item ya existe'],
     'invitm_nombrecor' => [
     'required'=>'El campo Nombre Corto es obligatorio'],
     'invitm_nombre' => [
     'required'=>'El campo Nombre es obligatorio'], 
      'cxcbrr_codigo' => [
     'required'=>'El campo Código es obligatorio',
     'unique'=>'Código ya existe'], 
     'cxcbrr_descripcion' => [
     'required'=>'El campo Descripción es obligatorio'], 
     'passwordres'=>[
    'required'=>'El campo Password es obligatorio',
    'min'=>'La contraseña debe tener 1 caracter como mínimo',
    'confirmed'=>'Las contraseñas deben coincidir'],
    'passwordresup'=>[
    'required'=>'El campo Password es obligatorio',
    'min'=>'La contraseña debe tener 1 caracter como mínimo',
    'confirmed'=>'Las contraseñas deben coincidir'],
    'lemail' => [
     'required' => 'El campo Email es obligatorio',
     ],
     'lpassword' => [
     'required' => 'El campo Password es obligatorio'],
     'pemail' => [
     'required' => 'El campo Email es obligatorio',
     ],
     'rucedula' => [
     'unique' => 'RUC/Cédula ya existe.'],
     'erp_codigo' => [
     'required' => 'El campo Clte.ERP es obligatorio',
     ],
     'erp_ruta' => [
     'required' => 'El campo Ruta ERP es obligatorio',
     ],
     'erp_sector' => [
     'required' => 'El campo Sector ERP es obligatorio',
     ],
     'cxcrut_codigo' => [
     'required' => 'El campo Código es obligatorio',
     'unique' =>'Este código ya existe'
     ],
     'cxcrut_descripcion' => [
     'required' => 'El campo Descripción es obligatorio',
     ],
      'gensec_codigo' =>[
      'required'=>'El campo Código Secuencial es obligatorio',
      'unique'=>'Este código ya existe'
      ],
      'gensec_secuencia' => [
      'required' => 'El campo Secuencial es obligatorio'],
      'gensec_descripcion' => [
      'required' => 'El campo Descripción es obligatorio'],
      'facent_codigo' => [
      'required' => 'El campo Código es obligatorio',
      'unique' => 'Este código ya existe',
      ],
      'facent_nombre' => [
      'required' => 'El campo Nombre es obligatorio'],
     //Mantenimiento Impuesto
      'genimp_codigo' => [
      'required' => 'El campo Código es obligatorio',
      'unique' => 'Este código ya existe',
      ],
        'genimp_descripcion' => [
      'required' => 'El campo Descripción es obligatorio'],

      'genimp_porcentaje' => [
      'required' => 'El campo Porcentaje es obligatorio'],

        //Mantenimiento Cliente
      'cxccli_razonsocial' => [
      'required' => 'El campo Razon Social es obligatorio'],
      'cxccli_codigo' => [
      'required' => 'El campo Codigo de Cliente es obligatorio'],
      'cxccli_codexterno' => [
      'required' => 'El campo Codigo externo es obligatorio'],
      'cxccli_contacto' => [
      'required' => 'El campo Contacto del Cliente es obligatorio'],
      
      'cxccli_ruc_ci' => [
      'required' => 'El campo Ruc o CI es obligatorio'],
      'cxccli_direccion1' => [
      'required' => 'El campo direccion 1 es obligatorio'],
      'cxccli_telefono' => [
      'required' => 'El campo telefono es obligatorio'],
 ],


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [


'Show' => 'Vista'],



];
