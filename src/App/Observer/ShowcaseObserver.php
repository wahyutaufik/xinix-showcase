<?php namespace App\Observer;

use Guzzle\Http\Client;
use Norm\Norm;

class ShowcaseObserver
{
    public function saving($model)
    {
        $model->set($this->getGitData($model->get('git')));
        $model->set('slug', $this->createSlug($model->get('repo')));
    }

    protected function createSlug($repo)
    {
        $counter = (int) Norm::factory('Git')->find(array('repo', $repo))->count();

        $repoName = preg_replace("/[^\da-z]/i", '-', $repo);
        $slug = strtolower($repoName);

        if ($counter > 0) {
            $counter++;

            $slug = strtolower($repoName).'-'.(string) $counter;
        }

        return $slug;
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
}
