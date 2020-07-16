(function () {
    'use strict';

    // Validating inputs
    window.addEventListener('load', function () {
        const form = $('.needs-validation');
        // Loop over forms and prevent submission
        Array.prototype.filter.call(form, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);

    // Function for preventing negative signs and decimals
    function noNegativeValue(keyPressed) {
        if (!((
                    keyPressed.keyCode > 95 && keyPressed.keyCode < 106) ||
                (keyPressed.keyCode > 47 && keyPressed.keyCode < 58) ||
                keyPressed.keyCode == 8 ||
                keyPressed.keyCode == 9 ||
                keyPressed.keyCode == 38 ||
                keyPressed.keyCode == 40)) return false;
    }

    // Function for toggling custom field for gender and sexuality
    function toggleField(hideField, showField) {
        hideField.disabled = true;
        hideField.style.display = 'none';
        showField.disabled = false;
        showField.style.display = 'inline';
        showField.focus();
    }

    $('#apparent_age').keydown(noNegativeValue);
    $('#age').keydown(noNegativeValue);
    $('#gender_select').change(function () {
        if (this.options[this.selectedIndex].value == 'custom') {
            toggleField(this, this.nextSibling);
            this.selectedIndex = '0';
        }
    });
    $('#gender_custom').blur(function () {
        if (this.value == '') toggleField(this, this.previousSibling);
    });
    $('#sexuality_select').change(function () {
        if (this.options[this.selectedIndex].value == 'custom') {
            toggleField(this, this.nextSibling);
            this.selectedIndex = '0';
        }
    });
    $('#sexuality_custom').blur(function () {
        if (this.value == '') toggleField(this, this.previousSibling);
    });
})();
