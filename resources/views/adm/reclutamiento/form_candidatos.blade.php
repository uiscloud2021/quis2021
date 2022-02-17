    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Candidato
            </h3>
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Descripción</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="false"><i class="far fa-edit"></i> Expediente de personal</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--DESCRIPCIÓN-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'candidato_id']) !!}
                        {!! Form::hidden('tipo', $recl, ['class' => 'form-control', 'id'=>'tipo']) !!}
                        {!! Form::hidden('empresa_id', $globalempresa_id, ['class' => 'form-control', 'id'=>'empresa_id']) !!}

                        {!! Form::label('no62', '62. Nombre del candidato', ['class' => 'form-label']) !!}
                        {!! Form::text('no62', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    
                        @error('no62')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('no64', '64. Fecha de entrevista', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no64', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no66', '66. ¿Cómo se enteró de la vacante?', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no66', null, ['class' => 'form-control', 'placeholder' => 'Ingrese respuesta']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no68', '68. ¿Cuáles son sus aspiraciones profesionales?', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no68', null, ['class' => 'form-control', 'placeholder' => 'Ingrese respuesta']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no70', '70. ¿Cómo se ve profesionalmente en cinco años?', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no70', null, ['class' => 'form-control', 'placeholder' => 'Ingrese respuesta']) !!}
                    </div>

                    <div class="form-group" id="div72">
                        {!! Form::label('no72', '72. Llenó la Impresión del entrevistador', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no72', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no72', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no74', '74. Impresión de escolaridad', ['class' => 'form-label']) !!}
                        {!! Form::number('no74', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número' , 'step' => '0', 'min' => '0', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no76', '76. Impresión de experiencia laboral', ['class' => 'form-label']) !!}
                        {!! Form::number('no76', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número' , 'step' => '0', 'min' => '0', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no78', '78. Impresión de estabilidad laboral', ['class' => 'form-label']) !!}
                        {!! Form::number('no78', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número' , 'step' => '0', 'min' => '0', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no80', '80. Impresión de cualidades físicas', ['class' => 'form-label']) !!}
                        {!! Form::number('no80', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número' , 'step' => '0', 'min' => '0', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no82', '82. Impresión de dinamismo o energía', ['class' => 'form-label']) !!}
                        {!! Form::number('no82', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número' , 'step' => '0', 'min' => '0', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no84', '84. Debe continuar proceso de selección', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no84', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no84', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no86', '86. Resultado en Prueba de ortografía', ['class' => 'form-label']) !!}
                        {!! Form::number('no86', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número' , 'step' => '0']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no88', '88. Resultado en Prueba de percepción', ['class' => 'form-label']) !!}
                        {!! Form::number('no88', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número' , 'step' => '0']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no90', '90. Número de aciertos en Operaciones aritméticas', ['class' => 'form-label']) !!}
                        {!! Form::number('no90', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número' , 'step' => '0']) !!}
                    </div>

                    <div class="form-group" id="div92">
                        {!! Form::label('no92', '92. Aplicó Prueba de Cleaver', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no92', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no92', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no94', '94. El candidato fue aceptado para trabajar en la empresa', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no94', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no94', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no63', '63. Puesto que solicita', ['class' => 'form-label']) !!}
                        {!! Form::select('no63', ['Dirección General' => 'Dirección General', 'Subdirección' => 'Subdirección', 'Gerente de Administración' => 'Gerente de Administración', 'Recursos Humanos' => 'Recursos Humanos', 'Finanzas' => 'Finanzas', 'Calidad' => 'Calidad', 'Sistemas' => 'Sistemas', 'Regulatorios' => 'Regulatorios', 'Recepción' => 'Recepción', 'Asistente administrativo' => 'Asistente administrativo', 'Mensajero' => 'Mensajero', 'Limpieza' => 'Limpieza', 'Becario' => 'Becario', 'Presidente de CE' => 'Presidente de CE', 'Presidente de CI' => 'Presidente de CI', 'Secretario de CE' => 'Secretario de CE', 'Secretario de CI' => 'Secretario de CI', 'Miembro del Comité de Ética' => 'Miembro del Comité de Ética', 'Miembro del Comité de Investigación' => 'Miembro del Comité de Investigación', 'Gerente de Sitio Clínico' => 'Gerente de Sitio Clínico', 'Coordinador de Estudios' => 'Coordinador de Estudios', 'Investigador' => 'Investigador', 'Enfermera' => 'Enfermera', 'Químico' => 'Químico', 'Técnico' => 'Técnico', 'Gerente de ID' => 'Gerente de ID', 'Asesor de ID' => 'Asesor de ID', 'Asistente de ID' => 'Asistente de ID'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group" id="div65">
                        {!! Form::label('no65', '65. Aplicó la Encuesta a candidatos', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no65', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no65', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no67', '67. ¿Qué le llamó la atención para enviar su CV?', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no67', null, ['class' => 'form-control', 'placeholder' => 'Ingrese respuesta']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no69', '69. ¿Cuáles son sus aspiraciones económicas?', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no69', null, ['class' => 'form-control', 'placeholder' => 'Ingrese respuesta']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no71', '71. ¿Cómo se describiría?', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no71', null, ['class' => 'form-control', 'placeholder' => 'Ingrese respuesta']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no73', '73. Impresión de apariencia personal', ['class' => 'form-label']) !!}
                        {!! Form::number('no73', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número' , 'step' => '0', 'min' => '0', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no75', '75. Impresión de expectativas personales', ['class' => 'form-label']) !!}
                        {!! Form::number('no75', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número' , 'step' => '0', 'min' => '0', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no77', '77. Impresión de equilibrio económico', ['class' => 'form-label']) !!}
                        {!! Form::number('no77', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número' , 'step' => '0', 'min' => '0', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no79', '79. Impresión de personalidad y adaptabilidad', ['class' => 'form-label']) !!}
                        {!! Form::number('no79', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número' , 'step' => '0', 'min' => '0', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no81', '81. Impresión de orientación al cliente', ['class' => 'form-label']) !!}
                        {!! Form::number('no81', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número' , 'step' => '0', 'min' => '0', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no83', '83. Promedio obtenido en Impresión del entrevistador', ['class' => 'form-label']) !!}
                        {!! Form::number('no83', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número' , 'step' => '0']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no85', '85. Número de aciertos en Prueba de ortografía', ['class' => 'form-label']) !!}
                        {!! Form::number('no85', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número' , 'step' => '0']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no87', '87. Número de aciertos en Prueba de percepción', ['class' => 'form-label']) !!}
                        {!! Form::number('no87', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número' , 'step' => '0']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no89', '89. Impresión en Prueba de redacción', ['class' => 'form-label']) !!}
                        {!! Form::select('no89', ['Buena' => 'Buena', 'Regular' => 'Regular', 'Mala' => 'Mala'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no91', '91. Resultado en Operaciones aritméticas', ['class' => 'form-label']) !!}
                        {!! Form::number('no91', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número' , 'step' => '0']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no93', '93. Resultado en Prueba de Cleaver', ['class' => 'form-label']) !!}
                        {!! Form::number('no93', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número' , 'step' => '0']) !!}
                    </div>
                    </div>

                    </div>
                  </div>


                  <!--EXPEDIENTE DE PERSONAL-->
                  <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">

                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no95', '95. Abreviatura del título', ['class' => 'form-label']) !!}
                        {!! Form::text('no95', null, ['class' => 'form-control', 'placeholder' => 'Ingrese abreviatura']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no97', '97. Fecha de nacimiento', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no97', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no99', '99. Sexo', ['class' => 'form-label']) !!}
                        {!! Form::select('no99', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no101', '101. Domicilio completo', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no101', null, ['class' => 'form-control', 'placeholder' => 'Ingrese domicilio']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no103', '103. Teléfono móvil', ['class' => 'form-label']) !!}
                        {!! Form::number('no103', null, ['class' => 'form-control', 'placeholder' => 'Ingrese teléfono']) !!}
                    </div>

                    <div class="form-group" id="div105">
                        {!! Form::label('no105', '105. Archivó el CV escrito en formato libre y firmado por la persona', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no105', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no105', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no107', '107. Número de CURP', ['class' => 'form-label']) !!}
                        {!! Form::text('no107', null, ['class' => 'form-control', 'placeholder' => 'Ingrese CURP']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no109', '109. Número de afiliación al IMSS', ['class' => 'form-label']) !!}
                        {!! Form::text('no109', null, ['class' => 'form-control', 'placeholder' => 'Ingrese IMSS']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no111', '111. Número de crédito INFONAVIT', ['class' => 'form-label']) !!}
                        {!! Form::text('no111', null, ['class' => 'form-control', 'placeholder' => 'Ingrese INFONAVIT']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no113', '113. Cláusulas del convenio de pago de pensión alimentaria', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no113', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cláusulas']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no115', '115. Requiere cédula profesional', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no115', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no115', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div117">
                        {!! Form::label('no117', '117. Se verificó la cédula profesional', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no117', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no117', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no96', '96. Nacionalidad', ['class' => 'form-label']) !!}
                        {!! Form::text('no96', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nacionalidad']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no98', '98. Edad', ['class' => 'form-label']) !!}
                        {!! Form::number('no98', null, ['class' => 'form-control', 'placeholder' => 'Ingrese edad']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no100', '100. Estado civil', ['class' => 'form-label']) !!}
                        {!! Form::select('no100', ['Soltero' => 'Soltero', 'Casado' => 'Casado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no102', '102. Teléfono casa', ['class' => 'form-label']) !!}
                        {!! Form::number('no102', null, ['class' => 'form-control', 'placeholder' => 'Ingrese teléfono']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no104', '104. Correo electrónico personal', ['class' => 'form-label']) !!}
                        {!! Form::text('no104', null, ['class' => 'form-control', 'placeholder' => 'Ingrese correo']) !!}
                    </div>

                    <div class="form-group" id="div106">
                        {!! Form::label('no106', '106. Archivó una copia de la identificación oficial en el expediente de la persona', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no106', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no106', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no108', '108. Tiene número de afiliación al IMSS', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no108', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no108', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no110', '110. Tiene crédito INFONAVIT', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no110', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no110', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no112', '112. Tiene convenio de pago de pensión alimentaria', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no112', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no112', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div114">
                        {!! Form::label('no114', '114. Archivó la copia de convenio de pago de pensión alimentaria en el expediente de la persona', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no114', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no114', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no116', '116. Números de cédulas profesionales', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no116', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cédulas']) !!}
                    </div>

                    <div class="form-group" id="div118">
                        {!! Form::label('no118', '118. Archivó una copia de la(s) cédula(s) profesional(es) firmada(s) en el expediente de la persona', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no118', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no118', 'No', null, ['class' => 'mr-1']) !!}
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



                    
                  