$(function () {
        //Date range picker
        var today = new Date();
        $('#reservation').datepicker({
            format: "yyyy-mm-dd",
            startDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
            todayBtn: true,
            todayHighlight: true,
            toggleActive: false,
            autoclose: true
        });

 
      });