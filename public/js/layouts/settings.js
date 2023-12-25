
let default_color = "#FA2300";
//   //   start local starorage
var main_main_color = localStorage.getItem("main-main-color");
var nav_background_linear = localStorage.getItem("nav-background-linear");

let theme_background =  localStorage.getItem('--theme-background');
let theme_color =  localStorage.getItem('--theme-color');
let theme_border =  localStorage.getItem('--theme-border-style-style');
let theme_boxshhadow =  localStorage.getItem('--theme-box-shadow-style');
let lightClass =  localStorage.getItem('theme-class');

if(lightClass == "light" || lightClass == null)
{
    document.body.classList.add("light")
}
if(theme_background){
    document.documentElement.style.setProperty('--theme-background', theme_background);
}
if(theme_color){
    document.documentElement.style.setProperty('--theme-color', theme_color);
}
if(theme_boxshhadow){
    document.documentElement.style.setProperty('--theme-box-shadow-style', theme_boxshhadow);
}
if(theme_border){
    document.documentElement.style.setProperty('--theme-border-style-style', theme_border);
}
//

if(main_main_color){
    document.documentElement.style.setProperty('--main-main-color', main_main_color);
}
if(nav_background_linear)
{
    document.documentElement.style.setProperty('--nav-background-linear', `-webkit-linear-gradient(${nav_background_linear},${nav_background_linear})`);

}
let settings = document.querySelector(".settings");
let open_Settings = document.querySelector(".open-settings");
let close_Settings = document.querySelector(".close-settings");


open_Settings.addEventListener("click", (e) => {
    settings.classList.add("show")
    e.target.style.display = "none";
    close_Settings.style.display = "block";
})
close_Settings.addEventListener("click", (e) => {
    settings.classList.remove("show")
    e.target.style.display = "none";
    open_Settings.style.display = "block";
})

let color_options_lists = document.querySelectorAll(".color-options li");

color_options_lists.forEach(color_options_list => {

    color_options_list.addEventListener("click", (e) => {
        let selected_list = e.target;
        let selected_color = selected_list.getAttribute("data-color");
        document.documentElement.style.setProperty('--main-main-color', selected_color);
        document.documentElement.style.setProperty('--nav-background-linear', `-webkit-linear-gradient(${selected_color},${selected_color})`);
        // save in local storage
        localStorage.setItem("main-main-color", selected_color);
        localStorage.setItem("nav-background-linear", selected_color);

    })

})

//     //reset all option
  document.querySelector(".settings .res").addEventListener("click", ()=> {
    localStorage.removeItem("main-main-color");
    localStorage.removeItem("nav-background-linear");
    document.documentElement.style.setProperty('--main-main-color', default_color);
    document.documentElement.style.setProperty('--nav-background-linear', `-webkit-linear-gradient(${default_color},${default_color})`);
  });

  let darkBtn = document.querySelector(".settings .darkbtn");
  let whiteBtn = document.querySelector(".settings .whitebtn");


      /* dark mode
    --dark-background : black;
    --dark-color : white;
    --dark-border-style : "1px solid #ccc";
    --dark-box-shadow-style : "none"; */

    /* ligh mode */
    // --theme-background : white;
    // --theme-color : black;
    // --theme-border-style-style : "none";
    // --theme-box-shadow-style : "0px 5px 35px 9px #ccc";
  darkBtn.addEventListener("click",()=>{

    document.documentElement.style.setProperty('--theme-background', "black");
    document.documentElement.style.setProperty('--theme-color', "white");
    document.documentElement.style.setProperty('--theme-border-style-style', " 1px solid #555");
    document.documentElement.style.setProperty('--theme-box-shadow-style', "none");
     localStorage.setItem('--theme-background', "black");
     localStorage.setItem('--theme-color', "white");
     localStorage.setItem('--theme-border-style-style', "1px solid #555");
     localStorage.setItem('--theme-box-shadow-style', "none");
     localStorage.setItem('theme-class', "dark");
     document.body.classList.remove("light");
     document.body.classList.add("dark-theme");
  })
  whiteBtn.addEventListener("click",()=>{

    document.documentElement.style.setProperty('--theme-background', "white");
    document.documentElement.style.setProperty('--theme-color', "dark");
    document.documentElement.style.setProperty('--theme-border-style-style', "none");
    // document.documentElement.style.setProperty('--theme-box-shadow-style', "0px 5px 35px 9px #ccc");
   
     localStorage.setItem('--theme-background', "white");
     localStorage.setItem('--theme-color', "dark");
     localStorage.setItem('--theme-border-style-style', "none");
     localStorage.setItem('theme-class', "light");
    //  localStorage.setItem('--theme-box-shadow-style', "0px 5px 35px 9px #ccc");
    document.body.classList.add("light");
    document.body.classList.remove("dark-theme");

  })