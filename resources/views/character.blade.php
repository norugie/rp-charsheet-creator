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
                    <a href="/publish/{{ $character->slug }}"><button type="button" class="btn btn-outline-info btn-sm">Publish character</button></a>
                </center>
            </div>
        </div>

    @endsection
@endif

@section ( 'content' )
    
    {{-- Character - Show Character --}}
    <h3>{!! $character->info !!}</h3>
    <h5>{{ $author->name }}</h5>
    <br>
    @foreach ( $images as $image )
        <div class="col-md-3">
            <div class="card">
                <img src="/images/char_images/{{ $image->char_filename }}" class="card-img-top" alt="...">
            </div>
        </div>
    @endforeach

@endsection