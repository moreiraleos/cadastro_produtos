<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * O caminho para o diretório de recursos.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Registre os serviços de roteamento.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('web')
                 ->group(base_path('routes/web.php'));

            Route::middleware('api')
                 ->prefix('api')
                 ->group(base_path('routes/api.php'));
        });
    }
}
