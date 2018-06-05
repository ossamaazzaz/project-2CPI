//scroll to top button
window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 60 || document.documentElement.scrollTop > 60) {
                document.getElementById("go-to-top").style.display = "block";
            } else {
                document.getElementById("go-to-top").style.display = "none";
            }
        }

        jQuery('#go-to-top').each(function(){
            jQuery(this).click(function(){ 
                jQuery('html,body').animate({ scrollTop: 0 }, 'slow');
                return false; 
            });
        })
//page preloader        
jQuery(function() {
    "use strict";
    jQuery(function() {
            jQuery(".preloader").fadeOut();
        }),

        jQuery(document).on("click", ".mega-dropdown", function(i) {
            i.stopPropagation();
        });


    var i = function() {
        (window.innerWidth > 0 ? window.innerWidth : this.screen.width) < 1170 ? (jQuery("body").addClass("mini-sidebar"),
            jQuery(".navbar-brand span").hide(), jQuery(".scroll-sidebar, .slimScrollDiv").css("overflow-x", "visible").parent().css("overflow", "visible"),
            jQuery(".sidebartoggler i").addClass("ti-menu")) : (jQuery("body").removeClass("mini-sidebar"),
            jQuery(".navbar-brand span").show());
        var i = (window.innerHeight > 0 ? window.innerHeight : this.screen.height) - 1;
        (i -= 70) < 1 && (i = 1), i > 70 && jQuery(".page-wrapper").css("min-height", i + "px");
    };


    jQuery(window).ready(i), jQuery(window).on("resize", i), jQuery(".sidebartoggler").on("click", function() {
            jQuery("body").hasClass("mini-sidebar") ? (jQuery("body").trigger("resize"), jQuery(".scroll-sidebar, .slimScrollDiv").css("overflow", "hidden").parent().css("overflow", "visible"),
                jQuery("body").removeClass("mini-sidebar"), jQuery(".navbar-brand span").show()) : (jQuery("body").trigger("resize"),
                jQuery(".scroll-sidebar, .slimScrollDiv").css("overflow-x", "visible").parent().css("overflow", "visible"),
                jQuery("body").addClass("mini-sidebar"), jQuery(".navbar-brand span").hide());
        }),



        jQuery(".fix-header .header").stick_in_parent({}), jQuery(".nav-toggler").click(function() {
            jQuery("body").toggleClass("show-sidebar"), jQuery(".nav-toggler i").toggleClass("mdi mdi-menu"),
                jQuery(".nav-toggler i").addClass("mdi mdi-close");
        }),



        jQuery(".search-box a, .search-box .app-search .srh-btn").on("click", function() {
            jQuery(".app-search").slideToggle(200);
        }),


        /*
        jQuery(".floating-labels .form-control").on("focus blur", function(i) {
            jQuery(this).parents(".form-group").toggleClass("focused", "focus" === i.type || this.value.length > 0);
        }).trigger("blur"), jQuery(function() {
            for (var i = window.location, o = jQuery("ul#sidebarnav a").filter(function() {
                    return this.href == i;
                }).addClass("active").parent().addClass("active");;) {
                if (!o.is("li")) break;
                o = o.parent().addClass("in").parent().addClass("active");
            }
        }),*/

        jQuery(function() {
            jQuery("#sidebarnav").metisMenu();
        }),

        jQuery(".scroll-sidebar").slimScroll({
            position: "left",
            size: "5px",
            height: "100%",
            color: "#dcdcdc"
        }),

        jQuery(".message-center").slimScroll({
            position: "right",
            size: "5px",
            color: "#dcdcdc"
        }),

        jQuery(".aboutscroll").slimScroll({
            position: "right",
            size: "5px",
            height: "80",
            color: "#dcdcdc"
        }),

        jQuery(".message-scroll").slimScroll({
            position: "right",
            size: "5px",
            height: "570",
            color: "#dcdcdc"
        }),

        jQuery(".chat-box").slimScroll({
            position: "right",
            size: "5px",
            height: "470",
            color: "#dcdcdc"
        }),

        jQuery(".slimscrollright").slimScroll({
            height: "100%",
            position: "right",
            size: "5px",
            color: "#dcdcdc"
        }),



        jQuery("body").trigger("resize"), jQuery(".list-task li label").click(function() {
            jQuery(this).toggleClass("task-done");
        }),



        jQuery("#to-recover").on("click", function() {
            jQuery("#loginform").slideUp(), jQuery("#recoverform").fadeIn();
        }),



        jQuery('a[data-action="collapse"]').on("click", function(i) {
            i.preventDefault(), jQuery(this).closest(".card").find('[data-action="collapse"] i').toggleClass("ti-minus ti-plus"),
                jQuery(this).closest(".card").children(".card-body").collapse("toggle");
        }),



        jQuery('a[data-action="expand"]').on("click", function(i) {
            i.preventDefault(), jQuery(this).closest(".card").find('[data-action="expand"] i').toggleClass("mdi-arrow-expand mdi-arrow-compress"),
                jQuery(this).closest(".card").toggleClass("card-fullscreen");
        }),



        jQuery('a[data-action="close"]').on("click", function() {
            jQuery(this).closest(".card").removeClass().slideUp("fast");
        });
});
//check input
var jQueryform = jQuery('.register');


jQueryform.on('keyup', 'input', function (e) {
    var jQuerythis = jQuery(this),
        jQueryinput = jQuerythis.val();
    if (jQueryinput.length > 0) {
        jQueryform.find('label').addClass('active');
        if (jQueryinput.length == 9) {
            jQueryform.find('button').addClass('active');
            console.log(e);
            if (e.which === 13) {
                jQueryform.find('button').click();
                jQuerythis.blur();
            }
        } else {
            jQueryform.find('button').removeClass('active');
        }
        jQuery(this).addClass('active');
    } else {
        jQueryform.find('label').removeClass('active');
        jQueryform.find('button').removeClass('active');
        jQuery(this).removeClass('active');
    }
});



//don't accept spaces and special chars in input
jQuery('#codeinput').on('input', function() {
  jQuery(this).val(jQuery(this).val().replace(/[^a-z0-9]/gi, ''));
});


