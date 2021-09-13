    <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 ">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                <h3><b>{{$empresa->razon_social}}</b></h3>
                </div>
                <div class="card-body pt-0">
                    <h1 class="lead"><b>{{$empresa->figura_legal}}</b></h1>
                    <p class="text-muted text-md"><b>Número de acta constitutiva: </b> {{$empresa->acta}} </p>
                  <div class="row">
                    <div class="col-4">
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-flag"></i></span> País: {{$empresa->pais}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-calendar-alt"></i></span> Constitución: {{$empresa->constitucion}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Acta Constitutiva electrónica: {{$empresa->acta_electronico}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Acta Constitutiva física: {{$empresa->acta_fisico}}</li>
                      </ul>
                    </div>
                    <div class="col-4">
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-id-card"></i></span> RFC: {{$empresa->rfc}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-id-card"></i></span> Registro IMSS: {{$empresa->imss}}</li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-users"></i></span> # Socios: </li>
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Domicilio: </li>
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