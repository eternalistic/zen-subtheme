/**
 * @file
 * Global JavaScript file.
 */

(function($, Drupal, window, document, undefined) {

  // Nav toggle.
  Drupal.behaviors.nav_toggle = {
    attach: function (context, settings) {
      var navToggle = $('#nav__toggle', context);

      navToggle.click(function(event){
        $(this).toggleClass('is-active', context);
        $('body').toggleClass('is-navigation-expanded', context);
        event.preventDefault();
      });
    }
  };

})(jQuery, Drupal, this, this.document);
