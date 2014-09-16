<?php namespace App\Provider;

use Norm\Norm;
use Bono\Provider\Provider;

class AppProvider extends Provider
{
    public function initialize()
    {
        $app = $this->app;

        $app->get('/', function () use ($app) {
            $query = $app->request->get('q') ?: '';
            $gits  = Norm::factory('Git')
                ->find()
                ->sort(array('$updated_time' => -1))
                ->match($query)
                ->limit(10);

            $count = Norm::factory('Git')->find()->count();

            $app->response->set('gits', $gits);
            $app->response->set('query', $query);
            $app->response->set('count', $count);
            $app->response->template('home');
            $app->view->setLayout('layout');
        });
    }
}
