<?php 
namespace App\Controller;

use Norm\Controller\NormController as Controller;
use Norm\Norm;
use Guzzle\Http\Client;

class GitController extends Controller{

    public function read($id)
    {
        $this->data['entry'] = $entry = $this->collection->findOne($id);

        $gits   = explode("com/",$entry['git']);
        $git    = explode("/",$gits['1']);
        
        $client     = new Client('https://api.github.com');
        $request    = $client->get('/repos/'.$gits['1']);
        $response   = $request->send();
        $contents   = $response->getBody();
        
        $content    = json_decode($contents);
        $content    = get_object_vars($content);
        
        $owner      = $content['owner'];
        $owner      = get_object_vars($owner);

        $this->data['content']= $content;
        $this->data['owner']= $owner;
    }
}