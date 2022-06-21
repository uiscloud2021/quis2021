@extends('adminlte::page')

@section('title', 'Ganado')

@section('content_header')
<h4 class="m-0">Lista de ganado</h4>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success"><strong>{{session('info')}}</strong></div>
@endif

<div class="card">


<div class="card-header" align="right">
    <a href="{{route('ganado.create')}}" class="btn btn-primary"><span class="fas fa-file"></span> 
    &nbsp; Agregar ganado</a>  
</div>


<div class="card-body">
<div class="table-responsive">
<table id="ganado" class="table table-striped table-hover table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-mexg1 text-white">
        <tr >
            <th scope="col">Arete SINIGA <span></span></th>
            <th scope="col">Arete RExBiot <span></span></th>
            <th scope="col">Especie <span></span></th>
            <th scope="col">Sexo <span></span></th>
            <th scope="col">Raza <span></span></th>
            <th scope="col">Nacido RExBiot <span></span></th>
            <th scope="col">Color <span></span></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ganados as $ganado)
            <tr>
                <td>{{ $ganado->no3 }}</td>
                <td>{{ $ganado->no4 }}</td>
                <td>{{ $ganado->no2 }}</td>
                <td>{{ $ganado->no8 }}</td>
                <td>{{ $ganado->no7 }}</td>
                <td>{{ $ganado->no13 }}</td>
                <td>{{ $ganado->no6 }}</td>
                <td width="10px"><a class="btn btn-info btn-sm" title="Editar" href="{{route('ganado.edit', $ganado->id)}}"><span class="fas fa-edit"></span></a></td>
                <td width="10px">
                <form action="{{route('ganado.destroy',$ganado->id)}}" id="form_eliminar_{{$ganado->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="button" id="btn_delete" onclick="Delete({{$ganado->id}});" title="Eliminar" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>
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
        ¿Desea eliminar el ganado?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnEliminar" data-bs-toggle="modal" data-bs-target="#confirmModal" name="btnEliminar" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal CREAR MANEJO-->
<div class="modal fade" id="createManejoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createManejoModalLabel">Nuevo manejo</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_manejo']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}
        {!! Form::hidden('id_manejo', null, ['id' => 'id_manejo']) !!}

        <div class="form-group" id="div24">
            {!! Form::label('no24', '24. Fecha de manejo', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no24', null, ['class' => 'form-control', 'id' => 'no24']) !!}
            </div>
        </div>

        <div >
          {!! Form::hidden('no_ganado', null, ['class' => 'form-control', 'id' => 'no_ganado']) !!}
          <table id="tbl_mani" class="table table-striped " style="width:100%;">
            <thead class="bg-mexg1 text-white">
              <tr >
                <th scope="col"></th>
                <th scope="col">Arete SINIGA <span></span></th>
                <th scope="col">Arete RExBiot <span></span></th>
                
            </tr>
            </thead>
            <tbody>
            @foreach ($ganados as $gan)
              <tr>
                <td><input type="checkbox" name="ganados[]" id="gan{{$gan->id}}" value="{{$gan->id}}"></input></td>
                <td>{{$gan->no3}}</td>
                <td>{{$gan->no4}}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>

        <div class="form-group" id="div27">
            {!! Form::label('no27', '27. Prueba de tuberculina, brucelosis, T8 y Rivanol', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no27', 'Si', null, ['class' => 'mr-1', 'id' => 'no27_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no27', 'No', null, ['class' => 'mr-1', 'id' => 'no27_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div28" >
            {!! Form::label('no28', '28. Reactora', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no28', 'Si', null, ['class' => 'mr-1', 'id' => 'no28_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no28', 'No', null, ['class' => 'mr-1', 'id' => 'no28_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div29">
            {!! Form::label('no29', '29. Medicinas y Vacunas', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no29', 'Si', null, ['class' => 'mr-1', 'id' => 'no29_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no29', 'No', null, ['class' => 'mr-1', 'id' => 'no29_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divmedicinas" >
          {!! Form::hidden('no_medicinas', null, ['class' => 'form-control', 'id' => 'no_medicinas']) !!}
          <table class="table table-striped" style="width:100%;">
            <tr>
              <th scope="col"></th>
              <th scope="col">Medicina o vacuna</th>
            </tr>
            @foreach ($medicinas as $medicina)
              <tr>
                <td><input type="checkbox" name="vacunas[]" id="vac{{$medicina->id}}" value="{{$medicina->id}}"></input></td>
                <td>{{$medicina->no_vacuna}}</td>
              </tr>
            @endforeach
          </table>
        </div>

        <div class="form-group" id="div30" >
            {!! Form::label('no30', '30. Palpación', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no30', 'Si', null, ['class' => 'mr-1', 'id' => 'no30_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no30', 'No', null, ['class' => 'mr-1', 'id' => 'no30_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div31" >
            {!! Form::label('no31', '31. Estado', ['class' => 'form-label']) !!}
            {!! Form::select('no31', ['Preñada' => 'Preñada', 'Vacía' => 'Vacía'], null, ['class' => 'form-control', 'id' => 'no31', 'placeholder' => 'Seleccione...', 'onchange' => 'Estado(this.value)']) !!}
        </div>

        <div class="form-group" id="div32" >
            {!! Form::label('no32', '32. Número de preñez', ['class' => 'form-label']) !!}
            {!! Form::text('no32', null, ['class' => 'form-control', 'id' => 'no32', 'placeholder' => 'Ingrese número']) !!}
        </div>

        <div class="form-group" id="div33" >
            {!! Form::label('no33', '33. Tipo de preñez', ['class' => 'form-label']) !!}
            {!! Form::select('no33', ['Natural' => 'Natural', 'Artificial' => 'Artificial'], null, ['class' => 'form-control', 'id' => 'no33', 'placeholder' => 'Seleccione...']) !!}
        </div>

        <div class="form-group" id="div34" >
            {!! Form::label('no34', '34. Fecha probable de parto', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no34', null, ['class' => 'form-control', 'id' => 'no34']) !!}
            </div>
        </div>

        <div class="form-group" id="div35" >
            {!! Form::label('no35', '35. Sometida a inseminación', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no35', 'Si', null, ['class' => 'mr-1', 'id' => 'no35_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no35', 'No', null, ['class' => 'mr-1', 'id' => 'no35_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div36" >
            {!! Form::label('no36', '36. Colocación de dispositivo de sincronización', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no36', 'Si', null, ['class' => 'mr-1', 'id' => 'no36_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no36', 'No', null, ['class' => 'mr-1', 'id' => 'no36_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div37" >
            {!! Form::label('no37', '37. Hormonas de sincronización', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no37', 'Si', null, ['class' => 'mr-1', 'id' => 'no37_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no37', 'No', null, ['class' => 'mr-1', 'id' => 'no37_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div38" >
            {!! Form::label('no38', '38. Retiro de dispositivo', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no38', 'Si', null, ['class' => 'mr-1', 'id' => 'no38_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no38', 'No', null, ['class' => 'mr-1', 'id' => 'no38_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div39" >
            {!! Form::label('no39', '39. Inseminación', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no39', 'Si', null, ['class' => 'mr-1', 'id' => 'no39_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no39', 'No', null, ['class' => 'mr-1', 'id' => 'no39_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div40" >
            {!! Form::label('no40', '40. Origen del semen', ['class' => 'form-label']) !!}
            {!! Form::text('no40', null, ['class' => 'form-control', 'id' => 'no40', 'placeholder' => 'Ingrese origen']) !!}
        </div>

        <div class="form-group" id="div41" >
            {!! Form::label('no41', '41. Prueba de fertilidad', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no41', 'Si', null, ['class' => 'mr-1', 'id' => 'no41_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no41', 'No', null, ['class' => 'mr-1', 'id' => 'no41_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div42" >
            {!! Form::label('no42', '42. Resultado de conteo', ['class' => 'form-label']) !!}
            {!! Form::text('no42', null, ['class' => 'form-control', 'id' => 'no42', 'placeholder' => 'Ingrese resultado']) !!}
        </div>

        <div class="form-group" id="div43">
            {!! Form::label('no43', '43. Comentarios del manejo', ['class' => 'form-label']) !!}
            {!! Form::textarea('no43', null, ['class' => 'form-control', 'id' => 'no43', 'placeholder' => 'Ingrese comentarios']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGManejo" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


@stop

@section('css')
    <!--<link rel="stylesheet" href="/css/admin_custom.css">-->
    <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
    <script>
    $(document).ready(function() {

        $('#ganado thead tr th span').each( function () {
            $(this).html( '<input type="text" style="width:90%" id="filtrar" placeholder="Filtrar" />' );
        } );

        var table = $('#ganado').DataTable({
            "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
            dom: '<"row"<"col-sm-12 col-md-4"l><"col-sm-12 col-md-4"<"dt-buttons btn-group flex-wrap"B>><"col-sm-12 col-md-4"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            stateSave: false,
            buttons: [
            {
                extend:    'excelHtml5', 
                text:      '<i class="fa fa-fw fa-file-excel"> </i>',
                className: 'btn-warning',
                title: 'Ganado RExBiot',
                exportOptions: {
                    columns: ':visible'
                },
                titleAttr: 'Excel'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-fw fa-file-pdf"> </i>',
                className: 'btn-warning',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                title: 'Ganado RExBiot',
                exportOptions: {
                    columns: ':visible' 
                },
                titleAttr: 'PDF'
            },
            /*{
                text: 'Columnas',
                extend: 'colvis',
                postfixButtons: [ 'colvisRestore' ]
            },*/
            {
                text: 'Exportar todo',
                action: function ( e, dt, node, config ) {
                    alert( 'Botón inactivo' );
                }
            },
            {
                text: 'Manejos',
                action: function ( e, dt, node, config ) {
                    CreateManejo();
                }
            }
            ],
            
            "language": espanol,
        });

        $('#tbl_mani').DataTable({
          "lengthMenu": [[-1], ["Todos"]],
          "language": espanol,
          "lengthChange": false,
          "searching": true,
          "autoWidth": true,
          "info": false,
        });



        // Aplicamos los filtros en las columnas del array
        /*table.columns().eq( 0 ).each( function ( colIdx ) { 
          $( 'input', table.column( colIdx ).header() ).on( 'keyup change', function () {
            table .column( colIdx ) .search( this.value ) .draw(); 
          } ); 
        } );*/
        
        table.columns().every( function () {
            var that = this;
            $( 'input', this.header() ).on( 'keyup change', function () {
                if (that.search() !== this.value ) {
                    that.search(this.value)
                    .draw();
                }
            });
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
            "colvis": 'Change columns',
            "copyHtml5": "Copiar",
            "colvis": "Visibilidad"
        }
    };


    

    function CreateManejo(){
        $('#id_manejo').val("");
        $('#no24').val("");
        $('#no25').val("");
        $('#no26').val("");
        $('#no27_si').attr('checked', false);
        $('#no27_no').attr('checked', false);
        $('#no28_si').attr('checked', false);
        $('#no28_no').attr('checked', false);
        $('#no29_si').attr('checked', false);
        $('#no29_no').attr('checked', false);
        $('#no30_si').attr('checked', false);
        $('#no30_no').attr('checked', false);
        $('#no31').val("");
        $('#no32').val("");
        $('#no33').val("");
        $('#no34').val("");
        $('#no35_si').attr('checked', false);
        $('#no35_no').attr('checked', false);
        $('#no36_si').attr('checked', false);
        $('#no36_no').attr('checked', false);
        $('#no37_si').attr('checked', false);
        $('#no37_no').attr('checked', false);
        $('#no38_si').attr('checked', false);
        $('#no38_no').attr('checked', false);
        $('#no39_si').attr('checked', false);
        $('#no39_no').attr('checked', false);
        $('#no40').val("");
        $('#no41_si').attr('checked', false);
        $('#no41_no').attr('checked', false);
        $('#no42').val("");
        $('#no43').val("");
        $('#no_medicinas').val("");
        $('#createManejoModal').modal('toggle');
    }

    $('#formcreate_manejo').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('_token', $('input[name=_token]').val());
        no24=$('#no24').val();
        if(no24!=""){
            $.ajax({
                url: "/ganado/create_manejos",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGManejo').hide();
                },
                success:function(resp){
                    if(resp == "guardado"){
                        $('#createManejoModal').modal('hide');
                        toastr.success('El manejo fue guardado correctamente', 'Guardar manejo', {timeOut:3000});
                        if(id==""){
                            location.reload();
                        }else{
                            $('#btnGManejo').show();
                            location.reload();
                        }
                    }else{
                        $('#btnGManejo').show();
                        toastr.warning('El manejo ya se encuentra dado de alta', 'Guardar manejo', {timeOut:3000});
                    }
                }
            });
        }else{
            alert("No puede estar la fecha de manejo vacía");
        }
    });
    </script>
@stop