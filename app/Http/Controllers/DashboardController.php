<?php

namespace App\Http\Controllers;

use App\Metrics;
use App\Repo;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDashboard()
    {
        return 'This is your dashboard!';
    }

    public function reposPage()
    {
        $repos = Repo::where('userid', Auth::user()->id)->get();
        if (count($repos) == 0) {
            return view('empty.repos');
        } else {
            return view('repos')->with('repos', $repos);
        }
    }

    public function repoPage($id)
    {
        $repo = Repo::find($id)->first();
        if (count($repo) == 0) {
            return redirect('404');
        }
        if ($repo->userid != Auth::id()) {
            return redirect('401');
        }
        $metrics = Metrics::where('repoid', $repo->id)->get();
        if (count($metrics) == 0) {
            return view('empty.metrics')->with('repo', $repo);
        } else {
            return '<h1><center>It works!</center></h1>';
        }
    }
}
