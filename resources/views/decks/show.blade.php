@extends ('layouts.master')
@section ('content')
    <section class="jumbotron text-center" style="background-color:#E8F1F2;">
        <div class="container">
            <h1 class="jumbotron-heading">{{$deck->name}}</h1>
            <p class="lead text-muted">{{$deck->description}}</p>

            <p class="lead text-muted" style="white-space:pre-wrap;">@if($user->id !== auth()->user()->id)<i class="fa fa-user-circle" aria-hidden="true"></i> {{$user->name}}      @endif @if($deck->rating > 0)<span class="badge badge-pill badge-secondary">{{$deck->rating}}</span>  <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> @endif</p>


            <p>
                @if($cards->count()>0)
                    <a href="/my_decks/{{$deck->id}}/card/{{$cards->first()->id}}"  class="btn btn-secondary" style="background-color:#EF6461; border-color:#EF6461;">
                        Begin Training
                    </a>
                    <a href="/my_decks/{{$deck->id}}/card/create"  class="btn btn-secondary">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add Card
                    </a>
                    <a href="/my_decks/{{$deck->id}}/edit" class="btn btn-secondary">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Deck
                    </a>
            </p>
        </div>
    </section>


            <div class="album" style="background-color:#98D9C2; border-radius:1%;">
                <div class="container">

                    <div class="row">

                        @foreach ($cards as $card)

                            <div class="card bg-light mb-3" style="max-width:20rem; margin-right:auto; margin-left:auto;">
                            <a href="/my_decks/{{$deck->id}}/card/{{$card->id}}" style="text-decoration:none;">
                                <div class="card-text" style="text-align: center;">
                                    <div class="card-body" style="background-color:#9BA2FF; border-color:#9BA2FF; color:#f8f9fa; font-size:1.2rem;">
                                        {{ $card->question }}
                                    </div>
                                </div>
                            </a>
                            <div class="card-text" style="text-align: center;">
                                <div class="card-body lead text-muted" style="">
                                    <a class="btn btn-secondary" href="/my_decks/{{$deck->id}}/card/{{$card->id}}/edit">
                                        Edit
                                    </a>
                                </div>
                            </div>
                    </div>
                        @endforeach

                    </div>

                </div>
            </div>
        @else
            <a href="/my_decks/{{$deck->id}}/card/create"  class="btn btn-secondary">
                Add Card
            </a>
            <a href="/my_decks/{{$deck->id}}/edit" class="btn btn-secondary">
                Edit Deck
            </a>
            <p class="lead text-muted">This deck has nothing in it. Add cards to start your training!</p>
        </p>
        @endif
@endsection