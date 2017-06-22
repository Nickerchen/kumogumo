<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
  <div class="container-fluid">

       <div class="navbar-header page-scroll">
           @if (Auth::check()) <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  Menu <i class="fa fa-bars"></i>
              </button> @endif
      <a class="kumogumo-brand" href="/">kumogumo</a>
           </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">

          @if (Auth::check())
          <li>
            <a href="/timeline">timeline</a>
          </li>
          <li>
            <a href="/searchusers">users</a>
          </li>
          <li>
            <a href="/user/{{Auth::user()->id}}">{{Auth::user()->name}}</a>
          </li>
          <li>
            <a href="/newpost">new post</a>
          </li>
          <li>
            <a href="/logout">logout</a>
          </li>
          @endif


      </ul>
    </div>
  </div>
</nav>
