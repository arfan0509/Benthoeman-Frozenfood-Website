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

var showprofile = document.getElementById('edit-profil');
var showpassword = document.getElementById('edit-password');

function profile(){
  showprofile.style.display = "flex";
  showpassword.style.display = "none";
}
function password(){
  showprofile.style.display = "none";
  showpassword.style.display = "flex";
}
function closeAlert() {
  document.getElementById("alertEdit").style.display = "none";
}