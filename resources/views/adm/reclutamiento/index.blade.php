@extends('adminlte::page')

@section('title', 'Reclutamiento')

@section('content_header')
<h4 class="m-0">Reclutamiento</h4>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success"><strong>{{session('info')}}</strong></div>
@endif

<div class="card">

<div class="row">

    <div class="col-12 ">
        <div class="card card-primary card-outline card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-two-1-tab" data-toggle="pill" href="#custom-tabs-two-1" role="tab" aria-controls="custom-tabs-two-1" aria-selected="true">Puestos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-two-2-tab" data-toggle="pill" href="#custom-tabs-two-2" role="tab" aria-controls="custom-tabs-two-2" aria-selected="false">Candidatos</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                    
                    <div class="tab-pane fade active show" id="custom-tabs-two-1" role="tabpanel" aria-labelledby="custom-tabs-two-1-tab">
                        <div class="table-responsive">
                            <div align="right">
                                <?php $rec1="puesto"; ?>
                                <a href="{{route('reclutamiento.create', ['recl'=>'puestos'])}}" class="btn btn-primary"><span class="fas fa-file"></span> 
                                &nbsp; Agregar puesto</a>   
                            </div><br/>
                            <table id="tbl_puestos" class="table table-striped table-hover table-bordered shadow-lg mt-4" style="width:100%">
                                <thead class="bg-mexg2 text-white">
                                <tr>
                                    <th scope="col">Área</th>
                                    <th scope="col">Puesto</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($puestos as $puesto)
                                        <tr>
                                            <td>{{ $puesto->no1 }}</td>
                                            <td>{{ $puesto->no2 }}</td>
                                            <td width="10px"><a class="btn btn-info btn-sm" title="Editar" href="{{route('reclutamiento.edit', [$puesto->id, 'recl'=>'puestos'])}}"><span class="fas fa-edit"></span></a></td>
                                            <td width="10px">
                                                <form action="{{route('reclutamiento.destroy', [$puesto->id, 'recl'=>'puestos'])}}" id="form_eliminar_puesto_{{$puesto->id}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                    <button type="button" id="btn_delete" onclick="DeletePuesto({{$puesto->id}});" title="Eliminar" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="custom-tabs-two-2" role="tabpanel" aria-labelledby="custom-tabs-two-2-tab">
                        <div class="table-responsive">
                            <div align="right">
                                <a href="{{route('reclutamiento.create', ['recl'=>'candidatos'])}}" class="btn btn-primary"><span class="fas fa-file"></span> 
                                &nbsp; Agregar candidato</a>
                            </div><br/>
                            <table id="tbl_candidatos" class="table table-striped table-hover table-bordered shadow-lg mt-4" style="width:100%">
                                <thead class="bg-mexg2 text-white">
                                <tr>
                                    <th scope="col">Candidato</th>
                                    <th scope="col">Puesto</th>
                                    <th scope="col">Fue aceptado</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($candidatos as $candidato)
                                        <tr>
                                            <td>{{ $candidato->no62 }}</td>
                                            <td>{{ $candidato->no63 }}</td>
                                            <td>{{ $candidato->no94 }}</td>
                                            <td width="10px"><a class="btn btn-info btn-sm" title="Editar" href="{{route('reclutamiento.edit', [$candidato->id, 'recl'=>'candidatos'])}}"><span class="fas fa-edit"></span></a></td>
                                            <td width="10px">
                                                <form action="{{route('reclutamiento.destroy', [$candidato->id, 'recl'=>'candidatos'])}}" id="form_eliminar_candidato_{{$candidato->id}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                    <button type="button" id="btn_delete" onclick="DeleteCandidato({{$candidato->id}});" title="Eliminar" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>
                                                </form>
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
        ¿Desea eliminar el registro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnEliminar" data-bs-toggle="modal" data-bs-target="#confirmModal" name="btnEliminar" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>


@stop

@section('css')
    <!--<link rel="stylesheet" href="/css/admin_custom.css">-->
    <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#tbl_puestos').DataTable({
            "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
            "language": espanol
        });

        $('#tbl_candidatos').DataTable({
            "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
            "language": espanol
        });
    } );

    function DeletePuesto(id){
        $('#confirmModal').modal('show');
        $('#btnEliminar').click(function(){
            document.getElementById("form_eliminar_puesto_"+id).submit();
        })
    }

    function DeleteCandidato(id){
        $('#confirmModal').modal('show');
        $('#btnEliminar').click(function(){
            document.getElementById("form_eliminar_candidato_"+id).submit();
        })
    }

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
    </script>
@stop