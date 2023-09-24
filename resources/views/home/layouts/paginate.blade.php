<nav aria-label="Page navigation example" style=" margin: 15px 0;
    width: 100% !important;
    display: flex;
    justify-content: center;">
  <ul class="pagination">
    <li class="page-item disabled"><a class="page-link " href="" >Previous</a></li>
    <li class="page-item "><a class="page-link " href="{{route('rating').'?page=2'}}">2</a></li>
    <li class="page-item"><a class="page-link" href="{{route('rating').'?page=3'}}">3</a></li>
    <li class="page-item active"><a class="page-link" href="{{route('rating').'?page=1'}}">1</a></li>
    <li class="page-item"><a class="page-link" href="{{route('rating').'?page=2'}}">Next</a></li>
  </ul>
</nav>