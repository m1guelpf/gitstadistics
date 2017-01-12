<?php

namespace App\Http\Controllers;

use App\Metrics;
use App\Repo;
use Auth;
use GrahamCampbell\GitHub\Facades\GitHub;

class GithubController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function syncRepos()
    {
        $this->listRepos();

        return redirect('repos');
    }

    public function listRepos()
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $repos = GitHub::api('repo')->owned();
        $this->storeRepos($repos);
    }

    public function storeRepos($repos)
    {
        foreach ($repos as $repository) {
            if (!Repo::where('id', '=', $repository['id'])->exists()) {
                $owner = $repository['owner'];
                if (Repo::find($repository['id']) == null) {
                    $repo = new Repo();
                    $repo->id = $repository['id'];
                    $repo->name = $repository['name'];
                    $repo->full_name = $repository['full_name'];
                    $repo->owner = $owner['login'];
                    $repo->html_url = $repository['html_url'];
                    $repo->description = $repository['description'];
                    $repo->userid = Auth::id();
                    $repo->save();
                }
            }
        }
    }

    public function syncMetrics($id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $referers = $this->getReferers($id);
        $paths = $this->getPaths($id);
        $views = $this->getViews($id);
        $clones = $this->getClones($id);
        $metrics = new Metrics();
        $metrics->userid = Auth::id();
        $metrics->repoid = $id;
        $metrics->referers = json_encode($referers);
        $metrics->paths = json_encode($paths);
        $metrics->views = json_encode($views);
        $metrics->clones = json_encode($clones);
        $metrics->save();

        return redirect('repo/'.$id);
    }

    public function getReferers($id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $repo = Repo::find($id);

        return Github::api('repo')->traffic()->referers($repo->owner, $repo->name);
    }

    public function getPaths($id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $repo = Repo::find($id);

        return Github::api('repo')->traffic()->paths($repo->owner, $repo->name);
    }

    public function getViews($id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $repo = Repo::find($id);

        return Github::api('repo')->traffic()->views($repo->owner, $repo->name);
    }

    public function getClones($id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $repo = Repo::find($id);

        return Github::api('repo')->traffic()->clones($repo->owner, $repo->name);
    }
}
