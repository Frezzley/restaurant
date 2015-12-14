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
                appendItem(ui.item.label,ui.item.value);
                template.removeAttr("id");
                $('#template-hidden').parent().append(template);
            }
            $('#inputRestaurant').val("");
  //          $('#inputRestaurant').value('');
        }
    };
    $('#inputRestaurant').autocomplete(config);
    $(".btn.btn-default.btn-lg.remove").on('click', deleteItem);
});
var appendItem = function (text,value) {
    var ul = $('#content ul');
    var template = ul.find('li:first').clone(true).appendTo(ul);
    template.removeAttr("type");
    template.addClass('restaurant');
    template.attr('data-id',value);
    template.append(text);
    template.removeAttr("id");
}
var deleteItem = function () {
    var button = $(this);
    var dataId = button.parent().data("id");
    button.parent().remove();
    $("input[type=hidden]").each(function () {
        var InputId = $("input[type='hidden']").data("id");
        if (InputId == dataId) {
            $(this).remove();
        }
    })
}