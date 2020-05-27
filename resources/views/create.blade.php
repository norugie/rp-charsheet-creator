@extends ('layout.layout')

@section ('content')

    {{-- Character - Create Character --}}
    <div class="col-lg-12">
        <form action="/create" method="POST">
            <div class="row">
                <div class="col-lg-10">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ion-ios-contact"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control clear-border" placeholder="First Name...">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ion-ios-contact"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control clear-border" placeholder="First Name...">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <textarea class="tinymce_editor">Next, use our Get Started docs to setup Tiny!</textarea>

@endsection

@section ('scripts')

    {{-- Character - Additional Page Scripts --}}

    <script src="/js/tinymce/tinymce.min.js"></script>
    <script src="/js/editor.js"></script>
    
@endsection