/* ================================================================= 



 License : e-TRUST Inc.



 File name : function.js



 Style : function



================================================================= */



$(function(){

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('#preview-img').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }
    $("#post-img").change(function() {
      readURL(this);
    });
    
    function readURLFeature(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('#preview-feature').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

    $("#post-feature").change(function() {
      readURLFeature(this);
    });
    
    $('.dropdown').hide();
    $('.admin-nav-menu > ul > li').each(function(){
        $(this).find('a').click(function(){
            console.log('adsad');
            $(this).parent().find("ul").slideToggle();
            $(this).parent().find("ul").toggleClass('dropdown-active');
        });
    });
    
    $('.admin-nav-menu ul li').each(function(){
    	if(window.location.href.indexOf($(this).find('a:first').attr('href'))>-1) {
    		$(this).addClass('active').siblings().removeClass('active');
    		$(this).parents('li').addClass('active').siblings().removeClass('active');
    	}
    });
    

});





