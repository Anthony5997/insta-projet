console.log("ok");

let popupBtn = document.querySelectorAll("[data-popup-ref]");

popupBtn.forEach(btn =>{
    btn.addEventListener('click', activePopup);

    function activePopup(){
        let popupId = btn.getAttribute('data-popup-ref');
        let popup = document.querySelector(`[data-popup-id=${popupId}]`);

        if(popup != undefined && popup != null){
            console.log('OK exist');
            let popupContent = popup.querySelector('.popup-content');
            let closeBtn = popup.querySelectorAll('[data-dismiss-popup]');

            closeBtn.forEach(btn =>{
                btn.addEventListener('click', onPopupClose);
            });
            popup.addEventListener('click', onPopupClose);

            popupContent.addEventListener('click', (e)=>{
                e.stopPropagation();
            });



            popup.classList.add('active');

            setTimeout(()=>{
            popupContent.classList.add('active');
            }, 1);

            function onPopupClose(){
                popup.classList.remove('active');
            popupContent.classList.remove('active');
            }

        }else{
            console.log("exist pas");
        }
    }
});