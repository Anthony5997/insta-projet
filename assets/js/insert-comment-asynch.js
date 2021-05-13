/*
let sendComment = document.querySelector(".sendComment");
console.log("bouton send",sendComment);
let idUser= document.getElementById("id_user_comment").value;
let idPicture= document.getElementById("id_picture").value;
let content= document.getElementById("content").value;
console.log("idUser",idUser,"id Picture", idPicture);
    sendComment.addEventListener('click', function(event){
        let formData = new FormData();
        formData.append('id_picture', idPicture);
        formData.append('id_user_comment', idUser);
        formData.append('content', content);
        fetch('/insta-projet/profile/process/insert-comments.php', {
            method:'post',
            body: formData
        }).then((Response)=>{
            return Response;
        })
    
    })
*/

  