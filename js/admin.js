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



});





