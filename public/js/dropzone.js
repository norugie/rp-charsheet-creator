(function () {
    'use strict';

    // Configuring Dropzone
    Dropzone.autoDiscover = false;

    var token = $('meta[name="csrf-token"]').attr('content');
    $('#dropzone-gallery').dropzone({
        url: '/upload/gallery',
        acceptedFiles: 'image/*',
        maxFileSize: 10, // MB
        addRemoveLinks: true,
        dictDefaultMessage: 'Drop images here to upload',
        dictFallbackMessage: 'Your browser does not support drag and drop image uploads.',
        dictFileTooBig: 'Image is too big. Max image size: 10 MB.',
        dictInvalidFileType: 'You cannot upload images of this file type.',
        dictRemoveFile: 'Remove image',
        dictRemoveFileConfirmation: null,
        success: function (file) {
            var imageName = $('#image_name').val();
            $('#image_name').attr('value', file.name + ',' + imageName);
        },
        error: function (file, message, xhr) {
            if (xhr == null) this.removeFile(file);
            alert(message);
        },
        init: function () {
            this.on('sending', function (file, xhr, formData) {
                formData.append('_token', token);
            });
            this.on('removedfile', function (file) {
                var imageNameList = $('#image_name').val();
                imageNameList = imageNameList.replace(file.name + ',', '');
                $('#image_name').attr('value', imageNameList);

                // Remove image from server folder
                $.ajax({
                    url: 'delete/gallery',
                    type: 'POST',
                    data: {
                        '_token': token,
                        'filename': file.name
                    },
                    dataType: 'json'
                });
            });
        }
    });
})();
