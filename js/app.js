// product details
$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav',
});

$('.slider-nav').slick({
  slidesToShow: 4, // Show smaller thumbnails
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: false,
  centerMode: true,
  prevArrow: false,
  nextArrow: false,
  useTransform:true,
  focusOnSelect: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4, //3
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 4, //2
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 480,
      settings: {
         slidesToShow: 4, //1
        slidesToScroll: 1,
      },
    },
  ],
});