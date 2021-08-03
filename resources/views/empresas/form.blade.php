    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Gestión
            </h3>
          </div>
          <div class="card-body">
            <h6>Menú de preguntas</h6>
            <div class="row">
              <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="vert-tabs-0-tab" data-toggle="pill" href="#vert-tabs-0" role="tab" aria-controls="vert-tabs-0" aria-selected="true">Resumen</a>
                  <a class="nav-link" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false">Identidad empresa</a>
                  <a class="nav-link" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="false">Socios</a>
                  <a class="nav-link" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" role="tab" aria-controls="vert-tabs-3" aria-selected="false">Domicilios</a>
                  <a class="nav-link" id="vert-tabs-4-tab" data-toggle="pill" href="#vert-tabs-4" role="tab" aria-controls="vert-tabs-4" aria-selected="false">RFC, IMSS, SAT</a>
                  <a class="nav-link" id="vert-tabs-5-tab" data-toggle="pill" href="#vert-tabs-5" role="tab" aria-controls="vert-tabs-5" aria-selected="false">Representante legal</a>
                  <a class="nav-link" id="vert-tabs-6-tab" data-toggle="pill" href="#vert-tabs-6" role="tab" aria-controls="vert-tabs-6" aria-selected="false">Documentos regulatorios</a>
                  <a class="nav-link" id="vert-tabs-7-tab" data-toggle="pill" href="#vert-tabs-7" role="tab" aria-controls="vert-tabs-7" aria-selected="false">Responsabilidades regulatorias</a>
                  <a class="nav-link" id="vert-tabs-8-tab" data-toggle="pill" href="#vert-tabs-8" role="tab" aria-controls="vert-tabs-8" aria-selected="false">Representante sanitario</a>
                  <a class="nav-link" id="vert-tabs-9-tab" data-toggle="pill" href="#vert-tabs-9" role="tab" aria-controls="vert-tabs-9" aria-selected="false">Cuentas bancarias</a>
                  <a class="nav-link" id="vert-tabs-10-tab" data-toggle="pill" href="#vert-tabs-10" role="tab" aria-controls="vert-tabs-10" aria-selected="false">Propiedad intelectual</a>
                  <a class="nav-link" id="vert-tabs-11-tab" data-toggle="pill" href="#vert-tabs-11" role="tab" aria-controls="vert-tabs-11" aria-selected="false">Vinculación</a>
                  <a class="nav-link" id="vert-tabs-12-tab" data-toggle="pill" href="#vert-tabs-12" role="tab" aria-controls="vert-tabs-12" aria-selected="false">Menús</a>
                </div>
              </div>
              <div class="col-7 col-sm-9">
                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="vert-tabs-0" role="tabpanel" aria-labelledby="vert-tabs-0-tab">
                     Resumen de Gestión
                  </div>

                  <!--IDENTIDAD EMPRESA-->
                  <div class="tab-pane fade" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <div class="form-group">
                        {!! Form::label('razon_social', '1. Razón social', ['class' => 'form-label']) !!}
                        {!! Form::text('razon_social', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la razón social']) !!}
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id', 'readonly']) !!}
              
                        @error('razon_social')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        {!! Form::label('pais', '2. País', ['class' => 'form-label']) !!}
                        {!! Form::text('pais', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el pais']) !!}
                    </div>
            
                    <div class="form-group">
                        {!! Form::label('figura_legal', '3. Figura legal', ['class' => 'form-label']) !!}
                        {!! Form::text('figura_legal', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la figura legal']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('constitucion', '4. Fecha de constitución', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('constitucion', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>
            
                    <div class="form-group">
                        {!! Form::label('acta', '5. Número de acta constitutiva', ['class' => 'form-label']) !!}
                        {!! Form::text('acta', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el número de acta']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('acta_fisico', '6. Se archivó el acta constitutiva en expediente físico', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('acta_fisico', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label><br/>
                            <label>
                                {!! Form::radio('acta_fisico', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
            
                    <div class="form-group">
                        {!! Form::label('acta_electronico', '7. Se archivó el acta constitutiva en expediente electrónico', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('acta_electronico', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label><br/>
                            <label>
                                {!! Form::radio('acta_electronico', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                  </div>

                  <!--SOCIOS-->
                  <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateSocio();">
                                <i class="fas fa-file"> Agregar socio</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_socios" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre del socio</th>
                                <th scope="col">Participación</th>
                                <th scope="col">Fecha de inicio</th>
                                <th scope="col">Fecha de fin</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>

                  <!--DOMICILIOS-->
                  <div class="tab-pane fade" id="vert-tabs-3" role="tabpanel" aria-labelledby="vert-tabs-3-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateDomicilio();">
                                <i class="fas fa-file"> Agregar domicilio</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_domicilios" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Domicilio</th>
                                <th scope="col">Domicilio físcal</th>
                                <th scope="col">Comprobante</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>

                  <!--RFC-->
                  <div class="tab-pane fade" id="vert-tabs-4" role="tabpanel" aria-labelledby="vert-tabs-4-tab">
                    <div class="form-group">
                        {!! Form::label('rfc', '17. RFC', ['class' => 'form-label']) !!}
                        {!! Form::text('rfc', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el RFC']) !!}
                    </div>
                
                    <div class="form-group">
                        {!! Form::label('rfc_fisico', '18. Se archivó el RFC en expediente físico', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('rfc_fisico', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label><br/>
                            <label>
                                {!! Form::radio('rfc_fisico', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
            
                    <div class="form-group">
                        {!! Form::label('rfc_electronico', '19. Se archivó el RFC en expediente electrónico', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('rfc_electronico', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label><br/>
                            <label>
                                {!! Form::radio('rfc_electronico', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('imss', '20. Registro patronal IMSS', ['class' => 'form-label']) !!}
                        {!! Form::text('imss', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el registro IMSS']) !!}
                    </div>
            
                    <div class="form-group">
                        {!! Form::label('imss_obtencion', '21. Fecha de obtención', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('imss_obtencion', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>

                    <div class="form-group">
                        {!! Form::label('imss_vencimiento', '22. Fecha de vencimiento', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('imss_vencimiento', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>
            
                    <div class="form-group">
                        {!! Form::label('expediente_fisico', '23. Archivó en expediente físico', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('expediente_fisico', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label><br/>
                            <label>
                                {!! Form::radio('expediente_fisico', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('expediente_electronico', '24. Archivó en expediente electrónico', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('expediente_electronico', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label><br/>
                            <label>
                                {!! Form::radio('expediente_electronico', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('fiel', '25. Tiene FIEL del SAT', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('fiel', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label><br/>
                            <label>
                                {!! Form::radio('fiel', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('fiel_obtencion', '26. Fecha de obtención', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fiel_obtencion', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('fiel_vencimiento', '27. Fecha de vencimiento', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fiel_vencimiento', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('ciec', '28. Tiene CIEC', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('ciec', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label><br/>
                            <label>
                                {!! Form::radio('ciec', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('fiel_electronico', '29. Archivó la FIEL del SAT en forma electrónica', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('fiel_electronico', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label><br/>
                            <label>
                                {!! Form::radio('fiel_electronico', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('ciec_obtencion', '30. Fecha de obtención', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('ciec_obtencion', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('ciec_vencimiento', '31. Fecha de vencimiento', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('ciec_vencimiento', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('ciec_electronico', '32. Archivó CIEC en forma electrónica', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('ciec_electronico', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label><br/>
                            <label>
                                {!! Form::radio('ciec_electronico', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                  </div>

                  <!--REPRESENTANTE LEGAL-->
                  <div class="tab-pane fade" id="vert-tabs-5" role="tabpanel" aria-labelledby="vert-tabs-5-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateLegal();">
                                <i class="fas fa-file"> Agregar representante</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_legal" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha de inicio</th>
                                <th scope="col">Fecha de fin</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>

                  <!--DOCUMENTOS REGULATORIOS-->
                  <div class="tab-pane fade" id="vert-tabs-6" role="tabpanel" aria-labelledby="vert-tabs-6-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateDocumento();">
                                <i class="fas fa-file"> Agregar documento</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_documentos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha de revisión</th>
                                <th scope="col">Fecha de verificación</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>

                  <!--RESPONSABILIDADES REGULATORIAS-->
                  <div class="tab-pane fade" id="vert-tabs-7" role="tabpanel" aria-labelledby="vert-tabs-7-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateResponsabilidad();">
                                <i class="fas fa-file"> Agregar responsabilidad</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_responsabilidades" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Actividad regulada</th>
                                <th scope="col">Autoridad que regula</th>
                                <th scope="col">Fecha de autorización</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>

                  <!--REPRESENTANTE SANITARIO-->
                  <div class="tab-pane fade" id="vert-tabs-8" role="tabpanel" aria-labelledby="vert-tabs-8-tab">
                    <div class="form-group">
                        {!! Form::label('representante_sanitario', '45. Requiere representante sanitario', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('representante_sanitario', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label><br/>
                            <label>
                                {!! Form::radio('representante_sanitario', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('justificacion_sanitario', '46. Justificación del representante sanitario', ['class' => 'form-label']) !!}
                        {!! Form::textarea('justificacion_sanitario', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la justificación']) !!}
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateSanitario();">
                                <i class="fas fa-file"> Agregar respresentante</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_sanitario" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha de inicio</th>
                                <th scope="col">Fecha de fin</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>

                  <!--CUENTAS BANCARIAS-->
                  <div class="tab-pane fade" id="vert-tabs-9" role="tabpanel" aria-labelledby="vert-tabs-9-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateCuenta();">
                                <i class="fas fa-file"> Agregar cuenta</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_cuentas" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre del banco</th>
                                <th scope="col">Sucursal</th>
                                <th scope="col">CLABE</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>

                  <!--PROPIEDAD INTELECTUAL-->
                  <div class="tab-pane fade" id="vert-tabs-10" role="tabpanel" aria-labelledby="vert-tabs-10-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreatePropiedad();">
                                <i class="fas fa-file"> Agregar propiedad</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_propiedad" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Registro</th>
                                <th scope="col">Inicio de uso</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>

                  <!--VINCULACION-->
                  <div class="tab-pane fade" id="vert-tabs-11" role="tabpanel" aria-labelledby="vert-tabs-11-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateVinculacion();">
                                <i class="fas fa-file"> Agregar vinculación</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_vinculacion" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Institución</th>
                                <th scope="col">Fecha de firma</th>
                                <th scope="col">Vigencia</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>

                  <!--MENUS-->
                  <div class="tab-pane fade" id="vert-tabs-12" role="tabpanel" aria-labelledby="vert-tabs-12-tab">
                    <div class="form-group">
                        <p class="font-weight-bold">Menús que tendrá la empresa</p>
                        @foreach ($menus as $menu)
                            <label class="mr-2">
                                {!! Form::checkbox('menus[]', $menu->id, null) !!}
                                {{$menu->description}}
                            </label><br/>
                        @endforeach
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
        </div>
    </div>

</div>    
</div>

                    
                  