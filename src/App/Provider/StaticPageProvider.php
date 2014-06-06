<?php

namespace App\Provider;

class StaticPageProvider extends \Bono\Provider\Provider
{
    public function initialize()
    {
        $app = $this->app;

        $app->get(
            '/',
            function () use ($app) {
                $app->response->template('home');
            }
        );
        $app->get(
            '/menu',
            function () use ($app) {
                $app->response->template('menu');
            }
        );
    }
}
