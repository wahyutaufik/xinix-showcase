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
            $query = $app->request->get('q') ?: null;
            $gits = Norm::factory('Git')
                ->find()
                ->sort(array('$updated_time' => -1))
                ->match($query)
                ->limit(10);

            $count = Norm::factory('Git')->find()->count();
            
            $entry['gits'] = $gits;

            if (is_null($query)) {
                $query = '';
            }

            $app->response->set('gits', $gits);
            $app->response->set('query', $query);
            $app->response->set('count', $count);
            $app->response->template('home');
            $app->view->setLayout('layout');
        });
    }
}