    <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 ">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                <h3><b>Fecha de denuncia: {{$denuncia->no1}}</b></h3>
                </div>
                <div class="card-body pt-0">
                <h1 class="lead"><b>Fecha de los hechos: {{$denuncia->no2}}</b></h1>
                    <p class="text-muted text-md"><b>Hora: </b> {{$denuncia->no3}} </p>
                  <div class="row">
                    <div class="col-4">
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Hechos: {{$denuncia->no4}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Dirección, ciudad, teléfono: {{$denuncia->no6}}</li>
                      </ul>
                    </div>
                    <div class="col-4">
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Nombre: {{$denuncia->no5}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Ciudad: {{$denuncia->no7}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Relación con UIS: {{$denuncia->no8}}</li>
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