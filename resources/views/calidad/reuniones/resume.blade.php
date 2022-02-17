    <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 ">
              <div class="card bg-light">
              <?php
                  $timestamp = strtotime($reuniones->no1); 
                  $newDate = date("d-m-Y", $timestamp );
                  $timestamp2 = strtotime($reuniones->no8); 
                  $newDate2 = date("d-m-Y", $timestamp2 );
                  ?>
                <div class="card-header text-muted border-bottom-0">
                <h3><b>Fecha de reunión: {{$newDate}}</b></h3>
                </div>
                <div class="card-body pt-0">
                <h1 class="lead"><b>Verificador: {{$cand->no62}}</b></h1>
                    <p class="text-muted text-md"><b>Fecha de verificación: </b> {{$newDate2}} </p>
                  <div class="row">
                    <div class="col-4">
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Asuntos</li>
                        @foreach ($asuntos as $as)
                          <li class="medium"><span class="fa-li"></span> {{$as->no3}}</li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="col-4">
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Acuerdos</li>
                        @foreach ($asuntos as $asu)
                          <li class="medium"><span class="fa-li"></span> {{$asu->no4}}</li>
                        @endforeach
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