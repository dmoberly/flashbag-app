@extends ('layouts.master')
@section ('content')
    <section class="jumbotron text-center" style="background-color:#E8F1F2;">
        <div class="container">
            <h1 class="jumbotron-heading">My Decks</h1>
            <p>
                <a href="/my_decks/create"  class="btn btn-secondary">New Deck</a>
            </p>
        </div>
    </section>

    <div class="album" style="background-color:#98D9C2; border-radius:1%;">
        <div class="container">

            <div class="row">
            @foreach ($decks as $deck)
                <div class="card bg-light mb-3" style="max-width:20rem; margin-right:auto; margin-left:auto;">
                    <a href="/my_decks/{{ $deck->id}} " style="text-decoration:none;">
                    <div class="card-text" style="text-align: center;">
                        <div class="card-body" style="background-color:#EF6461; border-color:#EF6461; color:#f8f9fa; font-size:1.2rem;">
                            {{ $deck->name }}
                        </div>
                    </div>
                    </a>
                    <div class="card-text" style="text-align: center;">
                        <div class="card-body lead text-muted" style="">
                            {{ $deck->description }}
                        </div>
                    </div>
                </div>

            @endforeach
            </div>

        </div>
    </div>



@endsection