(function($) {
  // First param is same as PHP constant `DFH_THEME_MOD_FOOTER_CONTENT`
  wp.customize('dfh_footer_content', function(value) {
    value.bind(function(newVal) {
      $('#footer-content-container').html(newVal);
    });
  });
})(jQuery);
