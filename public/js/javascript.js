$(window).scroll(function() {
  if ($(document).scrollTop() > 50) {
    $('nav').addClass('shrink');
  } else {
    $('nav').removeClass('shrink');
  }
});

$(window).scroll(function() {
  if ($(document).scrollTop() > 200) {
    $('aside').addClass('scroll');
  } else {
    $('aside').removeClass('scroll');
  }
});

