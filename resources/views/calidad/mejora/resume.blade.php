    <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 ">
              <div class="card bg-light">
              <?php
                  $timestamp = strtotime($mejora->no1); 
                  $newDate = date("d-m-Y", $timestamp );
                  $timestamp2 = strtotime($mejora->no7); 
                  $newDate2 = date("d-m-Y", $timestamp2 );

                  $dias = ($timestamp2-$timestamp)/86400;
                  if($dias<=3){
                    $cal="Si";
                  }else{
                    $cal="No";
                  }
                  ?>
                <div class="card-header text-muted border-bottom-0">
                <h3><b>Fecha de reporte: {{$newDate}}</b></h3>
                </div>
                <div class="card-body pt-0">
                <h1 class="lead"><b>Código No conformidad: {{$mejora->no2}}</b></h1>
                    <p class="text-muted text-md"><b>Origen: </b> {{$mejora->no3}} </p>
                    <p class="text-muted text-md"><b>Fecha de atención: </b> {{$newDate2}} </p>
                  <div class="row">
                    <div class="col-4">
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                      <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-calendar"></i></span> <b>Días entre fecha de No conformidad y fecha de Atención de la NC: </b> {{$dias}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> <b>Descripción: </b><br/> {{$mejora->no6}}</li>
                        
                      </ul>
                    </div>
                    <div class="col-4">
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                      <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-calendar"></i></span> <b>Tiempo de atención a reportes de No conformidad ≤ 3 días: </b> {{$cal}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> <b>Acción: </b><br/> {{$mejora->no10}}</li>
                        
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm btn-green">
                      <i class="fas fa-file-pdf"></i> Ver PDF
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>