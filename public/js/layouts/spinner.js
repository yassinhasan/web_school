

function showSpinner()
{
let preloader = document.querySelector(".preloader");
preloader.classList.remove("hide")
}

function  hideSpinner(){
let preloader = document.querySelector(".preloader");
preloader.classList.add("hide")
}

document.onreadystatechange = function() {
    if (document.readyState === "complete") {
        hideSpinner()
    }
};