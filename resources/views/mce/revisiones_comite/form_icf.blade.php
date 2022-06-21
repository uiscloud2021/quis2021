<div class="row">
    <?php
    $user_id=auth()->id(); 
    ?>  
    <div class="col-md-12">
        <div class="form-group" id="divi1">
            {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id', 'readonly']) !!}
            {!! Form::hidden('icf_id', null, ['class' => 'form-control', 'id'=>'icf_id', 'readonly']) !!}
            {!! Form::hidden('proyectoid_icf', null, ['class' => 'form-control', 'id'=>'proyectoid_icf', 'readonly']) !!}
            
            {!! Form::label('i1', '1. Identifica al investigador principal', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i1', 'Si', null, ['class' => 'mr-1', 'id' => 'i1_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i1', 'No', null, ['class' => 'mr-1', 'id' => 'i1_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi2">
            {!! Form::label('i2', '2. Identifica al patrocinador del estudio', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i2', 'Si', null, ['class' => 'mr-1', 'id' => 'i2_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i2', 'No', null, ['class' => 'mr-1', 'id' => 'i2_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi3">
            {!! Form::label('i3', '3. Identifica la CRO y su responsabilidad en el estudio', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i3', 'Si', null, ['class' => 'mr-1', 'id' => 'i3_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i3', 'No', null, ['class' => 'mr-1', 'id' => 'i3_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi4">
            {!! Form::label('i4', '4. Informa al sujeto que se trata de una investigación', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i4', 'Si', null, ['class' => 'mr-1', 'id' => 'i4_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i4', 'No', null, ['class' => 'mr-1', 'id' => 'i4_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi5">
            {!! Form::label('i5', '5. Describe la justificación del estudio', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i5', 'Si', null, ['class' => 'mr-1', 'id' => 'i5_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i5', 'No', null, ['class' => 'mr-1', 'id' => 'i5_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi6">
            {!! Form::label('i6', '6. Describe los objetivos del estudio', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i6', 'Si', null, ['class' => 'mr-1', 'id' => 'i6_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i6', 'No', null, ['class' => 'mr-1', 'id' => 'i6_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi7">
            {!! Form::label('i7', '7. Describe el diseño del estudio en cuanto a reclutamiento, aleatorización y cegado', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i7', 'Si', null, ['class' => 'mr-1', 'id' => 'i7_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i7', 'No', null, ['class' => 'mr-1', 'id' => 'i7_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i7', 'No aplica', null, ['class' => 'mr-1', 'id' => 'i7_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divi8">
            {!! Form::label('i8', '8. Explica acerca del placebo y se informa el significado', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i8', 'Si', null, ['class' => 'mr-1', 'id' => 'i8_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i8', 'No', null, ['class' => 'mr-1', 'id' => 'i8_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i8', 'No aplica', null, ['class' => 'mr-1', 'id' => 'i8_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divi9">
            {!! Form::label('i9', '9. Incluye mecanismos de selección de sujetos que son equitativos para todos los grupos sociales', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i9', 'Si', null, ['class' => 'mr-1', 'id' => 'i9_si']) !!}
                   Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i9', 'No', null, ['class' => 'mr-1', 'id' => 'i9_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi10">
            {!! Form::label('i10', '10. Describe la duración prevista del estudio', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i10', 'Si', null, ['class' => 'mr-1', 'id' => 'i10_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i10', 'No', null, ['class' => 'mr-1', 'id' => 'i10_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i10', 'No aplica', null, ['class' => 'mr-1', 'id' => 'i10_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divi11">
            {!! Form::label('i11', '11. Explica los tratamientos posibles y la probabilidad de asignación a cada uno de ellos', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i11', 'Si', null, ['class' => 'mr-1', 'id' => 'i11_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i11', 'No', null, ['class' => 'mr-1', 'id' => 'i11_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i11', 'No aplica', null, ['class' => 'mr-1', 'id' => 'i11_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divi12">
            {!! Form::label('i12', '12. Explica las ventajas y desventajas de los tratamientos', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i12', 'Si', null, ['class' => 'mr-1', 'id' => 'i12_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i12', 'No', null, ['class' => 'mr-1', 'id' => 'i12_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i12', 'No aplica', null, ['class' => 'mr-1', 'id' => 'i12_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divi13">
            {!! Form::label('i13', '13. Describe los tratamientos e instrucciones a seguir', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i13', 'Si', null, ['class' => 'mr-1', 'id' => 'i13_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i13', 'No', null, ['class' => 'mr-1', 'id' => 'i13_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i13', 'No aplica', null, ['class' => 'mr-1', 'id' => 'i13_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divi14">
            {!! Form::label('i14', '14. Informa los procedimientos generales como visitas, exploraciones, etc.', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i14', 'Si', null, ['class' => 'mr-1', 'id' => 'i14_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i14', 'No', null, ['class' => 'mr-1', 'id' => 'i14_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi15">
            {!! Form::label('i15', '15. Informa los procedimientos extraordinarios que deberán realizarse (extracciones, estudios, etc.)', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i15', 'Si', null, ['class' => 'mr-1', 'id' => 'i15_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i15', 'No', null, ['class' => 'mr-1', 'id' => 'i15_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i15', 'No aplica', null, ['class' => 'mr-1', 'id' => 'i15_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divi16">
            {!! Form::label('i16', '16. Informa los beneficios razonablemente esperados', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i16', 'Si', null, ['class' => 'mr-1', 'id' => 'i16_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i16', 'No', null, ['class' => 'mr-1', 'id' => 'i16_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i16', 'No aplica', null, ['class' => 'mr-1', 'id' => 'i16_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divi17">
            {!! Form::label('i17', '17. Informa los posibles riesgos e incomodidades por participar', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i17', 'Si', null, ['class' => 'mr-1', 'id' => 'i17_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i17', 'No', null, ['class' => 'mr-1', 'id' => 'i17_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i17', 'No aplica', null, ['class' => 'mr-1', 'id' => 'i17_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divi18">
            {!! Form::label('i18', '18. Informa los riesgos potenciales en relación a la reproducción', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i18', 'Si', null, ['class' => 'mr-1', 'id' => 'i18_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i18', 'No', null, ['class' => 'mr-1', 'id' => 'i18_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i18', 'No aplica', null, ['class' => 'mr-1', 'id' => 'i18_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divi19">
            {!! Form::label('i19', '19. La relación riesgo / beneficio es adecuada', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i19', 'Si', null, ['class' => 'mr-1', 'id' => 'i19_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i19', 'No', null, ['class' => 'mr-1', 'id' => 'i19_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i19', 'No aplica', null, ['class' => 'mr-1', 'id' => 'i19_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divi20">
            {!! Form::label('i20', '20. Informa las medidas previstas ante los posibles riesgos', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i20', 'Si', null, ['class' => 'mr-1', 'id' => 'i20_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i20', 'No', null, ['class' => 'mr-1', 'id' => 'i20_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i20', 'No aplica', null, ['class' => 'mr-1', 'id' => 'i20_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divi21">
            {!! Form::label('i21', '21. Explica que existe el compromiso de confidencialidad, indicando las personas que pueden tener acceso a los registros', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i21', 'Si', null, ['class' => 'mr-1', 'id' => 'i21_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i21', 'No', null, ['class' => 'mr-1', 'id' => 'i21_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi22">
            {!! Form::label('i22', '22. Informa que los resultados serán publicados respetando la confidencialidad de los sujetos', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i22', 'Si', null, ['class' => 'mr-1', 'id' => 'i22_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i22', 'No', null, ['class' => 'mr-1', 'id' => 'i22_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi23">
            {!! Form::label('i23', '23. Garantiza de manera clara, objetiva y explícita la gratuidad de la maniobra experimental para el sujeto', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i23', 'Si', null, ['class' => 'mr-1', 'id' => 'i23_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i23', 'No', null, ['class' => 'mr-1', 'id' => 'i23_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i23', 'No aplica', null, ['class' => 'mr-1', 'id' => 'i23_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divi24">
            {!! Form::label('i24', '24. Informa que el sujeto no debe realizar ningún pago', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i24', 'Si', null, ['class' => 'mr-1', 'id' => 'i24_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i24', 'No', null, ['class' => 'mr-1', 'id' => 'i24_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi25">
            {!! Form::label('i25', '25. Informaque los honorarios del equipo de la investigación están cubiertos por el patrocinador', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i25', 'Si', null, ['class' => 'mr-1', 'id' => 'i25_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i25', 'No', null, ['class' => 'mr-1', 'id' => 'i25_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i25', 'No aplica', null, ['class' => 'mr-1', 'id' => 'i25_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divi26">
            {!! Form::label('i26', '26. Informa que la participación es voluntaria y la no participación no tiene perjuicio en su atención médica', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i26', 'Si', null, ['class' => 'mr-1', 'id' => 'i26_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i26', 'No', null, ['class' => 'mr-1', 'id' => 'i26_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi27">
            {!! Form::label('i27', '27. Informa que existe la libertad de consultar con otra persona antes de decidir', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i27', 'Si', null, ['class' => 'mr-1', 'id' => 'i27_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i27', 'No', null, ['class' => 'mr-1', 'id' => 'i27_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi28">
            {!! Form::label('i28', '28. Informa que existe la posibilidad de retirarse en cualquier momento, sin perjuicio', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i28', 'Si', null, ['class' => 'mr-1', 'id' => 'i28_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i28', 'No', null, ['class' => 'mr-1', 'id' => 'i28_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi29">
            {!! Form::label('i29', '29. Especifica las condiciones de exclusión y/o descontinuación del estudio', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i29', 'Si', null, ['class' => 'mr-1', 'id' => 'i29_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i29', 'No', null, ['class' => 'mr-1', 'id' => 'i29_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i29', 'No aplica', null, ['class' => 'mr-1', 'id' => 'i29_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divi30">
            {!! Form::label('i30', '30. Establece el compromiso de actualizar la información relevante del estudio y del producto en investigación', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i30', 'Si', null, ['class' => 'mr-1', 'id' => 'i30_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i30', 'No', null, ['class' => 'mr-1', 'id' => 'i30_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi31">
            {!! Form::label('i31', '31. Informa que, en caso de embarazo, se dará seguimiento hasta el nacimiento y verificación de estado de salud del producto', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i31', 'Si', null, ['class' => 'mr-1', 'id' => 'i31_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i31', 'No', null, ['class' => 'mr-1', 'id' => 'i31_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i31', 'No aplica', null, ['class' => 'mr-1', 'id' => 'i31_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divi32">
            {!! Form::label('i32', '32. Informa la compensación por daños o perjuicios y la existencia de un seguro', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i32', 'Si', null, ['class' => 'mr-1', 'id' => 'i32_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i32', 'No', null, ['class' => 'mr-1', 'id' => 'i32_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi33">
            {!! Form::label('i33', '33. Informa si existe un reembolso económico para los sujetos, especificando concepto, cantidad y forma prorrateada, lo cual no significa que se ejerza coerción o influencia indebida', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i33', 'Si', null, ['class' => 'mr-1', 'id' => 'i33_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i33', 'No', null, ['class' => 'mr-1', 'id' => 'i33_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi34">
            {!! Form::label('i34', '34. Proporciona los datos de contacto de emergencia con el investigador principal', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i34', 'Si', null, ['class' => 'mr-1', 'id' => 'i34_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i34', 'No', null, ['class' => 'mr-1', 'id' => 'i34_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi35">
            {!! Form::label('i35', '35. Informa que el protocolo fue sometido a la revisión de un Comité de Ética en Investigación', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i35', 'Si', null, ['class' => 'mr-1', 'id' => 'i35_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i35', 'No', null, ['class' => 'mr-1', 'id' => 'i35_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi36">
            {!! Form::label('i36', '36. Indica el nombre del CE, sus atribuciones y datos de contacto', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i36', 'Si', null, ['class' => 'mr-1', 'id' => 'i36_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i36', 'No', null, ['class' => 'mr-1', 'id' => 'i36_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi37">
            {!! Form::label('i37', '37. El documento está bien redactado, con explicación y extensión adecuada del contenido', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i37', 'Si', null, ['class' => 'mr-1', 'id' => 'i37_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i37', 'No', null, ['class' => 'mr-1', 'id' => 'i37_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi38">
            {!! Form::label('i38', '38. Utiliza terminología comprensible de acuerdo al nivel cultural', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i38', 'Si', null, ['class' => 'mr-1', 'id' => 'i38_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i38', 'No', null, ['class' => 'mr-1', 'id' => 'i38_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi39">
            {!! Form::label('i39', '39. Identifica a la persona responsable de obtener la firma del ICF y aclarar las dudas', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i39', 'Si', null, ['class' => 'mr-1', 'id' => 'i39_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i39', 'No', null, ['class' => 'mr-1', 'id' => 'i39_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi40">
            {!! Form::label('i40', '40. Incluye el nombre y apellido del sujeto y/o su representante legal', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i40', 'Si', null, ['class' => 'mr-1', 'id' => 'i40_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i40', 'No', null, ['class' => 'mr-1', 'id' => 'i40_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi41">
            {!! Form::label('i41', '41. Existe una declaración de la lectura del ICF', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i41', 'Si', null, ['class' => 'mr-1', 'id' => 'i41_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i41', 'No', null, ['class' => 'mr-1', 'id' => 'i41_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi42">
            {!! Form::label('i42', '42. Contiene una declaración de haber recibido suficiente información sobre el estudio y de que se aclararon todas las dudas', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i42', 'Si', null, ['class' => 'mr-1', 'id' => 'i42_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i42', 'No', null, ['class' => 'mr-1', 'id' => 'i42_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi43">
            {!! Form::label('i43', '43. Contiene un declaración de que el sujeto comprende que la participación es voluntaria', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i43', 'Si', null, ['class' => 'mr-1', 'id' => 'i43_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i43', 'No', null, ['class' => 'mr-1', 'id' => 'i43_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi44">
            {!! Form::label('i44', '44. Contiene una declaración de que el sujeto comprende que puede retirarse en cualquier momento, sin perjuicio', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i44', 'Si', null, ['class' => 'mr-1', 'id' => 'i44_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i44', 'No', null, ['class' => 'mr-1', 'id' => 'i44_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi45">
            {!! Form::label('i45', '45. Contiene una declaración de libre conformidad para participar en el estudio', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i45', 'Si', null, ['class' => 'mr-1', 'id' => 'i45_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i45', 'No', null, ['class' => 'mr-1', 'id' => 'i45_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi46">
            {!! Form::label('i46', '46. Contiene una declaración de que el sujeto conserva una copia del ICF, debidamente llena y firmada', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i46', 'Si', null, ['class' => 'mr-1', 'id' => 'i46_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i46', 'No', null, ['class' => 'mr-1', 'id' => 'i46_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi47">
            {!! Form::label('i47', '47. En el área de declaraciones, contiene espacio para escribir el nombre completo del sujeto', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i47', 'Si', null, ['class' => 'mr-1', 'id' => 'i47_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i47', 'No', null, ['class' => 'mr-1', 'id' => 'i47_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi48">
            {!! Form::label('i48', '48. Contiene espacio para que el sujeto escriba su nombre, firma y fecha', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i48', 'Si', null, ['class' => 'mr-1', 'id' => 'i48_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i48', 'No', null, ['class' => 'mr-1', 'id' => 'i48_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi49">
            {!! Form::label('i49', '49. Contiene espacio para que, en caso necesario, el representante legal escriba su nombre, firma, fecha y relación con el participante', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i49', 'Si', null, ['class' => 'mr-1', 'id' => 'i49_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i49', 'No', null, ['class' => 'mr-1', 'id' => 'i49_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi50">
            {!! Form::label('i50', '50. Contiene espacio para que el médico responsable de obtener la firma del ICF escriba su nombre, firma y fecha', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i50', 'Si', null, ['class' => 'mr-1', 'id' => 'i50_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i50', 'No', null, ['class' => 'mr-1', 'id' => 'i50_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi51">
            {!! Form::label('i51', '51. Contiene espacio para que dos testigos escriban su nombre, fecha, firma, parentesco y domicilio', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i51', 'Si', null, ['class' => 'mr-1', 'id' => 'i51_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i51', 'No', null, ['class' => 'mr-1', 'id' => 'i51_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi52">
            {!! Form::label('i52', '52. Se escribe en un consentimiento separado la utilización y conservación de datos genéticos o proteómicos humanos y muestras biológicas, consignando sus objetivos, riesgos, confidencialidad, tiempo de almacenamiento, etc.', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i52', 'Si', null, ['class' => 'mr-1', 'id' => 'i52_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i52', 'No', null, ['class' => 'mr-1', 'id' => 'i52_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i52', 'No aplica', null, ['class' => 'mr-1', 'id' => 'i52_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divi53">
            {!! Form::label('i53', '53. Se identifican poblaciones vulnerables en el estudio', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i53', 'Si', null, ['class' => 'mr-1', 'id' => 'i53_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i53', 'No', null, ['class' => 'mr-1', 'id' => 'i53_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi54">
            {!! Form::label('i54', '54. Tipo de vulnerabilidad', ['class' => 'form-label']) !!}
            {!! Form::select('i54', ['Menores de edad' => 'Menores de edad', 'Enfermedad psiquiátrica' => 'Enfermedad psiquiátrica', 'Personas inconscientes' => 'Personas inconscientes', 'Embarazo, puerperio, lactancia, fetos, fertilización asistida o recién nacidos' => 'Embarazo, puerperio, lactancia, fetos, fertilización asistida o recién nacidos', 'Discapacidad' => 'Discapacidad', 'Déficit intelectual' => 'Déficit intelectual', 'Deterioro cognitivo' => 'Deterioro cognitivo', 'Prisioneros' => 'Prisioneros', 'Moribundos - urgencias' => 'Moribundos - urgencias', 'Comunidad cerrada' => 'Comunidad cerrada', 'Con desventaja económica, social, educativa o jerárquica' => 'Con desventaja económica, social, educativa o jerárquica'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'i54']) !!}
        </div>

        <div class="form-group" id="divi55">
            {!! Form::label('i55', '55. Establece las condiciones para la sustitución o firma por representante legal', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i55', 'Si', null, ['class' => 'mr-1', 'id' => 'i55_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i55', 'No', null, ['class' => 'mr-1', 'id' => 'i55_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i55', 'No aplica', null, ['class' => 'mr-1', 'id' => 'i55_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divi56">
            {!! Form::label('i56', '56. Establece que el ICF debe ser firmado por ambos padres (salvo imposibilidad fehaciente) o un representante legal', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i56', 'Si', null, ['class' => 'mr-1', 'id' => 'i56_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i56', 'No', null, ['class' => 'mr-1', 'id' => 'i56_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi57">
            {!! Form::label('i57', '57. Incluye un Formato de asentimiento acorde a la edad del menor', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i57', 'Si', null, ['class' => 'mr-1', 'id' => 'i57_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i57', 'No', null, ['class' => 'mr-1', 'id' => 'i57_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi58">
            {!! Form::label('i58', '58. Requiere verificar la capacidad de firma de cada sujeto al inicio', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i58', 'Si', null, ['class' => 'mr-1', 'id' => 'i58_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i58', 'No', null, ['class' => 'mr-1', 'id' => 'i58_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi59">
            {!! Form::label('i59', '59. Requiere verificar la capacidad de firma de cada sujetos durante el desarrollo, cuando aplica', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i59', 'Si', null, ['class' => 'mr-1', 'id' => 'i59_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i59', 'No', null, ['class' => 'mr-1', 'id' => 'i59_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi60">
            {!! Form::label('i60', '60. El proyecto cuenta con la aprobación de las autoridades de la institución en que se realizará', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i60', 'Si', null, ['class' => 'mr-1', 'id' => 'i60_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i60', 'No', null, ['class' => 'mr-1', 'id' => 'i60_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divi61">
            {!! Form::label('i61', '61. El proyecto cuenta con la aprobación de las autoridades civiles de la comunidad', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('i61', 'Si', null, ['class' => 'mr-1', 'id' => 'i61_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('i61', 'No', null, ['class' => 'mr-1', 'id' => 'i61_no']) !!}
                    No
                </label>
            </div>
        </div>

        <br/>
        <div align="right">
            <button type="button" onclick="Regresar();" class="btn btn-warning"><i class="fa rotate-left"> Cancelar</i></button>
            <button type="button" onclick="GuardarICF();" class="btn btn-primary"><i class="fas fa-save"> Guardar respuestas</i></button>
        </div>
    </div>      
</div>


                    
                  