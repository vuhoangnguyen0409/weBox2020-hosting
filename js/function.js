/* ================================================================= 

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

$('.fixH').matchHeight();
$('.isotope_item').wrapInner('<div class="isotope_item_wrap"></div>');
var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
var percent_number_step = $.animateNumber.numberStepFactories.append(' %')
$('#num_hours').animateNumber({ number: 13820, numberStep: comma_separator_number_step},2000);
$('#num_pro').prop('number', 0).animateNumber({ number: 284},2000);
$('#num_client').prop('number', 0).animateNumber({ number: 172},2000);
$('#num_sercurity').animateNumber({ number: 96, color: '#58b475', 'font-size': '2.6vw', easing: 'easeInQuad', numberStep: percent_number_step }, 2000);




function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
  readURL(this);
});

$(".home-slider").each(function(){
    $(this).slick({
      infinite: true,
      speed: 300,
      slidesToShow: 6,
      slidesToScroll: 6,
      dots: false,
      centerMode: true,
      responsive: [
        {
          breakpoint: 1450,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 5
          }
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 5
          }
        },
        {
          breakpoint: 768,
          slidesToShow: 4,
          slidesToScroll: 4
        },
        {
          breakpoint: 480,
          slidesToShow: 3,
          slidesToScroll: 3
        }
      ]
      });
});

$('.agency-slider').slick({
  infinite: true,
  speed: 600,
  slidesToShow: 10,
  slidesToScroll: 1,
  dots: false,
  autoplay: true,
  arrows: false,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 1450,
      settings: {
        slidesToShow: 10
      }
    },
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 8
      }
    },
    {
      breakpoint: 768,
      slidesToShow: 6
    },
    {
      breakpoint: 480,
      slidesToShow: 5
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
    
    $('#manual-ajax').click(function(event) {
      event.preventDefault();
      this.blur(); // Manually remove focus from clicked link.
      $.get(this.href, function(html) {
        $(html).appendTo('body').modal();
      });
        
    });
    
    $(".link").modal({
        fadeDuration: 1000,
        fadeDelay: 0.50
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

// Active Check All Data
$("#checkall").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});


// Active SP SmartPhone Device and PC Device
$('.mobile-btn a').click(function(){
    $('.detail_main_phone').toggleClass('detail_main_phone_active');
    //$('.detail_main_web').toggleClass('detail_main_web_nonactive');
});   

$('.desktop-btn a').click(function(){
    $('.detail_main_phone').toggleClass('detail_main_phone_nonactive');
});  

// Change Images to Background Main Img

$(window).bind("load resize scroll", function() {  
    var HSlider = $('#slider').height();
    var imgMain = $('.main_show').find('img').attr('src');
    var wMain = $('#contents_wrap').width();
    var HWindow = $(window).height();
    
/*    $('.photo-fashion-page').css({"max-height":HWindow,"overflow-y":'hidden'});
    $('.photo-fashion-page .photo-wrap').css("height",HWindow);*/
    
    if($('.isotope_fixed').length > 0) { 
        $('.isotope_fixed').css('width',wMain);
    }else {
        $('.isotope_wrap').removeAttr('style');
    }
    
    if($(window).width() < 969) {
         $('.main_show').css({'background':'url('+imgMain+') no-repeat center center / cover', 'height':HSlider});
    }else {
        $('.main_show').removeAttr('style');    
    }
});

    

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
    var $grid = $('.isotope_grip').isotope({
      sortBy : 'random'
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
    var $photogrid = $('.concept-photo').isotope({
        percentPosition: true,
        itemSelector: '.concept-item',
        masonry: {
        columnWidth: '.concept-size'
        }
    });
    
    $photogrid.imagesLoaded().progress( function() {
        $photogrid.isotope('layout');
    });
        
       
   /* var $fgrid = $('.photo-wrap').isotope({ 
        itemSelector: '.fs-wrap',
        masonry: {
            columnWidth: '.fs-wrap'
        }
    })*/
})



/* fixed menu */

$(function() {
    if($('.isotope_wrap').length > 0) {
        var hIsotopeWrap   = $('.isotope_wrap').height();
    	var $menu   = $('.isotope_wrap').offset().top - hIsotopeWrap+115;
        //console.log($menu);
       $(window).scroll(function() {
            if ($(window).scrollTop() > $menu) {
                $(".isotope_wrap").addClass("isotope_fixed");
                $(".isotope_grip_wrap").addClass("isotope_grid_fixed");
                //$(".isotope_grip_wrap").addClass("isotope_grid_wrap_fixed");
            } else {
                $(".isotope_wrap").removeClass("isotope_fixed");
                $(".isotope_grip_wrap").removeClass("isotope_grid_fixed");
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

/*
$('.admin-nav-menu > ul > li').each(function(){
    $(this).click(function(){
        $(this).find('ul').slideToggle();
    });
});
*/

$(".admin-nav-menu .dropdown").hide();
    $(".admin-nav-menu ul li").hover(function(){
    	$("ul:not(:animated)", this).slideDown();
    	},function(){$("ul",this).slideUp();
    });
    $('.admin-nav-menu ul li').each(function(){
    	if(window.location.href.indexOf($(this).find('a:first').attr('href'))>-1) {
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



$('.tb_index').matchHeight();



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

function popopenCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("poptabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("poptablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

