<?php

namespace Mahmud\GglinkTest;

use Illuminate\Support\ServiceProvider;

class GglinkTestProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views/layout', 'layout');
        $this->loadViewsFrom(__DIR__ . '/views/pages', 'pages');
    }

    public function register()
    {

    }
}
