@extends ('layouts.master')
@section ('content')

    <section class="jumbotron text-center" style="background-color:#E8F1F2;">
        <div class="container">
            <h1 class="jumbotron-heading">Create a New Card</h1>
            <p class="lead text-muted">A card requires a Question and an Answer.</p>
        </div>
    </section>

    <form action="/my_decks/{{$deck->id}}/card" method="POST">{{ csrf_field() }}
        <div class="form-group">
            <label for="question">Question</label>
            <input type="text" name="question" class="form-control" id="name" placeholder="Enter question">
        </div>
        <div class="form-group">
            <label for="answer">Answer</label>
            <input type="text" name="answer" class="form-control" id="answer" placeholder="Enter answer">
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Card to Deck</button>
        </div>

        @if (count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

    </form>

@endsection