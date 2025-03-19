document.addEventListener("click", function (element) {
    if (element.target.dataset.userpost) {
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



    if (element.target.dataset.delete) {

        let commentToDelete = element.target.dataset;

        fetch("controller-deletecomment.php?&comment=" + commentToDelete)
            .then((response) => response.text())
            .then((data) => {
                if (data) {
                    location.reload();
                }
            })
    }


    let closestButton = element.target.closest("button");

    // console.log(closestButton)
    // console.log(closestButton.dataset.postlike)

    if (closestButton.dataset.postlike != 'undefined') {

        let postToLike = closestButton.dataset.postlike;
        fetch("controller-liked.php?post=" + postToLike)
            .then((response) => response.text())
            .then((data) => {

                if (data == "liked") {
                    closestButton.innerHTML =
                        `<button class="flex gap-1 items-center cursor-pointer hover:underline" data-postlike="` + postToLike + `">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#84ad21" class="size-8">
                                        <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                                    </svg>
                                </button>`;
                    document.getElementById('likespost' + postToLike).innerHTML = parseInt(document.getElementById('likespost' + postToLike).innerHTML) + 1

                } else if (data == "unliked") {

                    closestButton.innerHTML =
                        `<button class="flex gap-1 items-center cursor-pointer hover:underline" data-postlike="` + postToLike + `">
                                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#84ad21" class="size-8">
                                         <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                     </svg>
                                </button>`;
                    document.getElementById('likespost' + postToLike).innerHTML = parseInt(document.getElementById('likespost' + postToLike).innerHTML) - 1

                }
            });
    }

});
