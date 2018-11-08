$(function () {
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
            flashList[flashType].forEach((flashMsg) => {
                $('.alert-block').bs_alert(flashType, flashMsg);
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

    $('.js-validate').each(function () {
        $(this).validate({
            submitHandler: function (form, e) {
                e.preventDefault();
                let data = $(form).serialize();//$(form).data('type') === 'JSON' ? $(form).serializeArray() : $(form).serialize();

                $.ajax({
                    type: $(form).attr('method') || 'get',
                    url: $(form).attr('action') || '#',
                    data: data,
                    success: function (response) {
                        prepareResponse(response);
                    },
                    error: function (xhr, status, error) {
                        console.log("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText);
                        console.log("Response text: " + xhr.responseText);
                        alert('error');
                    },
                    fail: function (xhr, status, error) {
                        console.log("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText);
                        console.log("Response text: " + xhr.responseText);
                        alert('fail');
                    }
                });
            }
        });
    });

    // Svg Polyfill
    svg4everybody();

    // Header - Sticky
    function sticky() {
        let offsetScroll = window.pageYOffset || document.documentElement.scrollTop;
        if (offsetScroll > 0) {
            $('html').addClass('is-sticky');
        } else {
            $('html').removeClass('is-sticky');
        }
    }
    sticky();
    $(window).on('scroll', function () {
        sticky();
    });

    // Header - Nav
    $('.nav').on('click', '.nav__btn', function (event) {
        event.preventDefault();
        let htmlBlock = $('html');
        if (htmlBlock.is('.is-nav-open')) {
            htmlBlock.removeClass('is-nav-open');
        } else {
            htmlBlock.addClass('is-nav-open');
        }
    });

    // Header - Signin
    $(document).on('click', '.signin__btn', function (event) {
        event.preventDefault();
        let htmlBlock = $('html'),
            parent = $(this).closest('.signin');

        htmlBlock.is('.is-signin-form-open')
            ? htmlBlock.removeClass('is-signin-form-open')
            : htmlBlock.addClass('is-signin-form-open');

        parent.hasClass('open')
            ? parent.removeClass('open')
            : parent.addClass('open');
    });

    // Header - Language
    $(document).on('click', '.language__btn', function (event) {
        event.preventDefault();
        let htmlBlock = $('html');
        if (htmlBlock.is('.is-language-open')) {
            htmlBlock.removeClass('is-language-open');
        } else {
            htmlBlock.addClass('is-language-open');
        }
    });
    $(document).on('click', function (event) {
        if ($(event.target).closest('.language').length === 0) {
            $('html').removeClass('is-language-open');
        }
    });

    // Slides
    let slickPrev = '<button class="slick-arrow slick-prev"><svg class="icon-prev"><use xlink:href="/sprites/sprite.svg#icon-prev"></use></svg></button>',
        slickNext = '<button class="slick-arrow slick-next"><svg class="icon-next"><use xlink:href="/sprites/sprite.svg#icon-next"></use></svg></button>',
        slickPrevVertical = '<button class="slick-arrow slick-prev"><svg class="icon-prev-vertical"><use xlink:href="/sprites/sprite.svg#icon-prev-vertical"></use></svg></button>',
        slickNextVertical = '<button class="slick-arrow slick-next"><svg class="icon-next-vertical"><use xlink:href="/sprites/sprite.svg#icon-next-vertical"></use></svg></button>';

    // Hero Slides
    $('.js-slick-hero').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        fade: false,
        infinite: true,
        nextArrow: slickNext,
        prevArrow: slickPrev,
        autoplay: false,
        pauseOnHover: false,
        autoplaySpeed: 10000,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    adaptiveHeight: true,
                    autoplay: false
                }
            }
        ]
    });
    setTimeout(function () {
        let mq = $(window).width();

        if (mq >= 768) {
            $('.js-slick-hero').slick('slickPlay');
        }
    }, 5000);

    // Images Slides
    $('.js-reviews').each(function () {
        let reviews = $(this),
            reviewsSlides = reviews.find('.js-reviews-slides'),
            reviewsThumbs = reviews.find('.js-reviews-thumbs');

        reviewsSlides.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            fade: true,
            infinite: true,
            asNavFor: reviewsThumbs,
            nextArrow: slickNext,
            prevArrow: slickPrev
        });

        reviewsThumbs.slick({
            vertical: true,
            centerMode: true,
            centerPadding: 0,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: reviewsSlides,
            arrows: true,
            dots: false,
            focusOnSelect: true,
            nextArrow: slickNextVertical,
            prevArrow: slickPrevVertical,
            infinite: true,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        vertical: false
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        vertical: false
                    }
                }
            ]
        });
    });

    // Fancybox
    $('[data-fancybox]').fancybox({
        type: 'inline',
        touch: false,
        buttons: []
    });

    // Forms
    $('select').styler({
        selectSearch: false,
        selectSmartPositioning: false
    });

    // Accordion
    $('.js-accordion').on('click', 'dt', function (event) {
        event.preventDefault();
        if ($(this).is('.is-active')) {
            $(this).removeClass('is-active').next('dd').slideUp('fast');
        } else {
            $(this).closest('.js-accordion').find('dt').removeClass('is-active');
            $(this).closest('.js-accordion').find('dd').slideUp('fast');
            $(this).addClass('is-active').next('dd').slideDown('fast');
        }
    });

    // ScrollTo
    $('.js-scrollto').on('click', function (event) {
        event.preventDefault();
        let href = $(this).attr('href'),
            offsetTop = $(href).offset().top;
        $('html, body').animate({
            scrollTop: offsetTop - $('.header').height() - 14
        }, 500);
    });
});
