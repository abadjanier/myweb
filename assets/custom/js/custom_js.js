// Execute on page load select lenguage
$(document).ready(function () {
    $(function () {
        $('#lenguage-selector').ddlist({
            width: 105,
            onSelected: function (index, value, text) {
                // Show selected province in status panel
                $('#fruitSelect').text(text + ' (value: ' + value + ')');
                window.location.replace("http://localhost/fpac/lang/"+value);
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
    if ($('#back-pages span').index() != -1) {
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
    }
});


// Click active menu responsive
$(document).ready(function () {
    $('.icon-menu-top').click(function () {
        if ($('#menu-full-responsive').css("margin-right") == "0px" && !$('#menu-full-responsive').is(':animated')) {
            $('#menu-full-responsive').animate({"margin-right": "-100%"}, 'slow');
        } else {
            if (!$('#menu-full-responsive').is(':animated')) {
                $('#menu-full-responsive').animate({'margin-right': "0%"}, 'slow');
                setTimeout(function () {
                    $('#menu-full-responsive .fa-times').css({'transform': "rotate(180deg)"});
                }, 400);

            }
        }
    });
});


// Close active menu responsive
$('#menu-full-responsive .fa-times').click(function () {
    $('#menu-full-responsive .fa-times').css({'transform': "rotate(-180deg)"});
    setTimeout(function () {
        $('#menu-full-responsive').animate({"margin-right": "-100%"}, 'slow');
    }, 200);
});

// Activar checkbox de abajo una vez seleccionado lo de arriba.

$('#check-colabora-activamente').click(function () {
    $(".box-activamente").toggle(100);
});

$('#check-disponibilidad-remotas').click(function () {
    $(".box-actividades-remotas").toggle(100);
});

$('#check-disponibilidad-presenciales').click(function () {
    $(".box-actividades-presenciales").toggle(100);
});
