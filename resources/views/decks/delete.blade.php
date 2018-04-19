@extends ('layouts.master')
@section ('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Are you sure?</h1>
            <p class="lead text-muted">Do you really want to delete the deck: {{$deck->name}}</p>
            <p>

                @if (auth()->check())
                    <a class="btn btn-primary" href="#"
                       onclick="event.preventDefault();
                    document.getElementById('delete-form').submit();">
                        Delete
                    </a>

            <form id="delete-form" action="/my_decks/{{$deck->id}}" method="POST" style="display: none;">
                <button type="submit" class="btn btn-primary">Delete</button>{{ csrf_field() }}{{ method_field('DELETE') }}
            </form>

            <a class="btn btn-secondary" href="/my_decks">Cancel</a>

            @endif

            </p>
        </div>
    </section>


@endsection