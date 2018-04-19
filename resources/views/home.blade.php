@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Hey, {{$user->name}}</div>

                <div class="panel-body">
                    Welcome Back!
                </div>
            </div>
            <a href="/" class="btn btn-info" style="background-color:#EF6461; border-color:#EF6461;">Flashbag</a>
        </div>
    </div>
</div>
@endsection
