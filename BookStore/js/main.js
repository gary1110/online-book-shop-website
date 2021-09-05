/**
 *
 *  sticky navigation
 *
 */

let navbar = $(".navbar");

$(window).scroll(function () {
  // get the complete hight of window
  let oTop = $(".section-2").offset().top - window.innerHeight;
  if ($(window).scrollTop() > oTop) {
    navbar.addClass("sticky");
  } else {
    navbar.removeClass("sticky");
  }
});

// move page to certain position
$('.more-button').click(function(){$('html,body').animate({scrollTop:$('.section-1').offset().top}, 800);});


//hover book show text
$(".bestseller-item").hover
(
  function()
  {
      console.log("%%%%%%%%%%%");
      $("this p").css({ opacity: 1 });
  } 
)