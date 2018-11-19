$(function() {
    "use strict";

    $('input[data-type=switch-checkbox]').each((i, el) => {
        $(el).on('change', (e) => {
            let data = {
                ajax: true,
                twoFactorAuth: +el.checked
            };

            $.ajax({
                type: 'post',
                url: $(el).data('url') || localtion.href,
                dataType: 'json',
                data: data,
                success: function (data) {
                    console.log('Данные с сервера пришли', data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('Ошибка получения ответа с сервера', jqXHR, textStatus, errorThrown);
                }
            });
        });
    });
});