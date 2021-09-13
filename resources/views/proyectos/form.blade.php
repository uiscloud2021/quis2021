    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Proyectos
            </h3>
          </div>
          <div class="card-body">
            <h6>Menú de preguntas</h6>
            <div class="row">
              <div class="col-5 col-sm-3 border">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="vert-tabs-0-tab" data-toggle="pill" href="#vert-tabs-0" role="tab" aria-controls="vert-tabs-0" aria-selected="true">Resumen</a>
                  <a class="nav-link" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false">Áreas</a>
                  <a class="nav-link" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="false">Identificación del proyecto</a>
                  <a class="nav-link" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" role="tab" aria-controls="vert-tabs-3" aria-selected="false">Investigador Principal</a>
                </div>
              </div>
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="vert-tabs-0" role="tabpanel" aria-labelledby="vert-tabs-0-tab">
                     Resumen de Proyectos
                  </div>

                  <!--AREAS-->
                  <div class="tab-pane fade" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    
                    <div class="form-group">
                        {!! Form::label('no1', '1. Dirección', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no1', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no1', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                
                    <div class="form-group">
                        {!! Form::label('no2', '2. Subdirección', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no2', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no2', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
            
                    <div class="form-group">
                        {!! Form::label('no3', '3. Administración', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no3', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no3', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div4" style="display:none">
                        {!! Form::label('no4', '4. Finanzas', ['class' => 'form-label']) !!}
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

                    <div class="form-group" id="div5" style="display:none">
                        {!! Form::label('no5', '5. Recursos humanos', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no5', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no5', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div6" style="display:none">
                        {!! Form::label('no6', '6. Sistemas', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no6', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no6', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div7" style="display:none">
                        {!! Form::label('no7', '7. Calidad', ['class' => 'form-label']) !!}
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

                    <div class="form-group" id="div8" style="display:none">
                        {!! Form::label('no8', '8. Regulatorio', ['class' => 'form-label']) !!}
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
                        {!! Form::label('no9', '9. Comité de Ética', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no9', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no9', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div10" style="display:none">
                        {!! Form::label('no10', '10. Nombre de Comité de Ética en Investigación', ['class' => 'form-label']) !!}
                        {!! Form::text('no10', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group" id="div11" style="display:none">
                        {!! Form::label('no11', '11. Nombre del presidente de Comité de Ética en Investigación', ['class' => 'form-label']) !!}
                        {!! Form::text('no11', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group" id="div12" style="display:none">
                        {!! Form::label('no12', '12. Nombre de Comité de Investigación', ['class' => 'form-label']) !!}
                        {!! Form::text('no12', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group" id="div13" style="display:none">
                        {!! Form::label('no13', '13. Nombre del presidente de Comité de Investigación', ['class' => 'form-label']) !!}
                        {!! Form::text('no13', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no14', '14. Sitio Clínico', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no14', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no14', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no15', '15. Unidad Clínica', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no15', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no15', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no16', '16. Innovación y Desarrollo', ['class' => 'form-label']) !!}
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

                    <div class="form-group" id="div17" style="display:none">
                        {!! Form::label('no17', '17. Capacitación', ['class' => 'form-label']) !!}
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

                    <div class="form-group" id="div18" style="display:none">
                        {!! Form::label('no18', '18. Consultoría', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no18', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no18', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div19" style="display:none">
                        {!! Form::label('no19', '19. Diseño', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no19', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no19', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div20" style="display:none">
                        {!! Form::label('no20', '20. Desarrollo', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no20', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no20', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div21" style="display:none">
                        {!! Form::label('no21', '21. Incubación', ['class' => 'form-label']) !!}
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
                  
                  </div>

                  <!--IDENTIFICACION-->
                  <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">

                    <div class="form-group">
                        {!! Form::label('no22', '22. Código UIS', ['class' => 'form-label']) !!}
                        {!! Form::text('no22', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}

                        @error('no22')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('no23', '23. Título', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no23', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no24', '24. Código', ['class' => 'form-label']) !!}
                        {!! Form::text('no24', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}

                        @error('no24')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('no25', '25. Acrónimo 1', ['class' => 'form-label']) !!}
                        {!! Form::text('no25', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no26', '26. Acrónimo 2', ['class' => 'form-label']) !!}
                        {!! Form::text('no26', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no27', '27. Acrónimo 3', ['class' => 'form-label']) !!}
                        {!! Form::text('no27', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no28', '28. Patología', ['class' => 'form-label']) !!}
                        {!! Form::text('no28', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no29', '29. Patrocinador', ['class' => 'form-label']) !!}
                        {!! Form::text('no29', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no30', '30. Fecha de inicio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no30', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>

                    <div class="form-group">
                        {!! Form::label('no31', '31. Estado', ['class' => 'form-label']) !!}
                        {!! Form::select('no31', ['Activo' => 'Activo', 'Suspendido' => 'Suspendido', 'Revisión por Comité de Ética' => 'Revisión por Comité de Ética'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no32', '32. Fecha de fin', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no32', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>

                  </div>

                  <!--INVESTIGADOR PRINCIPAL-->
                  <div class="tab-pane fade" id="vert-tabs-3" role="tabpanel" aria-labelledby="vert-tabs-3-tab">
                    {!! Form::hidden('empresa_id', $globalempresa_id, ['class' => 'form-control']) !!}
                    <div class="form-group">
                        {!! Form::label('inv', 'Investigador Principal', ['class' => 'form-label']) !!}
                        {!! Form::select('inv', $investigadores, null, ['class' => 'form-control', 'id' =>'inv_id', 'onchange' => 'Investigador(this.value);', 'placeholder' => 'Nuevo...']) !!}
                    </div>
        
                    <div id="datos_investigador" >
                    <div class="form-group">
                        {!! Form::label('investigador', '33. Nombre completo del Investigador Principal', ['class' => 'form-label']) !!}
                        {!! Form::text('investigador', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' =>'investigador']) !!}
                        
                        @error('investigador')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('apellido', '34. Primer apellido del Investigador Principal', ['class' => 'form-label']) !!}
                        {!! Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido', 'id' =>'apellido']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('titulo', '35. Título abreviado del Investigador principal', ['class' => 'form-label']) !!}
                        {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese título', 'id' =>'titulo']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('cedula', '36. Cédula profesional', ['class' => 'form-label']) !!}
                        {!! Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cédula', 'id' =>'cedula']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('verifico_cedula', '37. Se verificó la cédula profesional', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('verifico_cedula', 'Si', null, ['class' => 'mr-1', 'id' =>'verifico_cedulasi']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('verifico_cedula', 'No', null, ['class' => 'mr-1', 'id' =>'verifico_cedulano']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('fecha_verificacion', '38. Fecha de verificación de cédula profesional', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fecha_verificacion', null, ['class' => 'form-control', 'id' =>'fecha_verificacion']) !!}
                        </div> 
                    </div>

                    <div class="form-group">
                        {!! Form::label('electronico', '39. Archivó evidencia electrónica como Verificación cédula PI fecha', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('electronico', 'Si', null, ['class' => 'mr-1', 'id' =>'electronicosi']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('electronico', 'No', null, ['class' => 'mr-1', 'id' =>'electronicono']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('telefono', '40. Teléfono de emergencias', ['class' => 'form-label']) !!}
                        {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'id' =>'telefono']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('verifico_telefono', '41. Se verificó teléfono de emergencias', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('verifico_telefono', 'Si', null, ['class' => 'mr-1', 'id' =>'verifico_telefonosi']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('verifico_telefono', 'No', null, ['class' => 'mr-1', 'id' =>'verifico_telefonono']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('fecha_telefono', '42. Fecha de verificación de teléfono de emergencias', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fecha_telefono', null, ['class' => 'form-control', 'id' =>'fecha_telefono']) !!}
                        </div> 
                    </div>

                    <div class="form-group">
                        {!! Form::label('resultado', '43. Resultado de la verificación', ['class' => 'form-label']) !!}
                        {!! Form::text('resultado', null, ['class' => 'form-control', 'placeholder' => 'Ingrese resultado', 'id' =>'resultado']) !!}
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

                    
                  