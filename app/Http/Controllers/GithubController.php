<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Repo;
use Auth;
use GrahamCampbell\GitHub\Facades\GitHub;

class GithubController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sync(){
      $this->syncRepos();
      return redirect('dashboard');
    }

    public function getNotifications()
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $notifications = GitHub::api('notification')->all();
        $this->storeNotifications($notifications);
        $this->storeRepos($notifications);

        return redirect('notifications');
    }

    public function syncRepos()
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
                    $repo->userid = Auth::user()->id;
                    $repo->save();
                }
            }
        }
    }
}
