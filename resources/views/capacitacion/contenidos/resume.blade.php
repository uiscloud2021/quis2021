    <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 ">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                <h3><b>Nombre del curso: {{$contenidos->no1}}</b></h3>
                </div>
                <div class="card-body pt-0">
                <h1 class="lead"><b>Justificación: {{$contenidos->no2}}</b></h1>
                    <p class="text-muted text-md"><b>Objetivos: </b> {{$contenidos->no3}} </p>
                  <div class="row">
                    <div class="col-4">
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Tiempo de entrega: {{$contenidos->no4}}</li>
                      </ul>
                    </div>
                    <div class="col-4">
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Proveedor: {{$contenidos->no5}}</li>
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