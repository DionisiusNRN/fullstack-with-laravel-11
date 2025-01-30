<?php

namespace App\Providers;

use App\Views\Composers\MenuComposer;
use Illuminate\Support\Facades\View;
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
        // // key 'menu' dapat digunakan di file apapun
        // View::share('menu', [
        //     'Home' => '/',
        //     'About'=> '/about',
        //     'Contact'=> '/contact',
        // ]);

        // // view composer memberikan kita fitur dapat mennetukan page mana bisa menggunakan data menu
        // View::composer(['movies.index', 'movies.show'], function ($view) {

        // ini artinya bisa digunbakan di semua page *
        View::composer('*', MenuComposer::class); // composer memungkinkan kita membuat datanya jadi lebih kompleks

    }
}
