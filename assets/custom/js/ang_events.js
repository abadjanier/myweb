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
            console.log(data);
            $('#calendar').fullCalendar( 'removeEvents' );
                        events = [];
                        $.each(data, function (idx, obj) {
                            
                            var newEvent = new Object();
                            var f_start = obj.f_ini.split('-');
                            var f_fin = obj.f_fin.split('-');
                            newEvent.id = obj.id;
                            newEvent.desc = obj.descripcion;
                            newEvent.type = obj.tipo_evento_id;
                             if (obj.allday === '1') {
                                newEvent.title = obj.nombre;
                                newEvent.start = new Date(f_start[0],f_start[1]-1,f_start[2],obj.h_ini,obj.m_ini);
                                newEvent.start2 = new Date(f_start[0],f_start[1]-1,f_start[2],obj.h_ini,obj.m_ini);
                                newEvent.allDay = true;
                                newEvent.color = obj.color;
                                events.push(newEvent);
                            } else {
                                newEvent.title = obj.nombre;
                                newEvent.start = new Date(f_start[0],f_start[1]-1,f_start[2],obj.h_ini,obj.m_ini);
                                newEvent.start2 = new Date(f_start[0],f_start[1]-1,f_start[2],obj.h_ini,obj.m_ini);
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
    
    
    $scope.addEvent = {};

    $scope.updateEvent = function (id_event) {
        
        //$scope.addRow();
        if (!$scope.addEvent.event_fallday) delete $scope.addEvent.event_fallday;

        $scope.ajaxInProgress = true;
        $http({
            method: 'POST',
            cache: false, // This caches the response to the request
            url: base_url + "admin/events/updateEvent/"+id_event,
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
                             $('#myModal2').modal('hide');
                            $scope.getAll();

                        } else {
                             // if not successful, bind errors to error variables
                        }
                    });
        }, function (btn) {

        });

    };
    
    $scope.clearData = function () {
        console.log('Clearing Data...');
        $scope.addEvent = {};
    };

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

        console.log('Event: ' + calEvent.start2);
        
        $scope.addEvent.event_id = calEvent.id;
        $scope.addEvent.event_name = calEvent.title;
        $scope.addEvent.event_desc = calEvent.desc;
        var dStart = new Date(calEvent.start2);
        $('#reservation1').val(dStart.getFullYear()+'-'+(dStart.getMonth()+1)+'-'+dStart.getUTCDate());
        var dEnd = new Date(calEvent.end);
        $scope.addEvent.event_fini = $('#reservation1').val();
        $scope.addEvent.event_hini = dStart.getHours();
        $scope.addEvent.event_mini = dStart.getMinutes();
        $scope.addEvent.event_fallday = calEvent.allDay;
        if (!calEvent.allDay){
            $scope.addEvent.event_ffin = dEnd.getFullYear()+'-'+(dEnd.getMonth()+1)+'-'+dEnd.getUTCDate();
             $scope.addEvent.event_hfin = dEnd.getHours();
        $scope.addEvent.event_mfin = dEnd.getMinutes();
        }else{
           delete  $scope.addEvent.event_ffin;
           delete  $scope.addEvent.event_hfin;
           delete  $scope.addEvent.event_mfin;
        }
        $scope.addEvent.event_type = calEvent.type;
        console.log(dStart.getUTCDate());
        
        
        $('#myModal2').modal('toggle');
        $( "#prueba" ).blur();

    }


function day(date, jsEvent, view) {
    
    console.log(date.format()+'++++++++++');
    var today = new Date();
    $( "#clearData" ).trigger( "click" );
        if (new Date(date.format()) >= new Date(today.getFullYear(),today.getMonth(),today.getUTCDate())){
            $('#reservation1').val(date.format());
            
            $('#myModal2').modal('toggle');
            d = date.format();
        }
    
    console.log(events);

}


$('#myModal2').on('hidden.bs.modal', function () {
    $scope.clearData();
});


});

