<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Repo;

class DashboardController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

    public function showDashboard(){
      return "This is your dashboard!";
    }

    public function showPage($page){
      if ($page == 'repos'){
        return $this->reposPage();
      }
    }

    public function reposPage(){
      $repos = Repo::where('userid', Auth::user()->id)->get();
      if (count($repos) == 0) {
        return view('empty');
      } else {
        return view('repos')->with('repos', $repos);
      }
    }
}
