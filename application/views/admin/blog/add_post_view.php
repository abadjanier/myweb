

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-body no-padding">
            <h1 class="text-center">asdd</h1>
            <div  role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#cat" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Catalan <img alt="" class="img-circle"  width="20" src="http://localhost/fpac/assets/custom/img/lenguage/catalonia.png"></a></li>
                    <li role="presentation" class=""><a href="#cast" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Castellano <img alt="" class="img-circle" width="20" src="http://localhost/fpac/assets/custom/img/lenguage/spain.png"></i></a></li>
                    <li role="presentation" class=""><a href="#ingl" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Ingles <img alt="" class="img-circle" width="20" src="http://localhost/fpac/assets/custom/img/lenguage/unitedkingdom.png"></i></a></li>
                </ul>
                <?= form_open(base_url() . 'admin/blog/addPost', array('name' => 'mi_form', 'id' => 'form', 'role' => 'form')); ?>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in col-md-12" id="cat" aria-labelledby="home-tab">
                        <?= form_label('Titulo', 'titulo'); ?>
                        <?= form_input('titulo_cat', @set_value('titulo_cat'), 'class="form-control"') ?>
                        <?= form_label('Categoria', 'titulo'); ?>
                        <?= form_dropdown('categoria_cat', 'asdasd', '1', 'class="form-control"') ?><br>
                        <?= form_label('Contenido', 'contenido'); ?>
                        <?= form_textarea('contenido_cat', @set_value('contenido_cat'), 'class="form-control tinyMCE"') ?><br>

                    </div>
                    <div role="tabpanel" class="tab-pane fade col-md-12" id="cast" aria-labelledby="profile-tab">
                        <?= form_label('Titulo', 'titulo'); ?>
                        <?= form_input('titulo_es', @set_value('titulo_es'), 'class="form-control"') ?>
                        <?= form_label('Categoria', 'titulo'); ?>
                        <?= form_dropdown('categoria_es', 'asdasd', '1', 'class="form-control"') ?><br>
                        <?= form_label('Contenido', 'contenido'); ?>
                        <?= form_textarea('contenido_es', @set_value('contenido_es'), 'class="form-control tinyMCE"') ?><br>

                    </div>
                    <div role="tabpanel" class="tab-pane fade col-md-12" id="ingl" aria-labelledby="profile-tab">

                        <?= form_label('Titulo', 'titulo'); ?>
                        <?= form_input('titulo_en', @set_value('titulo_en'), 'class="form-control"') ?>
                        <?= form_label('Categoria', 'titulo'); ?>
                        <?= form_dropdown('categoria_en', 'asdasd', '1', 'class="form-control"') ?><br>
                        <?= form_label('Contenido', 'contenido'); ?>
                        <?= form_textarea('contenido_en', @set_value('contenido_en'), 'class="form-control tinyMCE"') ?><br>



                    </div>
                    <?= form_submit('submit', 'Crear', 'class="btn btn-primary center-block"') ?>
                    <?= form_close() ?>
                </div>
            </div>

            <div>
                <a href="#" onclick="tinymce.activeEditor.formatter.apply('customformat');
                        return false;">[Apply custom format]</a>
                <a href="#" onclick="tinymce.activeEditor.formatter.remove('customformat');
                        return false;">[Remove custom format]</a>
            </div>


        </div><!-- /.box-body -->
    </div><!-- /. box -->
</div>




<?php addJS("tiny_mce/tinymce.min.js") ?>
<?php addJS("assets/custom/js/tinymce.init.js") ?>

