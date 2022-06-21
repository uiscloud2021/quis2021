    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Contrato
            </h3>
            <div style="float:right">
                <button type="button" onclick="location.href='{{ route('contrato.index') }}'" class="btn-warning" title="Regresar"><i class="fa fa-arrow-left"></i></button>
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Revisión</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="false"><i class="far fa-edit"></i> Cédula de pagos por visita</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" role="tab" aria-controls="vert-tabs-3" aria-selected="false"><i class="far fa-edit"></i> Cláusulas relevantes</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--REVISION-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group" id="div1">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'contrato_id']) !!}
                        {!! Form::hidden('proyecto_id', $proyecto->id, ['class' => 'form-control', 'id'=>'proyecto_id']) !!}
                        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}

                        {!! Form::label('no1', '1. Verificó los precios', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no1', 'Si', null, ['class' => 'mr-1', 'id' => 'no1_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no1', 'No', null, ['class' => 'mr-1', 'id' => 'no1_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
            
                    <div class="form-group" id="div3">
                        {!! Form::label('no3', '3. Nombre del patrocinador correcto', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no3', 'Si', null, ['class' => 'mr-1', 'id' => 'no3_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no3', 'No', null, ['class' => 'mr-1', 'id' => 'no3_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('no5', '5. La razón social, dirección y RFC de UIS son correctos:
                            Unidad de Investigación en Salud de Chihuahua, SC
                            Trasviña y Retes 1317
                            Colonia San Felipe
                            Chihuahua, Chih.
                            31203, México
                            Teléfono 52 614 437 2837
                            Fax 52 614 415 7287
                            UIS-050405-HB9', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no5', 'Si', null, ['class' => 'mr-1', 'id' => 'no5_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no5', 'No', null, ['class' => 'mr-1', 'id' => 'no5_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div7">
                        {!! Form::label('no7', '7. El nombre y datos generales del investigador principal (cuando estén incluidos) son correctos:
                            Nombre completo
                            Trasviña y Retes 1317
                            Colonia San Felipe
                            Chihuahua, Chih.
                            31203, México', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no7', 'Si', null, ['class' => 'mr-1', 'id' => 'no7_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no7', 'No', null, ['class' => 'mr-1', 'id' => 'no7_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div9">
                        {!! Form::label('no9', '9. Incluye seguro para los sujetos del estudio', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no9', 'Si', null, ['class' => 'mr-1', 'id' => 'no9_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no9', 'No', null, ['class' => 'mr-1', 'id' => 'no9_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div11">
                        {!! Form::label('no11', '11. En estudios de alta especialidad, incluye un pago de inicio del estudio', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no11', 'Si', null, ['class' => 'mr-1', 'id' => 'no11_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no11', 'No', null, ['class' => 'mr-1', 'id' => 'no11_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div13">
                        {!! Form::label('no13', '13. Considera el pago al CE, con costos sobre tabulador, en forma independiente', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no13', 'Si', null, ['class' => 'mr-1', 'id' => 'no13_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no13', 'No', null, ['class' => 'mr-1', 'id' => 'no13_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div15">
                        {!! Form::label('no15', '15. Establece que a cualquier importe se agregará el IVA', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no15', 'Si', null, ['class' => 'mr-1', 'id' => 'no15_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no15', 'No', null, ['class' => 'mr-1', 'id' => 'no15_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div17">
                        {!! Form::label('no17', '17. Cuando existe, la retención para el final del estudio es igual o menor al 10%', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no17', 'Si', null, ['class' => 'mr-1', 'id' => 'no17_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no17', 'No', null, ['class' => 'mr-1', 'id' => 'no17_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div19">
                        {!! Form::label('no19', '19. Se verificaron los nombres de ante-firmas de representante legal, investigador y patrocinador', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no19', 'Si', null, ['class' => 'mr-1', 'id' => 'no19_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no19', 'No', null, ['class' => 'mr-1', 'id' => 'no19_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="div2">
                        {!! Form::label('no2', '2. Nombre y código del estudio correctos', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no2', 'Si', null, ['class' => 'mr-1', 'id' => 'no2_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no2', 'No', null, ['class' => 'mr-1', 'id' => 'no2_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('no4', '4. El contrato se celebra entre UIS y el patrocinador o CRO responsable del desarrollo del estudio', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no4', 'Si', null, ['class' => 'mr-1', 'id' => 'no4_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no4', 'No', null, ['class' => 'mr-1', 'id' => 'no4_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div6">
                        {!! Form::label('no6', '6. El nombre y datos generales del representante legal de UIS son correctos:
                            Dra. María de la Merced Velázquez Quintana
                            Trasviña y Retes 1317
                            Colonia San Felipe
                            Chihuahua, Chih.
                            31203, México
                            Teléfono 52 614 437 2837
                            Fax 52 614 415 7287', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no6', 'Si', null, ['class' => 'mr-1', 'id' => 'no6_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no6', 'No', null, ['class' => 'mr-1', 'id' => 'no6_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div8">
                        {!! Form::label('no8', '8. Se considera la obligación de adquirir una fianza o póliza de seguro especial por parte de UIS o el investigador. Ojo, solamente es aceptable un seguro de ejercicio profesional', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no8', 'Si', null, ['class' => 'mr-1', 'id' => 'no8_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no8', 'No', null, ['class' => 'mr-1', 'id' => 'no8_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div10">
                        {!! Form::label('no10', '10. Cuando se requiere, incluye apoyos adicionales para compra de equipo y las condiciones para facturarlos o solicitar el reembolso', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no10', 'Si', null, ['class' => 'mr-1', 'id' => 'no10_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no10', 'No', null, ['class' => 'mr-1', 'id' => 'no10_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div12">
                        {!! Form::label('no12', '12. Incluye un mínimo de 500 USD para apoyo de publicidad', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no12', 'Si', null, ['class' => 'mr-1', 'id' => 'no12_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no12', 'No', null, ['class' => 'mr-1', 'id' => 'no12_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div14">
                        {!! Form::label('no14', '14. Establece el pago en caso de terminación por parte del patrocinador', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no14', 'Si', null, ['class' => 'mr-1', 'id' => 'no14_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no14', 'No', null, ['class' => 'mr-1', 'id' => 'no14_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div16">
                        {!! Form::label('no16', '16. Establece que los pagos se realizarán con una frecuencia máxima de 3 meses', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no16', 'Si', null, ['class' => 'mr-1', 'id' => 'no16_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no16', 'No', null, ['class' => 'mr-1', 'id' => 'no16_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div18">
                        {!! Form::label('no18', '18. Se verificaron los datos para depósitos bancarios, considerando diferente banco para pagos de CE que para visitas y viáticos', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no18', 'Si', null, ['class' => 'mr-1', 'id' => 'no18_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no18', 'No', null, ['class' => 'mr-1', 'id' => 'no18_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div>
                  </div>

                  <!--CEDULA DE PAGOS POR VISITA-->
                  <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">

                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group" id="div20">
                        {!! Form::label('no20', '20. El número de visitas coincide con la cédula del protocolo', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no20', 'Si', null, ['class' => 'mr-1', 'id' => 'no20_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no20', 'No', null, ['class' => 'mr-1', 'id' => 'no20_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div22">
                        {!! Form::label('no22', '22. Incluye un pago para coordinación y captura electrónica de datos', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no22', 'Si', null, ['class' => 'mr-1', 'id' => 'no22_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no22', 'No', null, ['class' => 'mr-1', 'id' => 'no22_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div24">
                        {!! Form::label('no24', '24. Incluye el pago por fallas de selección de al menos 10% del enrolamiento', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no24', 'Si', null, ['class' => 'mr-1', 'id' => 'no24_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no24', 'No', null, ['class' => 'mr-1', 'id' => 'no24_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="div21">
                        {!! Form::label('no21', '21. Se cotejó el costo de los estudios de gabinete y se considera al menos un 20% adicional al costo de cada uno', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no21', 'Si', null, ['class' => 'mr-1', 'id' => 'no21_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no21', 'No', null, ['class' => 'mr-1', 'id' => 'no21_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div23">
                        {!! Form::label('no23', '23. Cuando se requieren estudios de laboratorio locales, considera al menos un 20% adicional al costo de cada estudio', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no23', 'Si', null, ['class' => 'mr-1', 'id' => 'no23_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no23', 'No', null, ['class' => 'mr-1', 'id' => 'no23_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div25">
                        {!! Form::label('no25', '25. Incluye al menos 25 USD de viáticos por sujeto en cada visita', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no25', 'Si', null, ['class' => 'mr-1', 'id' => 'no25_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no25', 'No', null, ['class' => 'mr-1', 'id' => 'no25_no']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div>
                  </div>


                  <!--CLAUSULAS RELEVANTES-->
                  <div class="tab-pane fade" id="vert-tabs-3" role="tabpanel" aria-labelledby="vert-tabs-3-tab">

                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group" id="div26">
                        {!! Form::label('no26', '26. Número máximo de sujetos que ampara el contrato', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no26', 'Si', null, ['class' => 'mr-1', 'id' => 'no26_si']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no26', 'No', null, ['class' => 'mr-1', 'id' => 'no26_no']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="div28">
                        {!! Form::label('no28', '28. Cantidad de pago inicial', ['class' => 'form-label']) !!}
                        {!! Form::number('no28', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01']) !!}
                    </div>

                    <div class="form-group" id="div30">
                        {!! Form::label('no30', '30. Forma de pago de viáticos', ['class' => 'form-label']) !!}
                        {!! Form::select('no30', ['Incluidos en el pago de la visita' => 'Incluidos en el pago de la visita', 'Pago contra facturación adicional' => 'Pago contra facturación adicional'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group" id="div32">
                        {!! Form::label('no32', '32. Observaciones especiales', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no32', null, ['class' => 'form-control', 'placeholder' => 'Ingrese observaciones']) !!}
                    </div>

                    <div class="form-group" id="div34">
                        {!! Form::label('no34', '34. Fecha de firma del contrato', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no34', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="div27">
                        {!! Form::label('no27', '27. Forma de pago', ['class' => 'form-label']) !!}
                        {!! Form::select('no27', ['Mensual' => 'Mensual', 'Trimestral' => 'Trimestral', 'Por visita monitoreada' => 'Por visita monitoreada'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group" id="div29">
                        {!! Form::label('no29', '29. Número de fallas de selección pagaderas', ['class' => 'form-label']) !!}
                        {!! Form::number('no29', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número']) !!}
                    </div>

                    <div class="form-group" id="div31">
                        {!! Form::label('no31', '31. Existen observaciones especiales de facturación', ['class' => 'form-label']) !!}
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

                    <div class="form-group" id="div33">
                        {!! Form::label('no33', '33. Fecha en que se recibió el contrato', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no33', null, ['class' => 'form-control']) !!}
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



                    
                  