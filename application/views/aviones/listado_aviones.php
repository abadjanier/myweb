

<section id="list-airplanes" ng-app="avionesFront" ng-controller="avionesfrontCtrl">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="title-airplane">
                    <h1>Listado aviones</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="input-group col-lg-6 col-sm-12 search">
                    <input type="text" class="form-control" ng-model="postName" ng-change="cargaAviones()">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    <div class="row" ng-init="getAviones()">
            <div class="col-md-6 col-xs-12 list-items" ng-repeat="avion in filteredTodos | orderBy:predicate:reverse | filter:search:strict">
                <a href="<?= base_url()?>aviones/avion/{{avion.aviones_idavion}}">
                <div class="row effect-hover">
                    <div class="col-xs-12">
                        <img src="<?= base_url() ?>source/aviones/{{avion.imagen}}" alt="{{avion.nombre}}">
                    </div>
                    <div class="col-xs-12">
                        <p>{{avion.nombre}}</p>
                    </div>
                </div>
                </a>    
            </div>
            <div class="col-md-12 margin-bottom-20 pagination-bottom">
                    <pagination total-items="totalItems" items-per-page="itemsperpage" ng-model="currentPage" ng-change="pageChanged()"></pagination>
            </div>
        </div>
    </div>
</section>
 <?php addJS("assets/admin/plugins/angularjs/angular.min.js") ?>
<?php addjs("assets/admin/plugins/angularjs/ui-bootstrap-tpls-0.11.2.min.js") ?>
    <?php addJS("assets/custom/js/ang_aviones_front.js") ?>