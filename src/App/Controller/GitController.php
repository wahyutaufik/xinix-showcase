<?php namespace App\Controller;

use Norm\Controller\NormController as Controller;
use Norm\Norm;
use Guzzle\Http\Client;
use Slim\Exception\Stop;
use Exception;

class GitController extends Controller
{
    public function create()
    {
        $post = $this->request->post();
        $this->createGit();
    }

    public function update($id)
    {
        try {
            $entry = $this->collection->findOne($id);

            if (is_null($entry)) {
                return $this->app->notFound();
            }
        } catch (Exception $e) {
            // Silence is gold
        }

        if ($this->request->isPost() || $this->request->isPut()) {
            try {
                $model = $entry;

                $dataGit  = $this->getGitData($this->request->post('git'));

                $model->set($dataGit)->save();

                $entry = $model;

                h('notification.info', $this->clazz.' updated');

                h('controller.update.success', array(
                    'model' => $model,
                ));
            } catch (Stop $e) {
                throw $e;
            } catch (Exception $e) {
                h('notification.error', $e);

                if (empty($model)) {
                    $model = null;
                }

                h('controller.update.error', array(
                    'error' => $e,
                    'model' => $model,
                ));
            }
        }

        $this->data['entry'] = $entry;
    }

    protected function getReadme($repo)
    {
        $client   = new Client('https://api.github.com');
        $client->setSslVerification(false);
        $request  = $client->get('/repos/'.$repo.'/readme');
        $response = $request->send();
        $contents = json_decode($response->getBody(), true);

        return (isset($contents['content'])) ? $contents['content'] : null;
    }

    protected function getGitData($git)
    {
        $client   = new Client('https://api.github.com');

        $client->setSslVerification(false);

        $request  = $client->get('/repos/'.$git);
        $response = $request->send();
        $contents = $response->getBody();

        $content  = json_decode($contents);
        $content  = get_object_vars($content);

        $owner    = $content['owner'];
        $owner    = get_object_vars($owner);
        $dataGit  = array(
            'git'         => $git,
            'author'      => $owner['login'],
            'repo'        => $content['name'],
            'description' => $content['description'],
            'star'        => $content['stargazers_count'],
            'fork'        => $content['forks_count'],
            'readme'      => $this->getReadme($git),
        );

        return $dataGit;
    }

    public function createGit()
    {
        if ($this->request->isPost()) {
            try {
                $git      = $this->data['git'] = $this->request->post('git');
                $dataGit  = $this->getGitData($git);

                $git = Norm::factory('Git')->newInstance();
                $git->set($dataGit);
                $git->save(array());

                h('notification.info', $this->clazz.' created.');

                h('controller.create.success', array(
                    'model' => $git
                ));

            } catch (Stop $e) {
                throw $e;
            } catch (Exception $e) {
                h('notification.error', $e);

                h('controller.create.error', array(
                    'error' => $e,
                ));
            }
        }
    }
}
