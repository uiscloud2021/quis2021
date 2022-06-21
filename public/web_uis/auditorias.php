<?php
header ('Content-type: text/html; charset=utf-8');

?>
<!DOCTYPE html>
<html>
<head>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../vendor/adminlte/dist/css/adminlte.css">
  <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">

</head>


    <body style="width:99%; margin: 0 auto;">	   
    <br/>
    <div class="card" id="inicio_sesion">
        <div class="card-header">
            <h3 class="card-title">Iniciar sesión</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-6"><br/><br/><br/>
                    <form  autocomplete="off" id="form1">
                        <div class="form-group">
                            Correo electrónico:
                            <input type="text" id="email" name="email" style="width:100%; height:30px" autofocus class="form-control" placeholder="Correo electrónico"  required>
                        </div>

                        <div class="form-group">
                            Contraseña:
                            <input type="password" id="password" name="password" style="width:100%; height:30px" class="form-control" placeholder="Contraseña"  required>
                        </div>

                        <div align="right">
                            <button type="button" onclick="Guardar();" class="btn btn-primary"><i class="fas fa-save"> Entrar</i></button>
                        </div>
                    </form>
                </div>

                <div class="col-6 col-sm-6">
                    <p>La información privada que se recaba puede incluir datos personales, intelectuales e industriales. Toda la información está legalmente protegida. Su manejo adecuado debe ser documentado y cualquier transgresión puede ser sancionada.</p>
                    <br/>
                    <p>Toda la información privada será tratada en forma confidencial y con estrictas medidas de seguridad</p>
                    <br/>
                    <p>La información personal proporcionada con fines de auditoría ética o de calidad, no podrá ser transferida ni tratada por personas ajenas al Grupo UIS.</p>
                    <br/>
                    <p>Conoce nuestro <a style="color:#51d1f6;" href="https://uis.com.mx/aviso_privacidad" target="_blank">Aviso de privacidad</a></p>
                </div>
            </div>
        </div>
    </div>




    <div class="card" id="auditorias" style="display:none">
        <div class="card-body">
            <input type="text" id="id_user" name="id_user" style="display:none">
                    
            <div class="table-responsive" style='width:95%'>
                <div align="right">
                    <a href="#" onclick="AgregarAud();" class="btn btn-primary"><span class="fas fa-file"></span> 
                    &nbsp; Agregar auditoría</a>   
                </div><br/>
                <div id="div_auditoria">
                            
                </div>
            </div>

        </div>
    </div>


        	 
    </body>




<!-- Modal CREAR AUDITORIA-->
<div class="modal fade" id="createAudModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createAudModalLabel">Auditoría</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  id="form3" autocomplete="off" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        
        <div class='form-group'>
			<label class="form-label">Nombre del protocolo de la investigación</label>
            <input type="text" id="user_id" name="user_id" style="display:none">
			<input type='text' class='form-control' placeholder='Nombre' id='protocolo' name='protocolo'>
		</div>

        <div class='form-group'>
			<label class="form-label">Comentarios</label>
            <textarea class='form-control' placeholder='Comentarios' id='comentarios' name='comentarios'></textarea>
		</div>
			
		<div class='form-group'>
            <label class="form-label">* Los archivos a subir deben estar todos juntos en una carpeta en formato ZIP. Máximo 18 megas</label>
			<p style="font-weight:bold" id="a3"> <input type="file" accept="application/zip" id="3" name="3"></p>
			<p style="font-weight:bold">*Ayuda para crear archivo zip  &nbsp;<a class='btn btn-warning' target="_blank" href='https://www.youtube.com/watch?v=i2jxp7AFBdw' title='Manual'><span class='fas fa-file-video'>Ver video</span></a></p>
        </div>	

      </div>
      <div class="modal-footer">
        <button type="button" id="btncancelar" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnsubir" onClick="Subir();" class="btn btn-success"><i class="fas fa-save"> Subir documento</i></button>
      </div>
      </form>
    </div>
  </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="../vendor/adminlte/dist/js/adminlte.min.js"></script>
    <script src="js/auditorias.js?2"></script>
    
</html> 
        
        