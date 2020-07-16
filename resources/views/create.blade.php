@extends ( 'layout.layout' )

@section ( 'header' )
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/js/dropzone/dist/min/dropzone.min.css">  
@endsection

@section ( 'content' )

    {{-- Character - Create Character --}}
    <div class="col-lg-12">
        <p class="font-12"><b>Note:</b> Fields marked with an asterisk are required</p>
        <form class="needs-validation" action="/create" method="POST" novalidate>
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <label class="label-emphasis" for="charname">Character Name *</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ion-ios-person"></i>
                            </span>
                        </div>
                        <input type="text" id="charname" name="charname" class="form-control clear-border" required>
                        <div class="invalid-feedback">Something is wrong with your input</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <label class="label-emphasis" for="apparent_age">Apparent Age *</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ion-ios-glasses"></i>
                            </span>
                        </div>
                        <input type="number" min="1" id="apparent_age" name="apparent_age" class="form-control clear-border" required>
                        <div class="invalid-feedback">Something is wrong with your input</div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <label class="label-emphasis" for="age">Age</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ion-ios-calendar"></i>
                            </span>
                        </div>
                        <input type="number" min="1" id="age" name="age" class="form-control clear-border">
                        <p class="font-12 small"><b>Note:</b> Leaving this empty will automatically set the apparent age as your character's actual age</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <label class="label-emphasis" for="gender_select">Gender</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ion-ios-transgender"></i>
                            </span>
                        </div>
                        <select id="gender_select" name="gender_select" class="form-control clear-border custom-select">
                            <option hidden value="Male">Gender options</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Non-binary">Non-binary</option>
                            <option value="custom">[ Other ]</option>
                        </select><input type="text" id="gender_custom" name="gender_custom" class="form-control clear-border" style="display: none;" disabled="disabled" placeholder="Specify your character's gender">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <label class="label-emphasis" for="sexuality_select">Sexuality</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ion-ios-heart"></i>
                            </span>
                        </div>
                        <select id="sexuality_select" name="sexuality_select" class="form-control clear-border custom-select">
                            <option hidden value="Straight">Sexuality Options</option>
                            <option value="Straight">Straight</option>
                            <option value="Bisexual">Bisexual</option>
                            <option value="Homosexual">Homosexual</option>
                            <option value="Pansexual">Pansexual</option>
                            <option value="Demisexual">Demisexual</option>
                            <option value="Asexual">Asexual</option>
                            <option value="custom">[ Other ]</option>
                        </select><input type="text" id="sexuality_custom" name="sexuality_custom" class="form-control clear-border" style="display: none;" disabled="disabled" placeholder="Specify your character's sexuality">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label for="chardesc" style="font-weight:bold;">Short Character Introduction</label>
                    <textarea id="chardesc" name="chardesc" class="form-control clear-border-textarea" row="5"></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <label class="label-emphasis" for="info">Character Information</label>
                    <textarea id="info" name="info" class="form-control clear-border-textarea editor"></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <label class="label-emphasis" for="info">Character Gallery</label>
                    <div id="dropzone-gallery" class="dropzone">
                        <div class="dz-default dz-message"><h3>Drop images here or click to upload</h3></div>
                    </div>
                    <input type="text" id="image_name" name="image_name" value="">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-dark btn-lg btn-block" value="submit">SUBMIT NEW CHARACTER</button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section ( 'scripts' )

    {{-- Character - Additional Page Scripts --}}

    <script src="/js/tinymce/tinymce.min.js"></script>
    <script src="/js/dropzone/dist/min/dropzone.min.js"></script>
    <script src="/js/editor.js"></script>
    <script src="/js/dropzone.js"></script>
    <script src="/js/character.js"></script>
    
@endsection