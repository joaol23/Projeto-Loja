var conjunto_lanche = $('.cada_produto')
var checkminus = false;
var checkadd = false;
$(conjunto_lanche).on('click', function () {
    id_input = $(this).data('id');
    var campo_input = $('.getjs-' + id_input);
    var i = campo_input.val();
    $('.minus-' + id_input).click(function () {
        checkminus = true;
        checkadd = false;
    });
    $('.add-' + id_input).on('click', function () {
        checkadd = true;
        checkminus = false;
    })
    if (checkminus == true) {
        i--;
    } else if (checkadd == true) {
        i++;
    }

    if (i < 0) {
        i = 0;
    }

    campo_input.val(i);
});