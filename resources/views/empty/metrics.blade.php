@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Metrics</div>

                <div class="panel-body">
                  <table>
                    <tbody>
                      <div class="blankslate">
                        <span class="mega-octicon octicon-telescope blankslate-icon"></span>
                        <h3>Looks like we haven't got metrics for this repository...</h3>
                        <p>You may want to <a href="{{ url((explode('?', $_SERVER['REQUEST_URI'], 2))['0']."/sync") }}">sync</a> them...</p>
  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
