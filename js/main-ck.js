jQuery(document).ready(function(e){e(".fluid-posts-w").imagesLoaded(function(){e(".fluid-posts-w").isotope({itemSelector:".item",resizable:!1,animationEngine:"best-available"})});e(window).smartresize(function(){e(".fluid-posts-w").isotope({animationEngine:"best-available"})});var t=e(".full-width-posts-w");t.imagesLoaded(function(){t.isotope({itemSelector:".item",resizable:!1})});e(window).smartresize(function(){t.isotope({itemSelector:".item"})});e(".flexslider").flexslider({animation:"slide"})});