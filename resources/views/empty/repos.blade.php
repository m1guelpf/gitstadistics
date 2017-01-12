@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Repositories</div>

                <div class="panel-body">
                  <table>
                    <tbody>
                      <div class="blankslate">
                        <span class="mega-octicon octicon-repo blankslate-icon"></span>
                        <h3>Looks like you haven't got any repositories</h3>
                        <p>You may have to <a href="{{ url('repos/sync') }}">sync</a> them...</p>
  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
