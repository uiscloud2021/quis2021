@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
<h4 class="m-0">Nuevo Rol</h4>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'roles.store', 'autocomplete' => 'off']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre', ['class' => 'form-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del rol']) !!}
                
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                
                </div>

                <div class="form-group">
                    {!! Form::label('permission', 'Listado de permisos', ['class' => 'form-label']) !!}
                    @foreach ($permissions as $permission)
                        <div>
                            <label>
                                {!! Form::checkbox('permission[]', $permission->id, null, ['class' => 'mr-1']) !!}
                                {{$permission->description}}
                            </label>
                        </div>
                    @endforeach
                
                    @error('permission')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                
                </div>

                <div align="right">
                    <a href="#" onclick="Salir();" class="btn btn-danger">Cancelar</a>
                    {!! Form::submit('Guardar rol', ['class' => 'btn btn-primary']) !!}
                </div>
                

            {!! Form::close() !!}
        </div>
    </div>



    <!-- Modal-->
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

@stop

@section('css')
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    
    <script>
    function Salir(){
        $('#confirmModal').modal('show');
    }

    $('#btnCancelar').click(function(){
        window.location.href = "/roles";
    })
    </script>
@stop