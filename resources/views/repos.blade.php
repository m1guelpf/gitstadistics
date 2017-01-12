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
                      @foreach ($repos as $repo)
                      <div id="{{ $repo->id }}" class="repo">
                        <span class="octicon octicon-repo"></span>
                        <a href="{{ url('repo').'/'.$repo->id }}" style="cursor:pointer">{{ $repo->full_name }}</a>
                      </div>
                      @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
