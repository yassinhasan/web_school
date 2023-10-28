<ul class="notifications-toaster-session hide">
        <li class="toast-li {{ Session::get('status') }} hide-session">
            <div class="column">
                <i class="fa-solid {{ Session::get('icon')  }}"></i>
                <span>{{ Session::get('msg')  }}</span>
            </div>
            <i class="fa-solid fa-xmark" onClick="(function(e){
                e.target.parentElement.remove();
                return false;
})(arguments[0])"></i>
        </li>
</ul>