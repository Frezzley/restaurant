$(document).ready(function() {
    var config = {
        source: '/User/restaurantList',
        minLength: 2,
        select: function(event, ui) {
            console.log(ui.item.value);
            var template = $('#template-hidden').clone();
            template.val(ui.item.value);
            template.removeAttr("id");
            $(this).text("").val("");
            $('#template-hidden').parent().append(template);
        }
    };
    $('#inputRestaurant').autocomplete(config);
});









