let modals = document.querySelectorAll(".modalCall");
console.log(modals);
modals.forEach(modal => {
    modal.addEventListener('click', function(event){
        let idPicture = event.target.getAttribute("id");
        console.log(idPicture)
        let formData = new FormData();
        formData.append('id', idPicture);
        fetch('/insta-projet/profile/modal.php', {
            method:'post',
            body: formData
        }).then((Response)=>{
            return Response.json();
        }).then((data)=>{
            console.log("control",data);

            document.querySelector('.inner-picture').setAttribute('src', data.picture.photo_link);  
            document.querySelector('.profil-picture-modal').setAttribute('src', data.user.profile_picture);  
            document.querySelector('.form-modal').setAttribute('action', "/insta-projet/profile/process/insert-comments.php?mail="+data.user.email); 
            document.querySelector('.p-modal').innerHTML = data.user.name
            console.log("control selector", document.querySelector('.id-dynamique').value = data.picture.id);
            let commentZone =  document.querySelector(".comment-list");
            commentZone.innerHTML = ""
            data.comment.forEach(com => {
               commentZone.innerHTML += "<div class='comment-box'><span><a href="+"/insta-projet/profile/profile-user.php?mail="+com.email+"><img class='comment-profil-picture' src="+com.profile_picture+">  "+com.name+" :</a></span>"+"<p> "+com.content+"</p>"+"<p><i>"+com.comment_date+"<i></p></div>"
           })
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
