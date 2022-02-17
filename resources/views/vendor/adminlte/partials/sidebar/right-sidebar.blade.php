<aside class="control-sidebar control-sidebar-{{ config('adminlte.right_sidebar_theme') }}">
    @yield('right-sidebar')

        <div class="tab-content">
            <div class="tab-pane p-3 active" id="messages" role="tabpanel">
                <div class="text-center bg-light text-uppercase">
                    <small><b>Empresas</b></small>
                </div><br/>

            {{--@foreach ($empresas_rightbar as $empresa)
                <div class="message">
                    <div align="center" class="font-weight-bold"><a href="#">{{ $empresa->razon_social }}</a></div>
                </div>
                <hr>
            @endforeach--}}


            </div>
      </div>
</aside>
