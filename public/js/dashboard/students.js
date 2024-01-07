
let input_image = document.querySelector(".input-image");
let image_box = document.querySelector(".image-box");

//edit
let edit_input_image = document.querySelectorAll(".input-edit-image");
let edit_image_box = document.querySelectorAll(".image-edit-box");

// click on edit image to click edit input
edit_image_box.forEach(e=>{
    e.addEventListener("click",()=>{
        e.parentElement.parentElement.querySelector(".input-edit-image").click()
    })
})

input_image.addEventListener("change",e=>
{
    let image_file = input_image.files[0];
    changePreview(image_box , image_file );
})


edit_input_image.forEach(e=>{
    e.addEventListener("change",()=>{
        let image_file = e.files[0];
        let image_element = e.parentElement.querySelector(".image-edit-box")
        changePreview(image_element , image_file);
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