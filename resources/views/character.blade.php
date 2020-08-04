@extends ( 'layout.layout' )

@section ( 'content' )

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
                <button type="button" class="btn btn-outline-info btn-sm">Publish character anonymously</button>
            </center>
        </div>
    </div>
    
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