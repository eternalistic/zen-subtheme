/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


    // Check for SVG
    // Source: http://toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script/
    // if(!Modernizr.svg) {
    //   $('img[src*="svg"]').attr('src', function() {
    //       return $(this).attr('src').replace('.svg', '.png');
    //   });
    // }


	// Nav toggle
    var $navToggle = $('#nav-toggle');
    $navToggle.click(function(e){
        $(this).toggleClass('active');
        $('#header').toggleClass('expanded');
        $('.menu-blocks', '#header').slideToggle();
        $('html, body').animate({
            scrollTop: $('#page').offset().top
        });
        e.preventDefault();
    });


    // Inline label
    // $(function(){

    //     // Search block
    //     $('#block-search-form label').addClass('infield'); 
        
    // });


    // Apply label inline function to labels with infield
    // $(function(){

    //     // Infield
    //     $('label.infield').inFieldLabels();

    // });


})(jQuery, Drupal, this, this.document);
