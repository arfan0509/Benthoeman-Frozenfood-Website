var sidebar = document.getElementById("aside");
var konten = document.getElementById("konten");

function hideAside(){
    if((sidebar.style.display === "none")) {
      sidebar.style.display = "flex";
      konten.style.gridArea= "konten";
      konten.style.width= "";
    }
    else {
      sidebar.style.display = "none";
      konten.style.gridArea= "unset";
      konten.style.width= "100vw";
    }
}
// function unhideAside(){
//     document.getElementById("aside").style.display = "flex";
//     document.getElementById("konten").style.gridArea= "konten";
//     document.getElementById("konten").style.width= "";
// }
// document.getElementById("toggle-aside").addEventListener("click", function () {
//     var sidebar = document.getElementById("sidebar");
//     if (sidebar.style.display === "none") {
//       sidebar.style.display = "block";
//     } else {
//       sidebar.style.display = "none";
//     }
//   });
function closeAlert() {
  document.getElementById("alertEdit").style.display = "none";
}