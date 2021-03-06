﻿/* =================================================================

 License : e-TRUST Inc.

 File name : function.js

 Style : function

================================================================= */

setTimeout(function(){
    $('#cubewrap').fadeOut('slow','swing');
},800)

$(function(){

/* ##### START JQUERY TEMPLATE ##################################### */

rollover("#siteID a img",0.6,200); //除外するclass,id / opacity / speed
scroll("",500,200); //対象ID / スクロール量 / speed
imgReplace();
/*accordionPanel(".accBtn",".accOpen",300);*/
spAutoTel(".tel","044-866-1285"); //telをwrapしている要素にclassをつける
meanmenu("#nav_header"); //

/* ##### START JQUERY ############################################## */

$(window).bind("load resize scroll", function() {
    $('.mean-push').html('<span></span><span></span><span></span>');
});

$('.mean-push').click(function(){
   $('#nav_header').toggle();
});

$('.open-close, .toogle-close-filter').click(function(){
    //$('.isotope_wrap').slideToggle();
    $('.isotope_wrap').toggleClass('isotope_wrap_open');
    $('.toogle-close-filter').toggleClass('toogle-close-filter-active');

})


$(document).ready(function(){
    //
        
    //
    $('.onepage').owlCarousel({
        loop:true,
        center:false,
        items:1,
        margin:10,
        nav:true,
        responsiveClass:true,
        responsive:{
            468:{
                items:2,
                center: true
            },
            968:{
                items:3,
                center: true
            },
            1500:{
                items:4,
                center: true
            }
        }
    })
    $('.banhang').owlCarousel({
        loop:true,
        center:true,
        items:1,
        margin:10,
        nav:true,
        responsiveClass:true,
        responsive:{
            468:{
                items:2,
                center: true
            },
            968:{
                items:3,
                center: true
            },
            1500:{
                items:4,
                center: true
            }
        }
    })
    $('.doanhnghiep').owlCarousel({
        loop:true,
        center:true,
        items:1,
        margin:10,
        nav:true,
        responsiveClass:true,
        responsive:{
            468:{
                items:2,
                center: true
            },
            968:{
                items:3,
                center: true
            },
            1500:{
                items:4,
                center: true
            }
        }
    })
});


$('.agency-wrap .agency-slider').slick({
  infinite: true,
  speed: 600,
  slidesToShow: 10,
  slidesToScroll: 1,
  dots: false,
  autoplay: true,
  arrows: false,
  autoplaySpeed: 3000,
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 7,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    }
  ]

});

$('.fs-slider').each(function() {
    $(this).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        draggable: true,
        fade: true,
        dots: true
    });
});

$(document).ready(function() {
    $('#manual-ajax').click(function() {
      //this.blur(); // Manually remove focus from clicked link.
      //$.get(this.href, function(html) {
      //    $(html).appendTo('body').modal();
      //});
      $('.jquery-modal').fadeToggle();
      return false;
    });
    $('.close-pop-up').click(function() {
        $('.jquery-modal').fadeOut();
        return false;
    });

    lightbox.option({
      'fitImagesInViewport': true,
      'wrapAround': true
    })

    $('#regist-ajax').click(function(event) {
      event.preventDefault();
      this.blur(); // Manually remove focus from clicked link.
      $.get(this.href, function(html) {
        $(html).appendTo('body').modal();
      });

    });

    lightbox.option({
      'fitImagesInViewport': true,
      'wrapAround': true
    })
});



function FixHeightContent(){
    var hWindow = $(window).height();
    if($('#contents_wrap').length > 0) {
        $('#contents_wrap').css('min-height',hWindow);
    }else {

    }
}




// function convert number with comma
function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}


// Total Price Detail Page
//$('.detail_box_free .detail_box_btn_reg').hide();
$('.td_tit input').click(function(){
	//var current_total = Number($('.real_value_total').text());
	var current_total = Number($('.real_value_total').val());
	console.log(current_total);

	var this_price = $(this).parent().next().find('.real_value').text();
	var this_price = Number(this_price);

	//console.log(typeof(this_price));
	//console.log(typeof(current_total));
	//console.log(this_price);

	if ( $(this).is(':checked') ) {
		var total = current_total + this_price;
		//console.log(total);
		$('.real_value_total').val(total);
		$('.td_total_price b').text(numberWithCommas(total));
	}
	else {
		var total = current_total - this_price;
		var realValue = $('.real_value_total').val(total);
		$('.td_total_price b').text(numberWithCommas(total));
	}

});

// Action for Form Basic and Professional
$('#pro_form').hide();
$('.form03').hide();
$('#pro_sign').click(function(){
	$('#pro_form').slideDown();
    $('.close_detail_form').addClass('close_detail_form_active');
});
$('.close_detail_form').click(function(){
    $('.close_detail_form').removeClass('close_detail_form_active');
    $('#pro_form').slideUp();
});

/*$('#fblike').click(function(){
    //console.log('da click');
	$('#pro_form').slideDown();
    $('.close_detail_form').addClass('close_detail_form_active');
});
$('.close_detail_form').click(function(){
    $('.close_detail_form').removeClass('close_detail_form_active');
    $('#pro_form').slideUp();
});*/

$('.regist03').click(function(){
	$('.form03').slideToggle();
    $('.hide_register').addClass('hide_register_active');
});
$('.form03 .close_detail_form, .reg_close_btn').click(function(){
    $('.form03').hide();
    $('.hide_register').removeClass('hide_register_active');
});

$('#sub-menu > a').click(function(){
    $('#sub-menu > ul').slideToggle();
    $('#sub-menu').toggleClass('sub-menu-active');
});


// Silde Toogle Detail Page
$(document).ready(function(){
    $('.detail_box_toggle').click(function(){
        $(this).next('.detail_box_target').stop().slideToggle("slow");
    });
});

// Active Form Regist



// Active SP SmartPhone Device and PC Device
$('.mobile-btn a').click(function(){
    $('.detail_main_phone').toggleClass('detail_main_phone_active');
    //$('.detail_main_web').toggleClass('detail_main_web_nonactive');
});

$('.desktop-btn a').click(function(){
    $('.detail_main_phone').toggleClass('detail_main_phone_nonactive');
});

// Change Images to Background Main Img





/*$(window).bind("load", function() {
   if ( $(window).width() < 768) {
        $('.detail_title').insertAfter($('.detail_btn_demo'));
        //console.log('add');
    } else {
        if($('.detail_title').lengh > 1){
            $('.detail_title').insertBefore($('.detail_box'));
            //console.log('remove');
        }
    }
});*/

// Scroll Top Change Color Header
/*$(window).load(function() {
    var HSlider = $('#slider').height();
    //var HWindow = $(window).height();
    //var HSliderActive = HSlider - HWindow;
    $(window).scroll(function(){
        //console.log(HSlider, HWindow, HSliderActive);
        if($(this).scrollTop() >= HSlider) {
            $('.h_intro').addClass('h_intro_active');
            $('.h_tab').addClass('h_tab_active');
        }
        else {
            $('.h_intro').removeClass('h_intro_active');
            $('.h_tab').removeClass('h_tab_active');
        }
    });
});*/




// init Masonry

$(document).ready(function(){

    var $grid =  $('.masonry_grid').masonry({
        itemSelector: '.masorny_item',
        columnWidth: '.masorny_sizer',
        percentPosition: true
    });

    var $grid_brand = $('.brand_grid').masonry({
        itemSelector: '.brand_item',
        columnWidth: '.brand_sizer',
        percentPosition: true
    });

    // layout Masonry after each image loads

    $grid.imagesLoaded().progress( function() {
      $grid.masonry('layout');
      $grid_brand.masonry('layout');
    });



})



// Isotope

$(document).ready(function(){
    var $grid = $('.isotope_grid').isotope({
      sortBy : 'random',
      filter: ':nth-child(-n+12)'
    });

    // filter items on button click
    $('.isotope_wrap').on( 'click', '.isotope_button', function() {
      var filterValue = $(this).attr('data-filter');
      $grid.isotope({ filter: filterValue });
    });


    $grid.imagesLoaded().progress( function() {
        $grid.isotope('layout');
    });








    // with jQuery
    var $photogrid = $('.photo-detail').isotope({
        percentPosition: true,
        layoutMode: 'masonry',
        itemSelector: '.concept-item',
        masonry: {
        columnWidth: '.concept-size'
        }
    });

    $photogrid.imagesLoaded().progress( function() {
        $photogrid.isotope('layout');
    });


})



/* fixed menu */
/*
$(function() {
    if($('.isotope_wrap').length > 0) {
        var hIsotopeWrap   = $('.isotope_wrap').height();
    	var $menu   = $('.isotope_wrap').offset().top + hIsotopeWrap;
        //console.log($menu);
       $(window).scroll(function() {
            if ($(window).scrollTop() > $menu) {
                $(".isotope_wrap").addClass("isotope_fixed");
                $(".isotope_grid").css('margin-top',hIsotopeWrap);
                //$(".isotope_grip_wrap").addClass("isotope_grid_wrap_fixed");
            } else {
                $(".isotope_wrap").removeClass("isotope_fixed");
                $(".isotope_grid").css("margin-top",'0');
                //$(".isotope_grip_wrap").removeClass("isotope_grid_wrap_fixed");
            }
        });

    }
});

/* Start Active Menu */

$('#nav_header ul li').each(function(){
	if(window.location.href.indexOf($(this).find('a:first').attr('href'))>-1) {
		$(this).addClass('active').siblings().removeClass('active');
		$(this).parents('li').addClass('active').siblings().removeClass('active');
	}
});


$('.isotope_wrap > h3').each(function(){
	if(window.location.href.indexOf($(this).find('a:first').attr('href'))>-1) {
	   alert(1);
		$(this).addClass('iso_actived').siblings().removeClass('iso_actived');
        $(this).parents('h3').addClass('active').siblings().removeClass('active');
	}
});

/* Start SP Menu **/

/*$(function(){

	$('.mean-nav li a:not(".mean-expand")').each(function() {

		var alt = $(this).find('img').attr('alt');

		$(this).text(alt);

	});

});



$(window).resize(function(e) {

	var w = $(window).width();



	if(w <=640){

		$(function(){

			$('.mean-nav li > a:not(".mean-expand")').each(function() {

				var alt = $(this).find('img').attr('alt');

				$(this).text(alt);

			});

		});

	}

	else {

		return ;

	}

});

/* End SP Menu **/



/*

$(window).load(function() {

window_load();

window.onresize = window_load;

function window_load() {



$('.tile').each(function(){

	var minWidthSp = 468;

	var minWidthTb = 768;

	var windowWidth = parseInt(window.innerWidth||document.documentElement.clientWidth);

	if (minWidthTb <= windowWidth) {

		$(this).find('.tb_index').tile(4);

	}

	else if (minWidthSp <= windowWidth) {

		$(this).find('.tb_index').tile(2);

	}

	else {

		$('.tb_index').removeAttr('style');

	}

});



}

});





/* !dropdownmenu ------------------------------------------------------------ */

/*    $("#nav_global ul li ul").hide();

    $("#nav_global ul li").hover(function(){

    	$("ul:not(:animated)", this).slideDown();

    	},function(){$("ul",this).slideUp();

    });

    $('#nav_global ul li').each(function(){

    	if(window.location.href.indexOf($(this).find('a:first').attr('href'))>-1)

    	{

    		$(this).addClass('active').siblings().removeClass('active');

    		$(this).parents('li').addClass('active').siblings().removeClass('active');

    	}

    });











/* !SP ---------------------------------------------------------------- */

/*

$('a img').bind('touchstart', function() {

  $(this).attr('src', $(this).attr('src').replace('_off', '_on'));

});

$('a img').bind('touchend', function() {

  $(this).attr('src', $(this).attr('src').replace('_on', '_off'));

});



$('.meanmenu-reveal').click(function(){

    $('.mean-bar').toggleClass('m_active');

});





/* START NAV MENU*/

/*$(function(){

    $("#sub_nav").hide();

        $("#nav_global ul>li").hover(function(){

            $("ul:not(:animated)", this).slideDown();

        },function(){$("#sub_nav",this).slideUp();

    });

});

/* End Nav Menu */



/*

$('.divR  div').filter(function () {

　return $(this).text() === '\n';

}).remove();

$(".divR  div:empty").remove();



$('.l_ct div').filter(function () {

　return $(this).text() === '\n';

}).remove();

$(".l_ct div:empty").remove();



$('.r_ct div').filter(function () {

　return $(this).text() === '\n';

}).remove();

$(".r_ct div:empty").remove();



$('.box1 div').filter(function () {

　return $(this).text() === '\n';

}).remove();

$(".box1 div:empty").remove();






$('.tb_index1_i  ').matchHeight();



var tit = $('.h2_line_sub').text();

$('.h2_line').text(tit);





var href = $('.tb_index1 .td_img a').attr('href');

$( ".grid_item" ).append( "<a class='grid_hover' href='"+href+"'></a>" );



$(".box2").wrap("<div class='outerbox1 inner'></div>")

$(".breadcrumb").insertBefore($(".h2_line"));



/*



$(".banner1").insertBefore($("#global_footer"));

*/

/*

var h_ct = $('.boxOuter').length;

if ( h_ct > 0 ) {

 var copy = $('.boxOuter').html();

 $('#h_content .inner').html(copy);

 $('.boxOuter').remove();

}



*/



/* ##### END JQUERY ################################################ */

});







/* !meanmenu ------------------------------------------------------------ */

var meanmenu = function(elemClass){

	$(elemClass).meanmenu({

	 meanMenuClose: "×", // クローズボタン

	 meanMenuCloseSize: "25px", // クローズボタンのフォントサイズ

	 meanMenuOpen: "<span /><span /><span />", // 通常ボタン

	 meanRevealPosition: "right", // 表示位置

	 meanRevealColour: "", // 背景色

	 meanScreenWidth: "1000", // ブレイクポイント)

	});

};



/* !rollover ---------------------------------------------------------------- */

var rollover = function(exclusion,opacity,speed){

	$("a img").not(exclusion).each(function(){

		var img = $(this);

		if( $(this).attr("src").match("_off")){

			$(this).hover(function(){

				$(img).attr("src",$(img).attr("src").replace("_off","_on"));

			},function(){

				$(img).attr("src",$(img).attr("src").replace("_on","_off"));

			});

		} else {

			$(this).hover(function(){

				$(img).stop().animate({"opacity":opacity},speed);

			},function(){

				$(img).stop().animate({"opacity":1},speed);

			});

		}

	});

};



/* !smoothscroll ------------------------------------------------------------ */

var scroll = function(elemClass,scrollIncrement,speed){

	$('a[href^=#]').click(function(){

		var href= $(this).attr("href");

		var target = $(href == "#" || href == "" ? 'html' : href);

		var position = target.offset().top;

		$("html, body").animate({scrollTop:position}, speed, "swing");

		return false;

	});

	$(elemClass).hide();

	$(window).scroll(function () {

		if ($(this).scrollTop() > scrollIncrement) {

			$(elemClass).fadeIn();

		} else {

			$(elemClass).fadeOut();

		}

	});

 // 	var device = navigator.userAgent;

 // 	if(device.indexOf('iPhone') > 0 || device.indexOf('iPod') > 0 || device.indexOf('Android') > 0){

 // 	$(elemClass).css({"position":"fixed","right":"0","bottom":"0"});

 // }

};



/* !img replace ------------------------------------------------------------ */

var imgReplace = function(){

	var $setElem = $('img'),

	replaceWidth = 768;

	$setElem.each(function(){

		var $this = $(this);

		function imgSize(){

			var windowWidth = parseInt(window.innerWidth||document.documentElement.clientWidth);

			if(windowWidth >= replaceWidth) {

				$this.attr('src',$this.attr('src').replace('_sp','_pc'));

			} else if(windowWidth < replaceWidth) {

				$this.attr('src',$this.attr('src').replace('_pc','_sp'));

			}

		}

		$(window).resize(function(){imgSize();});

		imgSize();

	});

};



/* !accordionPanel ------------------------------------------------------------ */

var accordionPanel = function(btnClass,openClass,speed){

		$(btnClass).next(openClass).hide().end().not(":animated").toggle(

		function(){$(this).next(openClass).slideDown(speed);},

		function(){$(this).next(openClass).slideUp(speed);}

	);

};



/* !sp auto tel-link ------------------------------------------------------------ */

var spAutoTel = function(elemClass,telNumber){

 var device = navigator.userAgent;

 if((device.indexOf('iPhone') > 0 && device.indexOf('iPad') == -1) || device.indexOf('iPod') > 0 || device.indexOf('Android') > 0){

 	$(elemClass).wrapInner("<a href=tel:" + telNumber + "></a>");

 }

};



/* !isUA -------------------------------------------------------------------- */

var isUA = (function(){

	var ua = navigator.userAgent.toLowerCase();

	indexOfKey = function(key){ return (ua.indexOf(key) != -1)? true: false;}

	var o = {};

	o.ie      = function(){ return indexOfKey("msie"); }

	o.fx      = function(){ return indexOfKey("firefox"); }

	o.chrome  = function(){ return indexOfKey("chrome"); }

	o.opera   = function(){ return indexOfKey("opera"); }

	o.android = function(){ return indexOfKey("android"); }

	o.ipad    = function(){ return indexOfKey("ipad"); }

	o.ipod    = function(){ return indexOfKey("ipod"); }

	o.iphone  = function(){ return indexOfKey("iphone"); }

	return o;

})();

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
