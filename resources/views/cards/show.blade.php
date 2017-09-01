@extends ('layouts.master')
@section ('content')

    @if($card->count() > 1)
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">{{$card->question}}</h1>
                <p>
                    @if ($previousCard)
                        <a href="/my_decks/{{$deck->id}}/cards/{{$previousCard->id}}" class="btn btn-secondary">Previous</a>
                    @else <a href="/my_decks/{{$deck->id}}" class="btn btn-secondary">Back</a>
                    @endif

                    @if ($nextCard)
                        <a href="/my_decks/{{$deck->id}}/cards/{{$nextCard->id}}" class="btn btn-secondary">Next</a>
                    @endif

                </p>
            </div>
        </section>
        <div class="container">
            <p class="lead text-muted">Hover your mouse here for answer:</p>
            <p class="answer">{{$card->answer}}</p>

        </div>



    @endif

@endsection