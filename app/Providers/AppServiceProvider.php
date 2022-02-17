<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\User;
use App\Models\Empresas\Empresa;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Mandando todos los menus a todas las vistas existentes
        view()->composer('*', function ($view) {
            //$empresa_id=1;
            $user_id = auth()->id();
            if($user_id!=null){
                $empresas = Empresa::whereHas('users', function($query) use($user_id){
                    $query->where('user_id', '=', $user_id);
                })->orderBy('id')->first();

                $empresa_id = $empresas->id;
                $globalempresa_id=$empresa_id;

                $menus_sidebar = Menu::whereHas('empresas', function($query) use($empresa_id){
                $query->where('empresa_id', '=', $empresa_id);
                })
                ->whereHas('users', function($query) use($user_id){
                    $query->where('user_id', '=', $user_id);
                })->orderBy('position')->get();

                $empresas_navbar = Empresa::whereHas('users', function($query) use($user_id){
                    $query->where('user_id', '=', $user_id);
                })->orderBy('id')->pluck('razon_social', 'id');
                //MENU RIGHT
                $empresas_rightbar = Empresa::whereHas('users', function($query) use($user_id){
                    $query->where('user_id', '=', $user_id);
                })->orderBy('id')->get();

                //dd ($user_id);//MOSTRAR EN CONSOLA RESULTADOS
                
                if (!session()->has('id_empresa')) {
                    session(['id_empresa' => $globalempresa_id]);
                }
                //session(['menus_sidebar' => $menus_sidebar]);
                // $view->with(compact('menus_sidebar', 'empresas_navbar', 'empresas_rightbar', 'globalempresa_id'));
                $view->with(compact('empresas_navbar', 'empresas_rightbar', 'globalempresa_id'));
            }
        });

        Schema::defaultStringLength(191);
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }
    }
}
