<div class="card card-primary card-outline">
<div class="card-body">
<div class="row">
    <div class="col-md-12">
        <div class="form-group" id="divp1">
            {!! Form::hidden('protocolo_id', null, ['class' => 'form-control', 'id'=>'protocolo_id']) !!}
            {!! Form::hidden('proyectoid_protocolo', null, ['class' => 'form-control', 'id'=>'proyectoid_protocolo']) !!}
            
            {!! Form::label('p1', '1. Describe el producto en investigación en cuanto a toxicidad, actividad farmacológica, farmacocinética en diferentes especies de animales, mutagénesis, teratogénesis y carcinogénesis', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p1', 'Si', null, ['class' => 'mr-1', 'id' => 'p1_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p1', 'No', null, ['class' => 'mr-1', 'id' => 'p1_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p1', 'No aplica', null, ['class' => 'mr-1', 'id' => 'p1_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divp2">
            {!! Form::label('p2', '2. Describe los estudios previos realizados en seres humanos', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p2', 'Si', null, ['class' => 'mr-1', 'id' => 'p2_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p2', 'No', null, ['class' => 'mr-1', 'id' => 'p2_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p2', 'No aplica', null, ['class' => 'mr-1', 'id' => 'p2_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divp3">
            {!! Form::label('p3', '3. Describe la frecuencia, vías de administración y duración de las dosis estudiadas', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p3', 'Si', null, ['class' => 'mr-1', 'id' => 'p3_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p3', 'No', null, ['class' => 'mr-1', 'id' => 'p3_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divp4">
            {!! Form::label('p4', '4. Justifica el estudio en forma suficiente,  por la enfermedad y sus opciones de tratamiento,  por el medicamento y su fase de desarrollo o  por el interés científico', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p4', 'Si', null, ['class' => 'mr-1', 'id' => 'p4_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p4', 'No', null, ['class' => 'mr-1', 'id' => 'p4_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divp5">
            {!! Form::label('p5', '5. Tipo de investigación', ['class' => 'form-label']) !!}
            {!! Form::select('p5', ['Epidemiológica' => 'Epidemiológica', 'Biomédica' => 'Biomédica', 'Preclínica' => 'Preclínica', 'Clínica' => 'Clínica', 'Traslacional' => 'Traslacional', 'Biotecnológica' => 'Biotecnológica', 'Sistemas de salud' => 'Sistemas de salud', 'Educativa' => 'Educativa', 'Social' => 'Social'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'p5']) !!}
        </div>

        <div class="form-group" id="divp6">
            {!! Form::label('p6', '6. Objetivos del estudio', ['class' => 'form-label']) !!}
            {!! Form::hidden('p6', null, ['class' => 'form-control', 'id' => 'p6']) !!}
            <table class="table table-striped" style="width:100%;">
                <tbody>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Objetivos</th>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="obj[]" id="checksom1" value="Tolerabilidad"></td>
                        <td>Tolerabilidad</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="obj[]" id="checksom2" value="Eficacia"></td>
                        <td>Eficacia</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="obj[]" id="checksom3" value="Farmacogenómica"></td>
                        <td>Farmacogenómica</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="obj[]" id="checksom4" value="Farmacocinética"></td>
                        <td>Farmacocinética</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="obj[]" id="checksom5" value="Seguridad"></td>
                        <td>Seguridad</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="obj[]" id="checksom6" value="Diagnóstico"></td>
                        <td>Diagnóstico</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="obj[]" id="checksom7" value="Farmacodinamia"></td>
                        <td>Farmacodinamia</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="obj[]" id="checksom8" value="Profilaxis"></td>
                        <td>Profilaxis</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="obj[]" id="checksom9" value="Búsqueda de dosis"></td>
                        <td>Búsqueda de dosis</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="obj[]" id="checksom10" value="Otros"></td>
                        <td>Otros</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group" id="divp7">
            {!! Form::label('p7', '7. Define, y es adecuado, el objetivo principal', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p7', 'Si', null, ['class' => 'mr-1', 'id' => 'p7_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p7', 'No', null, ['class' => 'mr-1', 'id' => 'p7_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divp8">
            {!! Form::label('p8', '8. Define, y son adecuados, los objetivos secundarios', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p8', 'Si', null, ['class' => 'mr-1', 'id' => 'p8_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p8', 'No', null, ['class' => 'mr-1', 'id' => 'p8_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p8', 'No aplica', null, ['class' => 'mr-1', 'id' => 'p8_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divp9">
            {!! Form::label('p9', '9. Número de mediciones que se realizarán a lo largo del tiempo', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p9', '1', null, ['class' => 'mr-1', 'id' => 'p9_si']) !!}
                   1
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p9', '2 o más', null, ['class' => 'mr-1', 'id' => 'p9_no']) !!}
                    2 o más
                </label>
            </div>
        </div>

        <div class="form-group" id="divp10">
            {!! Form::label('p10', '10. Define, y son adecuados, los criterios de inclusión', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p10', 'Si', null, ['class' => 'mr-1', 'id' => 'p10_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p10', 'No', null, ['class' => 'mr-1', 'id' => 'p10_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divp11">
            {!! Form::label('p11', '11. Define, y son adecuados, los criterios de exclusión', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p11', 'Si', null, ['class' => 'mr-1', 'id' => 'p11_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p11', 'No', null, ['class' => 'mr-1', 'id' => 'p11_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divp12">
            {!! Form::label('p12', '12. Define, y son adecuados, los criterios de eliminación', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p12', 'Si', null, ['class' => 'mr-1', 'id' => 'p12_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p12', 'No', null, ['class' => 'mr-1', 'id' => 'p12_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p12', 'No aplica', null, ['class' => 'mr-1', 'id' => 'p12_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divp13">
            {!! Form::label('p13', '13. Describe adecuadamente la enfermedad en estudio mediante los criterios de inclusión', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p13', 'Si', null, ['class' => 'mr-1', 'id' => 'p13_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p13', 'No', null, ['class' => 'mr-1', 'id' => 'p13_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divp14">
            {!! Form::label('p14', '14. El diseño incluye una maniobra de intervención', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p14', 'Si', null, ['class' => 'mr-1', 'id' => 'p14_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p14', 'No', null, ['class' => 'mr-1', 'id' => 'p14_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divp15">
            {!! Form::label('p15', '15. El diseño incluye un grupo control', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p15', 'Si', null, ['class' => 'mr-1', 'id' => 'p15_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p15', 'No', null, ['class' => 'mr-1', 'id' => 'p15_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divp16">
            {!! Form::label('p16', '16. Describe, y es adecuada, la maniobra para distribución aleatoria', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p16', 'Si', null, ['class' => 'mr-1', 'id' => 'p16_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p16', 'No', null, ['class' => 'mr-1', 'id' => 'p16_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p16', 'No aplica', null, ['class' => 'mr-1', 'id' => 'p16_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divp17">
            {!! Form::label('p17', '17. Describe, y es adecuada, la maniobra de cegado', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p17', 'Si', null, ['class' => 'mr-1', 'id' => 'p17_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p17', 'No', null, ['class' => 'mr-1', 'id' => 'p17_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p17', 'No aplica', null, ['class' => 'mr-1', 'id' => 'p17_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divp18">
            {!! Form::label('p18', '18. Justifica el uso de placebo', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p18', 'Si', null, ['class' => 'mr-1', 'id' => 'p18_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p18', 'No', null, ['class' => 'mr-1', 'id' => 'p18_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p18', 'No aplica', null, ['class' => 'mr-1', 'id' => 'p18_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divp19">
            {!! Form::label('p19', '19. Define el tamaño de la muestra', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p19', 'Si', null, ['class' => 'mr-1', 'id' => 'p19_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p19', 'No', null, ['class' => 'mr-1', 'id' => 'p19_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divp20">
            {!! Form::label('p20', '20. Describe la potencia estadística del estudio', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p20', 'Si', null, ['class' => 'mr-1', 'id' => 'p20_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p20', 'No', null, ['class' => 'mr-1', 'id' => 'p20_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divp21">
            {!! Form::label('p21', '21. Describe los errores permitidos', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p21', 'Si', null, ['class' => 'mr-1', 'id' => 'p21_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p21', 'No', null, ['class' => 'mr-1', 'id' => 'p21_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divp22">
            {!! Form::label('p22', '22. Considera las pérdidas o abandonos', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p22', 'Si', null, ['class' => 'mr-1', 'id' => 'p22_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p22', 'No', null, ['class' => 'mr-1', 'id' => 'p22_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divp23">
            {!! Form::label('p23', '23. Describe el tratamiento experimental en dosis, pauta, vía de administración y duración', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p23', 'Si', null, ['class' => 'mr-1', 'id' => 'p23_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p23', 'No', null, ['class' => 'mr-1', 'id' => 'p23_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p23', 'No aplica', null, ['class' => 'mr-1', 'id' => 'p23_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divp24">
            {!! Form::label('p24', '24. Describe cualquier otro tratamiento en dosis, pauta, vía de administración y duración', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p24', 'Si', null, ['class' => 'mr-1', 'id' => 'p24_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p24', 'No', null, ['class' => 'mr-1', 'id' => 'p24_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p24', 'No aplica', null, ['class' => 'mr-1', 'id' => 'p24_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divp25">
            {!! Form::label('p25', '25. Describe el tratamiento de todos los pacientes', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p25', 'Si', null, ['class' => 'mr-1', 'id' => 'p25_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p25', 'No', null, ['class' => 'mr-1', 'id' => 'p25_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p25', 'No aplica', null, ['class' => 'mr-1', 'id' => 'p25_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divp26">
            {!! Form::label('p26', '26. Describe el periodo de lavado', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p26', 'Si', null, ['class' => 'mr-1', 'id' => 'p26_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p26', 'No', null, ['class' => 'mr-1', 'id' => 'p26_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p26', 'No aplica', null, ['class' => 'mr-1', 'id' => 'p26_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divp27">
            {!! Form::label('p27', '27. Describe el periodo de estabilización o pre-inclusión', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p27', 'Si', null, ['class' => 'mr-1', 'id' => 'p27_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p27', 'No', null, ['class' => 'mr-1', 'id' => 'p27_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p27', 'No aplica', null, ['class' => 'mr-1', 'id' => 'p27_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divp28">
            {!! Form::label('p28', '28. Describe el sistema de monitoreo de la adherencia', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p28', 'Si', null, ['class' => 'mr-1', 'id' => 'p28_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p28', 'No', null, ['class' => 'mr-1', 'id' => 'p28_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p28', 'No aplica', null, ['class' => 'mr-1', 'id' => 'p28_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divp29">
            {!! Form::label('p29', '29. Describe los medicamentos prohibidos', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p29', 'Si', null, ['class' => 'mr-1', 'id' => 'p29_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p29', 'No', null, ['class' => 'mr-1', 'id' => 'p29_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p29', 'No aplica', null, ['class' => 'mr-1', 'id' => 'p29_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divp30">
            {!! Form::label('p30', '30. Describe los tratamientos de rescate', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p30', 'Si', null, ['class' => 'mr-1', 'id' => 'p30_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p30', 'No', null, ['class' => 'mr-1', 'id' => 'p30_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p30', 'No aplica', null, ['class' => 'mr-1', 'id' => 'p30_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divp31">
            {!! Form::label('p31', '31. Describe la evaluación de causalidad de los EAS', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p31', 'Si', null, ['class' => 'mr-1', 'id' => 'p31_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p31', 'No', null, ['class' => 'mr-1', 'id' => 'p31_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divp32">
            {!! Form::label('p32', '32. Define maniobras adecuadas para romper el cegado', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p32', 'Si', null, ['class' => 'mr-1', 'id' => 'p32_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p32', 'No', null, ['class' => 'mr-1', 'id' => 'p32_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p32', 'No aplica', null, ['class' => 'mr-1', 'id' => 'p32_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="divp33">
            {!! Form::label('p33', '33. Especifica las reglas de suspensión del estudio', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p33', 'Si', null, ['class' => 'mr-1', 'id' => 'p33_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p33', 'No', null, ['class' => 'mr-1', 'id' => 'p33_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divp34">
            {!! Form::label('p34', '34. Define las variables de resultados y su operacionalización es adecuada (son objetivas, medibles y/o replicables)', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p34', 'Si', null, ['class' => 'mr-1', 'id' => 'p34_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p34', 'No', null, ['class' => 'mr-1', 'id' => 'p34_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divp35">
            {!! Form::label('p35', '35. Los instrumentos para medir las variables de resultados están validados', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p35', 'Si', null, ['class' => 'mr-1', 'id' => 'p35_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p35', 'No', null, ['class' => 'mr-1', 'id' => 'p35_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divp36">
            {!! Form::label('p36', '36. Describe, y es adecuado, el plan del análisis estadístico. Incluye estadística descriptiva, univariada, bivariada y multivariada, cuando aplica', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p36', 'Si', null, ['class' => 'mr-1', 'id' => 'p36_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p36', 'No', null, ['class' => 'mr-1', 'id' => 'p36_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divp37">
            {!! Form::label('p37', '37. Muestra congruencia entre el objetivo, el diseño y el plan de análisis estadístico propuesto', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p37', 'Si', null, ['class' => 'mr-1', 'id' => 'p37_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p37', 'No', null, ['class' => 'mr-1', 'id' => 'p37_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="divp38">
            {!! Form::label('p38', '38. Contiene los anexos necesarios para la aplicación de tratamientos, almacenaje, asentimiento, etc.', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('p38', 'Si', null, ['class' => 'mr-1', 'id' => 'p38_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('p38', 'No', null, ['class' => 'mr-1', 'id' => 'p38_no']) !!}
                    No
                </label>
            </div>
        </div>

        <br/>
        <div align="right">
            <button type="button" onclick="Regresar();" class="btn btn-warning"><i class="fa-rotate-left"> Cancelar</i></button>
            <button type="button" onclick="GuardarProtocolo();" class="btn btn-primary"><i class="fas fa-save"> Guardar respuestas</i></button>
        </div>
    </div>      
</div>
</div>
</div>


                    
                  