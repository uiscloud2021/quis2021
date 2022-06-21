    <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 ">
              <div class="card bg-light">
              <?php
                  $timestamp = strtotime($auditoria->no11); 
                  $newDate = date("d-m-Y", $timestamp );
                  $timestamp2 = strtotime($auditoria->no1); 
                  $newDate2 = date("d-m-Y", $timestamp2 );
                  ?>
                <div class="card-header text-muted border-bottom-0">
                <h3><b>Fecha de auditoría: {{$newDate}}</b></h3>
                </div>
                <div class="card-body pt-0">
                <h1 class="lead"><b>Fecha en que se programó: {{$newDate2}}</b></h1>
                    <p class="text-muted text-md"><b>Alcance: </b> {{$auditoria->no4}} </p>
                  <div class="row">
                    <div class="col-4">
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Requisitos</li>
                        @foreach ($requisitos as $req)
                          <li class="medium"><span class="fa-li"></span> {{$req->no12}}</li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="col-4">
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-archive"></i></span> Observaciones</li>
                        @foreach ($requisitos as $re)
                          <li class="medium"><span class="fa-li"></span> {{$re->no14}}</li>
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