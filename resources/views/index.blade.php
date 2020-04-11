@extends ('layout.layout')

@section ('content')

    {{-- Index - Characted Sheet List --}}
    @foreach ($characters as $character)
        <div class="col-md-4">
            <div class="card">
                <img src="/images/char_images/{{ $character->char_name }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $character->name }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. A small river named Duden flows by their place.</p>
                </div>
            </div>
        </div>
    @endforeach

@endsection