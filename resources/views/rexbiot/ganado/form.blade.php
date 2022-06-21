    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Ganado
            </h3>
            <div style="float:right">
                <button type="button" onclick="location.href='{{ route('ganado.index') }}'" class="btn-warning" title="Regresar"><i class="fa fa-arrow-left"></i></button>
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Identificación</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="list_vacunas();" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="false"><i class="far fa-edit"></i> Medicinas y vacunas</a>
                            </li>
                            <li class="nav-item" id="li_manejo1" style="display:none">
                                <a class="nav-link" onclick="list_manejo1();" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" role="tab" aria-controls="vert-tabs-3" aria-selected="false"><i class="far fa-edit"></i> Manejos</a>
                            </li>
                            <li class="nav-item" id="li_manejo2" style="display:none">
                                <a class="nav-link" onclick="list_manejo2();" id="vert-tabs-4-tab" data-toggle="pill" href="#vert-tabs-4" role="tab" aria-controls="vert-tabs-4" aria-selected="false"><i class="far fa-edit"></i> Manejos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-5-tab" data-toggle="pill" href="#vert-tabs-5" role="tab" aria-controls="vert-tabs-5" aria-selected="false"><i class="far fa-edit"></i> Bajas</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--IDENTIFICACION-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'ganado_id']) !!}
                        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}

                        {!! Form::label('no1', '1. Número consecutivo', ['class' => 'form-label']) !!}
                        {!! Form::hidden('fecha_actual', date("Y-m-d"), ['id' => 'fecha_actual', 'readonly']) !!}
                        <?php
                        if(isset($num)){
                        ?>
                        {!! Form::text('no1', $num, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'readonly']) !!}
                        <?php
                        }else{
                        ?>
                        {!! Form::text('no1', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'readonly']) !!}
                        <?php
                        }
                        ?>
                    </div>

                    <div class="form-group" id="div3" style="display:none">
                        {!! Form::label('no3', '3. Arete SINIGA', ['class' => 'form-label']) !!}
                        {!! Form::text('no3', null, ['class' => 'form-control', 'placeholder' => 'Ingrese arete']) !!}
                    </div>

                    <div class="form-group" id="div5" style="display:none">
                        {!! Form::label('no5', '5. Fecha de nacimiento', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no5', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>

                    <div class="form-group" id="div7">
                        {!! Form::label('no7', '7. Raza', ['class' => 'form-label']) !!}
                        {!! Form::select('no7', ['Angus' => 'Angus', 'Angus de registro' => 'Angus de registro', 'Brangus' => 'Brangus', 'Herford' => 'Herford', 'Braford' => 'Braford', 'Cruza' => 'Cruza', 'Charolais' => 'Charolais', 'BlackBaldy' => 'BlackBaldy'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group" id="div9">
                        {!! Form::label('no9', '9. Fierro 1', ['class' => 'form-label']) !!}
                        {!! Form::text('no9', null, ['class' => 'form-control', 'placeholder' => 'Ingrese fierro']) !!}
                    </div>

                    <div class="form-group" id="div11">
                        {!! Form::label('no11', '11. Fierro 3', ['class' => 'form-label']) !!}
                        {!! Form::text('no11', null, ['class' => 'form-control', 'placeholder' => 'Ingrese fierro']) !!}
                    </div>

                    <div class="form-group" id="div13">
                        {!! Form::label('no13', '13. Nacido REXBIOT', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no13', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no13', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div15" style="display:none">
                        {!! Form::label('no15', '15. Peso al nacer', ['class' => 'form-label']) !!}
                        {!! Form::number('no15', null, ['class' => 'form-control', 'placeholder' => 'Ingrese peso', 'step' => '0.01']) !!}
                    </div>

                    <div class="form-group" id="div17" style="display:none">
                        {!! Form::label('no17', '17. Se hizo prueba de paternidad', ['class' => 'form-label']) !!}
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

                    <div class="form-group" id="div19" style="display:none">
                        {!! Form::label('no19', '19. Fecha de desahije', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no19', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>

                    <div class="form-group" id="div21" style="display:none">
                        {!! Form::label('no21', '21. Edad al desahije', ['class' => 'form-label']) !!}
                        {!! Form::number('no21', null, ['class' => 'form-control', 'placeholder' => 'Ingrese edad', 'onmouseup' => 'EdadDesahije()']) !!}
                    </div>

                    <div class="form-group" id="div23" style="display:none">
                        {!! Form::label('no23', '23. Tiempo en el hato ', ['class' => 'form-label']) !!}
                        {!! Form::text('no23', null, ['class' => 'form-control', 'placeholder' => 'Ingrese tiempo', 'onmouseup' => 'TiempoHato()']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="div2">
                        {!! Form::label('no2', '2. Especie', ['class' => 'form-label']) !!}
                        {!! Form::select('no2', ['Bovino' => 'Bovino', 'Equino' => 'Equino'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'onchange' => 'Especie(this.value)']) !!}
                        
                        @error('no2')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group" id="div4" style="display:none">
                        {!! Form::label('no4', '4. Arete RExBiot', ['class' => 'form-label']) !!}
                        {!! Form::text('no4', null, ['class' => 'form-control', 'placeholder' => 'Ingrese arete']) !!}
                    </div>

                    <div class="form-group" id="div6">
                        {!! Form::label('no6', '6. Color', ['class' => 'form-label']) !!}
                        {!! Form::select('no6', ['Negro' => 'Negro', 'Negro cara blanca' => 'Negro cara blanca', 'Colorado' => 'Colorado', 'Blanco' => 'Blanco', 'Gateado' => 'Gateado', 'Hosco' => 'Hosco', 'Barroso' => 'Barroso', 'Amarillo' => 'Amarillo', 'Manchado' => 'Manchado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group" id="div8">
                        {!! Form::label('no8', '8. Sexo', ['class' => 'form-label']) !!}
                        {!! Form::select('no8', ['Macho' => 'Macho', 'Hembra' => 'Hembra'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group" id="div10">
                        {!! Form::label('no10', '10. Fierro 2', ['class' => 'form-label']) !!}
                        {!! Form::text('no10', null, ['class' => 'form-control', 'placeholder' => 'Ingrese fierro']) !!}
                    </div>

                    <div class="form-group" id="div12">
                        {!! Form::label('no12', '12. Fierro 4', ['class' => 'form-label']) !!}
                        {!! Form::text('no12', null, ['class' => 'form-control', 'placeholder' => 'Ingrese fierro']) !!}
                    </div>

                    <div class="form-group" id="div14" style="display:none">
                        {!! Form::label('no14', '14. Arete SINIGA de la madre', ['class' => 'form-label']) !!}
                        {!! Form::text('no14', null, ['class' => 'form-control', 'placeholder' => 'Ingrese arete']) !!}
                    </div>

                    <div class="form-group" id="div16" style="display:none">
                        {!! Form::label('no16', '16. Calidad de producto', ['class' => 'form-label']) !!}
                        {!! Form::select('no16', ['Óptimo' => 'Óptimo', 'Sub-óptimo' => 'Sub-óptimo'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group" id="div18" style="display:none">
                        {!! Form::label('no18', '18. Arete del padre', ['class' => 'form-label']) !!}
                        {!! Form::text('no18', null, ['class' => 'form-control', 'placeholder' => 'Ingrese arete']) !!}
                    </div>

                    <div class="form-group" id="div20" style="display:none">
                        {!! Form::label('no20', '20. Peso al desahije', ['class' => 'form-label']) !!}
                        {!! Form::number('no20', null, ['class' => 'form-control', 'placeholder' => 'Ingrese peso', 'step' => '0.01']) !!}
                    </div>

                    <div class="form-group" id="div22" style="display:none">
                        {!! Form::label('no22', '22. Fecha de compra', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no22', null, ['class' => 'form-control', 'onchange' => 'TiempoHato()']) !!}
                        </div> 
                    </div>
                    </div>

                    </div>
                  </div>



                  <!--VACUNAS-->
                  <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateVacuna();">
                                <i class="fas fa-file"> Agregar medicina o vacuna</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_vacunas" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>


                  <!--MANEJO 1-->
                  <div class="tab-pane fade" id="vert-tabs-3" role="tabpanel" aria-labelledby="vert-tabs-3-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateManejo1();">
                                <i class="fas fa-file"> Agregar manejo</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_manejo1" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de manejo</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Peso</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>


                  <!--MANEJO 2-->
                  <div class="tab-pane fade" id="vert-tabs-4" role="tabpanel" aria-labelledby="vert-tabs-4-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateManejo2();">
                                <i class="fas fa-file"> Agregar manejo</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_manejo2" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Incidentes</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>


                  <!--BAJAS-->
                  <div class="tab-pane fade" id="vert-tabs-5" role="tabpanel" aria-labelledby="vert-tabs-5-tab">

                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group" id="div48">
                        {!! Form::label('no48', '48. Fecha de baja del hato', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no48', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>

                    <div class="form-group" id="div50">
                        {!! Form::label('no50', '50. Causa de baja del hato', ['class' => 'form-label']) !!}
                        {!! Form::select('no50', ['Venta' => 'Venta', 'Pérdida' => 'Pérdida', 'Muerte' => 'Muerte'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'onchange' => 'Baja(this.value)']) !!}
                    </div>

                    <div class="form-group" id="div52" style="display:none">
                        {!! Form::label('no52', '52. Precio de venta', ['class' => 'form-label']) !!}
                        {!! Form::number('no52', null, ['class' => 'form-control', 'placeholder' => 'Ingrese precio', 'step' => '0.01']) !!}
                    </div>

                    <div class="form-group" id="div53" style="display:none">
                        {!! Form::label('no53', '53. Peso al vender', ['class' => 'form-label']) !!}
                        {!! Form::number('no53', null, ['class' => 'form-control', 'placeholder' => 'Ingrese peso', 'step' => '0.01']) !!}
                    </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group" id="div49">
                        {!! Form::label('no49', '49. Edad a la baja', ['class' => 'form-label']) !!}
                        {!! Form::number('no49', null, ['class' => 'form-control', 'placeholder' => 'Ingrese edad', 'onmouseup' => 'EdadBaja()']) !!}
                    </div>

                    <div class="form-group" id="div51" style="display:none">
                        {!! Form::label('no51', '51. Causa de la pérdida', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no51', null, ['class' => 'form-control', 'placeholder' => 'Ingrese causa']) !!}
                    </div>
                    </div>

                    </div>
                  </div>

                  
                </div>
              </div>

            </div>
        </div>
    </div>



                    
                  