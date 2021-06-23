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
                data.comment.forEach(com => {
                commentZone.innerHTML += "<div class='comment-box'><span><a href="+"/insta-projet/profile/profile-user.php?mail="+com.email+"><img class='comment-profil-picture' src="+com.profile_picture+">  "+com.name+" :</a></span>"+"<p> "+com.content+"</p>"+"<p><i>"+com.comment_date+"<i></p></div>"
        })
        })
    })
})


let likeDiv = document.querySelector(".like-heart")
likeDiv.addEventListener('click', function(e) {

let idPictures = likeDiv.getAttribute("id");
    let formDatas = new FormData();
    formDatas.append('idPicture', idPictures);
    fetch('/insta-projet/profile/process/likes-process.php', {
        method:'post',
        body: formDatas
    }) .then((Response)=>{
        return Response.text()
    }).then((data)=>{

        likesRefresh(idPictures)
    })
})


    function likesRefresh(idPictures){
        let formLikeId = new FormData()
        formLikeId.append('id', idPictures)
        fetch("/insta-projet/profile/process/get-like-process.php", {
    
            method:'post',
            body: formLikeId
    
        }).then((Response)=>{
            return Response.text()
        }).then((data)=>{
            document.querySelector('.like-heart').innerHTML = data 
    
        }).catch((e)=>{


            
        })
    }



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
    }).catch((e)=>{
        
    })
}

