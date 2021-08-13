//Modal answer in inbox (to answer to a message from an other guide or a traveller)
/*const openMessage = document.querySelector('#open-message');
const contentMessage = document.querySelector('#content-message');
const closeContent = document.querySelector('#close-content');


const openAndCloseMessage = () => {
    console.log('ok!');
    contentMessage.classList.toggle('hidden');
    contentMessage.classList.toggle('flex');
}

openMessage.addEventListener('click', openAndCloseMessage);
closeContent.addEventListener('click', openAndCloseMessage);*/

    const openMessage = document.querySelectorAll("a[data-id]");
    const contentMessage = document.querySelectorAll("div[data-class]");
   //console.log(openMessage);
   
    //console.log(contentMessage);
   
    for (var i = 0 ; i < openMessage.length; i++) {
        openMessage[i].addEventListener('click', (e) => {
            console.log(e.target);
            for (var y = 0 ; y < contentMessage.length; y++) {
                //if (contentMessage[y].getAttribute("div[data-class]") === openMessage[i].getAttribute("div[data-id]")) {
                    contentMessage[y].classList.toggle('hidden');
                    contentMessage[y].classList.toggle('flex');
               // 
            }
        });
    }

    
