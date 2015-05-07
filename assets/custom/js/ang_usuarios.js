var app = angular.module('usuarios', []);
var  base_url = "http://localhost/fpac/";

app.controller('usersCtrl', function ($scope, $http) {
    $scope.ajaxInProgress = false;

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
                    $('#myModal').modal('toggle')
                }
            });
    };
});