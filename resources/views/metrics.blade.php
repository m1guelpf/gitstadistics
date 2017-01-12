@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Metrics</div>
                <div class="panel-body">
                      Repo: {{ $repo->full_name }}<br>
                      Visits: {{ $visits->count }}<br>
                      Clones: {{ $clones->count }}<br>
                      <table id="paths" class="highlight centered responsive-table">
                      <tbody>
                      @foreach ($paths as $path)
                      <tr>
                      <td><a href="https://github.com/{{ $path->path }}" target="_blank">{{ $path->path }}</a></td>
                      <td>{{ $path->count }}   <span class="octicon octicon-person"></span></td>
                      </tr>
                      @endforeach
                      </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
