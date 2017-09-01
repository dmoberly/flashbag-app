@extends ('layouts.master')
@section ('content')

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Create a New Card</h1>
            <p class="lead text-muted">A card requires a Question and an Answer.</p>
        </div>
    </section>

    <form action="/my_decks/{{$deck->id}}/cards" method="POST">{{ csrf_field() }}
        <div class="form-group">
            <label for="question">Question</label>
            <input type="question" class="form-control" id="name" placeholder="Enter question">
        </div>
        <div class="form-group">
            <label for="answer">Answer</label>
            <input type="answer" class="form-control" id="answer" placeholder="Enter answer">
        </div>

        <button type="submit" class="btn btn-primary">Add Card to Deck</button>
    </form>

@endsection