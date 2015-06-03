    <link href="<?= base_url()?>assets/admin/plugins/angularjs/dialogs.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url()?>assets/custom/css/ajax.loader.css" rel="stylesheet" type="text/css" />
<div class="container-fluid" ng-app="blog" ng-controller="blogCtrl">
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
    
    <div class="box margin-top-10">
        <div class="box-header">
            <h3 class="box-title">Categorias</h3>
        </div><!-- /.box-header -->
        <div class="col-md-12 pull-right">
            <button type="button" class="btn btn-primary btn-info right" data-toggle="modal" data-target="#myModal">Crear nueva categoria</button>
        </div>
        <div class="col-md-4 pull-right">
                    <div class="input-icon right">
                        <input type="text" class="form-control" placeholder="Search" ng-model="search">
                    </div>
                </div>
        <div class="box-body" data-ng-init="getCategorias()">
            <table id="example1" class="table table-bordered table-striped table-condensed table-hover noselect" >
                <thead>
                    <tr>
                        <th ng-click="predicate = 'id'; reverse=!reverse">Id</th>
                        <th ng-click="predicate = 'nombre'; reverse=!reverse">Categoria</th>
                    </tr>
                </thead>
                <tbody>
                    
                        
                        <tr ng-repeat="post in categories | orderBy:predicate:reverse | filter:search:strict" >
                            <td>{{ post.id }}</td>
                            <td>{{ post.nombre }}</td>
                        </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th ng-click="predicate = 'id'; reverse=!reverse">Id</th>
                        <th ng-click="predicate = 'nombre'; reverse=!reverse">Categoria</th>
                    </tr>
                </tfoot>
            </table>
            
        </div><!-- /.box-body -->
    </div><!-- /.box -->
    
    
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