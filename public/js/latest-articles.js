axios({
    method: 'get',
    url: '/api/latest-articles',
})
.then(function(response) {
    let allArticles = response.data.data;

        for (let i = 0; i < allArticles.length; i++) {
            let divSwiper = document.createElement("div");
            divSwiper.setAttribute("class", "swiper-slide");
            let swiperSlider = document.getElementById("slider");
            swiperSlider.appendChild(divSwiper);
    
            let divSelected = document.getElementsByClassName("swiper-slide")[i];
            let link = document.createElement("a");
            link.href = "http://127.0.0.1:8000/show-article/"+allArticles[i].id;
            link.setAttribute("class", "link-slider");
            //console.log(link);
            divSelected.appendChild(link);
            let a = document.getElementsByClassName("link-slider")[i];
            let img = document.createElement("img");
            img.src = allArticles[i].picture[0].path;
            img.setAttribute("class", "rounded-md");
            a.appendChild(img);
            let title = document.createElement("div");
            title.setAttribute("class", "title-slider");
            divSelected.appendChild(title);
            title.innerHTML = allArticles[i].title.substring(0, 25) + "...";
           // title.innerHTML = allArticles[i].title.substring(0, 25) + "..." + "<p class='city-article'>" + allArticles[i].user.city + "</p>";
            console.log(title);
       }
})

.catch(function(error) {
    console.log(error);
}); 