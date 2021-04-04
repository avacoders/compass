var $doc = $(".first");
var value1=0;
var value2 = 0;
var value3 = $(document).scrollTop();
var value4 = 0;
var k =0;
var j =0;
var a= 0;

$(window).on('load', function(){
    $(".loader-block").toggle();
});

$(function () {

    $(window).scroll(function () {
        var $doc = $(".img-motion");

        a++;
        value3 = $(this).scrollTop();
        if(value3 > value4)
        {
            value1 +=5;
            k++;
            $doc.css("transform", `translateY(${value1}px)`);
        }
        else{
            j++;
            value1 -=5;
            $doc.css("transform", `translateY(${value1}px)`);
            if(value3 === 0)
            {
                $doc.css("transform", `translateY(${value2}px)`);
                value2=0;
                value1=0;
            }
        }

        value4 = value3;
    });
    $(document).scroll(function () {
        var $nav = $("#mainNavbar");

        $nav.toggleClass("scrolled", $(this).scrollTop() >50);
    });
});
$("#menu").click(function () {
    var $nav = $("#mainNavbar");
    $nav.toggleClass("scrolled-sm");
});

$(function() {
    var elements;
    var windowHeight;

    function init() {
        elements = $('.anim');
        windowHeight = window.innerHeight;

    }

    function checkPosition() {
        for (var i = 0; i < elements.length; i++) {
            var element = elements[i];
            var positionFromTop = elements[i].getBoundingClientRect().top;

            if (positionFromTop - windowHeight <= 0) {
                element.classList.add('card-anim');
                element.classList.remove('anim');
            }
        }
    }

    window.addEventListener('scroll', checkPosition);
    window.addEventListener('resize', init);    init();
    checkPosition();
});


$("#owl-demo").owlCarousel({
    items : 4, //10 items above 1000px browser width
    itemsDesktop : [1000,4], //5 items between 1000px and 901px
    itemsDesktopSmall : [900,3], // betweem 900px and 601px
    itemsTablet: [600,1], //2 items between 600 and 0;
    itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
    autoPlay : true,
    autoplayTimeout:100,
    stagePadding: 112,
    // Navigation
    responsive: true,
    responsiveRefreshRate: 0,
    // navigation : true,
    // navigationText : ["<img src=\"image/owl-prev.png\" alt=\"\">\n","<img src=\"image/owl-next.png\" alt=\"\">\n"],
    pagination : true,
    paginationNumbers: true,
});