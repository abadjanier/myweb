var app = angular.module('events', ['ui.bootstrap', 'dialogs.main']);
var d = "";
var events = new Array();
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
    
    
     $scope.ajaxInProgress = true;
    $scope.getAll = function () {
        $scope.ajaxInProgress = true;
        $http({
            method: 'GET',
            url: base_url + "admin/events/getall",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }, // set the headers so angular passing info as form data (not request payload)
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            } // set the headers so angular passing info as form data (not request payload)
        }).success(function (data) {
            $scope.ajaxInProgress = false;
            $('#calendar').fullCalendar( 'removeEvents' );
                        events = [];
                        $.each(data, function (idx, obj) {
                            
                            var newEvent = new Object();
                            var f_start = obj.f_ini.split('-');
                            var f_fin = obj.f_fin.split('-');
                            newEvent.id = obj.id;
                            if (obj.allday === '1') {
                                newEvent.title = obj.nombre;
                                newEvent.start = new Date(f_start[0],f_start[1]-1,f_start[2],obj.h_ini,obj.m_ini);
                                newEvent.allDay = true;
                                newEvent.color = obj.color;
                                events.push(newEvent);
                            } else {
                                newEvent.title = obj.nombre;
                                newEvent.start = new Date(f_start[0],f_start[1]-1,f_start[2],obj.h_ini,obj.m_ini);
                                newEvent.end = new Date(f_fin[0],f_fin[1]-1,f_fin[2],obj.h_fin,obj.m_fin);
                                newEvent.allDay = false;
                                newEvent.color = obj.color;
                                events.push(newEvent);
                            }
                                    console.log(newEvent);
                            
                            $('#calendar').fullCalendar('renderEvent', newEvent);
                        });

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
        if (!$scope.addEvent.event_fallday) delete $scope.addEvent.event_fallday;

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
                  
                    if (data.message == "true") {
                        $('#myModal2').modal('toggle');
                        $scope.addEvent = {};
                        $scope.getAll();


                    } else if(data.message != "error" && data.message != "true"){
                        
                        $scope.addEvent.errors = data.message;
                    }
                });

        console.log($scope.addEvent);

    };
    
    $scope.show = function () {
        eventClick;
    };

    $scope.deleteEvent = function (event_id,eventname) {
        //$scope.addRow();
        var dlg = dialogs.confirm('Eliminar Usuario','Desea eliminar el usuario '+eventname);
        dlg.result.then(function () {
            $scope.ajaxInProgress = true;
            $http({
                method: 'POST',
                cache: false, // This caches the response to the request
                url: base_url + "admin/events/deleteEvent/"+event_id,
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
                             $('#myModal3').modal('hide');
                            $scope.getAll();

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






$('#calendar').fullCalendar({
    dayClick: day,
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },
    buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day',
    },
    events: events,
    eventClick: eventClick
});

$('.fc-prev-button,.fc-next-button').click(function() {
    $('#calendar').fullCalendar( 'removeEvents' );
    $('#calendar').fullCalendar( 'addEventSource', events );
});

function eventClick(calEvent, jsEvent, view) {

        console.log('Event: ' + calEvent.start);
        alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
        alert('View: ' + view.name);

        // change the border color just for fun
        $(this).css('border-color', 'red');
        $scope.formData.prueba = '';
        $scope.formData.prueba2 = '';
        
        $scope.formData.pruebaid = calEvent.id;
        $scope.formData.prueba = calEvent.title;
        $scope.formData.prueba2 = calEvent.start;
        $('#prueba').html(calEvent.title);
        $('#nombree').val(calEvent.title);
        
        $('#myModal3').modal('toggle');
        $( "#prueba" ).blur();

    }


function day(date, jsEvent, view) {
    $('#event-all-day').val(date.format());
    $('#myModal2').modal('toggle');
    d = date.format();
    console.log(events);
//    alert('Clicked on: ' + date.format());
//
//
//    alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
//
//    alert('Current view: ' + view.name);

    // change the day's background color just for fun
//    $(this).css('background-color', 'red');

}




});


// page is now ready, initialize the calendar...




