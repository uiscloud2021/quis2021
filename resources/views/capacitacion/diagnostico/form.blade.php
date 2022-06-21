<div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Diagnóstico
            </h3>
            <div style="float:right">
                <button type="button" onclick="location.href='{{ route('diagnostico.index') }}'" class="btn-warning" title="Regresar"><i class="fa fa-arrow-left"></i></button>
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Verificación</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="false"><i class="far fa-edit"></i> Encuesta al trabajador</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="list_propuesta();" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" role="tab" aria-controls="vert-tabs-3" aria-selected="false"><i class="far fa-edit"></i> Necesidades de capacitación</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>

              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">
                    
                  <!--VERIFICACION-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>  
                  
                    {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}
                    {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id', 'readonly']) !!}
                    {!! Form::hidden('candidato_id', $candidato->id, ['class' => 'form-control', 'id'=>'candidato_id', 'readonly']) !!}
                    {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'diagnostico_id', 'readonly']) !!}

                    <div class="row">

                    <div class="col-md-12">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateFecha();">
                                <i class="fas fa-file"> Agregar fecha de evaluación</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_fecha" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de evaluación</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div><br/>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateConocimiento();">
                                <i class="fas fa-file"> Agregar conocimiento</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_conocimiento" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Conocimiento</th>
                                <th scope="col">Cumple conocimiento</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div><br/>

                    <div class="form-group">
                        {!! Form::label('no4', '4. Cumple con todos los conocimientos necesarios', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no4', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no4', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <br/>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateHabilidad();">
                                <i class="fas fa-file"> Agregar habilidad</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_habilidad" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Habilidad</th>
                                <th scope="col">Cumple habilidad</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div><br/>

                    <div class="form-group">
                        {!! Form::label('no7', '7. Cumple con todas las habilidades necesarias', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no7', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no7', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <br/>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateAptitud();">
                                <i class="fas fa-file"> Agregar aptitud</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_aptitud" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Aptitud</th>
                                <th scope="col">Cumple aptitud</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div><br/>

                    <div class="form-group">
                        {!! Form::label('no10', '10. Cumple con todas las aptitudes necesarias', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no10', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no10', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-12">
                        <h5 style="text-align:center">Verifica desempeño</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no11', '11. Resultado en relación a las metas ', ['class' => 'form-label']) !!}
                        {!! Form::select('no11', ['Cumple' => 'Cumple', 'No cumple' => 'No cumple'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no12', '12. Productividad', ['class' => 'form-label']) !!}
                        {!! Form::select('no12', ['0' => '0', '10%' => '10%', '20%' => '20%', '30%' => '30%', '40%' => '40%', '50%' => '50%', '60%' => '60%', '70%' => '70%', '80%' => '80%', '90%' => '90%', '100%' => '100%'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>
                    </div>

                    <div class="col-md-12"><br/>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateCapacitacion();">
                                <i class="fas fa-file"> Agregar capacitación</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_capacitacion" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Capacitación</th>
                                <th scope="col">Fecha de constancia</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no15', '15. Cumplimiento personal de la capacitación', ['class' => 'form-label']) !!}
                        {!! Form::text('no15', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no17', '17. Estudia actualmente', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no17', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no17', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no16', '16. Experiencia previa en un puesto similar', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no16', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no16', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-12"><br/>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateArea();">
                                <i class="fas fa-file"> Agregar área de conocimiento</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_area" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Área de conocimiento</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div><br/>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateGrado();">
                                <i class="fas fa-file"> Agregar grado académico</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_grado" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Grado académico</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div><br/>
                    </div>

                    </div>
                  </div>


                  <!--ENCUESTA-->
                  <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">
                    
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no20', '20. Grado en que conoce las actividades', ['class' => 'form-label']) !!}
                        {!! Form::number('no20', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'min' => '0', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no22', '22. Grado en que el sistema facilita el aprendizaje', ['class' => 'form-label']) !!}
                        {!! Form::number('no22', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'min' => '0', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no24', '24. Cantidad de capacitación ', ['class' => 'form-label']) !!}
                        {!! Form::number('no24', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'min' => '0', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no26', '26. Utilidad de la capacitación', ['class' => 'form-label']) !!}
                        {!! Form::number('no26', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'min' => '0', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no28', '28. Cuáles otras de sus habilidades podrían beneficiar a la empresa', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no28', null, ['class' => 'form-control', 'placeholder' => 'Ingrese habilidades']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no30', '30. Sugerencias para mejorar el programa de capacitación de la empresa', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no30', null, ['class' => 'form-control', 'placeholder' => 'Ingrese sugerencias']) !!}
                    </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no21', '21. Grado en que puede realizar todas las actividades requeridas por el puesto', ['class' => 'form-label']) !!}
                        {!! Form::number('no21', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'min' => '0', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no23', '23. Grado de respaldo o asesoría', ['class' => 'form-label']) !!}
                        {!! Form::number('no23', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'min' => '0', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no25', '25. Calidad de la capacitación', ['class' => 'form-label']) !!}
                        {!! Form::number('no25', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'min' => '0', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no27', '27. Grado en que aprovecha las habilidades o conocimientos', ['class' => 'form-label']) !!}
                        {!! Form::number('no27', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'min' => '0', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no29', '29. Sugerencias para mejorar el desarrollo de las actividades', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no29', null, ['class' => 'form-control', 'placeholder' => 'Ingrese sugerencias']) !!}
                    </div>
                    </div>

                    </div>
                  </div>


                  <!--NECESIDADES-->
                  <div class="tab-pane fade" id="vert-tabs-3" role="tabpanel" aria-labelledby="vert-tabs-3-tab">
                    
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no31', '31. Fecha de DNC', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no31', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no33', '33. Resultado de DNC', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no33', null, ['class' => 'form-control', 'placeholder' => 'Ingrese resultado']) !!}
                    </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no32', '32. Cumplimiento global de entrenamiento', ['class' => 'form-label']) !!}
                        {!! Form::text('no32', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no34', '34. Grado de respaldo o asesoría', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no34', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no34', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-12"><br/>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreatePropuesta();">
                                <i class="fas fa-file"> Agregar capacitación propuesta</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_propuesta" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Capacitación propuesta</th>
                                <th scope="col">Personas y puestos</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div><br/>

                    <div class="form-group">
                        {!! Form::label('no37', '37. Nombre del evaluador', ['class' => 'form-label']) !!}
                        {!! Form::select('no37', ['María de la Merced Velázquez Quintana' => 'María de la Merced Velázquez Quintana', 'Rosalva Avena Díaz' => 'Rosalva Avena Díaz', 'Julia Elvira Miranda Mireles' => 'Julia Elvira Miranda Mireles', 'Olga Velázquez Quintana' => 'Olga Velázquez Quintana'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>
                    </div>

                    </div>
                  </div>

                  
                  
                </div>
              </div>
            </div>
        </div>
    </div>


                    
                  