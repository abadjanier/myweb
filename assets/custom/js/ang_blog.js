var app = angular.module('blog', ['ui.bootstrap', 'dialogs.main']);
var d = "";
var events = new Array();
app.controller('blogCtrl', function ($scope, $http, $rootScope, $timeout, dialogs) {
    $scope.ajaxInProgress = false;
    
    $scope.getCategorias = function () {
        $scope.ajaxInProgress = true;
        $http({
            method: 'GET',
            url: base_url + "admin/blog/getCategories",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }, // set the headers so angular passing info as form data (not request payload)
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            } // set the headers so angular passing info as form data (not request payload)
        }).success(function (response) {
            console.log(response);
            $scope.categories = response;
            $scope.categories.id = parseInt($scope.categories.id);
            $scope.ajaxInProgress = false;

        });
    };
    $scope.numpages = 0;
    
    $scope.cargaPosts = function () {
        $http({
            method: 'GET',
            url: base_url + "admin/blog/getPosts/"+$scope.postName,
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
    
    
    $scope.getPosts = function () {
        $scope.ajaxInProgress = true;
        $http({
            method: 'GET',
            url: base_url + "admin/blog/getPosts",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }, // set the headers so angular passing info as form data (not request payload)
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            } // set the headers so angular passing info as form data (not request payload)
        }).success(function (response) {
            console.log(response);
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

  $scope.itemsperpage = 4;
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


    $scope.formData = {};

    $scope.processCategory = function () {
        //$scope.addRow();
        $scope.ajaxInProgress = true;
        $http({
            method: 'POST',
            cache: false, // This caches the response to the request
            url: base_url + "admin/blog/addCategory",
            data: $.param($scope.formData), // pass in data as strings
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
        })
                .success(function (data) {
                    $scope.ajaxInProgress = false;
                    console.log(data );
                    if (data.message == 'true') {
                        $('#myModal').modal('toggle');
                        $scope.getCategorias();
                        $scope.formData = {};
                    } else if(data.message != 'true' && data.message != 'error') {
                        $scope.formData.errors = data.message;
                    }


//                if (data.message) {
//                    // if not successful, bind errors to error variables
//                    $scope.userError = true
//
//                } else {
//                    // if successful, bind success message to message
//                    $scope.message = data.message;
//                    $scope.getUser();
//                    $('#myModal').modal('toggle')
//                }
                });
    };
    
    
    $scope.deletePost = function (id,titulo_post) {
   //$scope.addRow();
        var dlg = dialogs.confirm('Eliminar Post','Desea eliminar el post '+titulo_post);
        dlg.result.then(function () {
            $scope.ajaxInProgress = true;
            $http({
                method: 'POST',
                cache: false, // This caches the response to the request
                url: base_url + "admin/blog/deletePost/"+id,
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
                            $scope.getPosts();

                        } else {
                             // if not successful, bind errors to error variables
                        }
                    });
        }, function (btn) {

        });
    };
    
    
    

//    
//    
//    $scope.deactiveUser = function (user_id,username) {
//        //$scope.addRow();
//        var dlg = dialogs.confirm('Desactivar Usuario','Desea desactivar el usuario '+username);
//        dlg.result.then(function () {
//            $scope.ajaxInProgress = true;
//            $http({
//                method: 'POST',
//                cache: false, // This caches the response to the request
//                url: base_url + "admin/users/deactivate/"+user_id,
//                headers: {
//                    'Content-Type': 'application/x-www-form-urlencoded'
//                }, // set the headers so angular passing info as form data (not request payload)
//                headers: {
//                    'X-Requested-With': 'XMLHttpRequest'
//                } // set the headers so angular passing info as form data (not request payload)
//            })
//                    .success(function (data) {
//                        $scope.ajaxInProgress = false;
//                        console.log(data);
//
//                        if (data) {
//                            // if successful, bind success message to message
//                            $scope.getUser();
//
//                        } else {
//                             // if not successful, bind errors to error variables
//                        }
//                    });
//        }, function (btn) {
//
//        });
//
//    };
//    
//    
//    
//    $scope.activeUser = function (user_id,username) {
//        //$scope.addRow();
//        var dlg = dialogs.confirm('Activar Usuario','Desea activar el usuario '+username);
//        dlg.result.then(function () {
//            $scope.ajaxInProgress = true;
//            $http({
//                method: 'POST',
//                cache: false, // This caches the response to the request
//                url: base_url + "admin/users/activate/"+user_id,
//                headers: {
//                    'Content-Type': 'application/x-www-form-urlencoded'
//                }, // set the headers so angular passing info as form data (not request payload)
//                headers: {
//                    'X-Requested-With': 'XMLHttpRequest'
//                } // set the headers so angular passing info as form data (not request payload)
//            })
//                    .success(function (data) {
//                        $scope.ajaxInProgress = false;
//                        console.log(data);
//
//                        if (data) {
//                            // if successful, bind success message to message
//                            $scope.getUser();
//
//                        } else {
//                             // if not successful, bind errors to error variables
//                        }
//                    });
//        }, function (btn) {
//
//        });
//
//    };


});


// page is now ready, initialize the calendar...




