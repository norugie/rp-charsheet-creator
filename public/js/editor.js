$(function () {
    //TinyMCE
    tinymce.init({
        selector: ".editor",
        height: 500,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime nonbreaking save table directionality',
            'paste textpattern imagetools'
        ],
        toolbar1: 'undo redo | styleselect | fontselect | fontsizeselect | forecolor backcolor | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview fullscreen',
        relative_urls: false,
        remove_script_host: false,
        document_base_url: "http://rpcsc.herokuapp.com/", // Change origin URL once site is online
        image_advtab: true,
        images_upload_url: '/upload/editor',
        image_class_list: [{
            title: 'Responsive',
            value: 'img-responsive img-fluid'
        }],

        // Override default upload handler
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '/upload/editor');
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            xhr.setRequestHeader('X-CSRF-Token', token);
            xhr.onload = function () {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        }
    });
});
