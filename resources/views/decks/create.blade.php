@extends ('layouts.master')
@section ('content')
    <section class="jumbotron text-center" style="background-color:#E8F1F2;">
        <div class="container">
            <h1 class="jumbotron-heading">Create a New Deck</h1>
            <p class="lead text-muted">Give it a name and a brief description.</p>
        </div>
    </section>

        <form action="/my_decks" method="POST">{{ csrf_field() }}

            <div class="form-group">
                <label for="name">Deck Name</label>
                <input type="name" name="name" class="form-control" id="name" placeholder="Enter name">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="description" name="description" class="form-control" id="description" placeholder="Enter description">
            </div>

            <div class="form-check">
                <label class="form-check-label">
                    <input name="is_private" type="checkbox" class="form-check-input" value="1" checked>
                    Private
                </label>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Unckeck to allow this deck to be voted on and shared.
                </small>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create New Deck</button>
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