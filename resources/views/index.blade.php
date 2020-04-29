@extends ('layout.layout')

@section ('content')

    {{-- Index - Character Sheet List --}}
    @foreach ($characters as $character)
        <div class="col-md-3">
            <div class="card">
                <img src="/images/char_images/{{ $character->char_filename }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center mb-0">{{ $character->char_name }}</h5>
                    <p class="card-text mt-0 text-center">
                        @if ( $character->username != 'anonuser' )
                            <a href="/users/{{ $character->username }}">{{ $character->name }}</a>
                        @else {{ $character->name }} @endif | {{ $character->created_at->format('d M Y') }}
                    </p>
                    <p class="card-text">{{ $character->chardesc }}</p>
                    <center><a href="/character/{{ $character->slug }}" class="btn btn-dark">VIEW</a></center>
                </div>
            </div>
        </div>
    @endforeach

@endsection