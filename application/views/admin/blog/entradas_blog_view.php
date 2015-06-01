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
            <h3 class="box-title">Data Table With Full Features</h3>
        </div><!-- /.box-header -->
        <div class="col-md-12 pull-right">
            <a type="buton" class="btn btn-primary btn-info right"  href="<?= base_url()?>admin/blog/addPost"> Añadir nueva entrada</a>
            <button type="button" class="btn btn-primary btn-info right" data-toggle="modal" data-target="#myModal"><?= lang('index_create_user_link') ?></button>
        </div>
        <div class="col-md-4 pull-right">
                    <div class="input-icon right">
                        <input type="text" class="form-control" placeholder="Search" ng-model="postName" ng-change="cargaPosts()">
                    </div>
                </div>
        <div class="box-body" data-ng-init="getPosts()">
            <table id="example1" class="table table-bordered table-striped table-condensed table-hover noselect" >
                <thead>
                    <tr>
                        <th ng-click="predicate = 'id'; reverse=!reverse">Id</th>
                        <th ng-click="predicate = 'titulo_post'; reverse=!reverse">Titulo</th>
                    </tr>
                </thead>
                <tbody>
                    
                        
                        <tr ng-repeat="post in filteredTodos | orderBy:predicate:reverse | filter:search:strict" >
                            <td>{{ post.id }}</td>
                            <td>{{ post.titulo_post }}</td>
                            <td><a ng-click="deletePost(post.id, post.titulo_post)" class="btn btn-sm btn-warning">
                                    <i class="fa fa-times"></i> Delete </a>
                                <a  href="<?= base_url()?>admin/blog/updatePost/{{post.id}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-pencil"></i> Modify </a>
                            </td>
                        </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th ng-click="predicate = 'id'; reverse=!reverse">Id</th>
                        <th ng-click="predicate = 'titulo_post'; reverse=!reverse">Titulo</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            <div class="col-md-12 margin-bottom-20">
                    <pagination total-items="totalItems" items-per-page="itemsperpage" ng-model="currentPage" ng-change="pageChanged()"></pagination>
                </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div> 
    
    
    <?php addjs("assets/admin/plugins/angularjs/angular.min.js") ?>
<?php addjs("assets/admin/plugins/angularjs/angular.sanitize.min.js") ?>
<?php addjs("assets/admin/plugins/angularjs/ui-bootstrap-tpls-0.11.2.min.js") ?>
<?php addjs("assets/admin/plugins/angularjs/dialogs.min.js") ?>
<?php addjs("assets/custom/js/ang_blog.js") ?>