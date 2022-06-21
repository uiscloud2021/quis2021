    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Sometimiento
            </h3>
            <div style="float:right">
                <button type="button" onclick="location.href='{{ route('eq-ce.index') }}'" class="btn-warning" title="Regresar"><i class="fa fa-arrow-left"></i></button>
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
                                <a onclick="list_fechasom();" class="nav-link active" id="vert-tabs-1som-tab" data-toggle="pill" href="#vert-tabs-1som" role="tab" aria-controls="vert-tabs-1som" aria-selected="false"><i class="far fa-edit"></i> Inspección</a>
                            </li>
                            <li class="nav-item">
                                <a onclick="list_copiassom();" class="nav-link" id="vert-tabs-2som-tab" data-toggle="pill" href="#vert-tabs-2som" role="tab" aria-controls="vert-tabs-2som" aria-selected="false"><i class="far fa-edit"></i> Copias</a>
                            </li>
                            <li class="nav-item">
                                <a onclick="RevSom();" class="nav-link" id="vert-tabs-3som-tab" data-toggle="pill" href="#vert-tabs-3som" role="tab" aria-controls="vert-tabs-3som" aria-selected="false"><i class="far fa-edit"></i> Revisión</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-4som-tab" data-toggle="pill" href="#vert-tabs-4som" role="tab" aria-controls="vert-tabs-4som" aria-selected="false"><i class="far fa-edit"></i> Protocolo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-5som-tab" data-toggle="pill" href="#vert-tabs-5som" role="tab" aria-controls="vert-tabs-5som" aria-selected="false"><i class="far fa-edit"></i> ICF</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-6som-tab" data-toggle="pill" href="#vert-tabs-6som" role="tab" aria-controls="vert-tabs-6som" aria-selected="false"><i class="far fa-edit"></i> Animales</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--INSPECCION-->
                  <div class="tab-pane fade show active" id="vert-tabs-1som" role="tabpanel" aria-labelledby="vert-tabs-1som-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <!--SITIO--> 
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Sitio clínico</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('sometimiento_id', null, ['class' => 'form-control', 'id'=>'sometimiento_id']) !!}
                        {!! Form::hidden('proyecto_id', $proyecto->id, ['class' => 'form-control', 'id'=>'proyecto_id']) !!}
                        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}
                        {!! Form::hidden('num_miembros', $num_miembros, ['class' => 'form-control', 'id'=>'num_miembros']) !!}

                        {!! Form::label('s1', '1. Nombre del sitio clínico', ['class' => 'form-label']) !!}
                        {!! Form::text('s1', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}

                        @error('s1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('s2', '2. Dirección', ['class' => 'form-label']) !!}
                        {!! Form::textarea('s2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese dirección']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('s3', '3. Teléfono', ['class' => 'form-label']) !!}
                        {!! Form::text('s3', null, ['class' => 'form-control', 'placeholder' => 'Ingrese teléfono']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('s4', '4. Cuenta con Responsable sanitario', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s4', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s4', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('s5', '5. Nombre del Responsable sanitario', ['class' => 'form-label']) !!}
                        {!! Form::text('s5', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('s6', '6. Cuenta con aviso de funcionamiento', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s6', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s6', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div><!--FIN SITIO-->


                    <!--SOMETIMIENTO--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Sometimiento</h5><br/>
                    </div>
                    
                    <div class="table-responsive" id="tabla_sometimiento">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateFechaSom();">
                                <i class="fas fa-file"> Agregar fecha de sometimiento</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_fechasom" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de sometimiento</th>
                                <th scope="col">Documento</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN SOMETIMIENTO-->


                    <div id="preguntas_sometimiento" style="display:none">
                    <!--PREG SOM--> 
                    {!! Form::hidden('fechasom_id', null, ['class' => 'form-control', 'id'=>'fechasom_id']) !!}
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group" id="divs7">
                        {!! Form::label('s7', '7. Fecha del sometimiento', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('s7', null, ['class' => 'form-control', 'id' => 's7']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="divs8">
                        {!! Form::label('s8', '8. Existe una carta de sometimiento dirigida al CE', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s8', 'Si', null, ['class' => 'mr-1', 'id' => 's8_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s8', 'No', null, ['class' => 'mr-1', 'id' => 's8_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs9">
                        {!! Form::label('s9', '9. El nombre del Presidente del CE es correcto', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s9', 'Si', null, ['class' => 'mr-1', 'id' => 's9_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s9', 'No', null, ['class' => 'mr-1', 'id' => 's9_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs10">
                        {!! Form::label('s10', '10. El nombre del Presidente del CI es correcto', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s10', 'Si', null, ['class' => 'mr-1', 'id' => 's10_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s10', 'No', null, ['class' => 'mr-1', 'id' => 's10_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs11">
                        {!! Form::label('s11', '11. El Código del estudio es correcto', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s11', 'Si', null, ['class' => 'mr-1', 'id' => 's11_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s11', 'No', null, ['class' => 'mr-1', 'id' => 's11_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs12">
                        {!! Form::label('s12', '12. El Título del estudio es correcto', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s12', 'Si', null, ['class' => 'mr-1', 'id' => 's12_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s12', 'No', null, ['class' => 'mr-1', 'id' => 's12_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divs13">
                        {!! Form::label('s13', '13. Identifica al patrocinador', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s13', 'Si', null, ['class' => 'mr-1', 'id' => 's13_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s13', 'No', null, ['class' => 'mr-1', 'id' => 's13_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs14">
                        {!! Form::label('s14', '14. El nombre, versión y fecha de cada documento son correctos', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s14', 'Si', null, ['class' => 'mr-1', 'id' => 's14_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s14', 'No', null, ['class' => 'mr-1', 'id' => 's14_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs15">
                        {!! Form::label('s15', '15. El nombre del Investigador principal es correcto', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s15', 'Si', null, ['class' => 'mr-1', 'id' => 's15_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s15', 'No', null, ['class' => 'mr-1', 'id' => 's15_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs16">
                        {!! Form::label('s16', '16. Tipo de sometimiento', ['class' => 'form-label']) !!}
                        {!! Form::select('s16', ['Inicial' => 'Inicial', 'Seguimiento' => 'Seguimiento'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 's16', 'onchange' => 'TipoSom(this.value)']) !!}
                    </div>

                    <div class="form-group" id="divs18">
                    {!! Form::hidden('s17', null, ['class' => 'form-control', 'id' => 's17']) !!}
                        {!! Form::label('s18', '18. Total de documentos que somete', ['class' => 'form-label']) !!}
                        {!! Form::text('s18', null, ['class' => 'form-control', 'placeholder' => 'Ingrese total', 'id' => 's18', 'readonly' => 'readonly']) !!}
                    </div>
                    </div>

                    <div class="col-12">
                    <table class="table table-striped" style="width:100%;">
                        <tbody><tr>
                            <th scope="col"></th>
                            <th scope="col">Documento que somete</th>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="docsom[]" id="checksom1" value="Protocolo"></td>
                            <td>Protocolo</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="docsom[]" id="checksom2" value="ICF"></td>
                            <td>ICF</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="docsom[]" id="checksom3" value="Manual del investigador"></td>
                            <td>Manual del investigador</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="docsom[]" id="checksom4" value="Aviso de publicidad"></td>
                            <td>Aviso de publicidad</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="docsom[]" id="checksom5" value="Póliza de seguro"></td>
                            <td>Póliza de seguro</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="docsom[]" id="checksom6" value="Otros sometimientos"></td>
                            <td>Otros sometimientos</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="docsom[]" id="checksom7" value="Aviso de desviación"></td>
                            <td>Aviso de desviación</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="docsom[]" id="checksom8" value="Aviso de violación"></td>
                            <td>Aviso de violación</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="docsom[]" id="checksom9" value="Aviso de EAS"></td>
                            <td>Aviso de EAS</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="docsom[]" id="checksom10" value="SUSAR"></td>
                            <td>SUSAR</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="docsom[]" id="checksom11" value="Solicitud de renovación anual"></td>
                            <td>Solicitud de renovación anual</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="docsom[]" id="checksom12" value="Fe de erratas"></td>
                            <td>Fe de erratas</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="docsom[]" id="checksom13" value="Cierre o aviso de terminación"></td>
                            <td>Cierre o aviso de terminación</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="docsom[]" id="checksom14" value="Archivo de concentración"></td>
                            <td>Archivo de concentración</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>

                    </div><!--FIN ROW-->

                    <!--PROTOCOLO--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Protocolo</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateProtocoloSom();">
                                <i class="fas fa-file"> Agregar protocolo</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_protocolosom" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div><!--FIN PROTOCOLO-->

                    <!--ICF--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">ICF</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateICFSom();">
                                <i class="fas fa-file"> Agregar ICF</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_icfsom" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div><!--FIN ICF-->

                    <!--MANUAL--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Manual del investigador</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateManualSom();">
                                <i class="fas fa-file"> Agregar manual</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_manualsom" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div><!--FIN MANUAL-->

                    <!--POLIZA--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Póliza de seguro</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreatePolizaSom();">
                                <i class="fas fa-file"> Agregar póliza</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_polizasom" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Vigencia</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div><!--FIN POLIZA-->

                    <!--DESVIACION--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Desviaciones y violaciones</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateDesviacionSom();">
                                <i class="fas fa-file"> Agregar desviacióno violación</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_desviacionsom" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Descripción</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div><!--FIN DESVIACION-->

                    <!--EAS--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">EAS</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateEASSom();">
                                <i class="fas fa-file"> Agregar EAS</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_eassom" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Patología</th>
                                <th scope="col">Fecha</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div><!--FIN EAS-->

                    <!--SUSAR--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">SUSAR</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateSUSARSom();">
                                <i class="fas fa-file"> Agregar SUSAR</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_susarsom" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Patología</th>
                                <th scope="col">Número de reporte</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div><!--FIN SUSAR-->

                    <!--RENOVACION--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Renovaciones</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateRenovacionSom();">
                                <i class="fas fa-file"> Agregar renovación</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_renovacionsom" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Somete informe anual</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div><!--FIN RENOVACION-->

                    <!--FE DE ERRATAS--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Fe de erratas</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateErratasSom();">
                                <i class="fas fa-file"> Agregar fe de erratas</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_erratassom" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Documento</th>
                                <th scope="col">Información correcta</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div><!--FIN FE DE ERRATAS-->

                    <br/>
                    <div align="right">
                        <button type="button" onclick="RegresarSometimiento();" class="btn btn-warning"><i class="fa rotate-left"> Mostrar tabla</i></button>
                    </div>
                    
                    </div><!--FIN DIV PREGUNTAS-->

                  </div><!--FIN DE TAB INSPECCION-->



                  <!--COPIAS-->
                  <div class="tab-pane fade" id="vert-tabs-2som" role="tabpanel" aria-labelledby="vert-tabs-2som-tab">

                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Control de copias</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateCopiasSom();">
                                <i class="fas fa-file"> Agregar comité y periodo</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_copiassom" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha</th>    
                                <th scope="col">Documento que se envío</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div>

                  </div><!--FIN DE TAB COPIAS-->



                  <!--REVISION-->
                  <div class="tab-pane fade" id="vert-tabs-3som" role="tabpanel" aria-labelledby="vert-tabs-3som-tab">

                    <!--RIESGO-->
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Riesgo y prevención</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divs52">
                        {!! Form::label('s52', '1. Área del conocimiento', ['class' => 'form-label']) !!}
                        <br/><input type="checkbox" name="areasom[]" id="areasom1" value="Salud">&nbsp;Salud<br/>
                        <input type="checkbox" name="areasom[]" id="areasom2" value="Sociedad y Humanidades">&nbsp;Sociedad y Humanidades<br/>
                        <input type="checkbox" name="areasom[]" id="areasom3" value="Economía, Administración, Contaduría y afines">&nbsp;Economía, Administración, Contaduría y afines<br/>
                        {!! Form::hidden('s52', null, ['class' => 'form-control', 'id' => 's52']) !!}
                    </div>

                    <div class="form-group" id="divs53">
                        {!! Form::label('s53', '2. Total de Áreas del conocimiento involucradas', ['class' => 'form-label']) !!}
                        {!! Form::text('s53', null, ['class' => 'form-control', 'placeholder' => 'Ingrese total', 'readonly' => 'readonly']) !!}
                    </div>

                    <div class="form-group" id="divs54">
                        {!! Form::label('s54', '3. Tipo de investigación en Salud', ['class' => 'form-label']) !!}
                        {!! Form::select('s54', ['Epidemiológica (Salud en población)' => 'Epidemiológica (Salud en población)', 'Básica (Laboratorio)' => 'Básica (Laboratorio)', 'Preclínica (Animales)' => 'Preclínica (Animales)', 'Clínica (Tratamiento en humanos)' => 'Clínica (Tratamiento en humanos)', 'Farmacovigilancia post comercialización' => 'Farmacovigilancia post comercialización'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group" id="divs55">
                        {!! Form::label('s55', '4. Fase de la investigación clínica', ['class' => 'form-label']) !!}
                        {!! Form::select('s55', ['I' => 'I', 'II' => 'II', 'III' => 'III', 'IV' => 'IV'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group" id="divs56">
                        {!! Form::label('s56', '5. Riesgo', ['class' => 'form-label']) !!}
                        {!! Form::select('s56', ['Sin riesgo' => 'Sin riesgo', 'Riesgo mínimo' => 'Riesgo mínimo', 'Riesgo mayor' => 'Riesgo mayor'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group" id="divs57">
                        {!! Form::label('s57', '6. Tipo de revisión', ['class' => 'form-label']) !!}
                        {!! Form::select('s57', ['Expedita' => 'Expedita', 'Reunión' => 'Reunión'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>
                    </div>

                    </div><!--FIN DE RIESGO-->


                    <!--CREDENCIALES--><br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Credenciales</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divs58">
                        {!! Form::label('s58', '7. El Investigador principal requiere cédula profesional', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s58', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s58', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs59">
                        {!! Form::label('s59', '8. El Investigador principal cuenta con cédula profesional', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s59', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s59', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divs60">
                        {!! Form::label('s60', '9. El Investigador principal requiere cédula de especialidad', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s60', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s60', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs61">
                        {!! Form::label('s61', '10. El Investigador principal cuenta con cédula de especialidad', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s61', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s61', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div><!--FIN DE CREDENCIALES-->


                    <!--SEGURIDAD--><br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Seguridad</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divs62">
                        {!! Form::label('s62', '11. El estudio requiere póliza de seguro', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s62', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s62', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs63">
                        {!! Form::label('s63', '12. El estudio cuenta con póliza de seguro', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s63', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s63', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divs64">
                        {!! Form::label('s64', '13. El estudio debe ser aprobado por COFEPRIS', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s64', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s64', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs65">
                        {!! Form::label('s65', '14. El estudio tiene aprobación de COFEPRIS', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s65', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s65', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div><!--FIN DE SEGURIDAD-->

                  </div><!--FIN DE TAB REVISION-->



                  <!--PROTOCOLO-->
                  <div class="tab-pane fade" id="vert-tabs-4som" role="tabpanel" aria-labelledby="vert-tabs-4som-tab">

                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Protocolo</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <table id="tbl_respprotocolosom" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Revisor</th>    
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div>

                  </div><!--FIN DE TAB PROTOCOLO-->



                  <!--ICF-->
                  <div class="tab-pane fade" id="vert-tabs-5som" role="tabpanel" aria-labelledby="vert-tabs-5som-tab">

                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Formato de consentimiento informado</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <table id="tbl_respicfsom" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Revisor</th>    
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div>

                  </div><!--FIN DE TAB ICF-->



                  <!--ANIMALES-->
                  <div class="tab-pane fade" id="vert-tabs-6som" role="tabpanel" aria-labelledby="vert-tabs-6som-tab">

                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Estudio en animales</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <table id="tbl_respanimalessom" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Revisor</th>    
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div>

                  </div><!--FIN DE TAB ANIMALES-->


                </div>
              </div>

            </div>
        </div>
    </div>



                    
                  