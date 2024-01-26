// const navItems = document.querySelectorAll(".nav-item");

// navItems.forEach((navItem, i) => {
//   navItem.addEventListener("click", () => {
//     navItems.forEach((item, j) => {
//       item.className = "nav-item";
//     });
//     navItem.className = "nav-item active";
//   });
// });



let open_noti = document.querySelector(".open-noti");

open_noti.addEventListener("click",e=>{
  readNotification()
})

const readNotification = async () => {
  try {
     let formData = new FormData(document.querySelector(".noti-form"));
     let response = await fetch("notifications/read-all", {
        headers: {
           "X-CSRF-Token": document.querySelector('input[name="_token"]').value
        },
        method: 'POST',
        body: formData,
     });
     const result = await response.json();
     if (result.success) {
        let noti_num = document.querySelector(".noti_num");
        let not_count = document.querySelector(".not-count");
        noti_num.innerHTML = 0;
        noti_num.style.color = "#009688";
        not_count.innerHTML = 0;
      
        console.log("read all ")
     }else if(result.error)
     {
      console.log(result.error)
     }
  } catch (error) {
    
    console.log("error" , error)
  }
};