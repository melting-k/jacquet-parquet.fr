$(document).ready(function(){
  menu();
});

function menu() {
  $('#bt-menu').on('click', function() {
    $('nav').toggleClass('ouvert');
    $(this).closest('html').toggleClass('noscroll');
  });
  $('.close-menu').on('click', function() {
    $('nav').removeClass('ouvert');
    $(this).closest('html').removeClass('noscroll');
  });
};
