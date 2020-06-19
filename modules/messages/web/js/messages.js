(function ($) {
    $(document).on('beforeSubmit', '.messages__form', function () {
        let data = $(this).serialize();
        if ($(this).attr('id') != 'w0') {
            $(this).hide();
        }
        let request = $.ajax({
            url: $(this).data('url'),
            type: 'POST',
            data: data,
            context: $(this)
        })
        request.done(function (html) {
            if ($(this).attr('id') != 'w0') {
                $(this).parent().parent().append(html);
            } else {
                $(this).next().append(html);
            }
            $(this).trigger("reset");
            $('.messages__reply').show();
        })
        return false;
    })
    $('.messages__reply').show();
    $(document).ready(function () {
        $(document).on('click', '.messages__reply', function () {
            $(this).hide();
            let data = $(this).data();
            if ($(this).parent().find('.messages__form').length <= 0) {
                let request = $.ajax({
                    url: $(this).data('url'),
                    type: 'POST',
                    data: data,
                    context: $(this),
                    dataType: "html"
                })
                request.done(function (html) {
                    $(this).parent().prepend(html);
                })
            } else {
                $(this).parent().find('.messages__form').show();
            }
            return false;
        })
    })

})(jQuery)
