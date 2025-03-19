

document.addEventListener("click", function (element) {
    if (element.target.className.includes("follow")) {
        let userToFollow = element.target.dataset.userpost;

        fetch("controller-followed.php?user=" + userToFollow)
            .then((response) => response.text())
            .then((data) => {
                if (data == "followed") {
                    
                    element.target.parentElement.innerHTML =
                        `<button class="btn btn-sm bg-base-300 follow" data-userpost="` + userToFollow + `">Ne plus suivre</button>`;
                    if (document.getElementById('comptFollow')) {
                        document.getElementById('comptFollow').innerHTML = parseInt(document.querySelector('#comptFollow').innerHTML) + 1
                    }
                } else if (data == "unfollowed") {
                    
                    element.target.parentElement.innerHTML = `<button class="btn btn-sm bg-[#84ad21] text-white follow" data-userpost="` + userToFollow + `">Suivre</button>`;
                    if (document.getElementById('comptFollow')) {
                        document.getElementById("comptFollow").innerHTML = parseInt(document.querySelector("#comptFollow").innerHTML) - 1;
                    }
                }
            });
    }

    

    if (element.target.className.includes("delete")) {

        let commentToDelete = element.target.dataset.comment;
                
        fetch("controller-deletecomment.php?&comment=" + commentToDelete)
        .then((response) => response.text())
        .then((data) => {
            if(data){
                location.reload();
            }
        })
    }

    // console.log(element.target.getAttribute("data-post"))

});
