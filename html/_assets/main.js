$(function(){
  $('.close').click(function(){
    $(this).parent().fadeOut();
  });
  
  $('.servicedetail_button').click(function(){
    $(this).next().fadeIn();
  });
  
  $('.menutoggle').click(function(){
    $(this).next().fadeToggle();
  });
//  $('').click(function(){});
});