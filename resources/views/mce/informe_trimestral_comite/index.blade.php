@extends('adminlte::page')

@section('title', 'Informe trimestral')

@section('content_header')
<h4 class="m-0">Informe trimestral</h4>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success"><strong>{{session('info')}}</strong></div>
@endif

<div class="card">
    <div class="card-body">

        <div class="card">
            <div class="card-header">
                <div align="right">
                    @role('Usuario Regulatorios')
                    <button type="button" class="btn btn-info" onclick="Usuarios();">
                        <i class="fas fa-users"> Usuarios</i>
                    </button>  
                    @endrole
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="table-responsive">
                            <table id="tbl_informes" class="table table-striped table-hover table-bordered shadow-lg mt-2" style="width:95%;">
                                <thead class="bg-mexg1 text-white">
                                    <tr>
                                        <th scope="col">Protocolo</th>
                                        <th scope="col">fecha</th>
                                        <th scope="col">Aprobación CEI</th>
                                        <th scope="col">Aprobación CI</th>
                                        <th scope="col">COFEPRIS</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Visita de inicio</th>
                                        <th scope="col">Sujetos ICF</th>
                                        <th scope="col">Sujetos activos</th>
                                        <th scope="col">Total EAS</th>
                                        <th scope="col">Total desviaciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

 
    </div>
</div>



<!-- Modal ELIMINAR ARCHIVO-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmación</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
                <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar el archivo?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnEliminarRegistro" data-bs-toggle="modal" data-bs-target="#confirmModal" name="btnEliminar" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal USUARIOS-->
<div class="modal fade" id="createUsuariosModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createUsuariosModalLabel">Acceso a usuarios</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_usuarios']) !!}
      <div class="modal-body">
        <div class="form-group">
            {!! Form::label('usuario', 'Usuario', ['class' => 'form-label']) !!}
            {!! Form::select('usuario', $users_uis, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'usuario', 'onchange' => 'CargarUser(this.value)']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('correo', 'Correo', ['class' => 'form-label']) !!}
            {!! Form::text('correo', null, ['class' => 'form-control', 'id' => 'correo', 'readonly' => 'readonly' ]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Contraseña', ['class' => 'form-label']) !!}
            {!! Form::text('password', null, ['class' => 'form-control', 'id' => 'password', 'readonly' => 'readonly' ]) !!}
        </div>

        <div >
          {!! Form::hidden('proyecto', null, ['class' => 'form-control', 'id' => 'proyecto']) !!}
          {!! Form::hidden('num_proyectos', $num_proyectos, ['class' => 'form-control', 'id' => 'num_proyectos']) !!}
          <table id="tbl_pry" class="table table-striped " style="width:100%;">
            <thead class="bg-mexg1 text-white">
              <tr >
                <th scope="col"></th>
                <th scope="col">Código UIS <span></span></th>
                <th scope="col">Código <span></span></th>
                
            </tr>
            </thead>
            <tbody>
            @foreach ($proyectos as $pry)
              <tr>
                <td><input type="checkbox" name="proyectos[]" id="proye{{$pry->id}}" value="{{$pry->id}}"></input></td>
                <td>{{$pry->no18}}</td>
                <td>{{$pry->no20}}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGUsuarios" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





@stop

@section('css')
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
    $('#tbl_informes').DataTable({
        "lengthMenu": [[10, 50, -1], [10, 50, "Todos"]],
        "language": espanol,
        "lengthChange": true,
        "searching": true,
        "autoWidth": true,
        "info": false,
    });

    $('#tbl_pry').DataTable({
          "lengthMenu": [[-1], ["Todos"]],
          "language": espanol,
          "lengthChange": false,
          "searching": true,
          "autoWidth": true,
          "info": false,
        });

    list_informes();
} );

let espanol = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad"
    }
};

function list_informes(){
    var list = $('#tbl_informes').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/informe_trimestral_comite/list_informes",
            "method": "POST",
            "data": {
                _token:$('input[name="_token"]').val()
            },
        },
        "columns": [
            {"data": 'protocolo'},
            {"data": 'fecha'},
            {"data": 'cei'},
            {"data": 'ci'},
            {"data": 'cofepris'},
            {"data": 'estado'},
            {"data": 'inicio'},
            {"data": 'icf'},
            {"data": 'activos'},
            {"data": 'eas'},
            {"data": 'desviaciones'},
        ],
        "language": espanol
    });
}

    function Usuarios(){
        num=$('#num_proyectos').val();
        $('#proyecto').val("");
        $('#usuario').val("");
        $('#correo').val("");
        $('#password').val("");
        for(a=1; a<=num; a++){
            $('#proye'+a).prop('checked', false);
        }
        $('#createUsuariosModal').modal('toggle');
    }


$('#formcreate_usuarios').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no2=$('#usuario').val();
    if(no2!=""){
        $.ajax({
            url: "/informe_trimestral_comite/guardar_users",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(resp){
                $('#createUsuariosModal').modal('hide');
                toastr.success('Los cambios al usuario fueron guardados correctamente', 'Guardar usuario', {timeOut:3000});
            }
        });
    }else{
        alert("No puede estar el usuario vacío");
    }
});



function CargarUser(id_usuario){
    $.ajax({
        url: "/informe_trimestral_comite/cargar_users",
        method:'POST',
        dataType: 'json',
        data:{id_usuario:id_usuario, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#proyecto').val(this.protocolos);
                $('#correo').val(this.email);
                $('#password').val(this.password);
            });
            proyectos=$('#proyecto').val();
            if(proyectos!=""){
                pry=proyectos.split("|");
                numero = pry.length;
                for(a=0; a<=numero; a++){
                    $('#proye'+pry[a]).prop('checked', true);
                }  
            } 
        }
    });
}

    </script>
@stop