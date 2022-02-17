@extends('adminlte::page')

@section('title', 'Contrato')

@section('content_header')
<h4 class="m-0">Contrato - Lista de Contratos</h4>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success"><strong>{{session('info')}}</strong></div>
@endif

<div class="card">



<div class="card-body">
@include('adm/contrato.resume')

<div class="card-header" align="right">
    <a href="{{route('contrato.create', ['id' => $proyecto->id])}}" class="btn btn-primary"><span class="fas fa-file"></span> 
    &nbsp; Agregar contrato</a>  
</div>

<div class="table-responsive">
<table id="contratos" class="table table-striped table-hover table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-mexg1 text-white">
        <tr>
            <th scope="col">Fecha de firma de contrato</th>
            <th scope="col">Forma de pago</th>
            <th scope="col">Días para elaboración de contrato (Meta = 7 días hábiles)</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contratos as $contrato)
            <tr>
                <td>{{ $contrato->no34 }}</td>
                <td>{{ $contrato->no27 }}</td>
                <td>{{ $dias = (strtotime($contrato->no34)-strtotime($contrato->no33))/86400 }} días</td>
                <td width="10px"><a class="btn btn-info btn-sm" title="Editar" href="{{route('contrato.edit', $contrato->id)}}"><span class="fas fa-edit"></span></a></td>
                <td width="10px">
                <form action="{{route('contrato.destroy', $contrato->id)}}" id="form_eliminar_{{$contrato->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="button" id="btn_delete" onclick="Delete({{$contrato->id}});" title="Eliminar" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
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
        ¿Desea eliminar el contrato del proyecto?
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
        $('#contratos').DataTable({
            "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
            "language": espanol
        });
    } );

    function Delete(id){
        $('#confirmModal').modal('show');
        $('#btnEliminar').click(function(){
            document.getElementById("form_eliminar_"+id).submit();
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