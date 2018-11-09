/*
Template Name: Admin Pro Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
$(function () {
    "use strict";

    var body = $("body");

    // perfect scrollbar initialisation

    $('.mini-nav, .sidebar-menu').perfectScrollbar();

    // ============================================================== 
    // This is for the top header part and sidebar part
    // ==============================================================  

    var set1 = function () {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        var topOffset = 0;
        if (width < 1170) {
            $('.mini-nav > li.selected').addClass('cnt-none');
            $('#togglebtn').hide();
        } else {
            $('.mini-nav > li.selected').removeClass('cnt-none');
            $('#togglebtn').show();
        }
    };
    $(window).ready(set1);
    $(window).on("resize", set1);

    // this is for close icon when navigation open in mobile view

    $(".nav-toggler").click(function () {
        $("body").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
        $(".nav-toggler i").addClass("ti-close");
    });

    // This is for click on Sidebar open close button 

    $(".mini-nav > li, #togglebtn").on('click', function () {
        if (body.hasClass("rmv-sidebarmenu")) {
            body.trigger("resize");
            $("#togglebtn").hide();
        } else {
            body.trigger("resize");
            $("#togglebtn").show();
        }
    });
    $(".mini-nav > li, #togglebtn").on('click', function () {
        if (body.hasClass("mini-sidebar")) {
            $('.mini-nav > li.selected').removeClass('cnt-none');
            $("#togglebtn").show();
        }
    });

    // Sidemenu toggle 

    $(".mini-nav").css("overflow", "hidden").parent().css("overflow", "visible");
    $('#togglebtn').on("click", function () {
        $('#togglebtn').hide();
        $('.mini-nav > li.selected').addClass('cnt-none');
    });
    $('.mini-nav > li').on("click", function () {
        $('#togglebtn').show();
        $('.mini-nav > li.selected').removeClass('cnt-none');
        body.removeClass('rmv-sidebarmenu');
    });
    $('.mini-nav > li').on('click', function () {
        $('.mini-nav > li.selected').removeClass('selected');
        $(this).addClass('selected');
    });

    // Add or removed class from body 

    $('#togglebtn').on('click', function () {
        body.removeClass('mini-sidebar');
        body.addClass('mini-sidebar');
    });

    // ============================================================== 
    // Auto select left navbar
    // ============================================================== 
    $(function () {
        var url = window.location;
        var element = $('ul.sidebar-menu a').filter(function () {
            return this.href == url;
        }).addClass('active').parent().addClass('active');
        while (true) {
            if (element.is('li')) {
                element = element.parent().addClass('in').parent().parent().addClass('selected');
            } else {
                break;
            }
        }
    });

    // Sidemenu style 

    $.sidemenu = function (menu) {
        var animationSpeed = 300;
        $(menu).on('click', 'li a', function (e) {
            if ($(this).next().is('.sub-menu') && $(this).next().is(':visible')) {
                $(this).next().slideUp(animationSpeed, function () {
                    $(this).next().removeClass('menu-open');
                });
                $(this).next().parent("li").removeClass("active");
            } else if (($(this).next().is('.sub-menu')) && (!$(this).next().is(':visible'))) {
                var parent = $(this).parents('ul').first();
                parent.find('ul:visible').slideUp(animationSpeed).removeClass('menu-open');
                $(this).next().slideDown(animationSpeed, function () {
                    $(this).next().addClass('menu-open');
                    parent.find('li.active').removeClass('active');
                    $(this).parent("li").addClass('active');
                });
            }
        });
    }
    $.sidemenu($('.sidebar-menu'));

});
