tinymce.init({
        selector: "textarea",
        theme: "modern",
        relative_urls: false,
        remove_script_host: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern responsivefilemanager"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview media | forecolor backcolor emoticons template | responsivefilemanager",
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: '<img src="http://junhongkungfu.com/wp-content/uploads/2013/09/140x140.gif" alt="..." class="img-circle">'},
            {title: 'Test template 2', content: '<button type="button" class="btn btn-primary">Primary</button>'},
            {title: 'parrafo', content: '<div class="container"><div class="row"><p>Inserte contenido aquí</p></div></div>&nbsp;'}
        ],
        external_filemanager_path: base_url+"filemanager/",
        filemanager_title: "Responsive Filemanager",
        external_plugins: {"filemanager": base_url+"filemanager/plugin.min.js"}
    });