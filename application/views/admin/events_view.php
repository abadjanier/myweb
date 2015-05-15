<?php addCSS("assets/admin/plugins/angularjs/dialogs.css") ?>
<?php addCSS("assets/custom/css/ajax.loader.css") ?>
<?php addCSS("assets/admin/plugins/fullcalendar/fullcalendar.min.css") ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Calendar
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calendar</li>
    </ol>
</section>


<!-- Main content -->
<section class="content" ng-app="events" ng-controller="eventsCtrl">
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
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tipos de evento</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <div class="btn-group">
                            <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
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
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                    <div class="row">
                        
                    </div><!-- /.row -->
                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h4 class="box-title">Draggable Events</h4>
                </div>
                <div class="box-body">
                    <!-- the events -->
                    <div id='external-events'>
                        <div class='external-event bg-green'>Lunch</div>
                        <div class='external-event bg-yellow'>Go home</div>
                        <div class='external-event bg-aqua'>Do homework</div>
                        <div class='external-event bg-light-blue'>Work on UI design</div>
                        <div class='external-event bg-red'>Sleep tight</div>
                        <div class="checkbox">
                            <label for='drop-remove'>
                                <input type='checkbox' id='drop-remove' />
                                remove after drop
                            </label>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /. box -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Event</h3>
                </div>
                <div class="box-body">
                    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                      <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                        <ul class="fc-color-picker" id="color-chooser">
                            <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>																						
                            <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                        </ul>
                    </div><!-- /btn-group -->
                    <div class="input-group">
                        <input id="new-event" type="text" class="form-control" placeholder="Event Title">
                        <div class="input-group-btn">
                            <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add</button>
                        </div><!-- /btn-group -->
                    </div><!-- /input-group -->
                </div>
            </div>
        </div><!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-body no-padding">
                    <!-- THE CALENDAR -->
                    <div id="calendar"></div>
                </div><!-- /.box-body -->
            </div><!-- /. box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
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
                                <input type="text" class="form-control" placeholder="<?= lang('create_user_validation_name_label') ?>" ng-model="formData.event_name">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="<?= lang('index_email_th') ?>" ng-model="formData.event_desc">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input id="background-color" type="color" ng-model="formData.event_color" />
                            </div>
                            <div class="row">
                                <div class="col-xs-4 form-inline">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat"><?= lang('create_user_submit_btn') ?></button>
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
</section><!-- /.content -->

<?php addjs("assets/admin/plugins/fullcalendar/fullcalendar.min.js") ?>
<?php addjs("assets/admin/plugins/angularjs/angular.min.js") ?>
<?php addjs("assets/admin/plugins/angularjs/angular.sanitize.min.js") ?>
<?php addjs("assets/admin/plugins/angularjs/ui-bootstrap-tpls-0.11.2.min.js") ?>
<?php addjs("assets/admin/plugins/angularjs/dialogs.min.js") ?>
<?php addjs("assets/custom/js/ang_events.js") ?>



