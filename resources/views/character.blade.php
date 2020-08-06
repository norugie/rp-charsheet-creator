@extends ( 'layout.layout' )

@if( is_null( $character->published_at ) || empty( $character->published_at ) )
    @section ( 'notice' )

        {{-- Character - Notices --}}
        <div class="alert alert-info">
            <div class="container">
                <div class="d-flex">
                    <div class="alert-icon">
                        <i class="ion-ios-information-circle-outline"></i>
                    </div>
                    <p class="mb-0 ml-2"><b>This character is currently not published.</b> You can create an account to author this character or publish this character anonymously.</p>
                </div>
                <center>
                    <button type="button" class="btn btn-outline-info btn-sm">Create an account</button>
                    <a href="/publish/{{ $character->slug }}" class="btn btn-outline-info btn-sm">Publish character</a>
                </center>
            </div>
        </div>

    @endsection
@endif

@section ( 'content' )
    
    {{-- Character - Show Character --}}
    <div class="col-lg-9">
        {{-- Character - Show Character Content --}}
        <h4 class="heading-section">Character Gallery</h4>
        <div class="row">
            @foreach ( $images as $image )
                <div class="col-md-4">
                    <div class="card">
                        <img src="/images/char_images/{{ $image->char_filename }}" class="card-img-top" alt="...">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-lg-3">
        {{-- Character - Show Character Sidebar --}}
        <h4 class="heading-section">Author</h4>
        <div class="row">
            <div class="col-lg-3">
                <img src="/images/user_images/default.png" alt="User Profile Image" class="img-fluid mx-auto">
            </div>
            <div class="col-lg-9">
                <h3 class="heading-section">
                    <small>{{ $author->name }}</small>
                </h3>
            </div>
        </div>
        <hr>
        <h6 class="heading-section mb-3">
            <small> View other works by @if ( $author->username === 'anonuser' ) anonymous users @else <a href="/users/{{ $author->username }}">{{ $author->name }}</a> @endif</small>
        </h6>
        @foreach( $works as $work )
            <div class="row mb-2 mt-2">
                <div class="col-lg-3">
                    <img src="/images/char_images/{{ $work->cover_img }}" class="img-fluid mx-auto" alt="Character Cover Image">
                </div>
                <div class="col-lg-9">
                    <h3 class="heading-section">
                        <small><a href="/character/{{ $work->slug }}">{{ $work->char_name }}</a></small>
                    </h3>
                    <p></p>
                </div>
            </div>
        @endforeach
        <center><a href="/users/{{ $author->username }}" class="btn btn-dark btn-lg btn-block">VIEW OTHER WORKS</a></center>
    </div>

@endsection