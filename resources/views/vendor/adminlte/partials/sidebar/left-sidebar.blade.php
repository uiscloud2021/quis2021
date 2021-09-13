<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>


                <li class="nav-item">
                    <a class="nav-link submenu" href="{{ url('/dashboard') }}">
                        <i class="fas fa-fw fa-home"> </i>
                        <p>Inicio</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link submenu" href="{{ url('/home') }}">
                        <i class="fas fa-fw fa-chart-bar"> </i>
                        <p>Estadísiticas</p>
                    </a>
                </li>

                @foreach ($menus_sidebar as $menu)
                    @if($menu->tiene_submenu == "No")
                        <!-- SIN SUBMENU -->
                        <li class="nav-item">
                            <a class="nav-link submenu" href="#">
                                <i class="fas fa-fw fa-{{ $menu->icon }}"> </i>
                                <p>{{ $menu->name }}</p>
                            </a>
                        </li>
                    @else
                        <!-- CON SUBMENU -->
                        <li class="nav-item has-treeview">
                            <a class="nav-link" href="#">
                                <i class="fas fa-fw fa-{{ $menu->icon }} "> </i>
                                <p>{{ $menu->name }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                             @foreach($menu->submenus as $menu_submenu)
                                    @can($menu_submenu->name_permission.'.index')
                                        <li class="nav-item">
                                            <a class="nav-link submenu" href="{{ url('/'.$menu_submenu->name_permission) }}">
                                                @if($menu_submenu->name == "Documentos")
                                                    <i class="fas fa-fw fa-file-pdf"> </i>
                                                @else
                                                    <i class="fas fa-fw fa-edit"> </i>
                                                @endif
                                                    <p>{{ $menu_submenu->name }}</p>
                                            </a>
                                        </li>
                                    @endcan
                             @endforeach
                            </ul>
                        </li>
                    @endif 
                @endforeach


                {{-- Configured sidebar links --}}
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item') 
            </ul>
        </nav>
    </div>
    <script > 
        var submenus = document.getElementsByClassName("nav-link submenu");
        var url = window.location;
        //alert(url);
        /*for(let i = 0; i <= submenus.length; i++){
            if(submenus[i].pathname == url.pathname){
                submenus[i].classList.add("active");
            }
        }*/
    </script>
</aside>
