// Execute on page load
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
