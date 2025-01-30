<?php

namespace App\Views\Composers;

class MenuComposer {
    public function compose($view) {
        $menu = [
            'Home' => '/',
            'About'=> '/about',
            'Contact'=> '/contact',
        ];

        // contohnya ini, kita bisa buat pengkondisian
        $authenticated = true;

        if ($authenticated) {
            $menu = array_merge($menu, [
                'Logout' => '/Logout',
                'Profile'=> '/profile',
                'Dashboard'=> '/dashboard',
            ]);
        }

        $view->with('menu', $menu);
    }
}
