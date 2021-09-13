@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
<h4 class="m-0">Editar Rol</h4>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success"><strong>{{session('info')}}</strong></div>
@endif
<div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'put']) !!}

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
                                {!! Form::checkbox('permission[]', $permission->id, $role->hasPermissionTo($permission->id), null, ['class' => 'mr-1']) !!}
                                {{$permission->description}}
                            </label>
                        </div>
                    @endforeach
                
                    @error('permission')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                
                </div>

                <div align="right">
                    <a href="/roles" class="btn btn-danger">Cancelar</a>
                    {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary']) !!}
                </div>
                

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    
@stop