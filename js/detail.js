$(document).ready(function(){
  $('#form--popup').hide();
  $(".register, .close-popup").click(function(){
      $('#form--popup').fadeToggle();
  });
});
