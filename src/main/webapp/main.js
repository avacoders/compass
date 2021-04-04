var $doc = $(".first");
var value1=0;
var value2 = 0;
var value3 = $(document).scrollTop();
var value4 = 0;
var k =0;
var j =0;
var a= 0;

$(function () {

    $(window).scroll(function () {
        var $doc = $(".img-motion");

        a++;
        value3 = $(this).scrollTop();
        if(value3 > value4)
        {
            value1 +=3 ;
            k++;
            $doc.css("transform", `translateY(${value1}px)`);
            console.log(value1)
        }
        else{
            j++;
            value1 -=3;
            console.log(value1);
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
    console.log("clicked")
});

console.log("Clicked");