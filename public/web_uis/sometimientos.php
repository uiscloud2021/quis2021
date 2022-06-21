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

                        <div style="float:left">
                            <a href="#" onclick="Registro();">Registrarme</a>
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




    <div class="card" id="sometimientos" style="display:none">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" onclick="Enviados();" id="custom-tabs-two-1-tab" data-toggle="pill" href="#custom-tabs-two-1" role="tab" aria-controls="custom-tabs-two-1" aria-selected="true">Documentos enviados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="Recibidos();" id="custom-tabs-two-2-tab" data-toggle="pill" href="#custom-tabs-two-2" role="tab" aria-controls="custom-tabs-two-2" aria-selected="false">Documentos recibidos</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-two-tabContent">
                <input type="text" id="id_user" name="id_user" style="display:none">
                    
                <div class="tab-pane fade active show" id="custom-tabs-two-1" role="tabpanel" aria-labelledby="custom-tabs-two-1-tab">
                    <div class="table-responsive" style='width:95%'>
                        <div align="right">
                            <a href="#" onclick="AgregarDoc();" class="btn btn-primary"><span class="fas fa-file"></span> 
                            &nbsp; Agregar documentos</a>   
                        </div><br/>
                        <div id="div_enviados">
                            
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="custom-tabs-two-2" role="tabpanel" aria-labelledby="custom-tabs-two-2-tab">
                    <div class="table-responsive" style='width:95%'>
                        <div id="div_recibidos">
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


        	 
    </body>


<!-- Modal CREAR REGISTRO-->
<div class="modal fade" id="createModuloModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModuloModalLabel">Registro</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  autocomplete="off" id="form2">
      <div class="modal-body">
        
        <div class="form-group">
            <input type="text" id="nombre" name="nombre" style="width:100%; height:30px" autofocus class="form-control" placeholder="Nombre"  required>
        </div>

        <div class="form-group">
            <input type="text" id="correo" name="correo" style="width:100%; height:30px" autofocus class="form-control" placeholder="Correo"  required>
        </div>

        <div class="form-group">
            <input type="password" id="contrasena" name="contrasena" style="width:100%; height:30px" class="form-control" placeholder="Contraseña"  required>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" onClick="Registrarme();" class="btn btn-success"><i class="fas fa-save"> Registrarme</i></button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal CREAR DOCUMENTO-->
<div class="modal fade" id="createDocModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createDocModalLabel">Registro</h5>
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

        <div class='form-group'>
            <p style="font-weight:bold">Documentos requeridos</p>
            <label class="form-label">* Protocolo en español</label>
            <label class="form-label">* Protocolo en inglés</label>
			<label class="form-label">* Carta dirigida a los presidentes del comité, en donde enliste cada documento que requiere revisión y la versión electrónica de cada uno de ellos</label>
			<label class="form-label">* Forma de Consentimiento Informado en español y Forma de Asentimiento Informado, cuando aplique, ambos personalizados y con los datos descritos del Presidente del Comité de Ética en Investigación. Incluyendo los datos de contacto</label>
			<label class="form-label">* Manual de Investigador (para protocolos de investigación clínica) versiones español e inglés</label>
			<label class="form-label">* Aviso de funcionamiento del sitio</label>
			<label class="form-label">* Currículum vitae del Investigador Principal</label>
			<label class="form-label">* Copia de la cédula profesional y comprobante de especialidad del Investigador Principal</label>
			<label class="form-label">* Póliza de seguro de la investigación</label>
			<label class="form-label">* Otros documentos necesarios para su revisión</label>
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
    <script src="js/sometimientos.js?7"></script>
    
</html> 
        
        