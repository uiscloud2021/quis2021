    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Integración
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
                                <a onclick="list_miembroin();" class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Integración</a>
                            </li>
                            <li class="nav-item">
                                <a onclick="list_comitein();" class="nav-link" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="false"><i class="far fa-edit"></i> Comités</a>
                            </li>
                            <li class="nav-item">
                                <a onclick="Tablas3In();" class="nav-link" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" role="tab" aria-controls="vert-tabs-3" aria-selected="false"><i class="far fa-edit"></i> Registros</a>
                            </li>
                            <li class="nav-item">
                                <a onclick="Tablas4In();" class="nav-link" id="vert-tabs-4-tab" data-toggle="pill" href="#vert-tabs-4" role="tab" aria-controls="vert-tabs-4" aria-selected="false"><i class="far fa-edit"></i> Regulatorio</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--INTEGRACION-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>

                    <div class="table-responsive" id="tabla_integracion">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateMiembroIn();">
                                <i class="fas fa-file"> Agregar miembro del CE</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_miembroin" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Pertenece</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    <div id="preguntas_integracion" style="display:none">
                    <!--INVITACION--> 
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Invitación</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('integracion_id', null, ['class' => 'form-control', 'id'=>'integracion_id']) !!}
                        {!! Form::hidden('proyecto_id', $proyecto->id, ['class' => 'form-control', 'id'=>'proyecto_id']) !!}
                        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}

                        {!! Form::label('i1', '1. Nombre del miembro del CE ', ['class' => 'form-label']) !!}
                        {!! Form::text('i1', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'i1']) !!}
                    </div>

                    <div class="form-group" id="divi2">
                        {!! Form::label('i2', '2. Primer apellido ', ['class' => 'form-label']) !!}
                        {!! Form::text('i2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese apellido', 'id' => 'i2']) !!}
                    </div>
            
                    <div class="form-group" id="divi3">
                        {!! Form::label('i3', '3. Fecha de nacimiento', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('i3', null, ['class' => 'form-control', 'id' => 'i3']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="divi4">
                        {!! Form::label('i4', '4. RFC', ['class' => 'form-label']) !!}
                        {!! Form::text('i4', null, ['class' => 'form-control', 'placeholder' => 'Ingrese RFC', 'id' => 'i4']) !!}
                    </div>

                    <div class="form-group" id="divi5">
                        {!! Form::label('i5', '5. Dirección', ['class' => 'form-label']) !!}
                        {!! Form::textarea('i5', null, ['class' => 'form-control', 'placeholder' => 'Ingrese dirección', 'id' => 'i5']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divi6">
                        {!! Form::label('i6', '6. Teléfono 1', ['class' => 'form-label']) !!}
                        {!! Form::text('i6', null, ['class' => 'form-control', 'placeholder' => 'Ingrese teléfono', 'id' => 'i6']) !!}
                    </div>

                    <div class="form-group" id="divi7">
                        {!! Form::label('i7', '7. Teléfono 2', ['class' => 'form-label']) !!}
                        {!! Form::text('i7', null, ['class' => 'form-control', 'placeholder' => 'Ingrese teléfono', 'id' => 'i7']) !!}
                    </div>

                    <div class="form-group" id="divi8">
                        {!! Form::label('i8', '8. Correo electrónico', ['class' => 'form-label']) !!}
                        {!! Form::text('i8', null, ['class' => 'form-control', 'placeholder' => 'Ingrese correo', 'id' => 'i8']) !!}
                    </div>

                    <div class="form-group" id="divi9">
                        {!! Form::label('i9', '9. Género', ['class' => 'form-label']) !!}
                        {!! Form::select('i9', ['Hombre' => 'Hombre', 'Mujer' => 'Mujer'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'i9']) !!}
                    </div>

                    <div class="form-group" id="divi10">
                        {!! Form::label('i10', '10. Estado civil', ['class' => 'form-label']) !!}
                        {!! Form::text('i10', null, ['class' => 'form-control', 'placeholder' => 'Ingrese estado', 'id' => 'i10']) !!}
                    </div>
                    </div>

                    </div><!--FIN INVITACION-->


                    <!--OCUPACION--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Ocupación</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateOcupacionIn();">
                                <i class="fas fa-file"> Agregar ocupación</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_ocupacionin" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Puesto</th>
                                <th scope="col">Institución</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN OCUPACION-->


                    <!--HISTORIA--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Historia académica</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateHistoriaIn();">
                                <i class="fas fa-file"> Agregar historia académica</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_historiain" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Institución</th>
                                <th scope="col">Grado</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN HISTORIA-->



                    <!--COMPATIBILIDAD--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Compatibilidad</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="divi22">
                        {!! Form::label('i22', '22. Realiza actividades científicas', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('i22', 'Si', null, ['class' => 'mr-1', 'id' => 'i22_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('i22', 'No', null, ['class' => 'mr-1', 'id' => 'i22_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divi23">
                        {!! Form::label('i23', '23. Tiene formación en metodología', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('i23', 'Si', null, ['class' => 'mr-1', 'id' => 'i23_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('i23', 'No', null, ['class' => 'mr-1', 'id' => 'i23_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divi24">
                        {!! Form::label('i24', '24. Tiene conocimientos de estadística', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('i24', 'Si', null, ['class' => 'mr-1', 'id' => 'i24_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('i24', 'No', null, ['class' => 'mr-1', 'id' => 'i24_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divi25">
                        {!! Form::label('i25', '25. Tiene capacitación en Ética o Bioética', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('i25', 'Si', null, ['class' => 'mr-1', 'id' => 'i25_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('i25', 'No', null, ['class' => 'mr-1', 'id' => 'i25_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div><!--FIN COMPATIBILIDAD-->



                    <!--CARGOS--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Cargos relevantes previos o actuales</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateCargoIn();">
                                <i class="fas fa-file"> Agregar cargo</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_cargoin" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Cargo</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN CARGOS-->



                    <!--MEMBRESIA--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Membresía</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="divi27">
                        {!! Form::label('i27', '27. Pertenece a UIS', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('i27', 'Si', null, ['class' => 'mr-1', 'id' => 'i27_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('i27', 'No', null, ['class' => 'mr-1', 'id' => 'i27_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divi28">
                        {!! Form::label('i28', '28. Fecha de Invitación ', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('i28', null, ['class' => 'form-control', 'id' => 'i28']) !!}
                        </div> 
                    </div>

                    <div class="form-group" id="divi29">
                        {!! Form::label('i29', '29. Miembro del CEI', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('i29', 'Si', null, ['class' => 'mr-1', 'id' => 'i29_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('i29', 'No', null, ['class' => 'mr-1', 'id' => 'i29_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divi30">
                        {!! Form::label('i30', '30. Miembro del CI', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('i30', 'Si', null, ['class' => 'mr-1', 'id' => 'i30_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('i30', 'No', null, ['class' => 'mr-1', 'id' => 'i30_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divi31">
                        {!! Form::label('i31', '31. Representante de la comunidad ', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('i31', 'Si', null, ['class' => 'mr-1', 'id' => 'i31_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('i31', 'No', null, ['class' => 'mr-1', 'id' => 'i31_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div><!--FIN MEMBRESIA-->



                    <!--REGULATORIO--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Regulatorio</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="divi32">
                        {!! Form::label('i32', '32. Fecha de firma Confidencialidad', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('i32', null, ['class' => 'form-control', 'id' => 'i32']) !!}
                        </div> 
                    </div>

                    <div class="form-group" id="divi33">
                        {!! Form::label('i33', '33. Fecha de firma de No conflicto', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('i33', null, ['class' => 'form-control', 'id' => 'i33']) !!}
                        </div> 
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divi34">
                        {!! Form::label('i34', '34. Fecha de firma Imagen y datos', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('i34', null, ['class' => 'form-control', 'id' => 'i34']) !!}
                        </div> 
                    </div>

                    <div class="form-group" id="divi35">
                        {!! Form::label('i35', '35. Fecha de entrega de Designación', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('i35', null, ['class' => 'form-control', 'id' => 'i35']) !!}
                        </div> 
                    </div>
                    </div>

                    </div><!--FIN REGULATORIO-->



                    <!--CAPACITACION--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Capacitación</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="divi36">
                        {!! Form::label('i36', '36. Fecha de Inducción a UIS', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('i36', null, ['class' => 'form-control', 'id' => 'i36']) !!}
                        </div> 
                    </div>
                    </div>

                    <div class="table-responsive"><br/>
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateQUISIn();">
                                <i class="fas fa-file"> Agregar capacitación QUIS</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_quisin" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de capacitación QUIS</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="table-responsive"><br/>
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateCEIn();">
                                <i class="fas fa-file"> Agregar capacitación CE</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_cein" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de capacitación CE</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="table-responsive"><br/>
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreatePCCEIn();">
                                <i class="fas fa-file"> Agregar capacitación PC-CE</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_pccein" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de capacitación PC-CE</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="table-responsive"><br/>
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateOtraIn();">
                                <i class="fas fa-file"> Agregar otra capacitación</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_otrain" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre</th>    
                                <th scope="col">Fecha de capacitación</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN CAPACITACION-->
                    <br/>
                    <div align="right">
                        <button type="button" onclick="RegresarIntegracion();" class="btn btn-warning"><i class="fa rotate-left"> Mostrar tabla</i></button>
                        <button type="button" onclick="GuardarIntegracion();" class="btn btn-primary"><i class="fas fa-save"> Guardar integración</i></button>
                    </div>

                    </div><!--FIN DE DIV PREGUNTAS-->
                  </div><!--FIN DE TAB INTEGRACION-->





                  <!--COMITES-->
                  <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">

                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Comités</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateComiteIn();">
                                <i class="fas fa-file"> Agregar comité y periodo</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_comitein" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre</th>    
                                <th scope="col">Periodo</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div>

                  </div><!--FIN DE TAB COMITES-->





                  <!--REGISTROS-->
                  <div class="tab-pane fade" id="vert-tabs-3" role="tabpanel" aria-labelledby="vert-tabs-3-tab">

                    <!--REG-->
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Registros</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateRegistroIn();">
                                <i class="fas fa-file"> Agregar registro</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_registroin" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre</th>    
                                <th scope="col">Periodo</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN REG-->



                    <!--RENOVACIONES--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Renovaciones</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateRenovacionIn();">
                                <i class="fas fa-file"> Agregar renovación</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_renovacionin" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha de renovación</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN RENOVACIONES-->

                  </div><!--FIN DE TAB REGISTROS-->




                  <!--REGULATORIO-->
                  <div class="tab-pane fade" id="vert-tabs-4" role="tabpanel" aria-labelledby="vert-tabs-4-tab">

                    <!--ACTUALIZACION-->
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Actualización regulatoria</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateActualizacionIn();">
                                <i class="fas fa-file"> Agregar actualización regulatoria</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_actualizacionin" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de actualización</th> 
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN ACTUALIZACION-->



                    <!--INFORME--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Informes anuales</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateInformeIn();">
                                <i class="fas fa-file"> Agregar informe</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_informein" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de informe anual</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN INFORME-->

                  </div><!--FIN DE TAB REGULATORIO-->



                </div>
              </div>

              
            </div>
        </div>
    </div>



                    
                  