<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Flash Bag</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="/css/album.css" rel="stylesheet">
</head>

<body style="background-color:#E8F1F2;">


<div class="navbar navbar-dark bg-dark">
    <a href="/" class="btn btn-info" style="background-color:#EF6461; border-color:#EF6461;">Flashbag</a>
    @if (auth()->check())
    <div class="dropdown">

        <div class="btn-group">
            <button type="button" class="btn btn-secondary" style="background-color:#EF6461; border-color:#EF6461;"><a href="/my_decks" style="color:white; text-decoration:none;">My Decks</a></button>
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:#EF6461; border-color:#EF6461;">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" style="text-align:center;">
                @foreach (App\Models\Deck::where('user_id', auth()->user()->id)->get() as $deck)

                    <li><a href="/my_decks/{{$deck->id}}" style="color:grey; text-decoration:none;">{{$deck->name}}</a></li>

                @endforeach
            </ul>
        </div>

    </div>
    @endif
    <div>
        @if (auth()->check())
            <a class="btn btn-secondary" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="background-color:#EF6461; border-color:#EF6461;">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endif
    </div>
</div>

<div class="container">
    @yield('content')
</div>

@include('layouts.footer')


</body>
</html>
