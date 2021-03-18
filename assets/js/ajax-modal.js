let modals = document.querySelectorAll(".modalCall");
let courgetteBouton = document.querySelector("#courgette");
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
            console.log(data);
            document.querySelector(".img-modal").setAttribute("src", data[0].photo_link);
            //document.querySelector('.display-comments').innerHTML = ''
            data.forEach(element => {
              document.querySelector('.display-comments').innerHTML += `<p> ${element.pseudo} - ${element.content}<\p> `
            });
        })
    })
})

courgetteBouton.addEventListener('click', newQuestion)

function newQuestion(){
    $('#modalRefresh').load(document.URL +  ' #modalRefresh')
  }