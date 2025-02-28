function showConnect() {
    fetch("connexion.php")
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("interface").innerHTML = data;
        });
}

document.querySelector(".connect").addEventListener("click", () => {
    showConnect();
});


function showInscription() {
    fetch("inscription.php")
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("interface").innerHTML = data;
        })
}


document.querySelector(".inscription").addEventListener("click", () => {
    showInscription();
});

function showConfirm() {
    fetch("inscriptionconfirm.php")
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("interface").innerHTML = data;
        })
        .catch((error) => {
            console.error("Erreur lors de la requête :", error);
        });
}



