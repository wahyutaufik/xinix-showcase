<?php 
namespaace App\Controller;

use Bono\Controller\Controller;
use Norm\Norm;

class PostController extends Controller{
	public function mapRoute()
    {
        $this->map('/', 'auth')->via('POST');
    }
    public function auth()
    {
    	$input 		= $this->request->post();
    	$connection = Norm::factory('Git');
    	$git       	= $connection->findOne(array('git' => @$input['git']));
    	var_dump($git);exit;
    }
}