<!-- Modal SALIR SIN GUARDAR-->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Confirmación</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
                <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
        ¿Desea salir sin guardar la información?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnCancelar" data-bs-toggle="modal" data-bs-target="#confirmModal" name="btnCancelar" class="btn btn-danger">Salir sin guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal ELIMINAR-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmación</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
                <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar el registro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnEliminarRegistro" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal CREAR ACCIONES-->
<div class="modal fade" id="createAccionesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createAccionesModalLabel">Nueva acción</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_acciones']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_acciones', null, ['id' => 'empresaid_acciones']) !!}
        {!! Form::hidden('responsabilidadid_acciones', null, ['id' => 'responsabilidadid_acciones']) !!}
        {!! Form::hidden('id_acciones', null, ['id' => 'id_acciones']) !!}
        
        <div class="form-group">
            {!! Form::label('no15', '15. Fecha programada', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no15', null, ['class' => 'form-control', 'id' => 'no15']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no16', '16. Fecha realizada', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no16', null, ['class' => 'form-control', 'id' => 'no16']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no17', '17. Persona autorizada para recibir', ['class' => 'form-label']) !!}
            {!! Form::text('no17', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'no17']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no18', '18. Identificación', ['class' => 'form-label']) !!}
            {!! Form::text('no18', null, ['class' => 'form-control', 'placeholder' => 'Ingrese identificación', 'id' => 'no18']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no19', '19. Beneficio', ['class' => 'form-label']) !!}
            {!! Form::text('no19', null, ['class' => 'form-control', 'placeholder' => 'Ingrese beneficio', 'id' => 'no19']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no20', '20. Guardó evidencia electrónica en archivo', ['class' => 'form-label']) !!}
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

        <div class="form-group">
            {!! Form::label('no21', '21. Persona UIS que participa', ['class' => 'form-label']) !!}
            {!! Form::hidden('no21', null, ['class' => 'form-control', 'id' => 'no21']) !!}
            {!! Form::hidden('no22', null, ['class' => 'form-control', 'id' => 'no22']) !!}
            <table class="table table-striped" style="width:100%;">
              <tr>
                <th scope="col"></th>
                <th scope="col">Nombre</th>
                <th scope="col">Rol</th>
              </tr>
              @foreach ($candidatos as $candidato)
                <tr>
                  <td><input type="checkbox" name="candidatos[]" id="cand{{$candidato->id}}" value="{{$candidato->id}}"></input></td>
                  <td>{{$candidato->no62}}</td>
                  <td>{!! Form::text('part'.$candidato->id, null, ['class' => 'form-control', 'placeholder' => 'Ingrese participación', 'id' => 'part'.$candidato->id]) !!}</td>
                </tr>
              @endforeach
            </table>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGAcciones" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

