axios({
    method: 'get',
    url: '/api/latest-bookings/guides',

})
.then(function(response) {
    let allBookings = response.data.data;
    /*console.log(allArticles[1].picture);*/
 //   allArticles.forEach(data => {
      /*  let divSwiper = document.createElement("div");
        divSwiper.setAttribute("class", "swiper-slide");
        let swiperSlider = document.getElementById("slider");
       // console.log(swiperSlider);
        swiperSlider.appendChild(divSwiper);
        //divSwiper.innerHTML = data.picture[0].path;

        let divSelected = document.getElementsByClassName("swiper-slide")[0];*/

        for (let i = 0; i < allBookings.length; i++) {
            let divSwiperGuide = document.createElement("div");
            divSwiperGuide.setAttribute("class", "swiper-slide-booking");
            let swiperSliderBooking = document.getElementById("slider-booking");
            swiperSliderBooking.appendChild(divSwiperGuide);
    
            let divSwiperSelected = document.getElementsByClassName("swiper-slide-booking")[i];
            let addLink = document.createElement("a");
            addLink.href = "http://127.0.0.1:8000/profile/"+allBookings[i].guide.id;
            addLink.setAttribute("class", "link-slider-booking");
            //console.log(link);
            divSwiperSelected.appendChild(addLink);
            let aTag = document.getElementsByClassName("link-slider-booking")[i];
            let imgTag = document.createElement("img");
            imgTag.src = allBookings[i].guide.picture;
            imgTag.setAttribute('class', 'rounded-full');
            aTag.appendChild(imgTag);
       }

 //   });

})

.catch(function(error) {
    console.log(error);
}); 