
@if (Session::has('logout'))      
      <div class="alert alert-success fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <center><strong>{{ Session::get("logout") }}</strong>      </center>
      </div>
    @endif
    @if (Session::has('login'))      
      <div class="alert alert-danger fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <center>  <strong>{{Session::get("login")}}</strong>      </center>
      </div>
    @endif

