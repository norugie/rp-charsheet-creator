@extends ('layout.layout')

@section ('content')

    {{-- Index - Characted Sheet List --}}
    @foreach ($characters as $character)
        <h4>{{ $character->name }}</h4>
    @endforeach

@endsection