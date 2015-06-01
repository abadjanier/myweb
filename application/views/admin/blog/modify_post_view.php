<?php addCSS("assets/admin/plugins/angularjs/dialogs.css") ?>
<?php addCSS("assets/custom/css/ajax.loader.css") ?>

<div class="col-md-12" ng-app="blog" ng-controller="blogCtrl">
    
    <div ng-spinner-bar="" id="circleG" ng-show="ajaxInProgress">
        <div id="circleG">
            <div id="circleG_1" class="circleG">
            </div>
            <div id="circleG_2" class="circleG">
            </div>
            <div id="circleG_3" class="circleG">
            </div>
        </div>
    </div>
    
    <div class="box box-primary col-md-12">
        <div class="box-body no-padding">
            
            <h1 class="text-center">asdd</h1>
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>Warning!</strong> <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('message')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong>Ok!</strong> Post introducido con exito!
            </div>
            <?php endif; ?>
            <div  role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#cat" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Catalan <img alt="" class="img-circle"  width="20" src="http://localhost/fpac/assets/custom/img/lenguage/catalonia.png"></a></li>
                    <li role="presentation" class=""><a href="#cast" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Castellano <img alt="" class="img-circle" width="20" src="http://localhost/fpac/assets/custom/img/lenguage/spain.png"></i></a></li>
                    <li role="presentation" class=""><a href="#ingl" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Ingles <img alt="" class="img-circle" width="20" src="http://localhost/fpac/assets/custom/img/lenguage/unitedkingdom.png"></i></a></li>
                </ul>
                <?= form_open_multipart(base_url() . 'admin/blog/updatePost', array('name' => 'mi_form', 'id' => 'form', 'role' => 'form','class' => 'margin-bottom-40')); ?>
                
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in col-md-12 form-group" id="cat" aria-labelledby="home-tab">
                        <label for="titulo"> Titulo </label>
                        <input name="titulo_cat" value="<?= $posts[0]->titulo ?>" class="form-control">
                        <br><label for="contenido"> Contenido </label>
                        <textarea name="contenido_cat" class="form-control tinyMCE"><?= $posts[0]->contenido ?></textarea>
                        <input type="hidden" name="id_cat" value="<?= $posts[0]->id ?>">
                    </div>
                    <div role="tabpanel" class="tab-pane fade col-md-12 form-group" id="cast" aria-labelledby="profile-tab">
                        <label for="titulo"> Titulo </label>
                        <input name="titulo_es" value="<?= $posts[1]->titulo ?>" class="form-control">
                        
                        <br><label for="contenido"> Contenido </label>
                        <textarea name="contenido_es" class="form-control tinyMCE"><?= $posts[1]->contenido ?></textarea>
                        <input type="hidden" name="id_cast" value="<?= $posts[1]->id ?>">
                    </div>
                    <div role="tabpanel" class="tab-pane fade col-md-12 form-group" id="ingl" aria-labelledby="profile-tab">

                        <label for="titulo"> Titulo </label>
                        <input name="titulo_en" value="<?= $posts[2]->titulo ?>" class="form-control">
                        <br><label for="contenido"> Contenido </label>
                        <textarea name="contenido_en" class="form-control tinyMCE"><?= $posts[2]->contenido ?></textarea>
                        <input type="hidden" name="id_en" value="<?= $posts[2]->id ?>">
                    </div>
                    
                    
                    <div>
                        <input type="hidden" value="<?= $posts[0]->posts_id ?>" name="posts_id">
                        <?= form_submit('submit', 'Crear', 'class="btn btn-primary center-block"') ?>
                    </div>
                    
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
    
    
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel"><?= 'Nueva Categoria' ?></h4>
                </div>
                <div class="modal-body">
                    <div class="register-box-body">
                        
                        <div ng-if="formData.errors" class="alert alert-danger " role="alert">
                            <strong>Warning!</strong> <span ng-bind-html="formData.errors"></span>
                        </div>
                        <form name="newUser" ng-submit="processCategory()">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="<?= 'Castellano' ?>" ng-model="formData.category_cast">
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="<?= 'Catalan' ?>" ng-model="formData.category_cat">
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="<?= 'Ingles' ?>" ng-model="formData.category_en" />
                            </div>
                            <div class="row">
                                <div class="col-xs-4 form-inline">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat"><?= 'Crear Categoria' ?></button>
                                </div><!-- /.col -->
                                <div class="col-xs-4 form-inline pull-right">
                                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                                </div><!-- /.col -->
                            </div>
                        </form>        
                    </div>
                </div>
                <pre> {{ formData }} </pre>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
</div>



<?php addjs("assets/admin/plugins/angularjs/angular.min.js") ?>
<?php addjs("assets/admin/plugins/angularjs/angular.sanitize.min.js") ?>
<?php addjs("assets/admin/plugins/angularjs/ui-bootstrap-tpls-0.11.2.min.js") ?>
<?php addjs("assets/admin/plugins/angularjs/dialogs.min.js") ?>
<?php addjs("assets/custom/js/ang_blog.js") ?>

<?php addJS("tiny_mce/tinymce.min.js") ?>
<?php addJS("assets/custom/js/tinymce.init.js") ?>

