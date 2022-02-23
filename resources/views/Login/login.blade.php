<!DOCTYPE html>
<html>
<link rel="icon" href="{{ asset('/dist/img/LOGO.png')}}">
<style type="text/css">

  #olvidecon{
    font-family: 'Roboto'; 
    
  }
  #olvidecon:hover{
    text-decoration: underline;
    font-weight: bold;
  }
  

  #loginmercy{
    font-family: 'Roboto'; 
    
    background-color: #BB141B;
    color: white; 
    transition: all ease-in-out 1s; 
  }

  #loginmercy:hover{
   background-color: #CB0810;
   border: 2px black solid;
 }


#loginmercy:after {
  content: '';
  width: 0px;
  height: 1px;
  display: block;
  background: black;
  transition: 1s;
}

#loginmercy:hover:after {
    width: 100%;
    background: white;
    text-decoration: underline;
}
</style>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Pasarela Mercy</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css')}}">
  <link href="{{ asset('/plugins/ionicons.css')}}">
  <!-- Theme style -->
<link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css')}}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

</head> 
<body class="hold-transition login-page">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card">

    <div class="card-body login-card-body" style="border-radius:10% !important ">
          <div class="login-logo">
     <a href="#"><img src="{{ asset('/dist/img/LOGO.png')}}" width="100" height="100"></a>
    </div>
     
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email1" placeholder="Email" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password1" placeholder="Password" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text"  onclick="mostrarPassword();">
              <span class="fa fa-eye-slash icon"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" style="display: block !important;margin: 0 !important">
            
            <button type="button" class="btn  btn-block" id="loginmercy" onclick="ingresar();" > Iniciar sesión </button>
          
          </div>
          <!-- /.col -->  
        </div>
         <div class="col-md-12" ></br>
          <a href="{{asset('/recuperar')}}" id="olvidecon"> Olvide contraseña</a>
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('/plugins/jQuery/jquery.min.js')}}"></script>
<script src="{{ asset('/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('/plugins/sweetalert2.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

<script type="text/javascript">
  toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": true,
      "onclick": null,
      "showDuration": "500",
      "hideDuration": "1000",
      "timeOut": "2000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
  }



  function mostrarPassword(){
    var cambio = document.getElementById("password1");
    if(cambio.type == "password"){
      cambio.type = "text";
      $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
      cambio.type = "password";
      $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
  } 


  function ingresar(){
     var email1 = document.getElementById('email1').value;
     var password1 = document.getElementById('password1').value;
     var expresion = /^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i;
      
      if (!expresion.test(email1)){
        
        toastr.error("Formato de email incorrecto");
         setTimeout(function(){ $("#email1").val(""); 
            document.getElementById("email1").focus();
          }, 500);
        
        
      }
      else if (password1=='') {
          toastr.error("Ingrese Contraseña");

           setTimeout(function(){ 
              document.getElementById("password1").focus();
            }, 500);
      }else {
        var datos = new FormData();
        datos.append("email", email1);
        datos.append("password", password1);

         $.ajax({
              url:"{{asset('')}}ingresar",
              headers :{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              type: 'POST',
              dataType: 'json',
              contentType: false,
              processData: false,
              data: datos,
              success:function(res){
               if(res.sms==true){
                     // var pathname = window.location.pathname;
                      window.location = "{{asset('')}}home";
               }else{
                  toastr.error(res.mensaje);
                  
               }
             },
             error: function(XMLHttpRequest, textStatus, errorThrown) {
                if (errorThrown=='Unauthorized') {
                  location.reload();
                }
              }
         });   
      }

  


  }
</script>

</body>
</html>
