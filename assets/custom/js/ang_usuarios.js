var app = angular.module('usuarios', ['ui.bootstrap','dialogs.main']);
var  base_url = "http://localhost/fpac/";

app.controller('usersCtrl', function ($scope, $http,$rootScope,$timeout,dialogs) {
    $scope.ajaxInProgress = false;
    
    $scope.ajaxInProgress = true;
    $scope.getUser = function () {
        $scope.ajaxInProgress = true;
        $http({
            method: 'GET',
            url: base_url + "admin/users/getUsersDatatable",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }, // set the headers so angular passing info as form data (not request payload)
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            } // set the headers so angular passing info as form data (not request payload)
        }).success(function (response) {
            $scope.users = response;
            $scope.users.id = parseInt($scope.users.id);
            $scope.ajaxInProgress = false;
        });
    };
    

    $scope.formData = {};

    $scope.processForm = function () {
        //$scope.addRow();
        $scope.ajaxInProgress = true;
        $http({
                method: 'POST',
                cache: false, // This caches the response to the request
                url: base_url + "admin/users/create_user",
                data: $.param($scope.formData), // pass in data as strings
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
            })
            .success(function (data) {
                $scope.ajaxInProgress = false;
                console.log(data);

                if (data.message == "error") {
                    // if not successful, bind errors to error variables
                    $scope.userError = true

                } else {
                    // if successful, bind success message to message
                    $scope.message = data.message;
                    $scope.getUser();
                    $('#myModal').modal('toggle')
                }
            });
    };
    
    $scope.deleteUser = function (user_id,username) {
        //$scope.addRow();
        var dlg = dialogs.confirm('Eliminar Usuario','Desea eliminar el usuario '+username);
        dlg.result.then(function () {
            $scope.ajaxInProgress = true;
            $http({
                method: 'POST',
                cache: false, // This caches the response to the request
                url: base_url + "admin/users/deleteUser/"+user_id,
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
                            $scope.getUser();

                        } else {
                             // if not successful, bind errors to error variables
                        }
                    });
        }, function (btn) {

        });

    };
    
    
    $scope.deactiveUser = function (user_id,username) {
        //$scope.addRow();
        var dlg = dialogs.confirm('Desactivar Usuario','Desea desactivar el usuario '+username);
        dlg.result.then(function () {
            $scope.ajaxInProgress = true;
            $http({
                method: 'POST',
                cache: false, // This caches the response to the request
                url: base_url + "admin/users/deactivate/"+user_id,
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
                            $scope.getUser();

                        } else {
                             // if not successful, bind errors to error variables
                        }
                    });
        }, function (btn) {

        });

    };
    
    
    
    $scope.activeUser = function (user_id,username) {
        //$scope.addRow();
        var dlg = dialogs.confirm('Activar Usuario','Desea activar el usuario '+username);
        dlg.result.then(function () {
            $scope.ajaxInProgress = true;
            $http({
                method: 'POST',
                cache: false, // This caches the response to the request
                url: base_url + "admin/users/activate/"+user_id,
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
                            $scope.getUser();

                        } else {
                             // if not successful, bind errors to error variables
                        }
                    });
        }, function (btn) {

        });

    };
});