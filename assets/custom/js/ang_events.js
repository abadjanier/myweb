var app = angular.module('events', ['ui.bootstrap', 'dialogs.main']);
var base_url = "http://localhost/fpac/";
var d = "";

app.controller('eventsCtrl', function ($scope, $http, $rootScope, $timeout, dialogs) {
    $scope.ajaxInProgress = false;

    $scope.ajaxInProgress = true;
    $scope.getEvents = function () {
        $scope.ajaxInProgress = true;
        $http({
            method: 'GET',
            url: base_url + "admin/events/get_types",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }, // set the headers so angular passing info as form data (not request payload)
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            } // set the headers so angular passing info as form data (not request payload)
        }).success(function (response) {
            console.log(response);
            $scope.events = response;
            $scope.events.id = parseInt($scope.events.id);
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
            url: base_url + "admin/events/create_type_event",
            data: $.param($scope.formData), // pass in data as strings
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
        })
                .success(function (data) {
                    $scope.ajaxInProgress = false;
                    console.log(data);
                    if (data) {
                        $('#myModal').modal('toggle');
                        $scope.getEvents();
                    } else {

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

    $scope.addEvent = {};

    $scope.createEvent = function () {
        
        $scope.addEvent.event_fini = d;
        //$scope.addRow();

        $scope.ajaxInProgress = true;
        $http({
            method: 'POST',
            cache: false, // This caches the response to the request
            url: base_url + "admin/events/addEvent",
            data: $.param($scope.addEvent), // pass in data as strings
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
        })
                .success(function (data) {
                    $scope.ajaxInProgress = false;
                    console.log(data);
                  
                    if (data) {
                        $('#myModal2').modal('toggle');
                        var newEvent = new Object();

                        newEvent.title = "some text";
                        newEvent.start = new Date();
                        newEvent.allDay = false;
                        $('#calendar').fullCalendar('renderEvent', newEvent);
                        $scope.addEvent = {};


                    } else {
                        $('#myModal2').modal('toggle');
                        $scope.addEvent = {};
                    }
                });

        console.log($scope.addEvent);

    };

//    $scope.deleteUser = function (user_id,username) {
//        //$scope.addRow();
//        var dlg = dialogs.confirm('Eliminar Usuario','Desea eliminar el usuario '+username);
//        dlg.result.then(function () {
//            $scope.ajaxInProgress = true;
//            $http({
//                method: 'POST',
//                cache: false, // This caches the response to the request
//                url: base_url + "admin/users/deleteUser/"+user_id,
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

$('#calendar').fullCalendar({
    dayClick: day
});

function day(date, jsEvent, view) {
    $('#event-all-day').val(date.format());
    $('#myModal2').modal('toggle');
    d = date.format();
    alert('Clicked on: ' + date.format());


    alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

    alert('Current view: ' + view.name);

    // change the day's background color just for fun
    $(this).css('background-color', 'red');

}
