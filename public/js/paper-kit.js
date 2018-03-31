/*!

 =========================================================
 * Paper Kit 2 - v2.1.0
 =========================================================

 * Product Page: http://www.creative-tim.com/product/paper-kit-2
 * Copyright 2017 Creative Tim (http://www.creative-tim.com)
 * Licensed under MIT (https://github.com/timcreative/paper-kit/blob/master/LICENSE.md)

 =========================================================

 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 */

var searchVisible = 0;
var transparent = true;

var transparentDemo = true;
var fixedTop = false;

var navbar_initialized = false;

$(document).ready(function(){
    window_width = $(window).width();

    $('.form-control').on("focus", function(){
        $(this).parent('.input-group').addClass("input-group-focus");
    }).on("blur", function(){
        $(this).parent(".input-group").removeClass("input-group-focus");
    });

});


$(document).on('click', '.navbar-toggler', function(){
    $toggle = $(this);
    if(pk.misc.navbar_menu_visible == 1) {
        $('html').removeClass('nav-open');
        pk.misc.navbar_menu_visible = 0;
        setTimeout(function(){
            $toggle.removeClass('toggled');
            $('#bodyClick').remove();
        }, 550);
    } else {
        setTimeout(function(){
            $toggle.addClass('toggled');
        }, 580);

        div = '<div id="bodyClick"></div>';
        $(div).appendTo("body").click(function() {
            $('html').removeClass('nav-open');
            pk.misc.navbar_menu_visible = 0;
            $('#bodyClick').remove();
            setTimeout(function(){
                $toggle.removeClass('toggled');
            }, 550);
        });

        $('html').addClass('nav-open');
        pk.misc.navbar_menu_visible = 1;
    }
});

pk = {
    misc:{
        navbar_menu_visible: 0
    },

    initCollapseArea: function(){
        $('[data-toggle="pk-collapse"]').each(function () {
            var thisdiv = $(this).attr("data-target");
            $(thisdiv).addClass("pk-collapse");
        });

        $('[data-toggle="pk-collapse"]').hover(function(){
            var thisdiv = $(this).attr("data-target");
            if(!$(this).hasClass('state-open')){
                $(this).addClass('state-hover');
                $(thisdiv).css({
                    'height':'30px'
                });
            }

        },
        function(){
            var thisdiv = $(this).attr("data-target");
            $(this).removeClass('state-hover');

            if(!$(this).hasClass('state-open')){
                $(thisdiv).css({
                    'height':'0px'
                });
            }
        }).click(function(event){
                event.preventDefault();

                var thisdiv = $(this).attr("data-target");
                var height = $(thisdiv).children('.panel-body').height();

                if($(this).hasClass('state-open')){
                    $(thisdiv).css({
                        'height':'0px',
                    });
                    $(this).removeClass('state-open');
                } else {
                    $(thisdiv).css({
                        'height':height + 30,
                    });
                    $(this).addClass('state-open');
                }
            });
    }

}

examples = {
    initContactUsMap: function(){
        var myLatlng = new google.maps.LatLng(44.433530, 26.093928);
        var mapOptions = {
          zoom: 14,
          center: myLatlng,
          scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
        }
        var map = new google.maps.Map(document.getElementById("contactUsMap"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            title:"Hello World!"
        });

        // To add the marker to the map, call setMap();
        marker.setMap(map);
        }
}

// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		clearTimeout(timeout);
		timeout = setTimeout(function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		}, wait);
		if (immediate && !timeout) func.apply(context, args);
	};
};
