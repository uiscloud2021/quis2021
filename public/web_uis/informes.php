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




    <div class="card" id="informe" style="display:none">
        <div class="card-body">
            <input type="text" id="id_user" name="id_user" style="display:none">
                    
            <div class="table-responsive" style='width:95%'>
                <div align="right">
                    <a href="#" onclick="AgregarInf();" class="btn btn-primary"><span class="fas fa-file"></span> 
                    &nbsp; Agregar informe</a>   
                </div><br/>
                <div id="div_informe">
                            
                </div>
            </div>

        </div>
    </div>


        	 
    </body>




<!-- Modal CREAR INFORME-->
<div class="modal fade" id="createInfModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createInfModalLabel">Informe trimestral</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  id="form3" autocomplete="off" method="post">
      <div class="modal-body">

        <div class='form-group'>
			<label class="form-label">Protocolo</label>
            <input type="text" id="user_id" name="user_id" style="display:none">
			<select class='form-control' style='width: 100%;' id='id_codigo' name='id_codigo' onchange="Codigo(this.value);">
                <option selected='selected' value="">Seleccione...</option>
            </select>
		</div>

        <div class='form-group'>
			<label class="form-label">Título</label>
            <textarea class='form-control' id='titulo' name='titulo' disabled></textarea>
		</div>

        <div class='form-group'>
			<label class="form-label">Patrocinador</label>
			<input type='text' class='form-control' id='patrocinador' name='patrocinador' disabled>
		</div>

        <div class='form-group'>
			<label class="form-label">Sitio Clínico</label>
			<input type='text' class='form-control' id='sitio' name='sitio' disabled>
		</div>

        <div class='form-group'>
			<label class="form-label">Investigador Principal</label>
			<input type='text' class='form-control' id='investigador' name='investigador' disabled>
		</div>

        <div class='form-group'>
			<label class="form-label">Fecha de aprobación por CEI</label>
			<div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                <input type="date" class="form-control" id="aprobacioncei" name="aprobacioncei">
            </div>
		</div>

        <div class='form-group'>
			<label class="form-label">Fecha de aprobación por CI</label>
			<div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                <input type="date" class="form-control" id="aprobacionci" name="aprobacionci">
            </div>
		</div>

        <div class='form-group'>
			<label class="form-label">Fecha de aprobación COFEPRIS</label>
			<div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                <input type="date" class="form-control" id="cofepris" name="cofepris">
            </div>
		</div>

        <div class='form-group'>
			<label class="form-label">Estado del proyecto</label>
			<select class='form-control' style='width: 100%;' id='estado' name='estado'>
                <option selected='selected' value="">Seleccione...</option>
                <option>Espera visita de inicio</option>
                <option>En conducción</option>
                <option>Cerrado</option>
            </select>
		</div>

        <div class='form-group'>
			<label class="form-label">Fecha de visita de inicio</label>
			<div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                <input type="date" class="form-control" id="inicio" name="inicio">
            </div>
		</div>

        <div class='form-group'>
			<label class="form-label">Sujetos que firmaron ICF</label>
			<input type='number' class='form-control' id='numicf' name='numicf'>
		</div>

        <div class='form-group'>
			<label class="form-label">Sujetos activos o en seguimiento</label>
			<input type='number' class='form-control' id='numact' name='numact'>
		</div>

        <div class='form-group'>
			<label class="form-label">Total de informes iniciales de EAS en el sitio</label>
			<input type='number' class='form-control' id='numeas' name='numeas'>
		</div>

        <div class='form-group'>
			<label class="form-label">Total de desviaciones o violaciones en el sitio</label>
			<input type='number' class='form-control' id='numdesv' name='numdesv'>
		</div>

      </div>
      <div class="modal-footer">
        <button type="button" id="btncancelar" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnsubir" onClick="Subir();" class="btn btn-success"><i class="fas fa-save"> Subir informe</i></button>
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
    <script src="js/informes.js?5"></script>
    
</html> 
        
        