@extends ('layouts.master')
@section ('content')

    @if($card->count() > 1)
        <section class="jumbotron text-center" style="background-color:#E8F1F2;">
            <div class="container">
                <h1 class="jumbotron-heading">{{$card->question}}</h1>
                <hr>
                <div class="collapse" id="collapseExample">
                    <h1 class="jumbotron-heading" style="text-align:center;">
                        {{$card->answer}}
                    </h1>
                    <br>
                    <a href="/my_decks/{{$deck->id}}/card/{{$card->id}}/toggle-review" class="btn btn-secondary">Review Later</a>

                </div>
            </div>
        </section>
        <div style="text-align: center;">




            <p>

                @if ($previousCard)
                    <a href="/my_decks/{{$deck->id}}/card/{{$previousCard->id}}" class="btn btn-secondary">Last</a>
                @endif
                <a class="btn btn-secondary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="background-color:#98D9C2; border: 2px solid #ADACB5;">
                    Show Answer
                </a>
                @if ($nextCard)
                    <a href="/my_decks/{{$deck->id}}/card/{{$nextCard->id}}" class="btn btn-secondary">Next</a>
                @else
                    <a href="/my_decks/{{$deck->id}}/results" class="btn btn-secondary">Finish</a>
                @endif



            </p>


            <a href="/my_decks/{{$deck->id}}" class="btn btn-secondary">Exit</a>
        </div>


    @endif

@endsection