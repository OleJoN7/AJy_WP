jQuery(document).ready(function($) {

    //----------------------------------------------------

    $('#lightSlider').lightSlider({
        item: 4,
        adaptiveHeight: false,
        slideMove: 1,
        speed: 1000,
        slideMargin: 0,

        auto: true,
        loop: true,
        slideEndAnimation: true,
        pause: 2000,
        keyPress: false,
        controls: false,
        prevHtml: '',
        nextHtml: '',
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    item: 2,
                    slideMove: 1,
                    loop: true,
                    auto: true,
                    controls: false
                }
            }
        ]
    });

    //-------------ISOTOPE-----------------

    $('.portfolio-list').imagesLoaded(function(){
        $('.portfolio-list').isotope({
            layoutMode: 'fitRows',
            itemSelector: '.portfolio-post'
        });
    });
    

    $('.filter-button-group').on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        $('.portfolio-list').isotope({filter: filterValue});
    });

// ---For changing class ".is-checked" on clicked buttons--(optional)

    $('.button-group').each(function (i, item) {
        var item = $(item);
        item.on('click', 'button', function () {
            item.find('.is-checked').removeClass('is-checked');
            $(this).addClass('is-checked');
        });
    });

//-----------ISOTOPE END----------------------

    //-----SINGLE POST and BLOG POST WITHOUT IMG INSIDE----------------

    if ($(".single-post-img-wrap").has("img").length == 0) {
        $(".single-post-img-wrap").css('display', 'none');
    }

    if ($(".post-img").has("img").length == 0) {
        $(".post-img").css('display', 'none');
    }


//    ----Scroll next section-----------------------

    $(".scroll-icon").click(function () {
        $('html,body').animate({
            scrollTop: $(".man-section").offset().top
        }, 900);
    });


});  // конец document.ready

//-----------------ADD MAP with Own Marker and using own API---------------

function initMap() {                                           // or window.myMap = function () {
    var Location = new google.maps.LatLng(-33.865143, 151.209900); // set coordinates of marker
    var mapID = document.getElementById("googleMap");            // bind HTML element to map
    var mapOptions = {
        center: Location,
        zoom: 14
    };                                                           // options
    var map = new google.maps.Map(mapID, mapOptions);

    var icon = {
        url: 'https://s8.hostingkartinok.com/uploads/images/2017/06/f63d58e54d1b647983e2476bdf756929.png'
    };

    var marker = new google.maps.Marker({
        position: Location,
        animation: google.maps.Animation.BOUNCE,
        icon: icon,
    });
    marker.setMap(map);

    // Zoom to 9 when clicking on marker
    google.maps.event.addListener(marker, 'click', function () {
        map.setZoom(9);
        map.setCenter(marker.getPosition());
    });
}
