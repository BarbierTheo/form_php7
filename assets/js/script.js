document.addEventListener("click", function (element) {
    if (element.target.id == "follow") {
        let userToFollow = document.getElementById("follow").dataset.userpost;

        fetch("controller-followed.php?user=" + userToFollow)
            .then((response) => response.text())
            .then((data) => {
                if (data == "followed") {
                    document.getElementById("liked").innerHTML =
                        `<button class="btn btn-sm bg-base-300" id="follow" data-userpost="` + userToFollow + `">Ne plus suivre</button>`;
                    if (document.getElementById('comptFollow')) {
                        document.getElementById('comptFollow').innerHTML = parseInt(document.querySelector('#comptFollow').innerHTML) + 1
                    }
                } else if (data == "unfollowed") {
                    document.getElementById("liked").innerHTML = `<button class="btn btn-sm bg-[#84ad21] text-white" id="follow" data-userpost="` + userToFollow + `">Suivre</button>`;
                    if (document.getElementById('comptFollow')) {
                        document.getElementById("comptFollow").innerHTML = parseInt(document.querySelector("#comptFollow").innerHTML) - 1;
                    }
                }
            });
    }
});
