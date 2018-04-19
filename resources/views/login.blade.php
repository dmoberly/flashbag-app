<!--
@extends ('layouts.master')
@section ('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Login</h1>
            <p class="lead text-muted">Enter your Email and Password to login.</p>
        </div>
    </section>

    <form>
        <div action="/login" class="form-group" method="GET">{{csrf_field()}}
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">

        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input">
                Remember me
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

@endsection-->