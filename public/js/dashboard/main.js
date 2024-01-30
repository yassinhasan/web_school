// const navItems = document.querySelectorAll(".nav-item");

// navItems.forEach((navItem, i) => {
//   navItem.addEventListener("click", () => {
//     navItems.forEach((item, j) => {
//       item.className = "nav-item";
//     });
//     navItem.className = "nav-item active";
//   });
// });

      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;

      var pusher = new Pusher('fd734d1efb154a91df5a', {
        cluster: 'ap2'
      });

      var channel = pusher.subscribe('new-post');
      channel.bind('App\\Events\\NewPost', function(data) {

        console.log(JSON.stringify(data))
        let noti_num = document.querySelector(".noti_num");
        let not_count = document.querySelector(".not-count");
        let is_empty = parseInt(noti_num.innerHTML) == 0 ? true : false;
        noti_num.innerHTML = parseInt(noti_num.innerHTML) + 1;
        noti_num.style.color = "#009688";
        not_count.innerHTML =  parseInt(not_count.innerHTML) + 1;;
        let new_notification = "";
        if(data.data.post_id != null)
        {
            new_notification +=`        <div class="noti-details" href="#">
            <p style="margin-bottom: 0;">
              <span class="noti-from">${data.data.from}</span>
              <span class="noti-text">
                Add new post <span class="title" style="font-weight: bold;">${data.data.post_title}</span><a href="http://localhost:8000/trainning/${data.data.post_slug}"> view post</a>
            </span></p>
            <span class="noti-date">
            ${data.data.created_at}
            </span>
          </div>`
        }else{
          new_notification += `   
          <div class="noti-details">
            <p style="margin-bottom: 0;">
              <span class="noti-from">${data.data.from}</span>
              <span class="noti-text">
                Add new metting zoom <span class="title" style="font-weight: bold;"> ${data.data.metting_topic} </span> <a href="${data.data.metting_join_url}">join now</a>
            </p>
            <span class="noti-date">
            ${data.data.created_at}
            </span>
          </div>
          `
        }


        let noti_body = document.querySelector(".noti-body");
        if(is_empty)
        {
          noti_body.innerHTML = new_notification;
        }else{

          noti_body.insertAdjacentHTML("afterbegin",new_notification)
        }

      
      });

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
       
     }else if(result.error)
     {
      console.log(result.error)
     }
  } catch (error) {
    
    console.log("error" , error)
  }
};