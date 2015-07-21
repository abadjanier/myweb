var app = angular.module('avionesFront', ['ui.bootstrap']);
var d = "";
var events = new Array();
app.controller('avionesfrontCtrl', function ($scope, $http) {
    $scope.ajaxInProgress = false;
    $scope.numpages = 0;
    
    $scope.cargaAviones = function () {
        $http({
            method: 'GET',
            url: base_url + "aviones/getAvionByName/"+$scope.postName,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }, // set the headers so angular passing info as form data (not request payload)
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            } // set the headers so angular passing info as form data (not request payload)
        }).success(function (response) {
            console.log(response);
            if(response == false){
                $scope.ajaxInProgress = false;
            }else{
                $scope.posts = response;
            $scope.posts.id = parseInt($scope.posts.id);
            $scope.totalItems =  $scope.posts.length;
            $scope.pageChanged();
            $scope.ajaxInProgress = false;
            }
            

        });
    };
    
    
    $scope.getAviones = function () {
        $scope.ajaxInProgress = true;
        $http({
            method: 'GET',
            url: base_url + "aviones/getAviones",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }, // set the headers so angular passing info as form data (not request payload)
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            } // set the headers so angular passing info as form data (not request payload)
        }).success(function (response) {
            console.log(response);
            if(response == false){
                $scope.ajaxInProgress = false;
            }else{
                $scope.posts = response;
            $scope.posts.id = parseInt($scope.posts.id);
            $scope.totalItems =  $scope.posts.length;
            $scope.pageChanged();
            $scope.ajaxInProgress = false;
            }

        });
    };
    
     $scope.currentPage = 1;

  $scope.itemsperpage = 2;
  $scope.filteredTodos = []

  $scope.setPage = function (pageNo) {
    $scope.currentPage = pageNo;
  };

  $scope.pageChanged = function() {
    var begin = (($scope.currentPage - 1) * $scope.itemsperpage)
    , end = begin + $scope.itemsperpage;
    console.log("begin "+begin);
    console.log("end "+end);
    $scope.filteredTodos = $scope.posts.slice(begin, end);
  };

});


// page is now ready, initialize the calendar...




