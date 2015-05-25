<?php addCSS("assets/admin/plugins/angularjs/dialogs.css") ?>
<?php addCSS("assets/custom/css/ajax.loader.css") ?>
<?php addCSS("assets/admin/plugins/fullcalendar/fullcalendar.min.css") ?>
<?php addCSS("assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css") ?>
<?php addCSS("assets/admin/plugins/datepicker/datepicker3.css") ?>
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
                                <table id="example1" class="table table-bordered table-striped table-condensed table-hover noselect" data-ng-init="getEvents()">
                                    <thead>
                                        <tr>
                                            <th ng-click="predicate = 'id'; reverse=!reverse">Id</th>
                                            <th ng-click="predicate = 'nombre'; reverse=!reverse">Nombre</th>
                                            <th ng-click="predicate = 'descripcion'; reverse=!reverse">Descripción</th>
                                            <th ng-click="predicate = 'color'; reverse=!reverse">Color</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <tr ng-repeat="event in events | orderBy:predicate:reverse | filter:search:strict" >
                                            <td>{{ event.id }}</td>
                                            <td>{{ event.nombre }}</td>
                                            <td>{{ event.descripcion }}</td>
                                            <td style="background-color: {{ event.color }};"></td>
<!--                                            <td><span ng-show="{{event.active == 1}}" ng-click="deactiveUser(event.id, event.username)" class="btn btn-sm btn-success fa fa-check"> Activo </span>
                                                <span ng-show="{{event.active != 1}}" ng-click="activeUser(event.id, event.username)" class="btn btn-sm btn-danger fa fa-times"> No activo </span>
                                            </td>
                                            <td><a ng-click="deleteUser(event.id, event.username)" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-times"></i> Delete </a>
                                            </td>-->
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th ng-click="predicate = 'id'; reverse=!reverse">Id</th>
                                            <th ng-click="predicate = 'nombre'; reverse=!reverse">Nombre</th>
                                            <th ng-click="predicate = 'descripcion'; reverse=!reverse">Descripción</th>
                                            <th ng-click="predicate = 'color'; reverse=!reverse">Color</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                
                                <pre> {{events}}</pre>
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
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body no-padding" data-ng-init="getAll()">
                    <!-- THE CALENDAR -->
                    <style>
                        .fc-day:hover {
  background: #C7DEFF;
}
                    </style>
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
    
    <!-- Modal-2 -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" ng-click="clearData()"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Nuevo Evento</h4>
                </div>
                <div class="modal-body">
                    <div class="register-box-body">
                        <div class="form-group has-feedback">
                            <p>{{addEvent.errors}}</p>
                            </div>
                        <form name="newUser" ng-submit="createEvent()">
                            <div class="form-group has-feedback">
                                <span class="form-group-addon" id="sizing-addon2">Nombre</span>
                                <input type="text" class="form-control" placeholder="Nombre" ng-model="addEvent.event_name">
                            </div>
                            <div class="form-group has-feedback">
                                <span class="form-group-addon" id="sizing-addon2">Descripción</span>
                                <input type="text" class="form-control" placeholder="Descripción" ng-model="addEvent.event_desc">
                            </div>
                            <div class="form-group has-feedback form-inline">
                                <span class="form-group-addon " id="sizing-addon2">Fecha comienzo</span>
                                <input type="text" disabled="" name="idTourDateDetails" id="reservation1" class="form-control datepicker" >
                                <span class="form-group-addon" id="sizing-addon2">Hora</span>
                                <input class="form-control" id="event-ffin" max="24" min="00" placeholder="00" type="number" ng-model="addEvent.event_hini" />
                                <span class="form-group-addon" id="sizing-addon2">Minutos</span>
                                <input class="form-control" id="event-ffin" max="60" min="00" placeholder="00" type="number" ng-model="addEvent.event_mini" />
                            </div>
                            <div class="form-group has-feedback">
                                <span class="form-group-addon" id="sizing-addon2">Todo el día</span>
                                <input  id="event-all-day" type="checkbox" ng-model="addEvent.event_fallday" />
                            </div>
                            <div class="form-group has-feedback form-inline " >
                                <span class="form-group-addon " id="sizing-addon2">Fecha acaba</span>
                                <input type="text" ng-disabled="addEvent.event_fallday" name="idTourDateDetails" id="reservation" class="form-control datepicker" ng-model="addEvent.event_ffin">
                                <span class="form-group-addon" id="sizing-addon2">Hora</span>
                                <input class="form-control" ng-disabled="addEvent.event_fallday" id="event-ffin" max="24" min="00" placeholder="00" type="number" ng-model="addEvent.event_hfin" />
                                <span class="form-group-addon" id="sizing-addon2">Minutos</span>
                                <input class="form-control" ng-disabled="addEvent.event_fallday" id="event-ffin" max="60" min="00" placeholder="00" type="number" ng-model="addEvent.event_mfin" />
                            </div>
                            
                            <div class="form-group has-feedback" data-ng-init="getEvents()" >
                                <span class="form-group-addon" id="sizing-addon2">Tipo</span>
                                <select style="font-family: 'FontAwesome', Helvetica;" class="form-control" ng-model="addEvent.event_type">
                                    <option style="color: {{event.color}};" value="{{event.id}}" ng-repeat="event in events">&#xf0c8; {{event.nombre}} </option>
                                </select>
                            </div>
                            
                            
                            <div class="row">
                                <div  ng-show="!addEvent.event_id" class="col-xs-3 form-inline">
                                    <button type="submit"  class="btn btn-primary btn-block btn-flat">Crear Evento</button>
                                </div><!-- /.col -->
                                <div ng-show="addEvent.event_id" class="col-xs-3 form-inline">
                                    <button type="button"  class="btn btn-primary btn-block btn-flat">Modificar</button>
                                </div><!-- /.col -->
                                <div class="col-xs-3 form-inline">
                                    <button type="button" ng-click="deleteEvent(addEvent.event_id,addEvent.event_id)"  class="btn btn-primary btn-block btn-flat">Borrar evento</button>
                                </div><!-- /.col -->
                                <div class="col-xs-3 form-inline">
                                    <button ng-click="clearData()" id="clearData" type="button" class="btn btn-primary btn-block btn-flat">Limpiar</button>
                                </div><!-- /.col -->
                                <div class="col-xs-3 form-inline pull-right">
                                    <button type="button" ng-click="clearData()" class="btn btn-primary btn-flat btn-block btn-danger pull-right" data-dismiss="modal">Cerrar</button>
                                </div><!-- /.col -->
                            </div>
                            <style>
    .datepicker{z-index:1151 !important;}
                            </style>
                            
                        </form>        
                    </div>
                </div>
                <pre> {{ addEvent }} </pre>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Modal 3-->
    <div class="modal fade" id="myModal3"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel"><?= lang('create_user_heading') ?></h4>
                </div>
                <div class="modal-body" >
                    <div class="register-box-body">
                        <form name="newUser" ng-submit="processForm()">
                            <div class="form-group has-feedback">
                                <input hidden="" value="{{formData.pruebaid}}">
                                <input id="prueba" ng-mouseenter="" ng-blur="show()"  type="text"  class="form-control" placeholder="<?= lang('create_user_validation_name_label') ?>"  data-ng-model="formData.prueba">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="<?= lang('index_email_th') ?>" ng-model="formData.prueba2">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input id="background-color" type="color" ng-model="formData.event_color" />
                            </div>
                            <div class="row">
                                <div class="col-xs-4 form-inline">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat"><?= lang('create_user_submit_btn') ?></button>
                                </div><!-- /.col -->
                                <div class="col-xs-4 form-inline">
                                    <button type="button" ng-click="deleteEvent(formData.pruebaid,formData.pruebaid)"  class="btn btn-primary btn-block btn-flat">Borrar evento</button>
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
<?php addjs("assets/admin/plugins/fullcalendar/fullcalendar.ini.js") ?>
<?php addjs("assets/custom/js/ang_events.js") ?>

<?php addjs("assets/admin/plugins/input-mask/jquery.inputmask.js") ?>
<?php addjs("assets/admin/plugins/input-mask/jquery.inputmask.date.extensions.js") ?>
<?php addjs("assets/admin/plugins/input-mask/jquery.inputmask.extensions.js") ?>


<?php addjs("assets/admin/plugins/datepicker/bootstrap-datepicker.js") ?>
<?php addjs("assets/admin/plugins/timepicker/bootstrap-timepicker.min.js") ?>

<?php addjs("assets/custom/js/example.js") ?>

