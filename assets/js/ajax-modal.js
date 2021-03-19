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
            console.log(data[1]);
            
            
            document.querySelector(".img-modal").setAttribute("src", data[0].photo_link);
            
            //document.querySelector('.display-comments').innerHTML = ''
            if (!data[1].length) {
                console.log('ppl');
                document.querySelector('.display-comments').innerHTML = ""
            }
            data[1].forEach(element => {
                document.querySelector('.display-comments').innerHTML += `<p> ${element.pseudo} - ${element.content}</p> `
            });
            document.querySelector('#modalFormIdPhoto').value = data[0].id
        })
    })
})


/*

let boxMessage = document.querySelector("#display-comments"); // div de display
let sendMessage = document.querySelector("#commentButton"); //Button submit
let commentArea = document.querySelector("#comment-area"); //id du text area

sendMessage.addEventListener('click', function(event){
    event.preventDefault();

    let formResfresh = new FormData()
    formResfresh.append('comment-area', commentArea.value)
    fetch('process/insert-comments.php', {
        method:'post',
        body: formResfresh
    }).then(()=>{
        commentArea.value=""
        refresh()
    })
})

function refresh(){

    fetch("process/get-picture.php").then((Response)=>{
        return Response.text()
    }).then((data)=>{
        boxMessage.innerHTML = data
    }).catch((e)=>{
        
    })
}

*/