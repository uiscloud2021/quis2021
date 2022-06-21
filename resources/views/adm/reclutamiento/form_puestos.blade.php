    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Puesto
            </h3>
            <div style="float:right">
                <button type="button" onclick="location.href='{{ route('reclutamiento.index') }}'" class="btn-warning" title="Regresar"><i class="fa fa-arrow-left"></i></button>
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Descripción de puestos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="false"><i class="far fa-edit"></i> Capacitación requerida</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--DESCRIPCIÓN DE PUESTOS-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'puesto_id']) !!}
                        {!! Form::hidden('tipo', $recl, ['class' => 'form-control', 'id'=>'tipo']) !!}
                        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}

                        {!! Form::label('no1', '1. Área', ['class' => 'form-label']) !!}
                        {!! Form::select('no1', ['Administración' => 'Administración', 'Comité de Ética' => 'Comité de Ética', 'Sitio Clínico' => 'Sitio Clínico', 'Unidad Clínica' => 'Unidad Clínica', 'I&D' => 'I&D'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    
                        @error('no1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('no3', '3. Código del puesto', ['class' => 'form-label']) !!}
                        {!! Form::text('no3', null, ['class' => 'form-control', 'placeholder' => 'Ingrese código']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no5', '5. Nivel', ['class' => 'form-label']) !!}
                        {!! Form::text('no5', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nivel']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no7', '7. Tipo de contrato', ['class' => 'form-label']) !!}
                        {!! Form::select('no7', ['Nómina' => 'Nómina', 'Honorarios' => 'Honorarios', 'Becario' => 'Becario', 'Miembro honorario' => 'Miembro honorario'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no9', '9. Misión del puesto', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no9', null, ['class' => 'form-control', 'placeholder' => 'Ingrese misión']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no11', '11. Puesto al que reporta', ['class' => 'form-label']) !!}
                        {!! Form::text('no11', null, ['class' => 'form-control', 'placeholder' => 'Ingrese puesto']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no13', '13. Habilidades requeridas', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no13', null, ['class' => 'form-control', 'placeholder' => 'Ingrese habilidades']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no15', '15. Experiencia requerida', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no15', null, ['class' => 'form-control', 'placeholder' => 'Ingrese experiencia']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no17', '17. Tiene puestos a su cargo', ['class' => 'form-label']) !!}
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
                        {!! Form::label('no2', '2. Puesto', ['class' => 'form-label']) !!}
                        {!! Form::select('no2', ['Dirección General' => 'Dirección General', 'Subdirección' => 'Subdirección', 'Gerente de Administración' => 'Gerente de Administración', 'Recursos Humanos' => 'Recursos Humanos', 'Finanzas' => 'Finanzas', 'Calidad' => 'Calidad', 'Sistemas' => 'Sistemas', 'Regulatorios' => 'Regulatorios', 'Recepción' => 'Recepción', 'Asistente administrativo' => 'Asistente administrativo', 'Mensajero' => 'Mensajero', 'Limpieza' => 'Limpieza', 'Becario' => 'Becario', 'Presidente de CE' => 'Presidente de CE', 'Presidente de CI' => 'Presidente de CI', 'Secretario de CE' => 'Secretario de CE', 'Secretario de CI' => 'Secretario de CI', 'Miembro del Comité de Ética' => 'Miembro del Comité de Ética', 'Miembro del Comité de Investigación' => 'Miembro del Comité de Investigación', 'Gerente de Sitio Clínico' => 'Gerente de Sitio Clínico', 'Coordinador de Estudios' => 'Coordinador de Estudios', 'Investigador' => 'Investigador', 'Enfermera' => 'Enfermera', 'Químico' => 'Químico', 'Técnico' => 'Técnico', 'Gerente de ID' => 'Gerente de ID', 'Asesor de ID' => 'Asesor de ID', 'Asistente de ID' => 'Asistente de ID'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no4', '4. Tiempo', ['class' => 'form-label']) !!}
                        {!! Form::select('no4', ['Abierto' => 'Abierto', 'Medio tiempo' => 'Medio tiempo', 'Tiempo completo' => 'Tiempo completo'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no6', '6. Horario', ['class' => 'form-label']) !!}
                        {!! Form::select('no6', ['Por proyecto' => 'Por proyecto', 'Medio tiempo' => 'Medio tiempo', 'Tiempo completo' => 'Tiempo completo'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no8', '8. Requiere viajar', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no8', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no8', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no10', '10. Responsabilidades del puesto', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no10', null, ['class' => 'form-control', 'placeholder' => 'Ingrese responsabilidades']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no12', '12. Puesto que lo puede suplir', ['class' => 'form-label']) !!}
                        {!! Form::select('no12', ['Dirección General' => 'Dirección General', 'Subdirección' => 'Subdirección', 'Gerente de Administración' => 'Gerente de Administración', 'Recursos Humanos' => 'Recursos Humanos', 'Finanzas' => 'Finanzas', 'Calidad' => 'Calidad', 'Sistemas' => 'Sistemas', 'Regulatorios' => 'Regulatorios', 'Recepción' => 'Recepción', 'Asistente administrativo' => 'Asistente administrativo', 'Mensajero' => 'Mensajero', 'Limpieza' => 'Limpieza', 'Becario' => 'Becario', 'Presidente de CE' => 'Presidente de CE', 'Presidente de CI' => 'Presidente de CI', 'Secretario de CE' => 'Secretario de CE', 'Secretario de CI' => 'Secretario de CI', 'Miembro del Comité de Ética' => 'Miembro del Comité de Ética', 'Miembro del Comité de Investigación' => 'Miembro del Comité de Investigación', 'Gerente de Sitio Clínico' => 'Gerente de Sitio Clínico', 'Coordinador de Estudios' => 'Coordinador de Estudios', 'Investigador' => 'Investigador', 'Enfermera' => 'Enfermera', 'Químico' => 'Químico', 'Técnico' => 'Técnico', 'Gerente de ID' => 'Gerente de ID', 'Asesor de ID' => 'Asesor de ID', 'Asistente de ID' => 'Asistente de ID'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no14', '14. Formación académica requerida', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no14', null, ['class' => 'form-control', 'placeholder' => 'Ingrese formación']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no16', '16. Requiere cédula profesional', ['class' => 'form-label']) !!}
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

                    <div class="form-group">
                        {!! Form::label('no20', '20. Número de personas a su cargo', ['class' => 'form-label']) !!}
                        {!! Form::number('no20', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'step' => '0']) !!}
                    </div>
                    </div>

                    </div>
                    <br/>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreatePuesto();">
                                <i class="fas fa-file"> Agregar puesto a su cargo</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_pto" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre del puesto</th>
                                <th scope="col">Personas con contrato abierto</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>


                  <!--CAPACITACION REQUERIDA-->
                  <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">

                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no21', '21. Presentación UIS', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no21', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no21', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no23', '23. Alta dirección', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no23', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no23', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no25', '25. Actualización en su profesión', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no25', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no25', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no27', '27. QUIS', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no27', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no27', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no29', '29. PC-AD-2 Finanzas', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no29', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no29', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no31', '31. PC-AD-4 Sistemas', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no31', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no31', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no33', '33. PC-AD-6 Regulatorios', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no33', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no33', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no35', '35. PC-B-1 Capacitación', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no35', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no35', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no37', '37. PC-D-1 Responsabilidad Social', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no37', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no37', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no39', '39. Curso para Comité de Ética', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no39', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no39', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no41', '41. PC-SC-1 Factibilidad', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no41', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no41', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no43', '43. PC-SC-4 Farmacia', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no43', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no43', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no45', '45. PC-SC-6 Atención médica', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no45', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no45', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no47', '47. Buenas prácticas clínicas', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no47', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no47', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no49', '49. Protocolo de cada investigación', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no49', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no49', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no51', '51. Trabajo en equipo', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no51', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no51', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no53', '53. Primeros auxilios', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no53', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no53', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no55', '55. IT-ID-1.1 Capacitación', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no55', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no55', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no57', '57. IT-ID-3.1 Diseño', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no57', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no57', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no59', '59. IT-ID-5.1 Incubación', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no59', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no59', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no61', '61. Metodología de la investigación', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no61', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no61', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no22', '22. Inducción a UIS', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no22', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no22', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no24', '24. Liderazgo', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no24', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no24', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no26', '26. Detección de la violencia', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no26', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no26', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no28', '28. PC-AD-1 Gestión', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no28', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no28', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no30', '30. PC-AD-3 Recursos Humanos', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no30', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no30', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no32', '32. PC-AD-5 Calidad', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no32', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no32', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no34', '34. PC-A-1 Calidad', ['class' => 'form-label']) !!}
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

                    <div class="form-group">
                        {!! Form::label('no36', '36. PC-C-1 Seguridad', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no36', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no36', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no38', '38. PC-E-1 Integridad empresarial', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no38', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no38', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no40', '40. PC-CE-1 Comité de Ética', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no40', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no40', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no42', '42. PC-SC-3 Sometimiento', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no42', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no42', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no44', '44. PC-SC-5 Reclutamiento', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no44', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no44', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no46', '46. PC-SC-7 Cierre', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no46', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no46', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no48', '48. IATA', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no48', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no48', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no50', '50. Manual del patrocinador', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no50', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no50', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no52', '52. Seguridad', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no52', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no52', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no54', '54. PC-ID-1 Innovación y Desarrollo', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no54', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no54', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no56', '56. IT-ID-2.1 Consultoría', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no56', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no56', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no58', '58. IT-ID-4.1 Desarrollo', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no58', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no58', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no60', '60. Redacción científica', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no60', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no60', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div>
                  </div>

                  
                </div>
              </div>

            </div>
        </div>
    </div>



                    
                  