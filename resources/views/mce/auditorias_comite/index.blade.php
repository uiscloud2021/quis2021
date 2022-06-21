@extends('adminlte::page')

@section('title', 'Auditorías')

@section('content_header')
<h4 class="m-0">Auditorías</h4>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success"><strong>{{session('info')}}</strong></div>
@endif

<div class="card">

            <div class="card-header">

                <div class="container-xxl border border-5">

                    <ul class="nav nav-pills nav-fill p-1" id="myTab" role="tablist">
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link active" id="capacitacion-tab" data-bs-toggle="tab" data-bs-target="#capacitacion" type="button" role="tab" aria-controls="capacitacion" aria-selected="false">Auditorías</a>
                        </li>
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link" id="manuales-tab" data-bs-toggle="tab" data-bs-target="#manuales" type="button" role="tab" aria-controls="manuales" aria-selected="false">Procedimiento de auditoría</a>
                        </li>
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link" id="procesos-tab" data-bs-toggle="tab" data-bs-target="#procesos" type="button" role="tab" aria-controls="procesos" aria-selected="false">Instructivo de auditoría</a>
                        </li>
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link" id="procedimientos-tab" data-bs-toggle="tab" data-bs-target="#procedimientos" type="button" role="tab" aria-controls="procedimientos" aria-selected="false">Aviso de auditoría</a>
                        </li>
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link" id="instructivos-tab" data-bs-toggle="tab" data-bs-target="#instructivos" type="button" role="tab" aria-controls="instructivos" aria-selected="false">Dictamen de auditoría</a>
                        </li>
                    </ul>
        
                </div>

            </div>

            <div class="card-body">

                <div class="tab-content" id="myTabContent">
                    
                    {{-- AUDITORIAS --}}
                    <div class="tab-pane fade show active" id="capacitacion" role="tabpanel" aria-labelledby="capacitacion-tab">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Auditorías</h3>
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table id="tbl_aud" class="table table-striped table-hover table-bordered shadow-lg mt-2" style="width:95%;">
                                                        <thead class="bg-mexg1 text-white">
                                                            <tr>
                                                                <th scope="col">Nombre</th>
                                                                <th scope="col">Comentarios</th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($mce_auditorias as $aud)
                                                            <tr>
                                                                <td >{{ $aud->nombre }}</td>
                                                                <td >{{ $aud->comentarios }}</td>
                                                                <td width="10px">
                                                                    <a class="btn btn-info btn-sm" title="Descargar" href="/assets/MCE/Auditorias/'.$aud->directorio.'" target="_blank"><span class="fas fa-download"></span></a>
                                                                </td>
                                                                <td width="10px">
                                                                    @role('Usuario Regulatorios')
                                                                    <button type="button" id="btn_delete" onclick="Delete({{$aud->id}});" title="Eliminar" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>
                                                                    @endrole
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PROCEDIMIENTO --}}
                    <div class="tab-pane fade" id="manuales" role="tabpanel" aria-labelledby="manuales-tab">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <embed src="assets/MCE/pno_auditoria.pdf#toolbar=0" width="100%" height="675" type="application/pdf">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- INSTRUCTIVO --}}
                    <div class="tab-pane fade" id="procesos" role="tabpanel" aria-labelledby="procesos-tab">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <embed src="assets/MCE/it_auditoria.pdf#toolbar=0" width="100%" height="675" type="application/pdf">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- AVISO --}}
                    <div class="tab-pane fade" id="procedimientos" role="tabpanel" aria-labelledby="procedimientos-tab">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <embed src="assets/MCE/aviso_auditoria.pdf#toolbar=0" width="100%" height="675" type="application/pdf">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- DICTAMEN --}}
                    <div class="tab-pane fade" id="instructivos" role="tabpanel" aria-labelledby="instructivos-tab">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-sm-5">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Dictamen de Auditorías</h3>
                                                <div align="right">
                                                    @role('Usuario Regulatorios')
                                                    <button type="button" class="btn btn-info" onclick="CreateDictamen();">
                                                        <i class="fas fa-file"> Agregar dictamen</i>
                                                    </button>   
                                                    @endrole
                                                </div>
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table id="tbl_dic" class="table table-striped table-hover table-bordered shadow-lg mt-2" style="width:95%;">
                                                        <thead class="bg-mexg1 text-white">
                                                            <tr>
                                                                <th scope="col">Nombre</th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($mce_dictamen as $dic)
                                                            <tr>
                                                                <td style="cursor:pointer" onclick="cambiarDictamen('{{$dic->directorio}},{{$dic->nombre}}');">{{ $dic->nombre }}</td>
                                                                <td width="10px">
                                                                @role('Usuario Regulatorios')
                                                                <button type="button" id="btn_delete" onclick="delete_dictamen({{$dic->id}});" title="Eliminar" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>
                                                                @endrole
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
              
                                    <div class="col-7 col-sm-7 border-left">
                                        <div class="tab-content" id="vert-tabs-tabContent">
                                            <div class="card-header">
                                                <h6 id="nombre_dictamen"></h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <embed id="pdf_dictamen" src="" width="100%" height="675" type="application/pdf">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

</div>



<!-- Modal ELIMINAR ARCHIVO-->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Confirmación</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
                <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar el dictamen de auditoría?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnEliminar" data-bs-toggle="modal" data-bs-target="#confirmModal" name="btnEliminar" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal CREAR DICTAMEN-->
<div class="modal fade" id="createDictamenModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createDictamenModalLabel">Nuevo dictamen</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_dictamen', 'enctype' => 'multipart/form-data']) !!}
      <div class="modal-body">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre de dictamen', ['class' => 'form-label']) !!}
            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'nombre' ]) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('archivo', 'Dictamen en PDF', ['class' => 'form-label']) !!}
            {!! Form::file('archivo', null, ['class' => 'form-control', 'id' => 'archivo', 'placeholder' => 'Seleccione archivo']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGDictamen" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
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
            $('#tbl_aud').DataTable({
                "lengthMenu": [[10, 50, -1], [10, 50, "Todos"]],
                "language": espanol,
                "lengthChange": false,
                "searching": true,
                "autoWidth": true,
                "info": false,
            });
            
            $('#tbl_dic').DataTable({
                "lengthMenu": [[10, 50, -1], [10, 50, "Todos"]],
                "language": espanol,
                "lengthChange": false,
                "searching": true,
                "autoWidth": true,
                "info": false,
            });
        } );

        $('input[type="file"]').on('change', function(){
            var ext = $( this ).val().split('.').pop();
            if ($( this ).val() != '') {
                if(ext != "pdf" && ext != "PDF"){
                    $( this ).val('');
                    alert("Solo se permiten archivos PDF");
                }
            }
        });
        

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

        function cambiarDictamen(res) {
            dic=res.split(",");
            $("#pdf_dictamen").attr("src", dic[0]+"#toolbar=0");
            $("#nombre_dictamen").html(dic[1]);
        }
        
        function Delete(id){
            $.ajax({
            url: "/auditorias_comite/delete_auditorias",
            method:'POST',
            type: 'post',
            data:{id:id, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El archivo fue eliminado correctamente', 'Eliminar archivo', {timeOut:3000});
                    location.reload();
                }
            }
            });
        }
        
        function CreateDictamen(){
            $('#nombre').val("");
            $('#archivo').val("");
            $('#createDictamenModal').modal('toggle');
        }

        $('#formcreate_dictamen').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('_token', $('input[name=_token]').val());
            nombre=$('#nombre').val();
            if(nombre!=""){
                $.ajax({
                    url: "/auditorias_comite/create_dictamen",
                    type:'post',
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    beforeSend:function(){
                        $('#btnGDictamen').hide();
                    },
                    success:function(resp){
                        if(resp == "guardado"){
                            $('#createDictamenModal').modal('hide');
                            toastr.success('El dictamen fue guardado correctamente', 'Guardar dictamen', {timeOut:3000});
                            $('#btnGDictamen').show();
                            location.reload();
                        }else{
                            $('#btnGDictamen').show();
                            toastr.warning('El dictamen ya se encuentra dado de alta', 'Guardar dictamen', {timeOut:3000});
                        }
                    }
                });
            }else{
                alert("No puede estar el nombre vacío");
            }
        });
        
        function delete_dictamen(id){
            $.ajax({
            url: "/auditorias_comite/delete_dictamen",
            method:'POST',
            type: 'post',
            data:{id:id, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El archivo fue eliminado correctamente', 'Eliminar archivo', {timeOut:3000});
                    location.reload();
                }
            }
            });
        }
    </script>
@stop