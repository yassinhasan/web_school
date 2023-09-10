




let html_code_div = document.querySelector(".html_code");
let html_preview = document.querySelector(".html_preview");
let run = document.querySelector(".run");

run.addEventListener("click", runCode)
function runCode() {
  html_preview.contentDocument.body.innerHTML = html_code_div.value;
  console.log(html_preview);
  console.log(html_code_div.value)
}


// form
let website_like = document.querySelectorAll(".website_like");
website_like.forEach(element => {
  element.addEventListener("click", (e) => {   
    let id = element.getAttribute("data-id");
      let love_numbers = document.querySelector(".love-numbers-"+id);
      let love_numbers_count = parseInt(love_numbers.innerHTML);
      let main_love_points = document.querySelector(".main-love-points-"+id);
      let main_love_points_count = parseInt(main_love_points.innerHTML);
    // add love
    if(element.classList.contains("like"))
    {
      // dislike
      like("dislike",id);
      love_numbers.innerHTML = love_numbers_count -1 ;
      main_love_points.innerHTML = main_love_points_count -1 ;

    }
    else{
      //like
      like("like",id)
      love_numbers.innerHTML = love_numbers_count +1 ;
      main_love_points.innerHTML = main_love_points_count +1 ;

    }
    element.classList.toggle("like");
    // remove love
    // console.log(element);
  })
});

const like = async (like,id) => {
  try {
      let formData = new FormData();
      formData.append("like_status",like);
      formData.append("id",id);
      
      let response = await fetch("rating/like", {
        headers: {
          "X-CSRF-Token": document.querySelector('input[name="_token"]').value
        },   
      method: 'POST',
      body: formData,
      });
      const result = await response.json();
      if(result.like)
      {

        Swal.fire({
          title: '<strong>Thank You <u><i class="fa-regular fa-face-smile-beam" style="color:#4caf50"></i></u></strong>',
          icon: 'success',
          showCloseButton: true,
          confirmButtonText: "close"

        });
      }else if (result.dislike){

        Swal.fire({
          title: '<strong>Opps !... <u><i class="fa-regular fa-face-sad-tear" style="color:#f44336"></i></u></strong>',
          icon: 'warning',
          showCloseButton: true,
          confirmButtonText: "close"


        });

      }
  } catch (error) {
    Swal.fire({
      title: '<strong>Opps !... something wrong <u><i class="fa-regular fa-face-sad-tear" style="color:#f44336"></i></u></strong>',
      icon: 'info',
      showCloseButton: true,
      confirmButtonText: "close"


    })  }
};