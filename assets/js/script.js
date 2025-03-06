// let windowsOpen = false;

// function showConnect() {
//   if (windowsOpen) {
//     fetch("connexion.php")
//       .then((response) => response.text())
//       .then((data) => {
//         document.getElementById("interface").innerHTML = data;
//       });
//   } else {
//     document.getElementById("interface").classList.toggle("hidden");
//     document.getElementById("interface").classList.toggle("flex");
//     fetch("connexion.php")
//       .then((response) => response.text())
//       .then((data) => {
//         document.getElementById("interface").innerHTML = data;
//       });
//     windowsOpen = true;
//   }
// }

// document.querySelector(".connect").addEventListener("click", () => {
//   showConnect();
// });

// function showInscription() {
//   if (windowsOpen) {
//     fetch("inscription.php")
//       .then((response) => response.text())
//       .then((data) => {
//         document.getElementById("interface").innerHTML = data;
//       });
//   } else {
//     document.getElementById("interface").classList.toggle("hidden");
//     document.getElementById("interface").classList.toggle("flex");
//     fetch("inscription.php")
//       .then((response) => response.text())
//       .then((data) => {
//         document.getElementById("interface").innerHTML = data;
//       });
//     windowsOpen = true;
//   }
// }

// document.querySelector(".inscription").addEventListener("click", () => {
//   showInscription();
// });

// function showConfirm() {
//   fetch("inscriptionconfirm.php")
//     .then((response) => response.text())
//     .then((data) => {
//       document.getElementById("interface").innerHTML = data;
//     });
// }

// function closeWindow() {
//   document.getElementById("interface").classList.toggle("hidden");
//   document.getElementById("interface").classList.toggle("flex");
//   document.getElementById("interface").innerHTML = "";
//   windowsOpen = false;
// }
