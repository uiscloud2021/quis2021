    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Contratación
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
                                <a class="nav-link active" onclick="list_contratos();" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Contratos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="false"><i class="far fa-edit"></i> Registros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" role="tab" aria-controls="vert-tabs-3" aria-selected="false"><i class="far fa-edit"></i> Presentación</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-4-tab" data-toggle="pill" href="#vert-tabs-4" role="tab" aria-controls="vert-tabs-4" aria-selected="false"><i class="far fa-edit"></i> Inducción</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--CONTRATOS-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                    {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'contratacion_id']) !!}
                    {!! Form::hidden('candidato_id', $candidato->id, ['class' => 'form-control', 'id'=>'candidato_id']) !!}
                    {!! Form::hidden('empresa_id', $globalempresa_id, ['class' => 'form-control', 'id'=>'empresa_id']) !!}
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateContrato();">
                                <i class="fas fa-file"> Agregar contrato</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_contrato" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de firma</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Debe firmar nuevo contrato</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>


                  <!--REGISTROS-->
                  <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">

                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no5', '5. Fecha de alta al IMSS', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no5', null, ['class' => 'form-control']) !!}
                        </div>
                        
                        @error('no5')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no6', '6. Fecha de alta al INFONAVIT', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no6', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>
                    </div>

                    </div>
                  </div>

                  <!--PRESENTACION-->
                  <div class="tab-pane fade" id="vert-tabs-3" role="tabpanel" aria-labelledby="vert-tabs-3-tab">
                    
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group" id="div7">
                        {!! Form::label('no7', '7. La persona recibió acceso al Reglamento interior de trabajo ', ['class' => 'form-label']) !!}
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

                    <div class="form-group" id="div9">
                        {!! Form::label('no9', '9. La persona recibió acceso a la Política de Integridad', ['class' => 'form-label']) !!}
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

                    <div class="form-group" id="div11">
                        {!! Form::label('no11', '11. La persona contratada firmó Pago bancario empleados', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no11', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no11', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div13">
                        {!! Form::label('no13', '13. La persona contratada firmó carta de No conflicto', ['class' => 'form-label']) !!}
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

                    <div class="form-group" id="div15">
                        {!! Form::label('no15', '15. La persona contratada firmó el Acuerdo de confidencialidad', ['class' => 'form-label']) !!}
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

                    <div class="form-group" id="div17">
                        {!! Form::label('no17', '17. Archivó todos los documentos firmados en el expediente de la persona', ['class' => 'form-label']) !!}
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
                    <div class="form-group" id="div8">
                        {!! Form::label('no8', '8. La persona recibió acceso al Manual de Etiqueta', ['class' => 'form-label']) !!}
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

                    <div class="form-group" id="div10">
                        {!! Form::label('no10', '10. La persona recibió acceso a los Derechos de los sujetos', ['class' => 'form-label']) !!}
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

                    <div class="form-group" id="div12">
                        {!! Form::label('no12', '12. La persona contratada firmó Pago bancario becarios', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no12', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no12', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div14">
                        {!! Form::label('no14', '14. La persona firmó el Apego a documentos', ['class' => 'form-label']) !!}
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

                    <div class="form-group" id="div16">
                        {!! Form::label('no16', '16. La persona firmó Imagen y datos', ['class' => 'form-label']) !!}
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

                    </div>
                  </div>





                  <!--INDUCCIÓN-->
                  <div class="tab-pane fade" id="vert-tabs-4" role="tabpanel" aria-labelledby="vert-tabs-4-tab">
                    
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group" id="div18">
                        {!! Form::label('no18', '18. Entregó uniformes', ['class' => 'form-label']) !!}
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

                    <div class="form-group" id="div20">
                        {!! Form::label('no20', '20. Entregó equipo de cómputo', ['class' => 'form-label']) !!}
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

                    <div class="form-group" id="div22">
                        {!! Form::label('no22', '22. Entregó tarjetas', ['class' => 'form-label']) !!}
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
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="div19">
                        {!! Form::label('no19', '19. Entregó accesos electrónicos', ['class' => 'form-label']) !!}
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

                    <div class="form-group" id="div21">
                        {!! Form::label('no21', '21. Entregó gafette', ['class' => 'form-label']) !!}
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

                    </div>
                  </div>

                  
                </div>
              </div>

            </div>
        </div>
    </div>



                    
                  