<?php namespace App\Controller;

use Bono\Controller\Controller;
use Norm\Norm;

class PackageController extends Controller
{
    public function mapRoute()
    {
        $this->map('/:slug', 'read')->via('GET');
    }

    public function read($slug)
    {
        $entry = Norm::factory('Git')->findOne(array('slug' => $slug));

        if (is_null($entry)) {
            return $this->app->notFound();
        }

        $this->data['entry'] = $entry;
        $this->response->template('git/read');
    }
}
