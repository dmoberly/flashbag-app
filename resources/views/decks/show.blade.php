@extends ('layouts.master')
@section ('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">{{$deck->name}}</h1>
            <p class="lead text-muted">{{$deck->description}}</p>
            <p>
                <a href="/my_decks/{{$deck->id}}/cards/{{$cards->first()->id}}"  class="btn btn-primary">Begin Training</a>
                <a href="/my_decks/{{$deck->id}}/cards/create"  class="btn btn-secondary">Add Card</a>

            </p>
        </div>
    </section>


        @if($cards->count()>1)

            <div class="album text-muted">
                <div class="container">

                    <div class="row">

                        @foreach ($cards as $card)

                            <div class="card">
                                <p class="card-text">{{$card->question}}</p>
                            </div>

                        @endforeach

                    </div>

                </div>
            </div>
        @endif

@endsection