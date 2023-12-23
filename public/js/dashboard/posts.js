
// let select_category = document.querySelector(".seect-category");
// let post_form = document.querySelector(".post-form");
// select_category.addEventListener("change",(e)=>{

//     selectSection();

// })

// const selectSection = async () => {
//     try {
//         let select_section = document.querySelector(".select-section")
//         let formData = new FormData();
//         let _token = post_form.querySelector("input[name='_token']");
//         formData.append("categoryId" ,select_category.value );
//        let response = await fetch("/posts/getSection", {
//           headers: {
//              "X-CSRF-Token": document.querySelector('input[name="_token"]').value
//           },
//           method: 'POST',
//           body: formData,
//        });
//        const result = await response.json();
//        if (result.success) {
//           hideSpinner();
//           select_section.innerHTML = '';
//           let sections = result.sections;
//           console.log(sections);
//           let top_wraper = `
//           <label for="select_section"> select Sections</label>
//           <select class="form-control"  name="section_id">`;
        
//           let center_wraper = '';
//             for(let key in sections){
//                     center_wraper += `
//                     <option value="${key}">${sections[key]}</option>

//                     `
//             };
//         let bottom_wraper = `
//           </select>
//           `;

//             select_section.innerHTML = top_wraper+center_wraper+bottom_wraper;
//        }else if(result.error)
//        {
//           hideSpinner();
//           createToast("error" , result.error)
//        }
//     } catch (error) {
//        hideSpinner();
//        createToast("error" , error)
//     }
//  };
