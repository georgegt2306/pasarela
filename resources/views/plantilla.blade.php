<!DOCTYPE html>
<html>
    <link rel="icon" href="{{ asset('/dist/img/LOGO.png')}}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pasarela Mercy</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/dist/css/cursor.css')}}">
    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css')}}">
    <link href="{{ asset('/plugins/ionicons.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.1/css/fixedHeader.dataTables.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    

</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">
    @include('include.header')
    @include('include.sidebar')
    <div class="content-wrapper">
        @yield('content')      
    </div>
</div>
</body>
<!-- jQuery -->
    <script src="{{ asset('/plugins/jQuery/jquery.min.js')}}"></script>
    <script src="{{ asset('/dist/js/adminlte.js')}}"></script>
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('/plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <script src="{{asset('/plugins/sweetalert2.js')}}"></script>
    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.1/js/dataTables.fixedHeader.min.js"></script>
    <script src="{{ asset('/dist/js/cursor.js') }}"></script>
    @yield('script')
    
    <script type="text/javascript">

    function cerrar(){
     Swal.fire({    title: " ! Aviso !",
                    text: "Esta seguro que desea Salir?",
                    imageUrl: '{{asset('/dist/img/LOGO.png')}}',
                    imageWidth: 200,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                    width:400,
                    height:400,
                    animation: true,
                    background:'white',
                    showCancelButton: true,
                    confirmButtonColor: '#012D3A',
                    cancelButtonColor: '#BB141B',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.value==true) { 
                $.ajax({
                url:"{{asset('')}}logout",
                headers :{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                dataType: 'json',
                contentType: false,
                processData: false,
                success:function(res){
                 if(res.sms==true){
                        window.location = "{{asset('')}}";
                 }else{
                     console.log(res.mensaje);
                 }
               },
               error: function(XMLHttpRequest, textStatus, errorThrown) {
                  if (errorThrown=='Unauthorized') {
                    location.reload();
                  }
                }
       });  
            }
         });
    }   

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


    function justNumbers(e){
      var keynum = window.event ? window.event.keyCode : e.which;
      if ((keynum == 8) || (keynum == 46))
      return true;
          
      return /\d/.test(String.fromCharCode(keynum));
    }
    </script>
    
</html>