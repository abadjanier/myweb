// Execute on page load select lenguage
$(document).ready(function () {
    $(function () {
        $('#lenguage-selector').ddlist({
            width: 105,
            onSelected: function (index, value, text) {
                // Show selected province in status panel
                $('#fruitSelect').text(text + ' (value: ' + value + ')');
            }
        });
    });
});


// Scroll Opacity Back
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(window).scrollTop() > 50) {
            $('#back-pages span').css({opacity: "0.4"});
        } else {
            $('#back-pages span').css({opacity: "1"});
        }
    });
});


// Scroll Sticky back button
$(document).ready(function () {
    var altura = $('#back-pages span').offset().top;

    $(window).on('scroll', function () {
        if ($(window).width() < 940) {
            if ($(window).scrollTop() >= altura) {
                $('#back-pages span').addClass('sticky-button');
            } else {
                $('#back-pages span').removeClass('sticky-button');
            }
        } else {
            $('#back-pages span').removeClass('sticky-button');
        }
    });
});



// Click active menu responsive
$(document).ready(function () {
    $('#menu-top .fa-bars').on('click', function () {
        $( "#menu-full-responsive" ).slideDown(800);
    });
});

// Click active menu responsive
$(document).ready(function () {
    $('#menu-full-responsive .section-close').on('click', function () {
        $( "#menu-full-responsive" ).slideUp(800);
    });
});