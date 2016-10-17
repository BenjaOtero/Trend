<div id="dvMail" style="display: none;"></div>
<div class="container">
    <div id="dvAtencion" class="rows">
        <div class="col-md-3 col-xs-10 col-md-push-3 col-xs-push-1">
            <div align="center">
                <img class="img-responsive" src="app_images/contacto.jpg">                               
            </div>
        </div>
        <div class="col-md-3 col-xs-10 col-md-push-3 col-xs-push-1">
                <p>Atención al cliente.</p>
        </div>         
    </div>
    <div class="clearfix"></div>
    <div class="rows">
        <div class="col-md-6 col-xs-10 col-md-push-3 col-xs-push-1">
            <form id="frmContacto" role="form" name="frmContacto" action="" method="post" style="margin-top: 30px">
              <div class="form-group">
                <label>Nombre</label>
                <input id="txtNombre" class="form-control">
              </div>
              <div class="form-group">
                <label>Apellido</label>
                <input id="txtApellido" class="form-control">
              </div>
              <div class="form-group">
                <label for="mail">Email</label>
                <input id="txtMail" type="email" class="form-control">
              </div>
              <div class="form-group">
                <label>Teléfono</label>
                <input id="txtTE" class="form-control">
              </div>
              <div class="form-group">
                <label>Consulta / comentario</label>
                <textarea id="txtArea" class="form-control" rows="5"></textarea>
              </div>                
              <button id="enviar" type="button" class="btn btn-default">Enviar</button>
            </form>
        </div>
    </div>
    
</div>