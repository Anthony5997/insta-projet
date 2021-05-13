document.addEventListener('DOMContentLoaded',()=>{
    fetch('../profile/process/search-process.php')
    .then((response)=>{
        console.log(response);
        return response.json();
    }).then((results)=>{
        console.log(results)
        search(results)        
    })
})


function search(results){

    let search = document.querySelector("#search-user");
    let divUser = document.querySelector(".user-list");
    
    search.addEventListener("input", (event)=>{
        searchUser = event.target.value
        
        divUser.innerHTML = ''
        if(searchUser != ""){
        results.forEach(result => {
            if (result.name.includes(searchUser) ) {
                console.log(result);

                divUser.innerHTML += `
                    <div class="d-flex">
                        <p> ${result.name}</p>
                        <a href="/insta-projet/profile/profile-user.php?mail=${result.email}">Profil</a>
                    </div>`
            }
        });
    }else{
        divUser.innerHTML = ""
    }
    });
}