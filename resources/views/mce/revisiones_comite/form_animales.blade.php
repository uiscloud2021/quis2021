<div class="row">
    <?php
    $user_id=auth()->id(); 
    ?>  
    <div class="col-md-12">
        <div class="form-group" id="diva1">
            {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id', 'readonly']) !!}
            {!! Form::hidden('animal_id', null, ['class' => 'form-control', 'id'=>'animal_id', 'readonly']) !!}
            {!! Form::hidden('proyectoid_animal', null, ['class' => 'form-control', 'id'=>'proyectoid_animal', 'readonly']) !!}
            
            {!! Form::label('a1', '1. Especie en estudio', ['class' => 'form-label']) !!}
            {!! Form::select('a1', ['Roedores – rata, ratón, cobayo, hámster y jerbo.' => 'Roedores – rata, ratón, cobayo, hámster y jerbo.', 'Lagomorfos – conejo.' => 'Lagomorfos – conejo.', 'Carnívoros – perro y gato.' => 'Carnívoros – perro y gato.', 'Porcinos.' => 'Porcinos.', 'Primates no humanos.' => 'Primates no humanos.'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'a1']) !!}
        </div>

        <div class="form-group" id="diva2">
            {!! Form::label('a2', '2. El bioterio cuenta con Aviso de funcionamiento ante la Comisión Nacional de Sanidad Agropecuaria', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('a2', 'Si', null, ['class' => 'mr-1', 'id' => 'a2_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('a2', 'No', null, ['class' => 'mr-1', 'id' => 'a2_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="diva3">
            {!! Form::label('a3', '3. El bioterio cuenta con un Médico Veterinario responsable y un Responsable Administrativo', ['class' => 'form-label']) !!}
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
            {!! Form::label('a4', '4. El diseño busca evitar al máximo el sufrimiento de los animales', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('a4', 'Si', null, ['class' => 'mr-1', 'id' => 'a4_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('a4', 'No', null, ['class' => 'mr-1', 'id' => 'a4_no']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group" id="diva5">
            {!! Form::label('a5', '5. Cuando se requiere sacrificar al animal, se utilizan procedimientos para asegurar, en lo posible, la muerte sin sufrimiento. ', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('a5', 'Si', null, ['class' => 'mr-1', 'id' => 'a5_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('a5', 'No', null, ['class' => 'mr-1', 'id' => 'a5_no']) !!}
                    No
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('a5', 'No aplica', null, ['class' => 'mr-1', 'id' => 'a5_na']) !!}
                    No aplica
                </label>
            </div>
        </div>

        <div class="form-group" id="diva6">
            {!! Form::label('a6', '6. El protocolo incluye maniobras de descompresión, congelamiento instantáneo, embolismo gaseoso, ahogamiento, estricnina, agentes curariformes, sulfato de magnesio, clorato de potasio, nicotina, cloroformo, cianuro o contusión', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('a6', 'Si', null, ['class' => 'mr-1', 'id' => 'a6_si']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('a6', 'No', null, ['class' => 'mr-1', 'id' => 'a6_no']) !!}
                    No
                </label>
            </div>
        </div>

        <br/>
        <div align="right">
            <button type="button" onclick="Regresar();" class="btn btn-warning"><i class="fa rotate-left"> Cancelar</i></button>
            <button type="button" onclick="GuardarAnimales();" class="btn btn-primary"><i class="fas fa-save"> Guardar respuestas</i></button>
        </div>
    </div>      
</div>


                    
                  