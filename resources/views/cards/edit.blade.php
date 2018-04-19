@extends ('layouts.master')
@section ('content')

    <section class="jumbotron text-center" style="background-color:#E8F1F2;">
        <div class="container">
            <h1 class="jumbotron-heading">Edit Card</h1>
            <p class="lead text-muted">Make changes to your card and then save them.</p>
        </div>
    </section>

    <form action={{ $action }} method="POST">{{ method_field($method) }}{{ csrf_field() }}

        <div class="form-group">
            <label for="question">Question</label>
            <input type="text" key="question" name="question" class="form-control" id="name" placeholder="Enter question">
        </div>

        <div class="form-group">
            <label for="answer">Answer</label>
            <input type="text" key="answer" name="answer" class="form-control" id="answer" placeholder="Enter answer">
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ $submit_text or "Submit" }}</button>
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

    <a class="btn btn-secondary" href="/my_decks/{{$deckId}}/card/{{ $cardId }}/delete">
        Delete
    </a>

@endsection