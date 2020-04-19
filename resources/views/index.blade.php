@extends ('layout.layout')

@section ('content')

    {{-- Index - Characted Sheet List --}}
    @foreach ($characters as $character)
        <div class="col-md-4">
            <div class="card">
                <img src="/images/char_images/{{ $character->char_name }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $character->name }}</h5>
                    <p class="card-text">{{ $character->chardesc }}</p>
                </div>
            </div>
        </div>
    @endforeach

@endsection