    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Farmacia
            </h3>
            <div style="float:right">
                <button type="button" onclick="location.href='{{ route('eq-sc.index') }}'" class="btn-warning" title="Regresar"><i class="fa fa-arrow-left"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-5 col-sm-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Menú de preguntas</h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav flex-column nav-tabs">
                            <li class="nav-item">
                                <a onclick="list_infraestructurafar();" class="nav-link active" id="vert-tabs-1far-tab" data-toggle="pill" href="#vert-tabs-1far" role="tab" aria-controls="vert-tabs-1far" aria-selected="false"><i class="far fa-edit"></i> Instalación</a>
                            </li>
                            <li class="nav-item">
                                <a onclick="list_materialesfar();" class="nav-link" id="vert-tabs-2far-tab" data-toggle="pill" href="#vert-tabs-2far" role="tab" aria-controls="vert-tabs-2far" aria-selected="false"><i class="far fa-edit"></i> Equipamiento</a>
                            </li>
                            <li class="nav-item">
                                <a onclick="Tablas3();" class="nav-link" id="vert-tabs-3far-tab" data-toggle="pill" href="#vert-tabs-3far" role="tab" aria-controls="vert-tabs-3far" aria-selected="false"><i class="far fa-edit"></i> Carpeta de farmacia</a>
                            </li>
                            <li class="nav-item">
                                <a onclick="Tablas4();" class="nav-link" id="vert-tabs-4far-tab" data-toggle="pill" href="#vert-tabs-4far" role="tab" aria-controls="vert-tabs-4far" aria-selected="false"><i class="far fa-edit"></i> Seguridad de farmacia</a>
                            </li>
                            <li class="nav-item">
                                <a onclick="Tablas5();" class="nav-link" id="vert-tabs-5far-tab" data-toggle="pill" href="#vert-tabs-5far" role="tab" aria-controls="vert-tabs-5far" aria-selected="false"><i class="far fa-edit"></i> Resguardo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-6far-tab" data-toggle="pill" href="#vert-tabs-6far" role="tab" aria-controls="vert-tabs-6far" aria-selected="false"><i class="far fa-edit"></i> Entrega y devolución</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--INSTALACION-->
                  <div class="tab-pane fade show active" id="vert-tabs-1far" role="tabpanel" aria-labelledby="vert-tabs-1far-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Infraestructura</h5><br/>
                    </div>

                    {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                    {!! Form::hidden('farmacia_id', null, ['class' => 'form-control', 'id'=>'farmacia_id']) !!}
                    {!! Form::hidden('proyecto_id', $proyecto->id, ['class' => 'form-control', 'id'=>'proyecto_id']) !!}
                    {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateInfraestructuraFar();">
                                <i class="fas fa-file"> Agregar revisión</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_infraestructurafar" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de revisión</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div>

                  </div><!--FIN DE TAB INSTALACION-->





                  <!--EQUIPAMIENTO-->
                  <div class="tab-pane fade" id="vert-tabs-2far" role="tabpanel" aria-labelledby="vert-tabs-2far-tab">

                    <!--MATERIALES--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Materiales</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateMaterialesFar();">
                                <i class="fas fa-file"> Agregar revisión</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_materialesfar" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de revisión</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN MATERIALES-->


                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Equipamiento</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divfar22">
                        {!! Form::label('far22', '11. El mobiliario es resistente a los agentes limpiadores', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('far22', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('far22', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divfar23">
                        {!! Form::label('far23', '12. Los equipos están en buenas condiciones', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('far23', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('far23', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divfar24">
                        {!! Form::label('far24', '13. Se cumple el programa de calibración de equipos e instrumentos', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('far24', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('far24', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divfar25">
                        {!! Form::label('far25', '14. Todas las gavetas y equipos de almacén pueden cerrarse con llave', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('far25', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('far25', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divfar26">
                        {!! Form::label('far26', '15. El refrigerador está limpio y ordenado y se utiliza exclusivamente para medicamentos y muestras biológicas', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('far26', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('far26', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divfar27">
                        {!! Form::label('far27', '16. El termómetro del refrigerador funciona adecuadamente', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('far27', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('far27', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divfar28">
                        {!! Form::label('far28', '17. El termómetro del refrigerador puede leerse desde el exterior del equipo', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('far28', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('far28', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divfar29">
                        {!! Form::label('far29', '18. El congelador está limpio y ordenado, y se utiliza exclusivamente para medicamentos y muestras biológicas', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('far29', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('far29', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divfar30">
                        {!! Form::label('far30', '19. El termómetro del congelador funciona adecuadamente', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('far30', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('far30', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divfar31">
                        {!! Form::label('far31', '20. El termómetro del congelador puede leerse desde el exterior del equipo', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('far31', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('far31', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divfar32">
                        {!! Form::label('far32', '21. Cada refrigerador y congelador tiene un señalamiento con la leyenda “En caso de falla de energía, NO ABRA LA PUERTA. La temperatura puede mantenerse hasta por 90 minutos.”, impresa en fondo fosforescente, y pegada cerca del candado', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('far32', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('far32', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div>

                  </div><!--FIN DE TAB EQUIPAMIENTO-->





                  <!--CARPETA DE FARMACIA-->
                  <div class="tab-pane fade" id="vert-tabs-3far" role="tabpanel" aria-labelledby="vert-tabs-3far-tab">

                    <!--RESPONSABLE-->
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Responsable de farmacia</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divfar33">
                        {!! Form::label('far33', '1. Nombre del Responsable Sanitario', ['class' => 'form-label']) !!}
                        {!! Form::select('far33', $empleados, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group" id="divfar34">
                        {!! Form::label('far34', '2. Fecha de inicio de responsabilidades', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('far34', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>

                    <div class="form-group" id="divfar35">
                        {!! Form::label('far35', '3. El título y la cédula profesional del Responsable Sanitario son acordes a las funciones que realiza', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('far35', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('far35', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divfar36">
                        {!! Form::label('far36', '4. Número de Responsable Sanitario', ['class' => 'form-label']) !!}
                        {!! Form::text('far36', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número']) !!}
                    </div>

                    <div class="form-group" id="divfar37">
                        {!! Form::label('far37', '5. Fecha de fin de responsabilidades', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('far37', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>
                    </div>

                    </div><!--FIN RESPONSABLE-->



                    <!--FARMACISTAS--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Farmacistas</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateFarmacistaFar();">
                                <i class="fas fa-file"> Agregar farmacista</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_farmacistafar" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre del farmacista</th>
                                <th scope="col">Fecha de inicio</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN FARMACISTAS-->



                    <!--CARPETA DE CONTROL--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Carpeta de control de farmacia</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateControlFar();">
                                <i class="fas fa-file"> Agregar revisión</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_controlfar" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de revisión</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN CARPETA DE CONTROL-->



                    <!--TRAMITES--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Trámites</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateTramiteFar();">
                                <i class="fas fa-file"> Agregar trámite</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_tramitefar" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Trámite</th>
                                <th scope="col">Fecha de entrada</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN TRAMITES-->



                    <!--VISITAS--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Visitas y verificaciones</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateVisitaFar();">
                                <i class="fas fa-file"> Agregar visita</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_visitafar" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Observaciones</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN VISITAS-->



                    <!--QUEJAS--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Farmacia atención de quejas</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateQuejaFar();">
                                <i class="fas fa-file"> Agregar queja</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_quejafar" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Motivo</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN QUEJAS-->

                  </div><!--FIN DE TAB CARPETA DE FARMACIA-->




                  <!--SEGURIDAD DE FARMACIA-->
                  <div class="tab-pane fade" id="vert-tabs-4far" role="tabpanel" aria-labelledby="vert-tabs-4far-tab">

                    <!--SEGURIDAD--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Seguridad de farmacia</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateSeguridadFar();">
                                <i class="fas fa-file"> Agregar revisión</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_seguridadfar" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de revisión</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN SEGURIDAD-->



                    <!--CADENA--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Cadena de frío</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateCadenaFar();">
                                <i class="fas fa-file"> Agregar cadena de frío</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_cadenafar" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de cadena de frío</th>
                                <th scope="col">Responsable</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN CADENA-->

                  </div><!--FIN DE TAB SEGURIDAD DE FARMACIA-->
                  




                  <!--RESGUARDO-->
                  <div class="tab-pane fade" id="vert-tabs-5far" role="tabpanel" aria-labelledby="vert-tabs-5far-tab">

                    <!--INTEGRIDAD--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Integridad</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateRecepcionFar();">
                                <i class="fas fa-file"> Agregar recepción</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_recepcionfar" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de recepción</th>
                                <th scope="col">Tipo de producto</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN INTERGIDAD-->



                    <!--PRODUCTOS--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Farmacia entrada de productos</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <!--<div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateProductoFar();">
                                <i class="fas fa-file"> Agregar producto</i>
                            </button>  
                        </div><br/>-->
                        <table id="tbl_productofar" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de recepción</th>
                                <th scope="col">Nombre</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN PRODUCTOS-->



                    <!--MATERIALES--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Materiales</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <!--<div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateMaterialFar();">
                                <i class="fas fa-file"> Agregar material</i>
                            </button>  
                        </div><br/>-->
                        <table id="tbl_materialfar" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de recepción</th>
                                <th scope="col">Gabinete</th>
                                <th scope="col">Anaquel</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN MATERIALES-->



                    <!--EQUIPOS--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Equipos</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <!--<div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateEquipoFar();">
                                <i class="fas fa-file"> Agregar equipo</i>
                            </button>  
                        </div><br/>-->
                        <table id="tbl_equipofar" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de recepción</th>
                                <th scope="col">Nombre</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN EQUIPOS-->

                  </div><!--FIN DE TAB RESGUARDO-->





                  <!--ENTREGA-->
                  <div class="tab-pane fade" id="vert-tabs-6far" role="tabpanel" aria-labelledby="vert-tabs-6far-tab">


                  </div><!--FIN DE TAB ENTREGA-->


                </div>
              </div>

              
            </div>
        </div>
    </div>



                    
                  