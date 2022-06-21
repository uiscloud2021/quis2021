    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Integridad
            </h3>
            <div style="float:right">
                <button type="button" onclick="location.href='{{ route('denuncia.index') }}'" class="btn-warning" title="Regresar"><i class="fa fa-arrow-left"></i></button>
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Denuncia</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--DENUNCIA-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Respuesta inicial</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'denuncia_id']) !!}
                        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}
                        {!! Form::hidden('num_candidatos', $num_candidatos, ['class' => 'form-control', 'id'=>'num_candidatos']) !!}

                        {!! Form::label('no9', '9. Tipo de denunciante', ['class' => 'form-label']) !!}
                        {!! Form::select('no9', ['Identificable' => 'Identificable', 'Anónimo' => 'Anónimo'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    
                        @error('no9')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('no11', '11. Responsable de respuesta', ['class' => 'form-label']) !!}
                        {!! Form::text('no7', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no10', '10. Fecha de respuesta inicial', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no10', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>
                    </div>

                    </div>


                    <!--INDAGACION--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Indagación</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateIndagacion();">
                                <i class="fas fa-file"> Agregar indagación</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_indagacion" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha indagación</th>
                                <th scope="col">Responsable</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN INDAGACION-->


                    <!--CONLUSION--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Conclusión</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no42', '42. Transgresión hacia la empresa', ['class' => 'form-label']) !!}
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
                        {!! Form::label('no44', '44. Magnitud', ['class' => 'form-label']) !!}
                        {!! Form::select('no44', ['Leve' => 'Leve', 'Moderada' => 'Moderada'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no46', '46. Sanción', ['class' => 'form-label']) !!}
                        {!! Form::select('no46', ['Amonestación verbal' => 'Amonestación verbal', 'Amonestación escrita' => 'Amonestación escrita', 'Suspensión' => 'Suspensión', 'Recisión' => 'Recisión', 'Denuncia penal' => 'Denuncia penal'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no48', '48. Fecha de respuesta final', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no48', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no43', '43. Transgresión a la ley', ['class' => 'form-label']) !!}
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
                        {!! Form::label('no45', '45. Impacto real o potencial', ['class' => 'form-label']) !!}
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
                        {!! Form::label('no47', '47. Otras acciones', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no47', null, ['class' => 'form-control', 'placeholder' => 'Ingrese acciones']) !!}
                    </div>
                    </div>

                    </div><!--FIN CONCLUSION-->


                    <!--CALIDAD--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Calidad</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no49', '49. El tiempo entre Fecha de reporte y Fecha de Respuesta inicial es menor a 2 días', ['class' => 'form-label']) !!}
                        {!! Form::text('no49', null, ['class' => 'form-control', 'placeholder' => 'Ingrese respuesta', 'readonly' => 'readonly']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no50', '50. El tiempo entre Fecha de respuesta inicial y Fecha de Respuesta final es menor a 8 días', ['class' => 'form-label']) !!}
                        {!! Form::text('no50', null, ['class' => 'form-control', 'placeholder' => 'Ingrese respuesta', 'readonly' => 'readonly']) !!}
                    </div>
                    </div>

                    </div><!--FIN CALIDAD-->



                  </div>

                  
                </div>
              </div>

            </div>
        </div>
    </div>



                    
                  