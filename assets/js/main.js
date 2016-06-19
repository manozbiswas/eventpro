jQuery(document).ready(function ($) {

    //Check to see if the window is top if not then display button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    //Click event to scroll to top
    $('.scrollToTop').click(function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });

    $('#datepicker').datepicker({
        templates: {
            leftArrow: function (date, format, language) {
                var d = new Date();
                return d.getMonth().toString();
            },
            rightArrow: function (date, format, language) {
                var d = new Date();
                var month = d.getMonth() + 2
                return month.toString();
            },
        },
        startView: 0,
        todayBtn: 'linked',
        defaultViewDate: 2,
        minViewMode: 0,
        formatDate: 'daysShort',
        format: 'm/d',
        minViewMod: 'days',
        language: 'en'
    });


    $('.next').click(function (e) {
    });

    $('.prev').click(function (e) {
    });

    $('#my_hidden_input').val(
        $('#datepicker').datepicker('getFormattedDate')
    );
    $('#datepicker').on("changeDate", function () {
        val = $('#my_hidden_input').val(
            $('#datepicker').datepicker('getFormattedDate')
        );
    });
    $('#datepicker').on("changeMonth", function (e) {
        var prev = parseInt($('.prev').html());
        var next = parseInt($('.next').html());
        var currMonth = new Date(e.date).getMonth() + 1;
        switch (parseInt(currMonth)) {
            case 1:
                $('.prev').html(12);
                $('.next').html(2)
                break;
            case 2:
                $('.prev').html(1);
                $('.next').html(3);
                break;
            case 3:
                $('.prev').html(2);
                $('.next').html(4);
                break;
            case 4:
                $('.prev').html(3);
                $('.next').html(5);
                break;
            case 5:
                $('.prev').html(4);
                $('.next').html(6);
                break;
            case 6:
                $('.prev').html(5);
                $('.next').html(7);
                break;
            case 7:
                $('.prev').html(6);
                $('.next').html(8);
                break;
            case 8:
                $('.prev').html(7);
                $('.next').html(9);
                break;
            case 9:
                $('.prev').html(8);
                $('.next').html(10);
                break;
            case 10:
                $('.prev').html(9);
                $('.next').html(11);
                break;
            case 11:
                $('.prev').html(10);
                $('.next').html(12);
                break;
            case 12:
                $('.prev').html(11);
                $('.next').html(1);
                break;
        }
    });
});