@extends ('layouts.master')
@section ('content')

    <section class="jumbotron text-center" style="background-color:#E8F1F2;">
        <div class="container">
            <h1 class="jumbotron-heading">Edit Deck</h1>
            <p class="lead text-muted">Make changes to your deck and then save it.</p>
        </div>
    </section>

    <form action={{ $action }} method="POST">{{ method_field($method) }}{{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" key="name" name="name" class="form-control" id="name" value="{{ old('name', $deck->name) }}" placeholder="Enter name">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" key="description" name="description" class="form-control" id="description" value="{{ old('description', $deck->description) }}" placeholder="Enter description">
        </div>

        <div class="form-check">
            <label class="form-check-label">
                <input key="is_private" name="is_private" type="checkbox" class="form-check-input" value="1" {{ $deck->is_private ? 'checked' : '' }}>
                Private
            </label>
            <small class="form-text text-muted">
                Unckeck to allow this deck to be voted on and shared.
            </small>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ $submit_text or "Submit" }}</button>
        </div>



        @if (count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

    </form>

    <a class="btn btn-secondary" href="/my_decks/{{ $deckId }}/delete">
        Delete
    </a>

@endsection