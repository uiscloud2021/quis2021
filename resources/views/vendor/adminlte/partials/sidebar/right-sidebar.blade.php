<aside class="control-sidebar control-sidebar-{{ config('adminlte.right_sidebar_theme') }}" >
    @yield('right-sidebar')

        <div class="tab-content" >
            <div class="tab-pane p-3 active"   >
                <div class="text-center bg-light text-uppercase">
                    <small><b>Empresas</b></small>
                </div><br/>

            {!! Form::open(['route' => 'dashboard.store', 'autocomplete' => 'off', 'id'=>'form_emp']) !!}
            @foreach ($empresas_rightbar as $empresa)
            <div class="tab-pane p-3 active" id="messages" role="tabpanel" >
                <div class="message">
                    <div align="center" class="font-weight-bold"><a href="#" onclick="Menu_Empresas({{$empresa->id}});">{{ $empresa->razon_social }}</a></div>
                </div>
                <hr>
            </div>
            @endforeach
            {!! Form::hidden('empresa_navbar', null, ['class' => 'form-control', 'id' => 'empresa_navbar']) !!}
            {!! Form::close() !!}
            <br/>
            </div>
      </div>
</aside>
