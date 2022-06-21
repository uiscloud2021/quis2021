    <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 ">
              <div class="card bg-light">
              <?php
                if($ganado->no5!=""){
                  $timestamp = strtotime($ganado->no5); 
                  $newDate = date("d-m-Y", $timestamp );
                }else{
                  $newDate = "";
                }
                  ?>
                <div class="card-header text-muted border-bottom-0">
                <h3><b>Especie: {{$ganado->no2}}</b></h3>
                </div>
                <div class="card-body pt-0">
                <h1 class="lead"><b>Arete SINIGA: {{$ganado->no3}}</b></h1>
                    <p class="text-muted text-md"><b>Arete RExBiot: </b> {{$ganado->no4}} </p>
                  <div class="row">
                    <div class="col-6">
                      <ul class="ml-6 mb-0 fa-ul text-muted">
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Fecha de nacimiento: {{$newDate}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Color: {{$ganado->no6}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Nacido en RExBiot: {{$ganado->no13}}</li>
                      </ul>
                    </div>
                    <div class="col-6">
                      <ul class="ml-6 mb-0 fa-ul text-muted">
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Raza: {{$ganado->no7}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Sexo: {{$ganado->no8}}</li>
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