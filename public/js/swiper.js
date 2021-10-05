/*const swiper = new Swiper('.swiper-container', {
    // Optional parameters
    loop: true,
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  });*/

/*const swiper1 = new Swiper('.swiper-container.swiper-1', {
    loop: true,
    pagination: {
      el: '.swiper-pagination1',
    },
    //pagination: '.swiper-pagination1',
    //paginationClickable: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    scrollbar: {
      el: '.swiper-scrollbar-1',
    },
  });

const swiper2 = new Swiper('.swiper-container.swiper-2', {
    loop: true,
    pagination: {
      el: '.swiper-pagination2',
    },
    slidesPerView: 1,
    //pagination: '.swiper-pagination2',
  //  paginationClickable: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  });*/

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
