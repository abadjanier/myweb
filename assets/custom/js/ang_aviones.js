var app = angular.module('aviones', ['ui.bootstrap','dialogs.main']);

app.controller('avionesCtrl', function ($scope, $http, $rootScope, $timeout,dialogs) {
    $scope.ajaxInProgress = false;

    $scope.formData = {};
    $scope.processForm = function () {
        //$scope.addRow();
        $scope.ajaxInProgress = true;
        $http({
                method: 'POST',
                cache: false, // This caches the response to the request
                url: base_url + "admin/aviones/create_avion",
                data: $.param($scope.formData), // pass in data as strings
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
            })

                .success(function (data) {
                    $scope.ajaxInProgress = false;
                    console.log(data);
                    if (data) {
                        
                        $scope.getAviones();
                    } else {

                    }
     });
    };
    
    $scope.getAviones = function () {
        //$scope.addRow();
        $scope.ajaxInProgress = true;
        $http({
                method: 'POST',
                cache: false, // This caches the response to the request
                url: base_url + "admin/aviones/getAviones",
                data: $.param($scope.formData), // pass in data as strings
                 headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }, // set the headers so angular passing info as form data (not request payload)
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            } // set the headers so angular passing info as form data (not request payload)
            })
            .success(function (data) {
                $scope.ajaxInProgress = false;
                $scope.aviones = data;
                console.log(data);
            });
    };

 $scope.modifyAvion = function (idavion) {
        //$scope.addRow();
        $scope.ajaxInProgress = true;
        $http({
                method: 'POST',
                cache: false, // This caches the response to the request
                url: base_url + "admin/aviones/modifyAvion/"+idavion,
                data: $.param($scope.formData), // pass in data as strings
                 headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }, // set the headers so angular passing info as form data (not request payload)
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                } // set the headers so angular passing info as form data (not request payload)
            })
            .success(function (data) {
                $scope.ajaxInProgress = false;
                console.log(data);
            });
    };


$scope.desactiveAvion = function (nombre,idavion) {
        //$scope.addRow();
        var dlg = dialogs.confirm('Desactivar Avion','Desea desactivar el avion '+nombre);
        dlg.result.then(function () {
            $scope.ajaxInProgress = true;
            $http({
                method: 'POST',
                cache: false, // This caches the response to the request
                url: base_url + "admin/aviones/desactivate/"+idavion,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }, // set the headers so angular passing info as form data (not request payload)
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                } // set the headers so angular passing info as form data (not request payload)
            })
                    .success(function (data) {
                        $scope.ajaxInProgress = false;
                        console.log(data);

                        if (data) {
                            // if successful, bind success message to message
                            $scope.getAviones();

                        } else {
                             // if not successful, bind errors to error variables
                        }
                    });
        }, function (btn) {

        });

    };
    
$scope.activeAvion = function (nombre,idavion) {
        //$scope.addRow();
        var dlg = dialogs.confirm('Activar Avion','Desea activar el avion '+nombre);
        dlg.result.then(function () {
            $scope.ajaxInProgress = true;
            $http({
                method: 'POST',
                cache: false, // This caches the response to the request
                url: base_url + "admin/aviones/activate/"+idavion,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }, // set the headers so angular passing info as form data (not request payload)
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                } // set the headers so angular passing info as form data (not request payload)
            })
                    .success(function (data) {
                        $scope.ajaxInProgress = false;
                        console.log(data);

                        if (data) {
                            // if successful, bind success message to message
                            $scope.getAviones();

                        } else {
                             // if not successful, bind errors to error variables
                        }
                    });
        }, function (btn) {

        });

    };
    
 $scope.deleteAvion = function (nombre,idavion) {
        //$scope.addRow();
        console.log("Estoy en ang_aviones");
        var dlg = dialogs.confirm('Eliminar Avion','Desea eliminar el avion '+nombre);
        dlg.result.then(function () {
            $scope.ajaxInProgress = true;
            $http({
                method: 'POST',
                cache: false, // This caches the response to the request
                url: base_url + "admin/aviones/deleteAvion/"+idavion,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }, // set the headers so angular passing info as form data (not request payload)
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                } // set the headers so angular passing info as form data (not request payload)
            })
                    .success(function (data) {
                        $scope.ajaxInProgress = false;
                        console.log(data);

                        if (data) {
                            // if successful, bind success message to message
                            $scope.getAviones();

                        } else {
                             // if not successful, bind errors to error variables
                        }
                    });
        }, function (btn) {

        });

    };
    
});