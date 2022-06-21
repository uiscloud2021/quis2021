@extends('adminlte::page')

@section('title', 'Calendario')

@section('content_header')
<h6 class="m-0">Calendario
{!! Form::select('tipo', $emp, null, ['id' => 'tipo', 'onchange' => 'Tipo(this.value)']) !!}
</h6>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success"><strong>{{session('info')}}</strong></div>
@endif

<div class="card">
    <div class="card-body">
        <div id='calendar'></div>
    </div>
</div>




<!-- Modal SALIR SIN GUARDAR-->
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
        ¿Desea salir sin guardar la información?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnCancelar" data-bs-toggle="modal" data-bs-target="#confirmModal" name="btnCancelar" class="btn btn-danger">Salir sin guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal ELIMINAR-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmación</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
                <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar el evento?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnEliminarRegistro" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal EVENTO-->
<div class="modal fade" id="createEventoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createEventoModalLabel">Nuevo evento</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_evento']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresa_id', null, ['class' => 'form-control', 'id'=>'empresa_id']) !!}
        {!! Form::hidden('id_evento', null, ['id' => 'id_evento']) !!}
        
        <div id="div_sitio">
        <div class="form-group" id="div1">
            {!! Form::label('no1', 'Título del evento', ['class' => 'form-label']) !!}
            {!! Form::text('no1', null, ['class' => 'form-control', 'placeholder' => 'Ingrese título', 'id' => 'no1']) !!}
        </div>

        <div class="form-group" id="div2">
            {!! Form::label('no2', 'Descripción', ['class' => 'form-label']) !!}
            {!! Form::textarea('no2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese descripción', 'id' => 'no2']) !!}
        </div>

        <div class="form-group" id="div7">
            {!! Form::label('no7', 'Lugar', ['class' => 'form-label']) !!}
            {!! Form::text('no7', null, ['class' => 'form-control', 'placeholder' => 'Ingrese lugar', 'id' => 'no7']) !!}
        </div>
        </div>

        <!-- SOLO HARMONIA -->
        <div id="div_harmonia">
        <div class="form-group" id="div8">
            {!! Form::label('no8', 'Cliente', ['class' => 'form-label']) !!}
            {!! Form::text('no8', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'no8']) !!}
        </div>

        <div class="form-group" id="div9">
            {!! Form::label('no9', 'Teléfono', ['class' => 'form-label']) !!}
            {!! Form::tel('no9', null, ['class' => 'form-control', 'placeholder' => 'Ingrese teléfono', 'id' => 'no9']) !!}
        </div>

        <div class="form-group" id="div10">
            {!! Form::label('no10', 'Servicio', ['class' => 'form-label']) !!}
            {!! Form::text('no10', null, ['class' => 'form-control', 'placeholder' => 'Ingrese servicio', 'id' => 'no10']) !!}
        </div>

        <div class="form-group" id="div11">
            {!! Form::label('no11', 'Técnico', ['class' => 'form-label']) !!}
            {!! Form::text('no11', null, ['class' => 'form-control', 'placeholder' => 'Ingrese técnico', 'id' => 'no11']) !!}
        </div>

        <div class="form-group" id="div12">
            {!! Form::label('no12', 'Cabina', ['class' => 'form-label']) !!}
            {!! Form::select('no12', ['Libre' => 'Libre', 'Cabina 1' => 'Cabina 1' , 'Cabina 2' => 'Cabina 2', 'Cabina 3' => 'Cabina 3', 'Doctora Santellanes' => 'Doctora Santellanes', 'Doctora Espinoza' => 'Doctora Espinoza'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no12']) !!}
        </div>

        <div class="form-group" id="div13">
            {!! Form::label('no13', 'Datos', ['class' => 'form-label']) !!}
            {!! Form::textarea('no13', null, ['class' => 'form-control', 'placeholder' => 'Ingrese datos', 'id' => 'no13']) !!}
        </div>

        <div class="form-group" id="div14">
            {!! Form::label('no14', 'Sexo del cliente', ['class' => 'form-label']) !!}
            {!! Form::select('no14', ['Femenino' => 'Femenino', 'Masculino' => 'Masculino'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no14']) !!}
        </div>

        <div class="form-group" id="div15">
            {!! Form::label('no15', 'Visita', ['class' => 'form-label']) !!}
            {!! Form::select('no15', ['Primera vez' => 'Primera vez', 'Subsecuente' => 'Subsecuente'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no15']) !!}
        </div>

        <div class="form-group" id="div16">
            {!! Form::label('no16', 'Diagnóstico', ['class' => 'form-label']) !!}
            {!! Form::textarea('no16', null, ['class' => 'form-control', 'placeholder' => 'Ingrese diagnóstico', 'id' => 'no16']) !!}
        </div>
        </div>
        <!-- FIN DE SOLO HARMONIA -->

        <div class="row">
        <div class="col-md-6">
        <div class="form-group" id="div3">
            {!! Form::label('no3', 'Fecha de inicio del evento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no3', null, ['class' => 'form-control', 'id' => 'no3']) !!}
            </div>
        </div>

        <div class="form-group" id="div5">
            {!! Form::label('no5', 'Fecha de fin del evento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no5', null, ['class' => 'form-control', 'id' => 'no5']) !!}
            </div>
        </div>
        </div>

        <div class="col-md-6">
        <div class="form-group" id="div4">
            {!! Form::label('no4', 'Hora de inicio del evento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                {!! Form::time('no4', null, ['class' => 'form-control', 'id' => 'no4']) !!}
            </div>
        </div>

        <div class="form-group" id="div6">
            {!! Form::label('no6', 'Hora de fin del evento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                {!! Form::time('no6', null, ['class' => 'form-control', 'id' => 'no6']) !!}
            </div>
        </div>
        </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal"><i class="fas fa-arrow-left"> Cancelar</i></button>
        <button type="button" id="btnEliminar" style="display:none" onclick="delete_evento()" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-trash"> Eliminar</i></button>
        <button type="submit" id="btnGEvento" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


@stop

@section('css')
    <link href="{{ asset('fullcalendar/lib/main.css') }}" rel='stylesheet' />
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('fullcalendar/lib/main.js?1') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script type="text/javascript">
      var calendar="";
      $(document).ready(function() {
        Tipo();
      } );

        //document.addEventListener('DOMContentLoaded', function() {
        function Tipo(){
          tipo=$('#tipo').val();
        var calendarEl = document.getElementById('calendar');
        calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap',

            buttonText: {
              today: 'Hoy',
              month: 'Mes',
              week: 'Semana',
              day: 'Día',
              list: 'Lista'
            },
            headerToolbar: {
                left: 'prev,next today newEvent',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            navLinks: true,
            editable: false,
            selectable: true,

            customButtons:{ //FUNCION PARA NUEVO BOTON DE EVENTO Y MODAL
                newEvent:{
                    text: 'Nuevo evento',
                    click: function(){
                        $('#id_evento').val("");
                        $('#empresa_id').val("");
                        $('#no1').val("");
                        $('#no2').val("");
                        $('#no3').val("");
                        $('#no4').val("");
                        $('#no5').val("");
                        $('#no6').val("");
                        $('#no7').val("");
                        $('#no8').val("");
                        $('#no9').val("");
                        $('#no10').val("");
                        $('#no11').val("");
                        $('#no12').val("");
                        $('#no13').val("");
                        $('#no14').val("");
                        $('#no15').val("");
                        $('#no16').val("");
                        if(tipo==10 || tipo==11){
                          $('#div_sitio').hide();
                          $('#div_harmonia').show();
                        }else{
                          $('#div_sitio').show();
                          $('#div_harmonia').hide();
                        }
                        $('#createEventoModal').modal('toggle');
                        $('#btnEliminar').hide();
                    }
                }
            },
            dateClick: function(info){ //FUNCION PARA CARGAR MODAL VACIO 
                $('#no3').val(info.dateStr);
                $('#id_evento').val("");
                $('#empresa_id').val("");
                $('#no1').val("");
                $('#no2').val("");
                $('#no4').val("");
                $('#no5').val("");
                $('#no6').val("");
                $('#no7').val("");
                $('#no8').val("");
                $('#no9').val("");
                $('#no10').val("");
                $('#no11').val("");
                $('#no12').val("");
                $('#no13').val("");
                $('#no14').val("");
                $('#no15').val("");
                $('#no16').val("");
                if(tipo==10 || tipo==11){
                  $('#div_sitio').hide();
                  $('#div_harmonia').show();
                }else{
                  $('#div_sitio').show();
                  $('#div_harmonia').hide();
                }
                $('#createEventoModal').modal('toggle');
                $('#btnEliminar').hide();
            },
            eventClick: function(info){ //FUNCION PARA EDITAR EN MODAL
                mes_start = info.event.start.getMonth()+1;
                dia_start = info.event.start.getDate();
                anio_start = info.event.start.getFullYear();
                h_start = info.event.start.getHours();
                m_start = info.event.start.getMinutes();
                //hora_start = info.event.start.getHours()+":"+info.event.start.getMinutes();

                mes_end = info.event.end.getMonth()+1;
                dia_end = info.event.end.getDate();
                anio_end = info.event.end.getFullYear();
                h_end = info.event.end.getHours();
                m_end = info.event.end.getMinutes();
                //hora_end = info.event.end.getHours()+":"+info.event.end.getMinutes();

                mes_start = (mes_start<10)?"0"+mes_start:mes_start;
                mes_end = (mes_end<10)?"0"+mes_end:mes_end;
                dia_start = (dia_start<10)?"0"+dia_start:dia_start;
                dia_end = (dia_end<10)?"0"+dia_end:dia_end;

                h_start = (h_start<10)?"0"+h_start:h_start;
                m_start = (m_start<10)?"0"+m_start:m_start;

                h_end = (h_end<10)?"0"+h_start:h_start;
                m_end = (m_end<10)?"0"+m_end:m_end;

                hora_start = h_start+":"+m_start;
                hora_end = h_end+":"+m_end;

                $('#id_evento').val(info.event.id);
                $('#no1').val(info.event.title);
                $('#no2').val(info.event.extendedProps.description);
                $('#no3').val(anio_start+"-"+mes_start+"-"+dia_start);
                $('#no4').val(hora_start);
                $('#no5').val(anio_end+"-"+mes_end+"-"+dia_end);
                $('#no6').val(hora_end);
                $('#no7').val(info.event.extendedProps.lugar);
                $('#no8').val(info.event.extendedProps.cliente);
                $('#no9').val(info.event.extendedProps.telefono);
                $('#no10').val(info.event.extendedProps.servicio);
                $('#no11').val(info.event.extendedProps.tecnico);
                $('#no12').val(info.event.extendedProps.cabina);
                $('#no13').val(info.event.extendedProps.datos);
                $('#no14').val(info.event.extendedProps.sexo);
                $('#no15').val(info.event.extendedProps.visita);
                $('#no16').val(info.event.extendedProps.diagnostico);
                $('#empresa_id').val(info.event.extendedProps.empresa_id);
                if(tipo==10 || tipo==11){
                  $('#div_sitio').hide();
                  $('#div_harmonia').show();
                }else{
                  $('#div_sitio').show();
                  $('#div_harmonia').hide();
                }
                $('#createEventoModal').modal('toggle');
                $('#btnEliminar').show();
            },
            eventMouseEnter: function(calEvent) { //FUNCION PARA RESUMEN
              mes_start = calEvent.event.start.getMonth()+1;
              dia_start = calEvent.event.start.getDate();
              anio_start = calEvent.event.start.getFullYear();
              h_start = calEvent.event.start.getHours();
              m_start = calEvent.event.start.getMinutes();
              //hora_start = calEvent.event.start.getHours()+":"+calEvent.event.start.getMinutes();

              mes_end = calEvent.event.end.getMonth()+1;
              dia_end = calEvent.event.end.getDate();
              anio_end = calEvent.event.end.getFullYear();
              h_end = calEvent.event.end.getHours();
              m_end = calEvent.event.end.getMinutes();
              //hora_end = calEvent.event.end.getHours()+":"+calEvent.event.end.getMinutes();

              mes_start = (mes_start<10)?"0"+mes_start:mes_start;
              mes_end = (mes_end<10)?"0"+mes_end:mes_end;
              dia_start = (dia_start<10)?"0"+dia_start:dia_start;
              dia_end = (dia_end<10)?"0"+dia_end:dia_end;

              h_start = (h_start<10)?"0"+h_start:h_start;
              m_start = (m_start<10)?"0"+m_start:m_start;

              h_end = (h_end<10)?"0"+h_end:h_end;
              m_end = (m_end<10)?"0"+m_end:m_end;

              hora_start = h_start+":"+m_start;
              hora_end = h_end+":"+m_end;

              fecha_start = dia_start+"-"+mes_start+"-"+anio_start;
              fecha_end = dia_end+"-"+mes_end+"-"+anio_end;

              if(tipo==1 || tipo==2 || tipo==5 || tipo==6){
                var tooltip = '<div class="tooltipevent" style="width:auto;height:auto;background:rgba(0,0,0,0.4);color:#fff;font-weight:bold;font-size:14px;position:absolute;z-index:10001;padding:10px 10px 10px 10px ;  line-height: 200%;">' 
                + calEvent.event.title + '</br>' + calEvent.event.extendedProps.description + '</br>'
                + fecha_start + '  ' +hora_start+ '</br>' + fecha_end + '  ' +hora_end+ '</div>';
              }else{
                var tooltip = '<div class="tooltipevent" style="width:auto;height:auto;background:rgba(0,0,0,0.4);color:#fff;font-weight:bold;font-size:14px;position:absolute;z-index:10001;padding:10px 10px 10px 10px ;  line-height: 200%;">' 
                + calEvent.event.extendedProps.cabina + '</br>' + calEvent.event.extendedProps.datos + '</br>'
                + fecha_start + '  ' +hora_start+ '</br>' + fecha_end + '  ' +hora_end+ '</div>';
              }

              
              $("body").append(tooltip);
              $(this.el).mouseover(function(e) {
                $(this.el).css('z-index', 10000);
                $('.tooltipevent').fadeIn('500');
                $('.tooltipevent').fadeTo('10', 1.9);
              }).mousemove(function(e) {
                $('.tooltipevent').css('top', e.pageY + 10);
                $('.tooltipevent').css('left', e.pageX + 20);
              });
            },
            eventMouseLeave: function(calEvent, jsEvent) {
              $(this.el).css('z-index', 8);
              $('.tooltipevent').remove();
            },
            events: '/calendario/get_show/' + tipo //FUNCION PARA CARGAR CALENDARIO
      
        });

        calendar.setOption('locale', 'ES');

        calendar.render();

      //});
      }

      $('#formcreate_evento').on('submit', function(e) {
        e.preventDefault();
        no1=$('#no1').val();
        no3=$('#no3').val();
        no4=$('#no4').val();
        no5=$('#no5').val();
        no6=$('#no6').val();
        tipo=$('#tipo').val();
        $('#empresa_id').val(tipo);
        var formData = new FormData(this);
        formData.append('_token', $('input[name=_token]').val());
        if(no3!="" && no4!="" && no5!="" && no6!=""){
          $.ajax({
            url: "{{route('calendario.store')}}",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(resp){
                if(resp == "guardado"){
                    $('#createEventoModal').modal('hide');
                    toastr.success('El evento fue guardado correctamente', 'Guardar evento', {timeOut:3000});
                    calendar.refetchEvents();
                }else{
                    toastr.warning('El evento ya se encuentra dado de alta', 'Guardar evento', {timeOut:3000});
                }
            }
          });
        }else{
          alert("No pueden estar las fechas de inicio, hora de inicio, fecha de fin y hora de fin vacíos");
        }
      });

      function delete_evento(){
        id_evento=$('#id_evento').val();
        $('#deleteModal').modal('show');
        $('#btnEliminarRegistro').click(function(){
          $.ajax({
            url: "/calendario/delete",
            method:'POST',
            type: 'post',
            data:{id_evento:id_evento, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El evento fue eliminado correctamente', 'Eliminar evento', {timeOut:3000});
                    calendar.refetchEvents();
                }
            }
          });
        })
      }
    </script>
@stop

