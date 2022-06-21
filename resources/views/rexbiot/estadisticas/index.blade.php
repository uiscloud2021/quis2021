@extends('adminlte::page')

@section('title', 'Estadísticas')

@section('content_header')
    <h4 class="m-0">Estadísticas</h4>
@stop

@section('content')

    <div class="card">

        <div class="card-body">
        <div class="table-responsive">
        <div class="container-fluid">
            <div class="row">
              <div align="center" class="col-2">
                <table style="width:100%;">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Raza</th>
                  </tr>
                </table>
                {!! Form::select('raza', ['Media' => 'Media', 'Angus' => 'Angus', 'Angus de registro' => 'Angus de registro', 'Brangus' => 'Brangus', 'Herford' => 'Herford', 'Braford' => 'Braford', 'Cruza' => 'Cruza', 'Charolais' => 'Charolais', 'BlackBaldy' => 'BlackBaldy'], null, ['class' => 'form-control', 'onchange' => 'Raza(this.value)']) !!}
                <br/>
                <!--<table style="width:80%;">
                  <tr>
                    <th scope="col">Fechas</th>
                    <th scope="col"></th>
                  </tr>
                  <tr>
                    <td>Desde</td>
                    <td>{!! Form::date('fecha1', null, ['class' => 'form-control', 'id' => 'fecha1']) !!}</td>
                  </tr>
                  <tr>
                    <td>Hasta</td>
                    <td>{!! Form::date('fecha2', null, ['class' => 'form-control', 'id' => 'fecha2']) !!}</td>
                  </tr>
                </table>-->
              </div>

              <div align="center" class="col-10">
                <div align="center" style="width: 900px; height: 700px" >
                    <div id="curve_chart"></div>
                </div>
              </div>
            </div>
        </div>
        </div>
        </div>
    </div>
@stop

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">
@stop

@section('js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script type="text/javascript">
    
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fechas', 'Media'],
          @foreach ($ganado as $gan)
            @if($gan->media == null)
              ["{{ $gan->fecha }}", 0],
            @else
              ["{{ $gan->fecha }}", {{ $gan->media}}],
            @endif
          @endforeach
        ]);

        var options = {
          hAxis: {
            title: 'Fechas'
          },
          vAxis: {
            title: 'Peso (kg)'
            /*viewWindow: {
              min: 0
            }*/
          },
          colors: ['#AB0D06'],
          title: 'Peso de ganado',
          curveType: 'function',
          width: 900,
          height: 400
          //legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }



      function Raza(raza){
        //fecha1=$('#fecha1').val();
        //fecha2=$('#fecha2').val();
          $.ajax({
            url: "/estadisticas/graficas",
            method:'POST',
            dataType: 'json',
            //data:{_token:$('input[name="_token"]').val(), raza:raza, fecha1:fecha1, fecha2:fecha2},
            data:{_token:$('input[name="_token"]').val(), raza:raza},
            success:function(grafica){
              var media = JSON.parse(grafica.media);
              var otro = JSON.parse(grafica.otra);
              
              if(raza != "Media"){
                var arrAng = [['Fecha', 'Media', raza]];
                media.forEach(function(med) {
                  otro.forEach(function(ang) {
                    if(med.media == null){
                      med.media=0;
                    }
                    if(ang.media == null){
                      ang.media=0;
                    }
                    if(med.fecha == ang.fecha){
                      arrAng.push([med.fecha, med.media, ang.media]);
                    }/*else{
                      arrAng.push([med.fecha, med.media, 0]);
                    }*/
                  });
                });
              }else{
                var arrAng = [['Fecha', 'Media']];
                media.forEach(function(med) {
                  if(med.media == null){
                    med.media=0;
                  }
                  arrAng.push([med.fecha, med.media]);
                });
              }
              
              var dat = google.visualization.arrayToDataTable(arrAng);
              if(raza != "Media"){
              var options = {
                hAxis: {
                  title: 'Fechas'
                },
                vAxis: {
                  title: 'Peso (kg)'
                },
                colors: ['#AB0D06', '#0000FF'],
                  title: 'Peso de ganado',
                  curveType: 'function',
                  width: 900,
                  height: 400
              };
              }else{
              var options = {
                hAxis: {
                  title: 'Fechas'
                },
                vAxis: {
                  title: 'Peso (kg)'
                },
                colors: ['#AB0D06'],
                  title: 'Peso de ganado',
                  curveType: 'function',
                  width: 900,
                  height: 400
              };
              }

              var chart2 = new google.visualization.LineChart(document.getElementById('curve_chart'));
              chart2.draw(dat, options);
            }
          });
      }
    </script>
@stop