let modals = document.querySelectorAll(".modalCall");

modals.forEach(modal => {
    modal.addEventListener('click', function(event){
        let idPicture = event.target.getAttribute("id");
                let formData = new FormData();
        formData.append('id', idPicture);
        fetch('process/get-picture.php', {
            method:'post',
            body: formData
        }).then((Response)=>{
           return Response.json();
        }).then((data)=>{
            document.querySelector(".img-modal").setAttribute("src", data.photo_link);
        })
    })
})