@extends ('layouts.master')
@section ('content')

    <section class="jumbotron text-center" style="background-color:#E8F1F2;">
        <div class="container">
            <h1 class="jumbotron-heading">Flash Bag</h1>
            <p class="lead text-muted">It's a flash card app!</p>
            <p>
                @if (auth()->check())

                @else
                    <a href="/login" class="btn btn-primary">Login</a>
                    <a href="/register" class="btn btn-secondary">Sign Up!</a>
                @endif

            </p>
        </div>
    </section>


    <div class="album" style="background-color:#98D9C2; border-radius:1%;">
        <div class="container">

            <div class="row">

                @foreach ($decks as $deck)

                    @if (!$deck->is_private)
                        <div class="card bg-light mb-3" style="max-width:20rem; margin-right:auto; margin-left:auto;">
                            <a href="/my_decks/{{$deck->id}}" style="text-decoration:none;">

                            <div class="card-header  text-white" style="background-color: #9BA2FF;">{{$deck->rating}} likes</div>

                            <div class="card-body">
                                <h4 class="card-title" style="color:#212529;">{{$deck->name}}</h4>
                                <p class="card-text text-muted">{{$deck->description}}</p>
                            </div>

                            </a>
                        </div>
                    @endif
                @endforeach

            </div>

        </div>
    </div>
@endsection