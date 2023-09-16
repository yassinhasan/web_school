<ul class="notifications-toaster ">
        <li class="toast-li success hide-session">
            <div class="column">
                <i class="fa-solid fa-check"></i>
                <span>@yield('message')</span>
            </div>
            <i class="fa-solid fa-xmark" onclick="removeToast(this.parentElement)"></i>
        </li>
    </ul>