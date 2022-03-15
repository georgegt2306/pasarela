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
  

  #recuperarcontra{
    font-family: 'Roboto'; 
    font-weight: bold;
    background-color: #BB141B;
    color: white; 
    transition: all ease-in-out 1s; 
  }

  #recuperarcontra:hover{
   background-color: #CB0810;
   border: 2px black solid;
 }


#recuperarcontra:after {
  content: '';
  width: 0px;
  height: 1px;
  display: block;
  background: black;
  transition: 1s;
}

#recuperarcontra:hover:after {
    width: 100%;
    background: white;
    text-decoration: underline;
}
</style>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Medify</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css')}}">
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
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
     <form method="POST" action="{{ route('password.email') }}">
     @csrf
        <div class="input-group mb-3">
          <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> 
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
                                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
        
        <div class="row">
          <div class="col-md-12" style="display: block !important;margin: 0 !important">
            <button type="submit" class="btn  btn-block" id="recuperarcontra"> Enviar </button>
          
          </div>
          <!-- /.col -->  
        </div>
      </form>
       <div class="col-md-12" ></br>
          <a href="{{asset('/')}}" id="olvidecon">Regresar</a>
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('/plugins/sweetalert2.js')}}"></script>

</body>
</html>
