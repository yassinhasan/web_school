<div id="chat-circle" class="btn btn-raised">

  <img class="chat_img" src="{{ url('images/profile/users/hasan.jpg')}}" alt="hasan">
</div>
<div class="tooltip">
  <p class="tooltiptext">i usually respond in </p>
  <p class="tooltiptext">a few hours ...</p>
</div>
<div class="tooltip2">
  <p class="tooltiptext">How can i help?</p>
  <p class="tooltiptext"> send me message now ..</p>
</div>
<div class="chat-box">
  <div class="chat-box-header">
    <div>
      <i class="fa-regular fa-envelope"></i>
      <span>Leave Message</span>
    </div>
    <div>
      <span class="chat-box-toggle"><i class="fa-solid fa-xmark"></i></span>
    </div>
  </div>
  <form class="form_msg" method="POST" action="{{route('contact')}}">
    @csrf
    <div class="form-group">
      <input type="text" name="name" class="form-control" id="" placeholder="your name">
    </div>
    <div class="form-group">
      <input type="email" name="email" class="form-control" id="" placeholder="your email">
    </div>
    <div class="form-group">
      <input type="text" name="phone" class="form-control" id="" placeholder="your phone ((optional))">
    </div>
    <div class="form-group">
      <input type="text" name="subject" class="form-control" id="" placeholder="subject">
    </div>
    <div class="form-group">
      <textarea class="form-control" id="" name="message" rows="3" placeholder="write your message here .."></textarea>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit"  class="btn btn-primary send_msg">send <i class="fa-solid fa-paper-plane"></i>
        </button>
      </div>
    </div>
  </form>
  <div class="chat-box-overlay"></div>

</div>