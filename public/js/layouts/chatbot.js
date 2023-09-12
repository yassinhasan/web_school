
let chat_circle = document.querySelector(".btn-raised");
let chat_box = document.querySelector(".chat-box");
let tooltip = document.querySelector(".tooltip");
let tooltip2 = document.querySelector(".tooltip2");
let send_msg = document.querySelector(".send_msg");


let chat_box_toggle = document.querySelector(".chat-box-toggle");
chat_circle.addEventListener("click", () => {
   chat_box.classList.toggle("scale");
   chat_circle.classList.toggle("scale");
   tooltip.style.visibility = "hidden";
   tooltip2.style.visibility = "hidden";
})
chat_box_toggle.addEventListener("click", () => {
   chat_circle.classList.toggle("scale");
   chat_box.classList.toggle("scale");
   tooltip.style.visibility = "hidden";
   tooltip2.style.visibility = "hidden";
})

tooltip.addEventListener("click", () => {
   chat_circle.classList.toggle("scale");
   chat_box.classList.toggle("scale");
   tooltip.style.visibility = "hidden";
   tooltip2.style.visibility = "hidden";
})
tooltip2.addEventListener("click", () => {
   chat_circle.classList.toggle("scale");
   chat_box.classList.toggle("scale");
   tooltip.style.visibility = "hidden";
   tooltip2.style.visibility = "hidden";
})



let form_msg = document.querySelector(".form_msg");
send_msg.addEventListener("click", (e) => {
   e.preventDefault();
   showSpinner();
   sendMessage();

})


function hideChatBox() {
   chat_circle.classList.add("scale");
   chat_box.classList.remove("scale");
   tooltip.style.visibility = "hidden";
   tooltip2.style.visibility = "hidden";
}
// send message
// form



const sendMessage = async () => {
   try {
      let formData = new FormData(form_msg);
      let response = await fetch("contact", {
         headers: {
            "X-CSRF-Token": document.querySelector('input[name="_token"]').value
         },
         method: 'POST',
         body: formData,
      });
      const result = await response.json();
      if (result.success) {
         hideSpinner();
         hideChatBox();
         createToast("success" , "thank you i will replay soon..")
      }else if(result.error)
      {
         hideSpinner();
         createToast("error" , result.error)
      }
   } catch (error) {
      hideSpinner();
      createToast("error" , error)
   }
};