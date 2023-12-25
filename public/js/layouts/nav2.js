let menu = document.querySelector(".menu-cont");
let menu_txt = document.querySelector(".menu-txt");
let overlay = document.querySelector(".menu-overylay");
// let settings = document.querySelector(".settings")

menu.addEventListener("click", e => {
  overlay.classList.toggle("open");
  let menu_title = menu_txt.innerHTML;
  let close_title = menu_txt.getAttribute("data-text");
  if (menu_txt.innerHTML == menu_title) {
    menu_txt.innerHTML = close_title;
  } else {
    menu_txt.innerHTML = menu_title;

  }
  menu_txt.setAttribute("data-text", menu_title);
  if(settings){
    settings.classList.toggle("with-shadow");
    //  open_Settings.classList.toggle("without-shadow");
    //  close_Settings.classList.toggle("without-shadow");
  }
})
