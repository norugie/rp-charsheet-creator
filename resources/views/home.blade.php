@extends ( 'layout.layout' )

@section ( 'content' )


    You are logged in! 

    <a  href="/logout"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            Logout
    </a>

    <form id="logout-form" action="/logout" method="POST" style="display: none;">
        @csrf
    </form>

@endsection
