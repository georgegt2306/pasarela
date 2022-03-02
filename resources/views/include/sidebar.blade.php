<aside class="main-sidebar sidebar-ligth-primary elevation-4" style="background-color: white">
    <!-- Brand Logo -->
    <a href="{{ asset('/home')}}" class="brand-link" >
      <img src="{{ asset('/dist/img/LOGO.png')}}"  width="50" height="40" >
      <span class="brand-text font-weight-dark" style="font-family:'Roboto';color: #012D3A;font-weight: bold;">&nbsp Pasarela Mercy</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         {{--  <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
          </li> --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Opciones
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-danger right">3</span> --}}
              </p>
            </a>
             <ul class="nav nav-treeview">
           
           @if (auth()->user()->id_tipo==1) 
                <li class="nav-item">
                <a href="{{asset('/supervisor')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supervisor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/local')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Local</p>
                </a>
              </li>
           @elseif(auth()->user()->id_tipo==2)
              <li class="nav-item">
                <a href="{{asset('/vendedor')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vendedores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/producto')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Producto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/promociones')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Promociones</p>
                </a>
              </li> 
            @endif           
            </ul>
          </li>
         

          

         
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>