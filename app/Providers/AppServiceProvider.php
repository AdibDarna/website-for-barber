<?php

namespace App\Providers;

use App\Models\Pesanan;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        view()->composer('*', function (View $view) {
            $pesananNotif = Pesanan::where('status_pesan', 'Process')->get()->take(4);
            $countNotif = Pesanan::where('status_pesan', 'Process')->get();
            $count = $countNotif->count();
            $view->with('pesananNotif',$pesananNotif)->with('countNotif',$count);
        });
    }
}
