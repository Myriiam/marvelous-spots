axios({
    method: 'get',
    url: '/api/latest-bookings/guides',

})
.then(function(response) {
    let allBookings = response.data.data;

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
        let name = document.createElement("div");
        name.setAttribute("class", "name-slider");
        divSwiperSelected.appendChild(name);
        name.innerHTML = allBookings[i].guide.firstname + "<p class='city'>"+ allBookings[i].guide.city +"</p>";
        console.log(name);
    }
})

.catch(function(error) {
    console.log(error);
}); 