

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