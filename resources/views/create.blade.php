@extends ('layout.layout')

@section ('content')

    {{-- Character - Create Character --}}
    <div class="col-lg-12">
        <p class="font-12"><b>Note:</b> Fields marked with an asterisk are required</p>
        <form class="needs-validation" action="" method="POST" novalidate>
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
                        <select id="gender_select" name="gender_select" class="form-control clear-border custom-select" onchange="if( this.options[ this.selectedIndex ].value == 'custom' ){ toggleField( this, this.nextSibling ); this.selectedIndex = '0'; }" required>
                            <option disabled selected hidden value="default">Gender options</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Non-binary">Non-binary</option>
                            <option value="custom">[ Other ]</option>
                        </select><input type="text" id="gender_custom" name="gender_custom" class="form-control clear-border" style="display: none;" disabled="disabled" onblur="if( this.value == '' ){ toggleField( this, this.previousSibling ); }" placeholder="Specify your character's gender">
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
                        <select id="sexuality_select" name="sexuality_select" class="form-control clear-border custom-select" onchange="if( this.options[ this.selectedIndex ].value == 'custom' ){ toggleField( this, this.nextSibling ); this.selectedIndex = '0'; }" required>
                            <option hidden value="default">Sexuality Options</option>
                            <option value="Straight">Straight</option>
                            <option value="Bisexual">Bisexual</option>
                            <option value="Homosexual">Homosexual</option>
                            <option value="Pansexual">Pansexual</option>
                            <option value="Demisexual">Demisexual</option>
                            <option value="Asexual">Asexual</option>
                            <option value="custom">[ Other ]</option>
                        </select><input type="text" id="sexuality_custom" name="sexuality_custom" class="form-control clear-border" style="display: none;" disabled="disabled" onblur="if( this.value == '' ){ toggleField( this, this.previousSibling ); }" placeholder="Specify your character's sexuality">
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
                    <textarea id="info" class="form-control clear-border-textarea editor"></textarea>
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

@section ('scripts')

    {{-- Character - Additional Page Scripts --}}

    <script src="/js/tinymce/tinymce.min.js"></script>
    <script src="/js/editor.js"></script>
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
                });
            }, false);

            function noNegNmb (e) 
            {
                if(! ( ( 
                    e.keyCode > 95 && e.keyCode < 106) 
                    || ( e.keyCode > 47 && e.keyCode < 58 ) 
                    || e.keyCode == 8
                    || e.keyCode == 9 
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
        })();
    </script>
    
@endsection