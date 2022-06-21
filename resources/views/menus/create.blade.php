@extends('adminlte::page')

@section('title', 'Menús')

@section('content_header')
<h4 class="m-0">Nuevo Menú</h4>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'menus.store', 'autocomplete' => 'off']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre', ['class' => 'form-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del menú']) !!}
                
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                
                </div>

				<div class="form-group">
                    {!! Form::label('description', 'Descripción', ['class' => 'form-label']) !!}
                    {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripción']) !!}
                    
                    @error('description')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                <div class="form-group">
                    {!! Form::label('position', 'Posición en la lista de menús', ['class' => 'form-label']) !!}
                    {!! Form::select('position', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    
                    @error('position')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                
                </div>

                <div class="form-group">
                    {!! Form::label('tiene_submenu', 'El menú tiene submenú', ['class' => 'form-label']) !!}
                    <div>
                        <label>
                            {!! Form::radio('tiene_submenu', 'Si', null, ['class' => 'mr-1']) !!}
                            Si
                        </label><br/>
                        <label>
                            {!! Form::radio('tiene_submenu', 'No', null, ['class' => 'mr-1']) !!}
                            No
                        </label>
                    </div>

                    @error('tiene_submenu')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('icon', 'Icono', ['class' => 'form-label']) !!}
                    {!! Form::text('icon', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del icono']) !!}
                    <a target="_blank" href="https://fontawesome.com/v5.15/icons?d=gallery&p=2" class="btn btn-warning">Ver iconos</a>
                    @error('icon')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                <div class="form-group">
                    {!! Form::label('users', 'Listado de usuarios que tendrán acceso al menú', ['class' => 'form-label']) !!}
                    @foreach ($users as $user)
                        <div>
                            <label>
                                {!! Form::checkbox('users[]', $user->id, null, ['class' => 'mr-1']) !!}
                                {{$user->name}}
                            </label>
                        </div>
                    @endforeach
                
                    @error('users')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                
                </div>

                <div align="right">
                    <a href="#" onclick="Salir();" class="btn btn-danger">Cancelar</a>
                    {!! Form::submit('Guardar menú', ['class' => 'btn btn-primary']) !!}
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
        window.location.href = "/menus";
    })
    </script>
@stop