const navbarscroll = document.querySelector('.navbar');
// const menuscroll = document.querySelector('.list-menu');

window.addEventListener('scroll',() => {
  if (window.scrollY > 50) {
    navbarscroll.classList.add("nav-scrolled");
    // menuscroll.classList.add("list-scrolled");
  } else if (window.scrollY <= 50) {
    navbarscroll.classList.remove("nav-scrolled");
    // menuscroll.classList.remove("list-scrolled");
  }
})


function showform1(){
  document.getElementById('MyAccount').style.display="block";
  document.querySelector(".list-menu-akun1").classList.add("active-menu-akun");
  document.querySelector(".list-menu-akun2").classList.remove("active-menu-akun");
  document.getElementById('MyOrder').style.display="none";
}
function showform2(){
  document.getElementById('MyAccount').style.display="none";
  document.querySelector(".list-menu-akun2").classList.add("active-menu-akun");
  document.querySelector(".list-menu-akun1").classList.remove("active-menu-akun");
  document.getElementById('MyOrder').style.display="block";
}

function closeAlert(){
  document.getElementById('alertEdit').style.display="none";
}