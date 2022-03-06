
	<div class="modal-header">
	  
	    <h4 class="modal-title">Consultar</h4>
	    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span></button>
	</div>
	<div class="modal-body">   
    <table id="det_venta" class="table display responsive table-bordered table-striped" width="100%">
      <thead>
        <tr>
          <th>...</th>
          <th>Nombre</th>
          <th>Cantidad</th>
          <th>Costo</th>
          <th>Precio</th>
        </tr>
      </thead>
      <tbody>
        @foreach($det_venta as $det)
        <tr>      
            <td><img src="{{$det->url_image}}"  width="50" height="50"></td>
            <td>{{$det->nombre}}</td>
            <td>{{$det->cantidad}}</td>
            <td>{{$det->costo}}</td>
            <td>{{$det->precio}}</td>
          
        </tr>
        @endforeach
      </tbody>  

    </table>                        


    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>

 <script>
 	  remove_cursor_wait();
    $('#modale_cons').modal();
    $('button[name=consultar_modal]').attr('disabled',false);


    $("#det_venta").DataTable({
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ Registros",
                        "zeroRecords": "No hay registros...",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrados de _MAX_ registros totales)",
                        "search": "Buscar:",
                        "paginate": {
                            "first": "First",
                            "last": "Last",
                            "next": "Sigue",
                            "previous": "Previo"
                        },
                    },
                    columnDefs: [
                      { width: 40, targets: 0 },
                    ],
                    "responsive": true
                });
 </script>   