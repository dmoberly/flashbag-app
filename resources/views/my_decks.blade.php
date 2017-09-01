@extends ('layouts.master')
@section ('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">My Decks</h1>
            <p>
                <a href="/my_decks/create"  class="btn btn-secondary">New Deck</a>
            </p>
        </div>
    </section>

    <div class="album text-muted">
        <div class="container">

            <div class="row">
            @foreach ($decks as $deck)

                <div class="card">
                    <p class="card-text"><a href="/my_decks/{{$deck->id}}">{{ $deck->name }}</a></p>
                </div>

            @endforeach
            </div>

        </div>
    </div>

@endsection