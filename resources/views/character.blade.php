@extends ('layout.layout')

@section ('content')

    {{-- Character - Create Character --}}

    <h3>{{ $character->info }}</h3>
    <h5>{{ $author->name }}</h5>
    <br>
    @foreach ($images as $image)
        <div class="col-md-3">
            <div class="card">
                <img src="/images/char_images/{{ $image->char_filename }}" class="card-img-top" alt="...">
            </div>
        </div>
    @endforeach

@endsection