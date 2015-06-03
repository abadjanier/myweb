<!-- Morris chart -->
<?php addCSS("assets/admin/plugins/angularjs/dialogs.css") ?>
<?php addCSS("assets/custom/css/ajax.loader.css") ?>

<section class="content-header">
    <h1>
        Aviones
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Aviones</li>
    </ol>
</section>



<div class="container-fluid" ng-app="aviones" ng-controller="avionesCtrl">
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
            <h3 class="box-title">Listado de Aviones</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped" data-ng-init="getAviones()">
                <thead>
                    <tr>
                        <th ng-click="predicate = 'matricula'; reverse = !reverse">Matricula</th>
                        <th ng-click="predicate = 'idavion'; reverse = !reverse">ID Avion</th>
                        <th ng-click="predicate = 'visibilidad'; reverse = !reverse">Visibilidad</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="avion in aviones| orderBy:predicate:reverse | filter:search:strict" >
                        <td>{{ avion.matricula}}</td>
                        <td>{{ avion.idavion}}</td>

                        <td><span ng-show="{{avion.visibilidad == 1}}" ng-click="desactiveAvion(avion.nombre, avion.idavion)" class="btn btn-sm btn-success fa fa-eye"> Visible </span>
                            <span ng-show="{{avion.visibilidad != 1}}" ng-click="activeAvion(avion.nombre, avion.idavion)" class="btn btn-sm btn-danger fa fa-eye-slash"> Oculto </span>
                        </td>
                        <td><a ng-click="deleteAvion(avion.nombre, avion.idavion)" class="btn btn-sm btn-warning">
                                <i class="fa fa-times"></i> Delete </a>

                            <a href="<?= base_url() ?>admin/aviones/modifyAvion/{{avion.idavion}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-pencil"></i> Modify </a>


                        </td>


                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th ng-click="predicate = 'matricula'; reverse = !reverse">Matricula</th>
                        <th ng-click="predicate = 'idavion'; reverse = !reverse">ID Avion</th>
                        <th ng-click="predicate = 'visibilidad'; reverse = !reverse">Visibilidad</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <!-- Modal -->
    <!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel"><?= lang('create_avion_heading') ?></h4>
                </div>
                <pre> {{ formData }} </pre>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>-->

    <div class="register-box-body">
        <div class="box margin-top-10">
            <div class="box-header">
                <h3 class="box-title">Crear avion</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                </div>

            </div><!-- /.box-header -->

            <div class="box-body">
                <?php if (validation_errors()): ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">�</span></button>
                        <strong>Warning!</strong> <?php echo validation_errors(); ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('message')): ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">�</span></button>
                        <strong>Ok!</strong> Avion introducido con exito!
                    </div>
                <?php endif; ?>
                <form name="myform" method="post" enctype="multipart/form-data" novalidate action="<?= base_url() ?>admin/aviones/create_avion">
                    <div class="form-group has-feedback col-lg-6">
                        <input type="text" class="form-control" placeholder="<?= lang('avion_matricula_label') ?>" name="matricula"  required value="<?= set_value('matricula') ?>">
                        <span class="glyphicon glyphicon-user form-control-feedback" style="margin-right:15px"></span>
                    </div>
                    <div class="form-group has-feedback col-lg-6">
                        <input type="text" class="form-control" placeholder="<?= lang('avion_name_label') ?>" name="nombre" value="<?= set_value('nombre') ?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"  style="margin-right:15px"></span>
                    </div>
                    <div class="form-group has-feedback col-lg-6">
                        <input type="text" class="form-control" placeholder="<?= lang('avion_estado_label') ?>" name="estado" value="<?= set_value('estado') ?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"  style="margin-right:15px"></span>
                    </div>
                    <div class="form-group has-feedback col-lg-6">
                        <input type="text" class="form-control" placeholder="<?= lang('avion_motor_label') ?>" name="motor" value="<?= set_value('motor') ?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"  style="margin-right:15px"></span>
                    </div>
                    <div class="form-group has-feedback col-lg-6">
                        <input type="text" class="form-control" placeholder="<?= lang('avion_cc_label') ?>" name="cc" value="<?= set_value('cc') ?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"  style="margin-right:15px"></span>
                    </div>
                    <div class="form-group has-feedback col-lg-6">
                        <input type="text" class="form-control" placeholder="<?= lang('avion_envergadura_label') ?>" name="envergadura" value="<?= set_value('envergadura') ?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"  style="margin-right:15px"></span>
                    </div>
                    <div class="form-group has-feedback col-lg-6">
                        <input type="text" class="form-control" placeholder="<?= lang('avion_longitud_label') ?>" name="longitud" value="<?= set_value('longitud') ?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"  style="margin-right:15px"></span>
                    </div>
                    <div class="form-group has-feedback col-lg-6">
                        <input type="text" class="form-control" placeholder="<?= lang('avion_peso_label') ?>" name="peso" value="<?= set_value('peso') ?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"  style="margin-right:15px"></span>
                    </div>
                    <div class="form-group has-feedback col-lg-6">
                        <input type="text" class="form-control" placeholder="<?= lang('avion_velmax_label') ?>" name="velmax" value="<?= set_value('velmax') ?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"  style="margin-right:15px"></span>
                    </div>
                    <div class="form-group has-feedback col-lg-6">
                        <input type="text" class="form-control" placeholder="<?= lang('avion_techo_label') ?>" name="techo" value="<?= set_value('techo') ?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"  style="margin-right:15px"></span>
                    </div>
                    <div class="form-group has-feedback col-lg-6">
                        <input type="text" class="form-control" placeholder="<?= lang('avion_primervuelo_label') ?>" name="primervuelo" value="<?= set_value('primervuelo') ?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"  style="margin-right:15px"></span>
                    </div>
                    <div class="form-group has-feedback col-lg-6">
                        <input type="text" class="form-control" placeholder="<?= lang('avion_mtow_label') ?>" name="mtow" value="<?= set_value('mtow') ?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"  style="margin-right:15px"></span>
                    </div>
                    <div class="form-group has-feedback col-lg-6">
                        <input type="text" class="form-control" placeholder="<?= lang('avion_armamento_label') ?>" name="armamento" value="<?= set_value('armamento') ?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"  style="margin-right:15px"></span>
                    </div>
                    <div class="form-group has-feedback col-lg-6">
                        <input type="file" name="userfile" class="form-control">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"  style="margin-right:15px"></span>
                    </div>

                    <div class="bs-example bs-example-tabs col-lg-12" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#hcat" id="hcat-tab" role="tab" data-toggle="tab" aria-controls="hcat" aria-expanded="true">Catala</a></li>
                            <li role="presentation" class=""><a href="#hcas" role="tab" id="hcas-tab" data-toggle="tab" aria-controls="hcas" aria-expanded="false">Castellano</a></li>
                            <li role="presentation" class=""><a href="#hen" id="hen-tab" role="tab" data-toggle="tab" aria-controls="hen" aria-expanded="false">English</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade  active in" id="hcat" aria-labelledby="hcat-tab">
                                <div class="form-group has-feedback col-lg-12">
                                    <label><?= lang('avion_hcat_label') ?></label>
                                    <textarea class="form-control tinymce" name="hcat" required><?= set_value('hcat') ?></textarea>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="hcas" aria-labelledby="hcas-tab">
                                <div class="form-group has-feedback col-lg-12">
                                    <label><?= lang('avion_hcas_label') ?></label>
                                    <textarea class="form-control tinymce" name="hcas" required?><?= set_value('hcas') ?></textarea>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="hen" aria-labelledby="home-tab">
                                <div class="form-group has-feedback col-lg-12">
                                    <label><?= lang('avion_hen_label') ?></label>
                                    <textarea class="form-control tinymce" name="hen" required><?= set_value('hen') ?></textarea>
                                </div>      
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat"><?= lang('create_avion_submit_btn') ?></button>
                        </div><!-- /.col -->
                    </div>
                </form>        
            </div>
        </div>
    </div>
    <!-- Angular JS -->
    
    <?php addJS("assets/admin/plugins/angularjs/angular.min.js") ?>
    <?php addJS("assets/admin/plugins/angularjs/angular.sanitize.min.js") ?>
    <?php addJS("assets/admin/plugins/angularjs/ui-bootstrap-tpls-0.11.2.min.js") ?>
    <?php addJS("assets/admin/plugins/angularjs/dialogs.min.js") ?>
    <?php addJS("assets/custom/js/ang_aviones.js") ?>
    
    
    
<?php addJS("tiny_mce/tinymce.min.js") ?>
<?php addJS("assets/custom/js/tinymce.init.js") ?>
