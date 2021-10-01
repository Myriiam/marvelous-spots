//Lire messages envoyés
const openSentMessage = document.querySelectorAll("a[data-sent]");
const contentSentMessage = document.querySelectorAll("div[data-sent]");

for (var i = 0 ; i < openSentMessage.length; i++) {
    openSentMessage[i].addEventListener('click', (e) => {
        for (var y = 0 ; y < contentSentMessage.length; y++) {
            if (contentSentMessage.item(y).dataset.sent === e.target.dataset.sent) {
                contentSentMessage.item(y).classList.toggle('hidden');
                contentSentMessage.item(y).classList.toggle('flex');
            } 
        }
    });
}

//Lire messages reçus
const openMessage = document.querySelectorAll("a[data-id]");
const contentMessage = document.querySelectorAll("div[data-id]");

for (var i = 0 ; i < openMessage.length; i++) {
    openMessage[i].addEventListener('click', (e) => {
        for (var y = 0 ; y < contentMessage.length; y++) {
            if (contentMessage.item(y).dataset.id === e.target.dataset.id) {
                contentMessage.item(y).classList.toggle('hidden');
                contentMessage.item(y).classList.toggle('flex');
            } 
        }
    });
}

    
