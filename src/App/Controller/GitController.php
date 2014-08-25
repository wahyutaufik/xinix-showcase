<?php 
namespace App\Controller;

use Norm\Controller\NormController as Controller;
use Norm\Norm;
use Guzzle\Http\Client;

class GitController extends Controller{

    public function create()
    {
        $post = $this->request->post();
        $this->createGit();        
    }

    public function createGit()
    {
        if ($this->request->isPost()) {
            try {
                if ($_POST) {
                    $post     = $this->request->post();
                    foreach ($post as $key => $value) {
                        
                    }
                    $gits     = explode("com/",$value);
                    $git      = explode("/",$gits['1']);
                    
                    $client   = new Client('https://api.github.com');
                    $request  = $client->get('/repos/'.$gits['1']);
                    $response = $request->send();
                    $contents = $response->getBody();
                    
                    $content  = json_decode($contents);
                    $content  = get_object_vars($content);
                    
                    $owner    = $content['owner'];
                    $owner    = get_object_vars($owner);
                    $dataGit  = array(
                        'git'         => $post['git'],
                        'author'      => $owner['login'],
                        'repo'        => $content['name'],
                        'description' => $content['description'],
                        'star'        => $content['stargazers_count'],
                        'fork'        => $content['forks_count'],
                    );

                    $git = Norm::factory('Git')->newInstance();
                    $git->set($dataGit);
                    $git->save(array());
                }

                h('notification.info', $this->clazz.' created.');

                h('controller.create.success', array(
                    'model' => $git
                ));

            } catch (\Slim\Exception\Stop $e) {
                throw $e;
            } catch (\Exception $e) {

                h('notification.error', $e);

                h('controller.create.error', array(
                    // 'model' => $git,
                    'error' => $e,
                ));

            }
        }
    }
}