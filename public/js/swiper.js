var slider1 = new Swiper ('.slider1', {
    effect: 'slide',
    slidesPerView: 3,
    spaceBetween: 30,
        autoplay: {
          delay: 2500,
        //  disableOnInteraction: false,
        },
});

var slider2 = new Swiper ('.slider2', {
  effect: 'slide',
  
  pagination: {
    el: '.swiper-pagination',
  },
  
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  scrollbar: {
    el: '.swiper-scrollbar',
  },
});
