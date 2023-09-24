
let user_image = document.querySelector(".user_image");
let user_image_input = document.querySelector(".user_image_input");
let update_image_btn = document.querySelector(".update-image-btn");

user_image_input.addEventListener("change",e=>
{
    let image_file = user_image_input.files[0];
    changePreview(user_image , image_file );
})


user_image.addEventListener("click",(e)=>{
    user_image_input.click()
})


function changePreview(image_element , file)
{
    var reader  = new FileReader();
    // it's onload event and you forgot (parameters)
    reader.onload = function(e)  {
        // the result image data
        // image_element.classList.remove("hide");
        image_element.src = e.target.result;
     }
     // you have to declare the file loading
     reader.readAsDataURL(file);
}

// delete user


 let form_delete = document.querySelector(".form-delete");
 let delete_btn = document.querySelector(".delete-btn")
 delete_btn.addEventListener("click", (e) => {
   e.preventDefault();
   deleteUser();

})

const deleteUser = async () => {
   try {
      let formData = new FormData(form_delete);
      let response = await fetch("/user/profile", {
         headers: {
            "X-CSRF-Token": document.querySelector('input[name="_token"]').value
         },
         method: 'POST',
         body: formData,
      });
      const result = await response.json();
      if (result.success) {
         createToast("success" , "user deleted succufully");
         window.location.reload();
      }else if(result.error)
      {
         createToast("error" , result.error)
      }
   } catch (error) {
      createToast("error" , error)
   }
};