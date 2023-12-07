

let input_image = document.querySelectorAll(".input_image");
let image_view = document.querySelectorAll(".image_view");


// click on edit image to click edit input
image_view.forEach(e=>{
    e.addEventListener("click",()=>{
        e.parentElement.querySelector(".input_image").click()
    })
})
input_image.forEach(e=>{
  e.addEventListener("change",()=>{
      let image_file = e.files[0];
      let image_view = e.parentElement.querySelector(".image_view")
      changePreview(image_view , image_file);
  })
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
