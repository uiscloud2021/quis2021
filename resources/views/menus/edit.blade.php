@extends('adminlte::page')

@section('title', 'Menús')

@section('content_header')
<h4 class="m-0">Editar Menú</h4>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success"><strong>{{session('info')}}</strong></div>
@endif
<div class="card">
        <div class="card-body">
            {!! Form::model($menu, ['route' => ['menus.update', $menu], 'method' => 'put']) !!}

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
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Usuarios que tendrán acceso al menú</p>
                    @foreach ($users as $user)
                        <label class="mr-2">
                            {!! Form::checkbox('users[]', $user->id, null) !!}
                            {{$user->name}}
                        </label><br/>
                    @endforeach
                </div>

                <div align="right">
                    <a href="/menus" class="btn btn-danger">Cancelar</a>
                    {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary']) !!}
                </div>
                

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop