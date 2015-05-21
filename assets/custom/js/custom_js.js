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