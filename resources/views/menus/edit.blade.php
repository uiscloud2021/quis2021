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
                    <a href="/menus" class="btn btn-danger">Cancelar</a>
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