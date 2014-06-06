<?php 
namespace App\Controller;

use Bono\Controller\Controller;
use Norm\Norm;

class GitController extends Controller{
	public function mapRoute()
    {
    	$this->map('/', 'index')->via('GET');
    	$this->map('/:id', 'read')->via('GET');
    }
    public function index()
    {
    	
    }
    public function read()
    {
    	
    }
}