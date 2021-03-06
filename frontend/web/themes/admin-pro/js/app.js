$(function() {
    "use strict";

    // $('form').on('beforeSubmit', function (event) {
    //     if ($(this).attr('method') === 'post') {
    //         event.preventDefault();
    //         let data = $(this).serialize();
    //
    //         $.ajax({
    //             type: $(this).attr('method'),
    //             url: $(this).attr('action') || '#',
    //             data: data,
    //             success: function (response) {
    //                 prepareResponse(response);
    //             },
    //             error: function (xhr, status, error) {
    //                 console.log("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText);
    //                 console.log("Response text: " + xhr.responseText);
    //                 alert('error');
    //             },
    //             fail: function (xhr, status, error) {
    //                 console.log("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText);
    //                 console.log("Response text: " + xhr.responseText);
    //                 alert('fail');
    //             }
    //         });
    //     }
    // });

    $.fn.extend({
        bs_alert: function (type, message, title) {
            if (type === 'error') {
                type = 'danger';
            }

            let cls = 'alert-' + type,
                html = '<div class="alert ' + cls + ' alert-dismissable">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            if (typeof title !== 'undefined' && title !== '') {
                html += '<h4>' + title + '</h4>';
            }
            html += '<span>' + message + '</span></div>';
            $('.alert-block').append(html);
        },
    });

    /**
     * Prepare flash messages
     * @param {Object} flashList
     */
    function prepareFlash(flashList) {
        Object.keys(flashList).forEach((flashType) => {
            Object.keys(flashList[flashType]).forEach(k => {
                if (typeof flashList[flashType][0] === 'string') {
                    flashList[flashType].forEach(msg => {
                        $('.alert-block').bs_alert(flashType, msg);
                    })
                } else {
                    for(let i = 0; i < flashList[flashType][k].length; i++) {
                        $('.alert-block').bs_alert(flashType, flashList[flashType][k][i]);
                    }
                }
            });
        });
    }

    /**
     * Prepare flash messages
     * @param {Object} formMessageList
     */
    function prepareFormMessage(formMessageList) {
        if (!formMessageList.length) {
            return;
        }

        debugger; // FIXME: delete before deploy!
        $('#signinform-email').closest('.form-group');
    }

    /**
     * Prepare response data
     * @param {Object} response
     */
    function prepareResponse(response) {
        prepareFlash(response.flash || []);
        prepareFormMessage(response.form || []);

        if (response.redirect) {
            window.location.replace(response.redirect)
        }
    }
});