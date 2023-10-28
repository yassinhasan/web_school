
let email_form = document.querySelector(".form");
let reset_btn = document.querySelector(".email-btn")
reset_btn.addEventListener("click", (e) => {
  e.preventDefault();
  showSpinner();
  resetPassword();

})

const resetPassword = async () => {
  try {
    let action = email_form.getAttribute("action");
     let formData = new FormData(email_form);
     let response = await fetch(action, {
        headers: {
           "X-CSRF-Token": document.querySelector('input[name="_token"]').value
        },
        method: 'POST',
        body: formData,
     });
     const result = await response.json();
     if (result.success) {
        hideSpinner();
        createToast("success" , result.status);
     }else if(result.error)
     {
        hideSpinner();
        createToast("error" , result.error)
     }
  } catch (error) {
    hideSpinner();
     createToast("error" , "somthing error happened")
  }
};