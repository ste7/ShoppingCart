$(document).ready(function () {
    $('.minus, .plus').on('click', function () {
        var count = $('.count-add').eq(index).val();

        if($(this).hasClass('minus')){
            var index = $('.minus').index(this);

            $('.count-add').eq(index).val(function (x, y) {
                return (y > 1) ? --y : 1;
            });
        }else{
            var index = $('.plus').index(this);

            $('.count-add').eq(index).val(function (x, y) {
                return ++y;
            });
        }
    });



    function getcart() {
        $('.cart-drop').load('app/ajax/cart.php');
    }
    getcart();

    $('.for').on('submit', '.frm', function () {
        var url = $(this).attr('action'),
            data = {};

        $(this).find('[name]').each(function (index, value) {
            var name = $(this).attr('name'),
                value = $(this).val();
            data[name] = value;
        });

        $.ajax({
            url: url,
            type: 'post',
            data: data,
            success: function () {
                getcart();
            }
        });
        return false;
    });
});