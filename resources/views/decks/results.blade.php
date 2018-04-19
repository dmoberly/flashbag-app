@extends ('layouts.master')
@section ('content')
    <section class="jumbotron text-center" style="background-color:#E8F1F2;">
        <div class="container">
            <h1 class="jumbotron-heading">Well Done!</h1>
            <p class="lead text-muted">Here are your results</p>

            <p class="lead text-muted" style="white-space:pre-wrap;">@if($user->id !== auth()->user()->id)<i class="fa fa-user-circle" aria-hidden="true"></i> {{$user->name}}      @endif @if($deck->rating > 0)<span class="badge badge-pill badge-secondary">{{$deck->rating}}</span>  <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> @endif</p>


            <p>

                <a href="/my_decks/{{$deck->id}}/card/{{$cards->first()->id}}"  class="btn btn-secondary">
                    Train Again
                </a>
                <a href="/my_decks/{{$deck->id}}"  class="btn btn-secondary">
                    Back to Deck
                </a>


            </p>
        </div>
    </section>

    @if($cards->count()>0)
        <div class="album" style="background-color:#98D9C2; border-radius:1%;">
            <div class="container">

                <div class="row">

                    @foreach ($cards as $card)

                        <div class="card bg-light mb-3" style="max-width:20rem; margin-right:auto; margin-left:auto;">
                            <a href="/my_decks/{{$deck->id}}/card/{{$card->id}}" style="text-decoration:none;">
                                <div class="card-text" style="text-align: center;">

                                    <div class="card-body bg-success" style="border-color:#EF6461; color:#f8f9fa; font-size:1.2rem;">
                                        {{ $card->question }}
                                    </div>

                                </div>
                            </a>

                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    @endif
@endsection