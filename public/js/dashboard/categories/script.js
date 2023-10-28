
let image_element = document.querySelector(".image-element");
let image_input = document.querySelector(".image_input");
//edit
let edit_image = document.querySelectorAll(".edit_image");
let edit_image_input = document.querySelectorAll(".edit_image_input");

// click on edit image to click edit input
edit_image.forEach(e=>{
    e.addEventListener("click",()=>{
        e.parentElement.querySelector(".edit_image_input").click()
    })
})
edit_image_input.forEach(e=>{
  e.addEventListener("change",()=>{
      let image_file = e.files[0];
      let image_element = e.parentElement.querySelector(".edit_image")
      changePreview(image_element , image_file);
  })
})

image_input.addEventListener("change",e=>
{
    let image_file = image_input.files[0];
    changePreview(image_element , image_file );
})



function changePreview(image_element , file)
{
    var reader  = new FileReader();
    // it's onload event and you forgot (parameters)
    reader.onload = function(e)  {
        // the result image data
        image_element.classList.remove("hide");
        image_element.src = e.target.result;
     }
     // you have to declare the file loading
     reader.readAsDataURL(file);
}

// delete all btn




// add class form in form  // add class btn-del-select in delete btn // add class add-select in add more
// add <div class="clone-wraper"> <div class="clone-inside">
// add   inside clone-inside <button type="button" class="btn btn-danger btn-del-select" style="display:none;margin:5px 0">delete</button> 

// outside clone-wraper add  <div class="mb-3"><button type="button" class="btn btn-secondary add-select">add more</button> </div>

let btn_del_select = document.querySelector(".btn-del-select");



let clone_inside = document.querySelector(".clone-inside");
let clone_html = clone_inside.innerHTML;

let add_select = document.querySelector(".add-select");



add_select.addEventListener("click", (e) => {

  let div = document.createElement("div");
  div.setAttribute("class", "clone-inside fadein row")
  div.innerHTML = clone_html;
  document.querySelector(".clone-wraper").insertAdjacentElement("beforeend", div)
  let btn_del_select_all = document.querySelectorAll(".btn-del-select");
  if (btn_del_select_all) {
    btn_del_select_all.forEach(el => {
      el.style.display = "block";
      el.classList.remove("disabled") ;
      el.addEventListener("click", (e) => {
        e.target.parentElement.parentElement.remove();
      })
    })
  }

})

let form = document.querySelector(".form");
form.addEventListener("click", () => {
  let btn_del_select_all = document.querySelectorAll(".btn-del-select");
  if (btn_del_select_all.length == 1) {
    btn_del_select_all[0].classList.add("disabled") ;;
  }
})




let save_multiple = document.querySelector(".save-multiple");

