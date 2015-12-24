$(document).ready(function () {

    var config = {
        source: '/User/restaurantList',
        minLength: 2,
        select: function (event, ui) {
            var restaurantexists = "false";
            $('.restaurant').each(function (index, item) {
                console.log(item);
                console.log(index);

                if (ui.item.value == $(item).val()) {
                    restaurantexists = "true";
                }
            });
            if (restaurantexists == "false") {
                var template = $('#template-hidden').clone();
                template.addClass('restaurant');
                template.val(ui.item.value);
                template.attr('name', 'restaurant[]');
                //  template.add('data-id ='.ui.item.value);
                template.attr('data-id', ui.item.value);
                //console.log(template)
                appendItem(ui.item.label, ui.item.value);
                template.removeAttr("id");
                //template.children().removeClass("hide");
                //$(template>".btn").removeClass("hide");

                console.log(template.children());
                $('#template-hidden').parent().append(template);
            }
            $('#inputRestaurant').val("");
            //$('#inputRestaurant').value('')
                return false;
        }
    };
    $('#inputRestaurant').autocomplete(config);
    $(".btn.btn-default.remove").on('click', deleteItem);

});

var appendItem = function (text, value) {
    var ul = $('#content ul');
    var template = ul.find('li:first').clone(true).appendTo(ul);
    var div = '<div class="col-sm-10">';
    div += text;
    div += '</div>';
    template.prepend(div);
    template.removeAttr("type");
    template.addClass('restaurant');
    template.attr('data-id', value);

    template.removeAttr("id");
    template.removeClass("hide");
    template.find(".btn").removeClass("hide");
    template.find(".btn").addClass('col-sm-2');
}
var deleteItem = function () {
    var button = $(this);
    var dataId = button.parent().data("id");
    console.log(dataId);
    button.parent().remove();
    $("input[type=hidden]").each(function () {
        // var InputId = $("input[type='hidden']").data("id");
        console.log($(this));
        console.log($(this).data("id"));
        var InputId = $(this).data("id");
        if (InputId == dataId) {
            $(this).remove();
        }
    })
}