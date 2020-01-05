(function($) {
  $('.nav__menu-toggle').on('click', function() {
    $('.nav').toggleClass('nav--open');
    $('.nav__links-container').slideToggle('fast');
  });
})(jQuery); // jQuery bundled with WordPress
