

const notifications = document.querySelector(".notifications-toaster"),
   buttons = document.querySelectorAll(".buttons .btn");

const toastDetails = {
   timer: 5000,
   success: {
      icon: "fa-solid fa-check",
      msg: "Success: This is a success toast."
   },
   error: {
      icon: "fa-xmark",
      msg: "Error: This is an error toast."
   },
   warning: {
      icon: " fa-circle-exclamation",
      msg: "Warning: This is a warning toast."
   },
   info: {
      icon: " fa-circle-info",
      msg: "Info: This is an information toast."
   }
}

const removeToast = (toast) => {
   toast.classList.add("hide")
   if (toast.timeoutId) clearTimeout(toast.timeoutId); // Clearing the timeout for the toast
   setTimeout(() => toast.remove(), 500) // Removing the toast after 500ms
}

const createToast = (status,msg) => {
 
   // Getting the icon and text for the toast based on the id passed
   
   message = msg == null || "" ? toastDetails[status].msg : msg;
   const { icon  } = toastDetails[status];
   
   const toast = document.createElement("li"); // Creating a new 'li' element for the toast
   toast.className = `toast-li ${status}` // Setting the classes for the toast
   // Setting the inner HTML for the toast
   toast.innerHTML = `<div class="column">
												<i class="fa-solid ${icon}"></i>
												<span>${message}</span>
										</div>
										<i class="fa-solid fa-xmark" onclick="removeToast(this.parentElement)"></i>`
   notifications.appendChild(toast); // Append the toast to the notification ul
   // Setting a timeout to remove the toast after the specified duration
   toast.timeoutId = setTimeout(() => removeToast(toast), toastDetails.timer)
}