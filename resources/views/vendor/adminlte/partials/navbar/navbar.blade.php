<nav class="main-header navbar
    {{ config('adminlte.classes_topnav_nav', 'navbar-expand') }}
    {{ config('adminlte.classes_topnav', 'navbar-white navbar-light') }}">

    {{-- Navbar left links --}}
    <ul class="navbar-nav">
        {{-- Left sidebar toggler link --}}
        @include('adminlte::partials.navbar.menu-item-left-sidebar-toggler')

        {{-- Configured left links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-left'), 'item')

        {{-- Custom left links --}}
        @yield('content_top_nav_left')
        
        {{--
        {!! Form::open(['route' => 'dashboard.store', 'autocomplete' => 'off', 'id'=>'form_emp']) !!}
        {!! Form::select('empresa_navbar', $empresas_navbar, null, ['style' => 'width: 100%; background: transparent; border: none; color:#fff; font-weight: bold;-webkit-appearance: none; -moz-appearance: none; appearance: none; overflow:hidden; cursor:pointer; background-color: #9d2235;', 'id' =>'empresa_navbar', 'onchange' => 'Menu_Empresas(this.value);']) !!}
        {!! Form::close() !!}
        --}}
        {!! Form::text('name_empresa_id', null, ['style' => 'width: 400px; background: transparent; border: none; color:#fff; font-weight: bold;-webkit-appearance: none; -moz-appearance: none; appearance: none; overflow:hidden; cursor:pointer; background-color: #9d2235;', 'id' => 'name_empresa_id', 'disabled'=>'disabled']) !!}
    </ul>

    
    {{-- Navbar right links --}}
    <ul class="navbar-nav ml-auto">
        {{-- Custom right links --}}
        @yield('content_top_nav_right')

        {{-- Configured right links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-right'), 'item')

        {{-- User menu link --}}
        @if(Auth::user())
            @if(config('adminlte.usermenu_enabled'))
                @include('adminlte::partials.navbar.menu-item-dropdown-user-menu')
            @else
                @include('adminlte::partials.navbar.menu-item-logout-link')
            @endif
        @endif

        {{-- Right sidebar toggler link --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.navbar.menu-item-right-sidebar-toggler')
        @endif
    </ul>


</nav>
