    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Reclutamiento
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
                                <a onclick="Tablas1Rec();" class="nav-link active" id="vert-tabs-1rec-tab" data-toggle="pill" href="#vert-tabs-1rec" role="tab" aria-controls="vert-tabs-1rec" aria-selected="false"><i class="far fa-edit"></i> Visita de inicio</a>
                            </li>
                            <li class="nav-item">
                                <a onclick="Tablas2Rec();" class="nav-link" id="vert-tabs-2rec-tab" data-toggle="pill" href="#vert-tabs-2rec" role="tab" aria-controls="vert-tabs-2rec" aria-selected="false"><i class="far fa-edit"></i> Pre-Selección</a>
                            </li>
                            <li class="nav-item">
                                <a onclick="Tablas3Rec();" class="nav-link" id="vert-tabs-3rec-tab" data-toggle="pill" href="#vert-tabs-3rec" role="tab" aria-controls="vert-tabs-3rec" aria-selected="false"><i class="far fa-edit"></i> Documentos fuente</a>
                            </li>
                            <li class="nav-item">
                                <a onclick="Tablas4Rec();" class="nav-link" id="vert-tabs-4rec-tab" data-toggle="pill" href="#vert-tabs-4rec" role="tab" aria-controls="vert-tabs-4rec" aria-selected="false"><i class="far fa-edit"></i> Reclutamiento</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--VISITA DE INICIO-->
                  <div class="tab-pane fade show active" id="vert-tabs-1rec" role="tabpanel" aria-labelledby="vert-tabs-1rec-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Visita de inicio</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('reclutamiento_id', null, ['class' => 'form-control', 'id'=>'reclutamiento_id']) !!}
                        {!! Form::hidden('proyecto_id', $proyecto->id, ['class' => 'form-control', 'id'=>'proyecto_id']) !!}
                        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}

                        {!! Form::label('r1', '1. Fecha de la visita de inicio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('r1', null, ['class' => 'form-control']) !!}
                        </div>

                        @error('r1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group" id="divr2">
                        {!! Form::label('r2', '2. El Investigador principal firmó la Declaración financiera del investigador', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('r2', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('r2', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divr3">
                        {!! Form::label('r3', '3. El Investigador principal firmó el Formato 1572', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('r3', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('r3', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divr4">
                        {!! Form::label('r4', '4. El Investigador principal firmó la Hoja de delegación de responsabilidades', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('r4', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('r4', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divr5">
                        {!! Form::label('r5', '5. Los asistentes firmaron la Lista de visitas al sitio', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('r5', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('r5', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('r5', 'No aplica', null, ['class' => 'mr-1']) !!}
                                No aplica
                            </label>
                        </div>
                    </div>
            
                    <div class="form-group" id="divr6">
                        {!! Form::label('r6', '6. Meta de reclutamiento 1', ['class' => 'form-label']) !!}
                        {!! Form::text('r6', null, ['class' => 'form-control', 'placeholder' => 'Ingrese meta', 'readonly' => 'readonly']) !!}
                    </div>

                    <div class="form-group" id="divr7">
                        {!! Form::label('r7', '7. Meta de reclutamiento 2', ['class' => 'form-label']) !!}
                        {!! Form::text('r7', null, ['class' => 'form-control', 'placeholder' => 'Ingrese meta']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divr8">
                        {!! Form::label('r8', '8. Fecha de reclutamiento 1', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('r8', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="divr9">
                        {!! Form::label('r9', '9. Fecha de reclutamiento 2', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('r9', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="divr10">
                        {!! Form::label('r10', '10. Meta mensual de reclutamiento 1', ['class' => 'form-label']) !!}
                        {!! Form::text('r10', null, ['class' => 'form-control', 'placeholder' => 'Ingrese meta']) !!}
                    </div>

                    <div class="form-group" id="divr11">
                        {!! Form::label('r11', '11. Meta mensual de reclutamiento 2', ['class' => 'form-label']) !!}
                        {!! Form::text('r11', null, ['class' => 'form-control', 'placeholder' => 'Ingrese meta']) !!}
                    </div>

                    <div class="form-group" id="divr12">
                        {!! Form::label('r12', '12. Entregó la tarjeta de bolsillo al investigador principal', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('r12', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('r12', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divr13">
                        {!! Form::label('r13', '13. Entregó la tarjeta de bolsillo a los sub investigadores ', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('r13', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('r13', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div><!--FIN DE VISITA-->

                    <!--CRONOGRAMA--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Cronograma</h5><br/>
                    </div>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateCronogramaRec();">
                                <i class="fas fa-file"> Agregar cronograma</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_cronogramarec" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Visita</th>
                                <th scope="col">Fecha programada</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN DE CRONOGRAMA-->

                    <!--PUBLICIDAD--><br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Publicidad</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divr24">
                        {!! Form::label('r24', '24. El patrocinador aprobó el mensaje de publicidad', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('r24', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('r24', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divr25">
                        {!! Form::label('r25', '25. El CE aprobó el mensaje de publicidad', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('r25', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('r25', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divr26">
                        {!! Form::label('r26', '26. Se verificaron los materiales de publicidad', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('r26', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('r26', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div><!--PUBLICIDAD-->

                    <!--ESTRATEGIAS--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Estrategias de reclutamiento realizadas</h5><br/>
                    </div>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateEstrategiaRec();">
                                <i class="fas fa-file"> Agregar estrategia</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_estrategiarec" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Costo</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN DE ESTRATEGIAS-->

                    <!--CONTACTO 1--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Datos de contacto 1</h5><br/>
                    </div>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateContactoRec();">
                                <i class="fas fa-file"> Agregar sujeto</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_contactorec" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre del sujeto</th>
                                <th scope="col">Estado</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN DE CONTACTO 1-->

                  </div><!--FIN DE TAB VISITA DE INICIO-->





                  <!--PRESELECCION-->
                  <div class="tab-pane fade" id="vert-tabs-2rec" role="tabpanel" aria-labelledby="vert-tabs-2rec-tab">

                    <!--CRITERIOS--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Criterios de pre-selección</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateCriterioRec();">
                                <i class="fas fa-file"> Agregar criterio</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_criteriorec" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Criterios de pre-selección</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN CRITERIOS-->

                    <!--PRESELECCION--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Pre-selección y datos de contacto</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreatePreseleccionRec();">
                                <i class="fas fa-file"> Agregar pre-selección</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_preseleccionrec" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre del sujeto</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN DE PRESELECCION-->

                  </div><!--FIN DE TAB PRESELECCION-->





                  <!--DOCUMENTOS FUENTE-->
                  <div class="tab-pane fade" id="vert-tabs-3rec" role="tabpanel" aria-labelledby="vert-tabs-3rec-tab">

                    <!--DEL SUJETO--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Documento fuente del sujeto</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateFuenteSujetoRec();">
                                <i class="fas fa-file"> Agregar sujeto</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_fuentesujetorec" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre del sujeto</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN DEL SUJETO-->



                    <!--DEL ESTUDIO--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Documento fuente del estudio</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateFuenteEstudioRec();">
                                <i class="fas fa-file"> Agregar visita</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_fuenteestudiorec" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Número de visita</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN DEL ESTUDIO-->



                    <!--DE LA VISITA--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Documento fuente de la visita</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateFuenteVisitaRec();">
                                <i class="fas fa-file"> Agregar sujeto y visita</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_fuentevisitarec" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre del sujeto</th>
                                <th scope="col">Número de visita</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN DE LA VISITA-->

                  </div><!--FIN DE TAB DOCUMENTOS FUENTE-->




                  <!--RECLUTAMIENTO-->
                  <div class="tab-pane fade" id="vert-tabs-4rec" role="tabpanel" aria-labelledby="vert-tabs-4rec-tab">

                    <!--REC--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Reclutamiento</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateReclutamientoRec();">
                                <i class="fas fa-file"> Agregar sujeto</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_reclutamientorec" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre del sujeto</th>
                                <th scope="col">Firma ICF</th>
                                <th scope="col">Número de sujeto</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN REC-->



                    <!--PROTECCION--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Protección del sujeto</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateProteccionRec();">
                                <i class="fas fa-file"> Agregar sujeto</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_proteccionrec" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre del sujeto</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN PROTECCION-->


                    <!--BD--><br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Base de datos de sujeto</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divr166">
                        {!! Form::label('r166', '16. Número de sujetos en la base de datos del estudio', ['class' => 'form-label']) !!}
                        {!! Form::text('r166', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'readonly' => 'readonly']) !!}
                    </div>

                    <div class="form-group" id="divr167">
                        {!! Form::label('r167', '17. Número de sujetos en pre-selección', ['class' => 'form-label']) !!}
                        {!! Form::text('r167', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'readonly' => 'readonly']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divr168">
                        {!! Form::label('r168', '18. Número de sujetos que firmaron ICF', ['class' => 'form-label']) !!}
                        {!! Form::text('r168', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'readonly' => 'readonly']) !!}
                    </div>

                    <div class="form-group" id="divr169">
                        {!! Form::label('r169', '19. Número de fallas de selección', ['class' => 'form-label']) !!}
                        {!! Form::text('r169', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'readonly' => 'readonly']) !!}
                    </div>
                    </div>

                    </div><!--FIN BD-->


                    <!--CALIDAD--><br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Evaluación de la calidad</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divr170">
                        {!! Form::label('r170', '20. Se cumplió el objetivo de la calidad número 6, (Meta de reclutamiento) ≤ (Número de sujetos que firmaron ICF) – (Número de fallas de selección)', ['class' => 'form-label']) !!}
                        {!! Form::text('r170', null, ['class' => 'form-control', 'placeholder' => 'Ingrese respuesta', 'readonly' => 'readonly']) !!}
                    </div>
                    </div>

                    </div><!--FIN CALIDAD-->

                  </div><!--FIN DE TAB RECLUTAMIENTO-->


                </div>
              </div>

              
            </div>
        </div>
    </div>



                    
                  