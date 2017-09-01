@extends ('layouts.master')
@section ('content')
    <section class="jumbotron text-center">
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

            <button type="submit" class="btn btn-primary">Create New Deck</button>
        </form>
@endsection