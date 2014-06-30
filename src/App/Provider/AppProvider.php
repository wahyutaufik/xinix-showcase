<?php

namespace App\Provider;

use \Bono\Helper\URL;
use \Norm\Norm;

class AppProvider extends \Bono\Provider\Provider
{
    public function initialize()
    {
        $app = $this->app;

        $app->get('/', function () use ($app) {
            $gits = \Norm::factory('Git')->find()->sort(array('$updated_time'=>-1))->limit(10);
            $entry['gits'] = $gits;

            $app->response->set('gits', $gits);
            $app->response->template('home');
            $app->view->setLayout('layout');
            // var_dump($gits->toArray());
            // exit;
        });
    }
}