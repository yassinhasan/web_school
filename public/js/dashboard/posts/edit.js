
 // delete all btn


 let deleteAllBtn = document.querySelector(".delete-all");
 let hiddenId = document.querySelector(".id-array");
 let selected = 0;
 let idArray = [];
 
 function selectAll(className , checkbox){
     let allElements = document.querySelectorAll(`.${className}`);
     if(checkbox.checked  == true){
         idArray = []
         allElements.forEach(e=>{
             e.checked  = true;
             selected = 2;
             idArray.push(e.value)
         })
     }
     
     if(!checkbox.checked){
         allElements.forEach(e=>{
             e.checked = false;
             selected = 0;
             idArray.pop(e.value)
         })
     }
 
     selected >= 2 ? deleteAllBtn.style.visibility = "visible" : deleteAllBtn.style.visibility = "hidden"
     hiddenId.value = idArray;
     console.log(hiddenId.value);
 
 }
 
 let checkedBoxSelected  = document.querySelectorAll(".checkbox-selected");
 checkedBoxSelected.forEach(elem=>{
     elem.addEventListener("change",(e)=>{
         if (e.target.checked) {
             selected ++;
             // console.log("asdasd");
             idArray.push(e.target.value)
           } else {
             selected --;
             idArray.pop(e.target.value)
 
           }
           selected >= 2 ? deleteAllBtn.style.visibility = "visible" : deleteAllBtn.style.visibility = "hidden";
 
           hiddenId.value = idArray;
         //   console.log(hiddenId.value);
         }) 
         
 
 })
 