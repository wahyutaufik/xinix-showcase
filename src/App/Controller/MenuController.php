<?php
namespace App\Controller;

use Norm\Norm;

class MenuController extends \Norm\Controller\NormController
{
	public function mapRoute()
	{
		parent::mapRoute();

		$this->map('null/menu', 'menu')->via('GET');
	}
	public function menu(){
		
	}
}