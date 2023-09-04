// import data from './students.json' assert { type: "json" };


// navbar
let selectedLink = document.querySelector(".selectedLink");

function checkActive() {
  document.querySelectorAll("nav li").forEach((item) => {
    // console.log(item);
    if (item.dataset.active == "true") {
      selectedLink.style.transform = `translateX(${
        item.offsetLeft + item.offsetWidth / 2 - 24 + "px"
      })`;
    }
  });
}

document.querySelectorAll("nav li").forEach((item) => {
  // console.log(item.offsetLeft);
  item.addEventListener("click", (e) => {
    document.querySelectorAll("nav li").forEach((i) => {
      i.dataset.active = "false";
    });
    e.currentTarget.dataset.active = "true";
    checkActive();
  });
});

checkActive();

// end navbar
let data = {
  students: [
    {
      name: "Rahaf Saleem",
      website: "https://rahaf781.w3spaces.com",
      points: 70,
      image: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/881020/threadless12.jpg"
    },
    {
      name: "Yassin Hasan",
      website: "https://yassin14.w3spaces.com",
      points: 70,
      image: "../../public/assets/images/profile/hasan.jpg"
    },
    {
      name: "Yamen Saleem",
      website: "https://yamen10.w3spaces.com",
      points: 70,
      image: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/881020/threadless13.jpg"
    },
    {
      name: "Karma Aaref",
      website: "https://karma781.w3spaces.com",
      points: 70,
      image: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/881020/threadless14.jpg"
    }
  ]
};

let wraper = document.querySelector(".wraper");

let students = data["students"];

  
  let sorted_students = students.sort((a,b)=> b.points - a.points)
  

 

  function showPoints()
  {
    let number = 1;
    let rating_width = 0
    wraper.innerHTML = "";
    let div = "";
    for(let student of sorted_students)
    {
        rating_width = (student.points / 100)* 100 ;
         div += `
                    
                    <div class="inside_Wraper row">
                    <!-- name anu number -->
                    <div class="col-6 row name_number">
                        <div class="number">
                           ${number ++}
                        </div>
                        <div class="name">
                            <a href="${student["website"]}" target="_blank">${student["name"]}</a>
                        </div>
                        <div class="image">
                            <img src="${student.image}" class="img-fluid profile">
    
                        </div>
    
                    </div>
                    <!-- rating  -->
                    <div class="col-6 rating_points">
                            <div class="rating">
                                    <div class="sub1">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <div class="sub2" style="width: ${rating_width}%">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </div>
                        <div class="points">
                        ${student.points}
                        </div>
    
                    </div>
                </div>
        `;
       
    }
    wraper.innerHTML = div;
  
  }
  showPoints()
  let link_body_images = document.querySelectorAll(".link_body .image");



  for (let index = 0; index < link_body_images.length; index++) {
    const element = link_body_images[index];
      element.addEventListener("click",(e)=>{
        hideBoxses()
      let box = document.querySelector(`[data-target='${index+1}']`)
      box.classList.add("show")})

      }    

      function hideBoxses()
      {
        let allBoxses = document.querySelectorAll(".xbox");
        allBoxses.forEach(e=>{e.classList.remove("show")})
      }

// start vote section
// let vote = document.querySelector(".vote");
//  vote.addEventListener("click",async e=>{
//   const inputOptions = new Promise((resolve) => {
//     setTimeout(() => {
//       resolve({
//         'yassin': 'Yassin',
//         'karma': 'Karma',
//         'rahaf': 'Rahaf',
//         'yamen': 'Yamen'
//       })
//     }, 1000)
//   })
  
//   const { value: name } = await Swal.fire({
//     title: 'Select Best Website !',
//     input: 'radio',
//     inputOptions: inputOptions,
//     inputValidator: (value) => {
//       if (!value) {
//         return 'You need to choose something!'
//       }
//     }
//   })
  
//   if (name) {

//     showSpinner()
//     sorted_students[name].points +=1
//     showPoints()
//     hideSpinner()

//     // Swal.fire({ html: `Thank You For Choosing` })
//   }
// })


function showSpinner()
{
  let spinner = document.querySelector(".spinner");
  spinner.style.display="block"
}

function hideSpinner()
{
  let spinner = document.querySelector(".spinner");
  spinner.style.display="none"
}



let html_code_div = document.querySelector(".html_code");
let html_preview = document.querySelector(".html_preview");
let run = document.querySelector(".run");

run.addEventListener("click",runCode)
function runCode()
{
  html_preview.contentDocument.body.innerHTML= html_code_div.value;
  console.log(html_preview);
  console.log( html_code_div.value)
}