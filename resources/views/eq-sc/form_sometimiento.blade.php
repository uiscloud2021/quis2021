    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Sometimiento
            </h3>
            <div style="float:right">
                <button type="button" onclick="location.href='{{ route('eq-sc.index') }}'" class="btn-warning" title="Regresar"><i class="fa fa-arrow-left"></i></button>
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Sometimiento</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--SOMETIMIENTO-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <!--APROBACION--> 
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Aprobación</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('sometimiento_id', null, ['class' => 'form-control', 'id'=>'sometimiento_id']) !!}
                        {!! Form::hidden('proyecto_id', $proyecto->id, ['class' => 'form-control', 'id'=>'proyecto_id']) !!}
                        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}

                        {!! Form::label('s1', '1. Fecha de aprobación por el patrocinador', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('s1', null, ['class' => 'form-control']) !!}
                        </div>

                        @error('s1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('s2', '2. Número de sitio', ['class' => 'form-label']) !!}
                        {!! Form::text('s2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número']) !!}
                    </div>
                    </div>

                    </div><!--FIN APROBACION-->


                    <!--EQUIPO--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Equipo</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateEquipoSom();">
                                <i class="fas fa-file"> Agregar miembro del equipo</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_equiposom" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Rol</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN EQUIPO-->


                    <!--SOM--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Sometimiento</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateSometimientoSom();">
                                <i class="fas fa-file"> Agregar sometimiento</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_sometimiento" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha en que se recibe protocolo</th>
                                <th scope="col">Fecha en que sometio al CE</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN SOM-->



                    <!--RESPUESTA--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Respuesta del CE</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateRespuestaSom();">
                                <i class="fas fa-file"> Agregar respuesta del CE</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_respuestasom" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de respuesta del CE</th>
                                <th scope="col">Respuesta del CE</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    
                    <div class="col-md-6"><br/>
                    <div class="form-group">
                        {!! Form::label('s25', '25. Fecha de autorización por el CEI', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('s25', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>

                    <div class="form-group">
                        {!! Form::label('s26', '26. Nombre del CEI', ['class' => 'form-label']) !!}
                        {!! Form::text('s26', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('s27', '27. Nombre del Presidente del CEI', ['class' => 'form-label']) !!}
                        {!! Form::text('s27', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>
                    </div>

                    <div class="col-md-6"><br/>
                    <div class="form-group">
                        {!! Form::label('s28', '28. Fecha de autorización por CI', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('s28', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('s29', '29. Nombre del CI', ['class' => 'form-label']) !!}
                        {!! Form::text('s29', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('s30', '30. Nombre del Presidente del CI', ['class' => 'form-label']) !!}
                        {!! Form::text('s30', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>
                    </div>

                    </div><!--FIN RESPUESTA-->



                    <!--DOSSIER--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Dossier regulatorio</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="divs31">
                        {!! Form::label('s31', '31. Respuesta positiva del CE', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s31', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s31', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs32">
                        {!! Form::label('s32', '32. FC CV Español de cada miembro del equipo, firmado', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s32', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s32', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs33">
                        {!! Form::label('s33', '33. FC CV Inglés de cada miembro del equipo, firmado ', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s33', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s33', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs34">
                        {!! Form::label('s34', '34. Página de firmas, Protocolo versión español, firmada por PI', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s34', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s34', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs35">
                        {!! Form::label('s35', '35. Página de firmas, Protocolo versión inglés, firmada por PI', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s35', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s35', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs36">
                        {!! Form::label('s36', '36. Página de firmas, Manual del investigador, firmada por el PI', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s36', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s36', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs37">
                        {!! Form::label('s37', '37. FC Compromisos, firmado por PI, SI y SC', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s37', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s37', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs38">
                        {!! Form::label('s38', '38. FC Responsabilidades, firmado por PI', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s38', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s38', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs39">
                        {!! Form::label('s39', '39. FC Autorización, firmado por Dirección General', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s39', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s39', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs40">
                        {!! Form::label('s40', '40. FC Instalaciones, firmado por Dirección General', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s40', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s40', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divs41">
                        {!! Form::label('s41', '41. FC Anticorrupción, firmado por Dirección General', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s41', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s41', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs42">
                        {!! Form::label('s42', '42. Copia de Licencia Sanitaria del Sitio Clínico', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s42', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s42', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs43">
                        {!! Form::label('s43', '43. Convenio para atención de urgencias', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s43', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s43', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs44">
                        {!! Form::label('s44', '44. Carta de descripción de instalaciones del lugar donde atenderán las urgencias', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s44', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s44', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs45">
                        {!! Form::label('s45', '45. Copia de Licencia Sanitaria del lugar donde atenderán las urgencias', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s45', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s45', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs46">
                        {!! Form::label('s46', '46. Copia del Registro del CE ante COFEPRIS', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s46', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s46', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs47">
                        {!! Form::label('s47', '47. Copia del Registro del CE ante CONBIOETICA', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s47', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s47', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs48">
                        {!! Form::label('s48', '48. Declaración del apego a GCP, firmada por Presidentes del CE', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s48', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s48', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divs49">
                        {!! Form::label('s49', '49. Lista de miembros del CE, firmada por Presidentes del CE', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('s49', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('s49', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div><!--FIN DOSSIER-->



                    <!--ENVIO--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Envío de dossier</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="divs50">
                        {!! Form::label('s50', '50. Fecha de envío de dossier regulatorio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('s50', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    </div>

                    </div><!--FIN ENVIO-->



                    <!--COFEPRIS--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Autorización COFEPRIS</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="divs51">
                        {!! Form::label('s51', '51. Fecha de aprobación COFEPRIS', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('s51', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    </div>

                    </div><!--FIN COFEPRIS-->



                    <!--CALIDAD--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Evaluación de la calidad</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="divs52">
                        {!! Form::label('s52', '52. Días hábiles entre Fecha en que se reciben el protocolo y documentos relacionados y Fecha en que se sometió al CE', ['class' => 'form-label']) !!}
                        {!! Form::text('s52', null, ['class' => 'form-control', 'placeholder' => 'Ingrese respuesta', 'readonly' => 'readonly']) !!}
                    </div>

                    <div class="form-group" id="divs53">
                        {!! Form::label('s53', '53. Se cumplió el objetivo de la calidad número 3, tiempo de sometimiento ≤ 3 días hábiles', ['class' => 'form-label']) !!}
                        {!! Form::text('s53', null, ['class' => 'form-control', 'placeholder' => 'Ingrese respuesta', 'readonly' => 'readonly']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divs54">
                        {!! Form::label('s54', '54. Días hábiles entre 22. Fecha de autorización por el CE y 42. Fecha de envío de dossier regulatorio', ['class' => 'form-label']) !!}
                        {!! Form::text('s54', null, ['class' => 'form-control', 'placeholder' => 'Ingrese respuesta', 'readonly' => 'readonly']) !!}
                    </div>

                    <div class="form-group" id="divs55">
                        {!! Form::label('s55', '55. Se cumplió el objetivo de la calidad número 4, tiempo para integrar dossier ≤ 7 días hábiles', ['class' => 'form-label']) !!}
                        {!! Form::text('s55', null, ['class' => 'form-control', 'placeholder' => 'Ingrese respuesta', 'readonly' => 'readonly']) !!}
                    </div>
                    </div>

                    </div><!--FIN CALIDAD-->

                  </div><!--FIN DE TAB SOMETIMIENTO-->


                </div>
              </div>

            </div>
        </div>
    </div>



                    
                  