@extends ('layout.layout')

@section ('content')

    {{-- Character - Create Character --}}
    <div class="col-lg-12">
        <form action="/create" method="POST">
            <div class="row">
                <div class="col-lg-12">
                    <label class="label-emphasis" for="charname">Character Name</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ion-ios-contact"></i>
                            </span>
                        </div>
                        <input type="text" id="charname" name="charname" class="form-control clear-border" required>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <label class="label-emphasis" for="age">Age</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ion-ios-contact"></i>
                            </span>
                        </div>
                        <input type="number" min="1" id="age" name="age" class="form-control clear-border" required>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <label class="label-emphasis" for="apparent_age">Apparent Age</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ion-ios-contact"></i>
                            </span>
                        </div>
                        <input type="number" min="1" id="apparent_age" name="apparent_age" class="form-control clear-border" required>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <label class="label-emphasis" for="gender">Gender</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ion-ios-contact"></i>
                            </span>
                        </div>
                        <select id="gender" name="gender" class="form-control clear-border custom-select" onchange="if( this.options[ this.selectedIndex ].value == 'custom' ){ toggleField( this, this.nextSibling ); this.selectedIndex = '0'; }">
                            <option disabled selected hidden value="default">Gender options</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Non-binary">Non-binary</option>
                            <option value="custom">[ Other ]</option>
                        </select><input type="text" id="gender" name="gender" class="form-control clear-border" style="display: none;" disabled="disabled" onblur="if( this.value == '' ){ toggleField( this, this.previousSibling ); }" placeholder="Specify your character's gender">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <label class="label-emphasis" for="sexuality">Sexuality</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ion-ios-contact"></i>
                            </span>
                        </div>
                        <select id="sexuality" name="sexuality" class="form-control clear-border custom-select" onchange="if( this.options[ this.selectedIndex ].value == 'custom' ){ toggleField( this, this.nextSibling ); this.selectedIndex = '0'; }">
                            <option disabled selected hidden value="default">Sexuality Options</option>
                            <option value="Straight">Straight</option>
                            <option value="Bisexual">Bisexual</option>
                            <option value="Homosexual">Homosexual</option>
                            <option value="Pansexual">Pansexual</option>
                            <option value="Demisexual">Demisexual</option>
                            <option value="Asexual">Asexual</option>
                            <option value="custom">[ Other ]</option>
                        </select><input type="text" id="sexuality" name="sexuality" class="form-control clear-border" style="display: none;" disabled="disabled" onblur="if( this.value == '' ){ toggleField( this, this.previousSibling ); }" placeholder="Specify your character's sexuality">
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
                    <textarea class="form-control clear-border-textarea tinymce_editor">Next, use our Get Started docs to setup Tiny!</textarea>
                </div>
            </div>
        </form>
    </div>

@endsection

@section ('scripts')

    {{-- Character - Additional Page Scripts --}}

    <script src="/js/tinymce/tinymce.min.js"></script>
    <script src="/js/editor.js"></script>
    <script>
        function noNegNmb (e) {
            if(! ( ( 
                e.keyCode > 95 && e.keyCode < 106) 
                || ( e.keyCode > 47 && e.keyCode < 58 ) 
                || e.keyCode == 8 
                || e.keyCode == 38 
                || e.keyCode == 40 ) ) return false;
        }

        function toggleField( hideObj, showObj )
        {
            hideObj.disabled = true;		
            hideObj.style.display = 'none';
            showObj.disabled = false;	
            showObj.style.display = 'inline';
            showObj.focus();
        }

        $("#apparent_age").keydown( noNegNmb );
        $("#age").keydown( noNegNmb );
    
    </script>
    
@endsection