<div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Editar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                <div class="form-group row">
                  <label for="ci_ruc" class="col-form-label col-sm-3">Cédula o Ruc:</label>
                  <div class="col-sm-7">
                   <input  class="form-control" type="text" name="ci_ruc" id="ci_ruc" onkeypress="return justNumbers(event);" required pattern="[0-9]{10}|[0-9]{13}">  
                   <div class="invalid-feedback">Ingrese Cédula o Ruc.</div> 
                    <span id="mensaje"></span>
                  </div>
                  <div class="col-sm-1" id="ced_as" style="display:none">
                    <p style="color: red;font-size:25px ;" >*</p>
                   </div>
                </div>

                <div class="form-group row">
                <label for="nombre" class="col-form-label col-sm-3">Nombre:</label>
                  <div class="col-sm-7">
                   <input  class="form-control" type="text" name="nombre" id="nombre" required > 
                   <div class="invalid-feedback">Ingrese Nombre.</div> 
                  </div>
                </div>
     
                <div class="form-group row">
                  <label for="apellido" class="col-form-label col-sm-3">Apellido:</label>
                    <div class="col-sm-7">
                     <input class="form-control" type="text" name="apellido" id="apellido" required> <div class="invalid-feedback">Ingrese Apellido.</div> 
                    </div>
                </div>
                <div class="form-group row">
                  <label for="email_sup" class="col-form-label col-sm-3">Email:</label>
                    <div class="col-sm-7">
                     <input class="form-control" type="email" name="email_sup" id="email_sup" required> 
                      <div class="invalid-feedback">Ingrese Email Correctamente.</div> 
                    </div>
                </div>
                <div class="form-group row">
                  <label for="contra" class="col-form-label col-sm-3">Contraseña:</label>
                    <div class="col-sm-7">
                     <input class="form-control" type="password" name="contra" id="contra" required minlength="6">  <div class="invalid-feedback">Ingrese Contraseña, minimo 6 caracteres.</div> 
                    </div>
                </div>                
                <div class="form-group row">
                  <label for="direccion" class="col-form-label col-sm-3">Dirección:</label>
                  <div class="col-sm-7">
                    <textarea class="form-control" name="direccion" id="direccion" cols="30" rows="3" required></textarea>  
                     <div class="invalid-feedback">Ingrese Dirección.</div> 
                  </div>
                </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" >Guardar</button>
            </div>

<script type="text/javascript">
	  remove_cursor_wait();
	  $('#modale').modal();
	  $('a[name=editar]').attr('disabled',false);
</script>