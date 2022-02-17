<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\User;
use App\Models\Empresas\Empresa;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        /*ListaMenu::class =>[
            SidebarMenu::class,
        ],*/

        ListaMenu::class => [
            SidebarMenu::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event){
            $user_id = auth()->id();

            $empresasUsuario = Empresa::whereHas('users', function($query) use($user_id){
                $query->where('user_id', '=', $user_id);
            })->orderBy('id')->get();

            foreach ($empresasUsuario as $empresas) {
                if ($empresas->id == session('id_empresa')) {
                    $empresa_id = $empresas->id;
                    
                    $menus_sidebar = Menu::whereHas('empresas', function($query) use($empresa_id){
                    $query->where('empresa_id', '=', $empresa_id);
                    })
                    ->whereHas('users', function($query) use($user_id){
                        $query->where('user_id', '=', $user_id);
                    })->orderBy('position')->get();

                    
                    foreach($menus_sidebar as $menu){
                        $arrayMenu = array('text' => '', 'url' => '', 'icon' => '', 'active' => '', 'can' => '');
                        
                        if($menu->tiene_submenu == "Si"){
                            foreach($menu->submenus as $menu_submenu){
                                if($menu_submenu->name == "Documentos"){
                                    $arrayMenu[] = array(
                                        'text' => $menu_submenu->name,
                                        'url'  => '/'.$menu_submenu->name_permission,
                                        'icon' => 'fas fa-fw fa-file-pdf',
                                        'active' => [$menu_submenu->name_permission.'*'],
                                        'can'  => $menu_submenu->name_permission.'.index',
                                    );
                                }else{
                                    $arrayMenu[] = array(
                                        'text' => $menu_submenu->name,
                                        'url'  => '/'.$menu_submenu->name_permission,
                                        'icon' => 'fas fa-fw fa-edit',
                                        'active' => [$menu_submenu->name_permission.'*'],
                                        'can'  => $menu_submenu->name_permission.'.index',
                                    );
                                }
                            }
                            $event->menu->addBefore('Admin',[
                                'key' => $menu->name, 
                                'text' => $menu->name, 
                                'icon' => 'fas fa-fw fa-'.$menu->icon,
                                'submenu' => $arrayMenu,
                            ]);
                        }else{
                            $event->menu->add([
                                'key' => $menu->name,
                                'text' => $menu->name, 
                                'route' => '',
                                'icon' => 'fas fa-fw fa-'.$menu->icon,
                                'can'  => '',
                            ]);
                        }
                    }

                }
            }
        });
    }
}
