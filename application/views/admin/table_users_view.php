<!-- Morris chart -->
    <link href="<?= base_url()?>assets/admin/plugins/angularjs/dialogs.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url()?>assets/custom/css/ajax.loader.css" rel="stylesheet" type="text/css" />
<div class="container-fluid" ng-app="usuarios" ng-controller="usersCtrl">
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
            <button type="button" class="btn btn-primary btn-info right" data-toggle="modal" data-target="#myModal"><?= lang('index_create_user_link') ?></button>
        </div>
        <div class="col-md-4 pull-right">
                    <div class="input-icon right">
                        <input type="text" class="form-control" placeholder="Search" ng-model="search">
                    </div>
                </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped table-condensed table-hover noselect" data-ng-init="getUser()">
                <thead>
                    <tr>
                        <th ng-click="predicate = 'id'; reverse=!reverse">Id</th>
                        <th ng-click="predicate = 'email'; reverse=!reverse">Email</th>
                        <th ng-click="predicate = 'first_name'; reverse=!reverse">Username</th>
                        <th ng-click="predicate = 'active'; reverse=!reverse">Active</th>
                        <th ng-click="predicate = 'active'; reverse=!reverse">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                        
                        <tr ng-repeat="user in users | orderBy:predicate:reverse | filter:search:strict" >
                            <td>{{ user.id }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.username }}</td>
                            <td><span ng-show="{{user.active == 1}}" ng-click="deactiveUser(user.id, user.username)" class="btn btn-sm btn-success fa fa-check"> Activo </span>
                                <span ng-show="{{user.active != 1}}" ng-click="activeUser(user.id, user.username)" class="btn btn-sm btn-danger fa fa-times"> No activo </span>
                            </td>
                            <td><a ng-click="deleteUser(user.id, user.username)" class="btn btn-sm btn-warning">
                                    <i class="fa fa-times"></i> Delete </a>
                            </td>
                        </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th ng-click="predicate = 'id'; reverse=!reverse">Id</th>
                        <th ng-click="predicate = 'email'; reverse=!reverse">Email</th>
                        <th ng-click="predicate = 'first_name'; reverse=!reverse">Username</th>
                        <th ng-click="predicate = 'active'; reverse=!reverse">Active</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel"><?= lang('create_user_heading') ?></h4>
                </div>
                <div class="modal-body">
                    <div class="register-box-body">
                        <form name="newUser" ng-submit="processForm()">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="<?= lang('create_user_validation_name_label') ?>" ng-model="formData.first_name">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="<?= lang('index_email_th') ?>" ng-model="formData.email">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat"><?= lang('create_user_submit_btn') ?></button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

    <!-- Angular JS -->
    <script src="<?= base_url()?>assets/admin/plugins/angularjs/angular.min.js"></script>
    <script src="<?= base_url()?>assets/admin/plugins/angularjs/angular.sanitize.min.js"></script>
    <script src="<?= base_url()?>assets/admin/plugins/angularjs/ui-bootstrap-tpls-0.11.2.min.js"></script>
    <script src="<?= base_url()?>assets/admin/plugins/angularjs/dialogs.min.js"></script>
    
    
    <!-- Usuarios JS -->
    <script src="<?= base_url()?>assets/custom/js/ang_usuarios.js"></script>