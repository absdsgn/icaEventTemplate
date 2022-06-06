// Mobile nav functionality 
var menuIcon            = $('#menuIcon svg');
var menu                = $('#menu');
var showClass           = 'ica-nav__menu--show';
var hideClass           = 'ica-nav__menu--hide';
var closeClass          = 'close';

menuIcon.on('click', function() {
    if ( menu.hasClass(showClass) ) {
        menu.removeClass(showClass);
        menuIcon.removeClass(closeClass);
    } else {
        menu.addClass(showClass);
        menuIcon.addClass(closeClass);
    }
});

// Smooth scroller
function smoothScroll($div) {
    var div             = $($div);
    var divHeight       = div.outerHeight();
    var scrollSpot      = $(window).scrollTop();
    var scrollDiff      = divHeight - scrollSpot;
    var scrollTo        = (scrollDiff + scrollSpot) + 'px';

    $('body, html').animate({ scrollTop: scrollTo }, 750, 'swing');
}


// Speakers carousel revolving cards
$(document).ready(function() {
    var slideNumber = '1';

    $("#speakersCarousel").on("slide.bs.carousel", function(e) {
        var carousel            = '.ica-home--speakers-carousel-inner';
        var slide               = $('[id^="carouselItem"]');
        var totalSlides         = slide.length;
        var currentSlide        = slideNumber++;

        // If currentSlide is greater than 1 and NOT greater than totalSlides
        if ( currentSlide > 1 ) {

            // Get slide that is one before active slide (i.e. if slide2, get slide 1)
            var prevSlide = $('#carouselItem' + ( currentSlide - 1 ));
            
            // Append to end of carousel
            prevSlide.appendTo(carousel);

            if ( currentSlide > totalSlides ) {
                
                // Reset count
                slideNumber = '2';
            }

        } else {

        }
    });
});
  