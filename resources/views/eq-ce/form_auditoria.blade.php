    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Auditorías
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
                                <a class="nav-link active" id="vert-tabs-1au-tab" data-toggle="pill" href="#vert-tabs-1au" role="tab" aria-controls="vert-tabs-1au" aria-selected="false"><i class="far fa-edit"></i> Auditoría</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--AUDITORIA-->
                  <div class="tab-pane fade show active" id="vert-tabs-1re" role="tabpanel" aria-labelledby="vert-tabs-1re-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>

                    <div class="table-responsive" id="tabla_auditoria">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateAuditoria();">
                                <i class="fas fa-file"> Agregar auditoría</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_auditoria" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha programada de auditoría</th>
                                <th scope="col">Fecha en que se realiza</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    <div id="preguntas_auditoria" style="display:none">
                    <!--PROGRAMACION--> 
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Programación</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('auditoria_id', null, ['class' => 'form-control', 'id'=>'auditoria_id']) !!}
                        {!! Form::hidden('proyecto_id', $proyecto->id, ['class' => 'form-control', 'id'=>'proyecto_id']) !!}
                        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}
                       
                        {!! Form::label('a1', '1. Fecha programada de la auditoría', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('a1', null, ['class' => 'form-control', 'id' => 'a1']) !!}
                        </div>
                    
                        @error('a1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group" id="diva2">
                        {!! Form::label('a2', '2. Número de proyectos que cuentan con autorización y con actividad en atención de sujetos', ['class' => 'form-label']) !!}
                        {!! Form::number('a2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'id' => 'a2']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="diva3">
                        {!! Form::label('a3', '3. Archivó la evidencia electrónica de la selección aleatoria del protocolo que se auditará', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a3', 'Si', null, ['class' => 'mr-1', 'id' => 'a3_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a3', 'No', null, ['class' => 'mr-1', 'id' => 'a3_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="diva4">
                        {!! Form::label('a4', '4. Fecha en que se emite la notificación de auditoría al PI', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('a4', null, ['class' => 'form-control', 'id' => 'a4']) !!}
                        </div>
                    </div>
                    </div>

                    </div><!--FIN PROGRAMACION-->


                    <!--DESARROLLO--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Desarrollo</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="diva5">
                        {!! Form::label('a5', '5. Fecha en que se realiza la auditoría', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('a5', null, ['class' => 'form-control', 'id' => 'a5']) !!}
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="diva6">
                        {!! Form::label('a6', '6. Persona que realiza la auditoría', ['class' => 'form-label']) !!}
                        {!! Form::text('a6', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'a6']) !!}
                    </div>
                    </div>

                    </div><!--FIN DESARROLLO-->


                    <!--CARPETA--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Carpeta regulatoria</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="diva7">
                        {!! Form::label('a7', '7. El estudio requiere autorización por COFEPRIS', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a7', 'Si', null, ['class' => 'mr-1', 'id' => 'a7_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a7', 'No', null, ['class' => 'mr-1', 'id' => 'a7_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="diva8">
                        {!! Form::label('a8', '8. El estudio cuenta con autorización por COFEPRIS', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a8', 'Si', null, ['class' => 'mr-1', 'id' => 'a8_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a8', 'No', null, ['class' => 'mr-1', 'id' => 'a8_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="diva9">
                        {!! Form::label('a9', '9. La fecha de autorización por COFEPRIS es previa al inicio del estudio', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a9', 'Si', null, ['class' => 'mr-1', 'id' => 'a9_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a9', 'No', null, ['class' => 'mr-1', 'id' => 'a9_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="diva10">
                        {!! Form::label('a10', '10. La fecha de firma en hoja de firmas del protocolo es previa al inicio de actividades del estudio', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a10', 'Si', null, ['class' => 'mr-1', 'id' => 'a10_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a10', 'No', null, ['class' => 'mr-1', 'id' => 'a10_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div><!--FIN CARPETA-->



                    <!--DOCUMENTOS--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Documentos fuente</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="diva11">
                        {!! Form::label('a11', '11. Número de documentos fuente auditados', ['class' => 'form-label']) !!}
                        {!! Form::number('a11', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'id' => 'a11']) !!}
                    </div>

                    <div class="form-group" id="diva12">
                        {!! Form::label('a12', '12. La firma de ICF de cada sujeto fue realizada por personal previamente delegado ', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a12', 'Si', null, ['class' => 'mr-1', 'id' => 'a12_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a12', 'No', null, ['class' => 'mr-1', 'id' => 'a12_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="diva13">
                        {!! Form::label('a13', '13. La fecha de sello de cada ICF es previa a la fecha de firma', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a13', 'Si', null, ['class' => 'mr-1', 'id' => 'a13_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a13', 'No', null, ['class' => 'mr-1', 'id' => 'a13_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="diva14">
                        {!! Form::label('a14', '14. Todas las firmas en cada ICF tienen la misma fecha', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a14', 'Si', null, ['class' => 'mr-1', 'id' => 'a14_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a14', 'No', null, ['class' => 'mr-1', 'id' => 'a14_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="diva15">
                        {!! Form::label('a15', '15. Todas las firmas de ICF están descritas en una nota médica completa', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a15', 'Si', null, ['class' => 'mr-1', 'id' => 'a15_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a15', 'No', null, ['class' => 'mr-1', 'id' => 'a15_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="diva16">
                        {!! Form::label('a16', '16. Mediante las notas o el resumen médico, existe evidencia de relación previa entre médico y sujeto', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a16', 'Si', null, ['class' => 'mr-1', 'id' => 'a16_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a16', 'No', null, ['class' => 'mr-1', 'id' => 'a16_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="diva17">
                        {!! Form::label('a17', '17. En los casos con evidencia de relación previa, se cumplió la disposición de cambio de investigador para obtener la firma de ICF ', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a17', 'Si', null, ['class' => 'mr-1', 'id' => 'a17_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a17', 'No', null, ['class' => 'mr-1', 'id' => 'a17_no']) !!}
                                No
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a17', 'No aplica', null, ['class' => 'mr-1', 'id' => 'a17_na']) !!}
                                No aplica
                            </label>
                        </div>
                    </div>
                    </div>

                    </div><!--FIN DOCUMENTO-->



                    <!--VERIFICACION--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Verificación teléfonica</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="diva18">
                        {!! Form::label('a18', '18. Archivó la evidencia electrónica de la selección del sujeto que se verifica', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a18', 'Si', null, ['class' => 'mr-1', 'id' => 'a18_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a18', 'No', null, ['class' => 'mr-1', 'id' => 'a18_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="diva19">
                        {!! Form::label('a19', '19. Número de sujeto que se verifica', ['class' => 'form-label']) !!}
                        {!! Form::number('a19', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'id' => 'a19']) !!}
                    </div>

                    <div class="form-group" id="diva20">
                        {!! Form::label('a20', '20. La firma de ICF del sujeto fue obtenida por personal previamente delegado', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a20', 'Si', null, ['class' => 'mr-1', 'id' => 'a20_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a20', 'No', null, ['class' => 'mr-1', 'id' => 'a20_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="diva21">
                        {!! Form::label('a21', '21. El sujeto declara relación previa con el investigador principal', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a21', 'Si', null, ['class' => 'mr-1', 'id' => 'a21_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a21', 'No', null, ['class' => 'mr-1', 'id' => 'a21_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="diva22">
                        {!! Form::label('a22', '22. En caso de relación previa sujeto-investigador, se cumplió la disposición de cambio de investigador para obtener la firma de ICF ', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a22', 'Si', null, ['class' => 'mr-1', 'id' => 'a22_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a22', 'No', null, ['class' => 'mr-1', 'id' => 'a22_no']) !!}
                                No
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a22', 'No aplica', null, ['class' => 'mr-1', 'id' => 'a22_na']) !!}
                                No aplica
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="diva23">
                        {!! Form::label('a23', '23. El proceso de consentimiento se realizó frente a dos testigos', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a23', 'Si', null, ['class' => 'mr-1', 'id' => 'a23_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a23', 'No', null, ['class' => 'mr-1', 'id' => 'a23_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="diva24">
                        {!! Form::label('a24', '24. El proceso de consentimiento fue realizado por un investigador médico delegado', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a24', 'Si', null, ['class' => 'mr-1', 'id' => 'a24_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a24', 'No', null, ['class' => 'mr-1', 'id' => 'a24_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div><!--FIN VERIFICACION-->



                    <!--CONCLUSION--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Conclusión</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="diva25">
                        {!! Form::label('a25', '25. Observaciones de la auditoría', ['class' => 'form-label']) !!}
                        {!! Form::textarea('a25', null, ['class' => 'form-control', 'placeholder' => 'Ingrese observaciones', 'id' => 'a25']) !!}
                    </div>

                    <div class="form-group" id="diva26">
                        {!! Form::label('a26', '26. Existe evidencia de transgresión ética previa', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a26', 'Si', null, ['class' => 'mr-1', 'id' => 'a26_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a26', 'No', null, ['class' => 'mr-1', 'id' => 'a26_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="diva27">
                        {!! Form::label('a27', '27. El estudio requiere verificación profunda del estado ético', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a27', 'Si', null, ['class' => 'mr-1', 'id' => 'a27_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a27', 'No', null, ['class' => 'mr-1', 'id' => 'a27_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="diva28">
                        {!! Form::label('a28', '28. Fecha en que se emite el Dictamen', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('a28', null, ['class' => 'form-control', 'id' => 'a28']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="diva29">
                        {!! Form::label('a29', '29. Fecha en que se informa al Comité sobre el resultado de la auditoría', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('a29', null, ['class' => 'form-control', 'id' => 'a29']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="diva30">
                        {!! Form::label('a30', '30. En opinión del comité, el estudio puede continuar', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('a30', 'Si', null, ['class' => 'mr-1', 'id' => 'a30_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('a30', 'No', null, ['class' => 'mr-1', 'id' => 'a30_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="diva31">
                        {!! Form::label('a31', '31. Fecha en que se emite el Aviso de cancelación', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('a31', null, ['class' => 'form-control', 'id' => 'a31']) !!}
                        </div>
                    </div>
                    </div>

                    </div><!--FIN CONCLUSION-->

                    <br/>
                    <div align="right">
                        <button type="button" onclick="RegresarAuditoria();" class="btn btn-warning"><i class="fa rotate-left"> Mostrar tabla</i></button>
                        <button type="button" onclick="GuardarAuditoria();" class="btn btn-primary"><i class="fas fa-save"> Guardar auditoría</i></button>
                    </div>

                    </div><!--FIN DE DIV PREGUNTAS-->
                  </div><!--FIN DE TAB AUDITORIA-->



                </div>
              </div>

              
            </div>
        </div>
    </div>



                    
                  