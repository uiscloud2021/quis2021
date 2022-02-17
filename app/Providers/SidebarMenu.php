<?php

namespace App\Providers;

use App\Providers\ListaMenu;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\User;
use App\Models\Empresas\Empresa;
use Illuminate\Support\Facades\View;

class SidebarMenu
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * @param  ListaMenu  $variable
     * @return void
     */
    public function handle($event)
    {
       $empresa_id = $event->empresa;
        //$empresa_id = $variable->empresa; ListaMenu $variable, 
        $user_id = auth()->id();
        //$empresa_id = 1;
        $menus_sidebar = Menu::whereHas('empresas', function($query) use($empresa_id){
        $query->where('empresa_id', '=', $empresa_id);
        })
        ->whereHas('users', function($query) use($user_id){
            $query->where('user_id', '=', $user_id);
        })->orderBy('position')->get();

            /*foreach ($menus_sidebar as $menu){
                if($menu->tiene_submenu == "Si"){
                    $event->menu->add([
                    'text' => $menu->name, 
                    'route' => 'factibilidad.index',
                    'can'  => 'users.index',]);
                }
            }*/
        //View::share('menus_sidebar', $menus_sidebar);
        
    }
}
