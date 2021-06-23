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
            document.querySelector('.like-heart').setAttribute('id', data.picture.id ) 
            document.querySelector('.inner-picture').setAttribute('src', data.picture.photo_link);  
            document.querySelector('.profil-picture-modal').setAttribute('src', data.user.profile_picture);  
            document.querySelector('.p-modal').innerHTML = data.user.name
            console.log("control selector", data.picture.id);
            document.querySelector('.id-dynamique').value = data.picture.id
            console.log("IMPORTANT",data);
             console.log("comment IMPORTANT", data.comment)
          
            data.comment.forEach(com => {
                commentZone.innerHTML += "<div class='comment-box'><span><a href="+"/insta-projet/profile/profile-user.php?mail="+com.email+"><img class='comment-profil-picture' src="+com.profile_picture+">  "+com.name+" :</a></span>"+"<p> "+com.content+"</p>"+"<p><i>"+com.comment_date+"<i></p></div>"
        })
        })
    })
})


let likeDiv = document.querySelector(".like-heart")
likeDiv.addEventListener('click', function(e) {
console.log("event", e.target);

let idPictures = likeDiv.getAttribute("id");
    console.log("id pic js",idPictures);
    let formDatas = new FormData();
    formDatas.append('idPicture', idPictures);
    fetch('/insta-projet/profile/process/likes-process.php', {
        method:'post',
        body: formDatas
    }) .then((Response)=>{
        return Response.text()
    }).then((data)=>{
        console.log(data)
    })
})

let sendMessage = document.querySelector(".sendComment");
let commentZone =  document.querySelector(".comment-list");



    function SendMessage(){
        console.log("JECOUTE");
        let contentPost = document.querySelector("#content");
        let idPicturePost = document.querySelector("#id_picture");
        let idUserPost = document.querySelector("#id_user_comment");
    
        let formResfresh = new FormData()
        formResfresh.append('content', contentPost.value)
        formResfresh.append('id_picture', idPicturePost.value)
        formResfresh.append('id_user_comment', idUserPost.value)
        fetch('process/insert-comments.php', {
            method:'post',
            body: formResfresh
        }).then(()=>{
    
           commentZone.innerHTML = ""
           contentPost.value= ""
            refresh()
        })

    }

function refresh(){
    let idPicturePost = document.querySelector("#id_picture");
    console.log(idPicturePost.value, "YOLOOOOOOOOOOOOOOOOOOO");
    let formId = new FormData()
    formId.append('id', idPicturePost.value)
    fetch("process/get-comment-process.php", {

        method:'post',
        body: formId

    }).then((Response)=>{
        return Response.json()
    }).then((data)=>{


        data.forEach(com => {
           commentZone.innerHTML += "<div class='comment-box'><span><a href="+"/insta-projet/profile/profile-user.php?mail="+com.email+"><img class='comment-profil-picture' src="+com.profile_picture+">  "+com.name+" :</a></span>"+"<p> "+com.content+"</p>"+"<p><i>"+com.comment_date+"<i></p></div>"
       })
   

        console.log("TEST HERE", data)
        //boxMessage.innerHTML = data
    }).catch((e)=>{
        
    })
}

