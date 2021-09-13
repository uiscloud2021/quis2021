@extends('adminlte::page')

@section('title', 'Submenús')

@section('content_header')
<h4 class="m-0">Editar Submenú</h4>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success"><strong>{{session('info')}}</strong></div>
@endif
<div class="card">
        <div class="card-body">
            {!! Form::model($submenu, ['route' => ['submenus.update', $submenu], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre', ['class' => 'form-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del submenú']) !!}
                
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
                    <p class="font-weight-bold">Menú al que pertenece el submenú</p>
                    @foreach ($menus as $menu)
                        <label class="mr-2">
                            {!! Form::checkbox('menus[]', $menu->id, null) !!}
                            {{$menu->description}}
                        </label><br/>
                    @endforeach
                </div>

                <div class="form-group">
                    {!! Form::label('position', 'Posición en la lista de menús', ['class' => 'form-label']) !!}
                    {!! Form::select('position', ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                
                    @error('position')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                
                </div>

                <div align="right">
                    <a href="/submenus" class="btn btn-danger">Cancelar</a>
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