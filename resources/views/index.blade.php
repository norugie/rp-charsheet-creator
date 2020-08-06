@extends ( 'layout.layout' )

@section ( 'content' )

    {{-- Index - Character Sheet List --}}
    @foreach ( $characters as $character )
        <div class="col-xxl-2 col-xxl-5 col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <img src="/images/char_images/{{ $character->cover_img }}" class="card-img-top" alt="Character Cover Image">
                <div class="card-body">
                    <h5 class="card-title text-center mb-0">{{ $character->char_name }}</h5>
                    <p class="card-text mt-0 text-center">
                        <a href="/users/{{ $character->username }}" @if ( $character->username === 'anonuser' ) class="disabled" @endif>{{ $character->name }}</a> | {{ $character->published_at->format( 'd M Y' ) }}
                    </p>
                    <p class="card-text justify-content-center">{{ $character->chardesc }}</p>
                    <center><a href="/character/{{ $character->slug }}" class="btn btn-dark">VIEW</a></center>
                </div>
            </div>
        </div>
    @endforeach

@endsection