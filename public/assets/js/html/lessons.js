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

  // editor
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