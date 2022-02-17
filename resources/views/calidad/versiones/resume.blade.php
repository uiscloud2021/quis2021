    <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 ">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                <h3><b>Código de la versión: {{$versiones->no1}}</b></h3>
                </div>
                <div class="card-body pt-0">
                  <?php
                  $timestamp = strtotime($versiones->no2); 
                  $newDate = date("d-m-Y", $timestamp );
                  $timestamp2 = strtotime($versiones->no3); 
                  $newDate2 = date("d-m-Y", $timestamp2 );
                  ?>
                    <h1 class="lead"><b>Fecha de versión: {{$newDate}}</b></h1>
                    <p class="text-muted text-md"><b>Vigencia de versión: </b> {{$newDate2}} </p>
                  <div class="row">
                    <div class="col-4">
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Manuales: {{$versiones->no6}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Procesos: {{$versiones->no7}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Procedimientos: {{$versiones->no8}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Instructivos: {{$versiones->no9}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Formatos: {{$versiones->no10}}</li>
                      </ul>
                    </div>
                    <div class="col-4">
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Segmentos: {{$versiones->no11}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Capacitación: {{$versiones->no12}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Suma de documentos: {{$versiones->no13}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Cambio: {{$versiones->no4}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Motivo del cambio: {{$versiones->no5}}</li>
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