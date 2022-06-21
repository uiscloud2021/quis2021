    <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 ">
              <div class="card bg-light">
                  <?php
                  $timestamp = strtotime($intervencion->no1); 
                  $newDate = date("d-m-Y", $timestamp );
                  ?>
                <div class="card-header text-muted border-bottom-0">
                <h3><b>Nombre del curso: {{$intervencion->no4}}</b></h3>
                </div>
                <div class="card-body pt-0">
                <h1 class="lead"><b>Fecha del curso: {{$newDate}}</b></h1>
                    <p class="text-muted text-md"><b>Hora y lugar: </b> {{$intervencion->no2}} - {{$intervencion->no3}} </p>
                  <div class="row">
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