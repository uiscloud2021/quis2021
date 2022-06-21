    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Reunión
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
                                <a class="nav-link active" id="vert-tabs-1re-tab" data-toggle="pill" href="#vert-tabs-1re" role="tab" aria-controls="vert-tabs-1re" aria-selected="false"><i class="far fa-edit"></i> Reunión</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--REUNION-->
                  <div class="tab-pane fade show active" id="vert-tabs-1re" role="tabpanel" aria-labelledby="vert-tabs-1re-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>

                    <div class="table-responsive" id="tabla_reunion">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateReunion();">
                                <i class="fas fa-file"> Agregar reunión</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_reunion" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de la reunión</th>
                                <th scope="col">Dictamen</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    <div id="preguntas_reunion" style="display:none">
                    <!--RE--> 
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Reunión</h5><br/>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('reunion_id', null, ['class' => 'form-control', 'id'=>'reunion_id']) !!}
                        {!! Form::hidden('proyecto_id', $proyecto->id, ['class' => 'form-control', 'id'=>'proyecto_id']) !!}
                        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}
                        {!! Form::hidden('num_miembros', $num_miembros, ['class' => 'form-control', 'id'=>'num_miembros']) !!}

                        {!! Form::label('r1', '1. Fecha de la reunión', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('r1', null, ['class' => 'form-control', 'id' => 'r1']) !!}
                        </div>
                    
                        @error('r1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('r2', 'Miembros que asistieron a reunión', ['class' => 'form-label']) !!}
                        {!! Form::hidden('r2', null, ['class' => 'form-control', 'id' => 'r2']) !!}
                        {!! Form::hidden('r3', null, ['class' => 'form-control', 'id' => 'r3']) !!}
                        {!! Form::hidden('r4', null, ['class' => 'form-control', 'id' => 'r4']) !!}
                        {!! Form::hidden('r5', null, ['class' => 'form-control', 'id' => 'r5']) !!}
                        {!! Form::hidden('r6', null, ['class' => 'form-control', 'id' => 'r6']) !!}
                        <table class="table table-striped" style="width:100%;">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Relación con estudio</th>
                                <th scope="col">Carta no voto</th>
                                <th scope="col">Opinión</th>
                                <th scope="col">Voto</th>
                            </tr>
                            @foreach ($miembros as $miembro)
                                <tr>
                                    <td><input type="checkbox" name="miembrosre[]" id="miemre{{$miembro->integracion_id}}" value="{{$miembro->integracion_id}}"></input></td>
                                    <td>{{$miembro->i1}}</td>
                                    <td><label>
                                        {!! Form::radio('relacionre'.$miembro->integracion_id, 'Si', null, ['class' => 'mr-1', 'id' => 'relacionre'.$miembro->integracion_id.'_si']) !!}
                                        Si
                                        </label><br/>
                                        <label>
                                        {!! Form::radio('relacionre'.$miembro->integracion_id, 'No', null, ['class' => 'mr-1', 'id' => 'relacionre'.$miembro->integracion_id.'_no']) !!}
                                        No
                                        </label>
                                    </td>
                                    <td><label>
                                        {!! Form::radio('nore'.$miembro->integracion_id, 'Si', null, ['class' => 'mr-1', 'id' => 'nore'.$miembro->integracion_id.'_si']) !!}
                                        Si
                                        </label><br/>
                                        <label>
                                        {!! Form::radio('nore'.$miembro->integracion_id, 'No', null, ['class' => 'mr-1', 'id' => 'nore'.$miembro->integracion_id.'_no']) !!}
                                        No
                                        </label>
                                    </td>
                                    <td>{!! Form::textarea('opinionre'.$miembro->integracion_id, null, ['class' => 'form-control', 'placeholder' => 'Ingrese Opinión', 'id' => 'opinionre'.$miembro->integracion_id]) !!}</td>
                                    <td>{!! Form::select('votre'.$miembro->integracion_id, ['Aprobado' => 'Aprobado', 'No aprobado' => 'No aprobado', 'Pendiente' => 'Pendiente'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'votre'.$miembro->integracion_id]) !!}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    </div>

                    </div><!--FIN RE-->


                    <!--QUORUM--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Quorum</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="divr7">
                        {!! Form::label('r7', '7. Se reúnen al menos 5 miembros con formación y género diverso', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('r7', 'Si', null, ['class' => 'mr-1', 'id' => 'r7_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('r7', 'No', null, ['class' => 'mr-1', 'id' => 'r7_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divr8">
                        {!! Form::label('r8', '8. Al menos 1 no científico', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('r8', 'Si', null, ['class' => 'mr-1', 'id' => 'r8_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('r8', 'No', null, ['class' => 'mr-1', 'id' => 'r8_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divr9">
                        {!! Form::label('r9', '9. Al menos 1 no afiliado a UIS', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('r9', 'Si', null, ['class' => 'mr-1', 'id' => 'r9_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('r9', 'No', null, ['class' => 'mr-1', 'id' => 'r9_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divr10">
                        {!! Form::label('r10', '10. Se cumple el quorum legal', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('r10', 'Si', null, ['class' => 'mr-1', 'id' => 'r10_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('r10', 'No', null, ['class' => 'mr-1', 'id' => 'r10_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div><!--FIN QUORUM-->


                    <!--ACTA--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Acta</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="divr11">
                        {!! Form::label('r11', '11. Documentó el acta', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('r11', 'Si', null, ['class' => 'mr-1', 'id' => 'r11_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('r11', 'No', null, ['class' => 'mr-1', 'id' => 'r11_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divr12">
                        {!! Form::label('r12', '12. Recabó y destruyó los documentos o materiales relacionados a los protocolos y entregados a los miembros', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('r12', 'Si', null, ['class' => 'mr-1', 'id' => 'r12_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('r12', 'No', null, ['class' => 'mr-1', 'id' => 'r12_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divr13">
                        {!! Form::label('r13', '13. Emitió respuesta y selló los documentos correspondientes', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('r13', 'Si', null, ['class' => 'mr-1', 'id' => 'r13_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('r13', 'No', null, ['class' => 'mr-1', 'id' => 'r13_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div><!--FIN ACTA-->



                    <!--DICTAMEN--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Dictamen</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="divr14">
                        {!! Form::label('r14', '14. Dictamen', ['class' => 'form-label']) !!}
                        {!! Form::select('r14', ['Aprobado' => 'Aprobado', 'Pendiente de aprobación' => 'Pendiente de aprobación', 'No aprobado' => 'No aprobado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'r14']) !!}
                    </div>

                    <div class="form-group" id="divr15">
                        {!! Form::label('r15', '15. Fecha en que se emite No aprobado CE', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('r15', null, ['class' => 'form-control', 'id' => 'r15']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="divr16">
                        {!! Form::label('r16', '16. Fecha en que se emite Pendiente de aprobación', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('r16', null, ['class' => 'form-control', 'id' => 'r16']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="divr17">
                        {!! Form::label('r17', '17. Modificaciones requeridas', ['class' => 'form-label']) !!}
                        {!! Form::textarea('r17', null, ['class' => 'form-control', 'placeholder' => 'Ingrese modificaciones', 'id' => 'r17']) !!}
                    </div>

                    <div class="form-group" id="divr18">
                        {!! Form::label('r18', '18. Fecha en que se emite Aprobación inicial', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('r18', null, ['class' => 'form-control', 'id' => 'r18']) !!}
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divr19">
                        {!! Form::label('r19', '19. Fecha en que se emite Adherencia GCP-ICH', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('r19', null, ['class' => 'form-control', 'id' => 'r19']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="divr20">
                        {!! Form::label('r20', '20. Fecha en que se emite Lista de miembros', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('r20', null, ['class' => 'form-control', 'id' => 'r20']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="divr21">
                        {!! Form::label('r21', '21. Fecha en que se emite el Confidencialidad y No conflicto', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('r21', null, ['class' => 'form-control', 'id' => 'r21']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="divr22">
                        {!! Form::label('r22', '22. Fecha en que se emite el Instructivo investigador principal', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('r22', null, ['class' => 'form-control', 'id' => 'r22']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="divr23">
                        {!! Form::label('r23', '23. Fecha en que se emite Información sobre auditorías', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('r23', null, ['class' => 'form-control', 'id' => 'r23']) !!}
                        </div>
                    </div>
                    </div>

                    </div><!--FIN DICTAMEN-->

                    <br/>
                    <div align="right">
                        <button type="button" onclick="RegresarReunion();" class="btn btn-warning"><i class="fa rotate-left"> Mostrar tabla</i></button>
                        <button type="button" onclick="GuardarReunion();" class="btn btn-primary"><i class="fas fa-save"> Guardar reunión</i></button>
                    </div>

                    </div><!--FIN DE DIV PREGUNTAS-->
                  </div><!--FIN DE TAB REUNION-->



                </div>
              </div>

              
            </div>
        </div>
    </div>



                    
                  