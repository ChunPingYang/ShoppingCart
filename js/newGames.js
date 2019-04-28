
/* Assign actions */
$(document).ready(function () {
    $("button").on("click", function () {

        $(this).parent().parent().find(".product_overlay").css({
            'transform': ' translateY(0px)',
            'opacity': '1',
            'transition': 'all ease-in-out .3s'
        }).delay(800).queue(function () {
            $(this).css({
                'transform': 'translateY(-500px)',
                'opacity': '0',
                'transition': 'all ease-in-out .3s'
            }).dequeue();
        });
    });
});

