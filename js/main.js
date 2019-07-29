/* Portfolio grid: isotope
---------------------------------------------------------- */
function portfolio_grid() {
  var layout_modes = {
      fitrows: 'fitRows',
      masonry: 'masonry'
  }
  jQuery('.portfolio-items-filtered_grid, .portfolio-items-grid').each(function(){
      var $container = jQuery(this);
      var $thumbs = $container.find('.portfolio-items-grid-w');
      var layout_mode = $thumbs.attr('data-layout-mode');
      $thumbs.isotope({
          // options
          itemSelector : '.isotope-item',
          layoutMode : (layout_modes[layout_mode]==undefined ? 'fitRows' : layout_modes[layout_mode])
      });
      $container.find('.categories_filter a').data('isotope', $thumbs).click(function(e){
          e.preventDefault();
          var $thumbs = jQuery(this).data('isotope');
          jQuery(this).parent().parent().find('.active').removeClass('active');
          jQuery(this).parent().addClass('active');
          $thumbs.isotope({filter: jQuery(this).attr('data-filter')});
      });
      jQuery(window).load(function() {
          $thumbs.isotope("layout");
      });
  });
}


jQuery(document).ready(function($) {
  if($('.carousel').length){
    var carousel_interval = 3000;
    if($('.carousel').data('interval')) carousel_interval = $('.carousel').data('interval');
    $('.carousel[data-autostart=yes]').carousel({
      'interval' : carousel_interval
    });

    $('.carousel[data-autostart=yes]').carousel('cycle');
    if($('.main-slider.carousel .portfolio-items-grid-w').length){
      $('.main-slider.carousel').bind('slide.bs.carousel', function (e) {
        setTimeout(function(){$('.portfolio-items-grid-w').isotope('layout');}, 500);
      });
    }
  }

  $('.fluid-posts-w').imagesLoaded( function(){
    $('.fluid-posts-w').isotope({
      itemSelector : '.item',
      resizable: false, // disable normal resizing
      animationEngine : 'best-available'
    });
  });
  // update columnWidth on window resize
  $(window).smartresize( function(){
    $('.fluid-posts-w').isotope({
      // update columnWidth to a percentage of container width
      animationEngine : 'best-available'
    });
  });

  var $full_width_container = $('.full-width-posts-w');
  // initialize Isotope
  $full_width_container.imagesLoaded( function(){
    $full_width_container.isotope({
      itemSelector : '.item',
      resizable: false // disable normal resizing
    });
  });

  // update columnWidth on window resize
  $(window).smartresize(function(){
    $full_width_container.isotope({
      itemSelector : '.item'
    });
  });

  $('.flexslider').flexslider({
    animation: "fade",
    smoothHeight : true,
    pauseOnHover: true,
    slideshow: false,
    start: function(slider){
      $(window).trigger('resize');
    }
  });

  portfolio_grid();

  $('.content-slider').on('slid', function(){
    $(window).trigger('resize');
  });

  $("a[data-rel^='prettyPhoto']").prettyPhoto({hook: 'data-rel'});

  $('a[data-toggle="testimonial"]').on("click", function(e) {
    $(this).closest('.testimonials-style-clicktoshow').find('a[data-toggle="testimonial"]').removeClass("active");
    $(this).addClass("active");
    $('.testimonial-speech').removeClass('active');
    $('.testimonial-speech' + $(this).attr('href')).addClass('active');
    return false;
  });
});