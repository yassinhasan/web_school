let student_image = document.querySelector(".student_image");
let student_image_input = document.querySelector(".student_image_input");

//edit
let edit_student_image = document.querySelectorAll(".edit_student_image");
let edit_student_image_input = document.querySelectorAll(".edit_student_image_input");

// click on edit image to click edit input
edit_student_image.forEach(e=>{
    e.addEventListener("click",()=>{
        e.parentElement.querySelector(".edit_student_image_input").click()
    })
})

student_image_input.addEventListener("change",e=>
{
    let image_file = student_image_input.files[0];
    changePreview(student_image , image_file );
})


edit_student_image_input.forEach(e=>{
    e.addEventListener("change",()=>{
        let image_file = e.files[0];
        let image_element = e.parentElement.querySelector(".edit_student_image")
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