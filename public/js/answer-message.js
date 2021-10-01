//Modal answer in inbox
const btnContact = document.querySelectorAll("a[data-btn]");
const modal = document.querySelectorAll("div[data-modal]");
const btnClose = document.querySelectorAll("svg[data-close]");
   
for (var i = 0 ; i < btnContact.length; i++) {
    btnContact[i].addEventListener('click', (e) => {
    
        for (var y = 0 ; y < modal.length; y++) {
        
            if (modal.item(y).dataset.modal === e.target.dataset.btn) {
                modal.item(y).classList.toggle('hidden');
                modal.item(y).classList.toggle('flex');
                
                btnClose[y].addEventListener('click', (e) => {
                    for (var k = 0 ; k < modal.length; k++) {
        
                        if (modal.item(k).dataset.modal === e.target.dataset.close) {
                            modal.item(k).classList.toggle('hidden');
                            modal.item(k).classList.toggle('flex');
                        }
                    }
                });
            }
        } 
    });
}
