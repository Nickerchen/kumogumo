<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>kumogumo</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    </head>
    <body>


  <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">

      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
        <a class="kumogumo-brand" href="/">kumogumo</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="/timeline">timeline</a>
          </li>
          <li>
            <a href="/myprofile">my profile</a>
          </li>
          <li>
            <a href="/following">following</a>
          </li>
          <li>
            <a href="/followers">followers</a>
          </li>
          <li>
            <a href="/newpost">new post</a>
          </li>
          <li>
            <a href="#">logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="intro-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <div class="site-heading">
            <h1>timeline</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">



        @foreach ($posts as $post)
            @include ('posts.post')
        @endforeach

        <!-- <div class="post">
          <h2 class="post-content">
                          Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed
                      </h2>
          <p class="post-meta">Posted by <a href="/myprofile">Benny</a> on 2017-04-18</p>
        </div>

        <div class="post">
          <h2 class="post-content">
                            {{$post->body}}
                      </h2>
          <p class="post-meta">Posted by <a href="/myprofile">{{ $post->user->name}}</a> on {{ $post->created_at->toFormattedDateString() }}</p>
        </div> -->


        <ul class="pager">
          <li class="next">
            <a href="#">&larr; Older Posts</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <hr>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <p class="copyright text-muted">
            <ul class ="footercontent">
              <li> <a href="/contact">Kontakt</a></li>
              <li> <a href="/contact">Impressum</a></li>
              <li> <a href="/contact">Datenschutz</a></li>
              <li>James Friesen 2017</li>
            </ul>
          </p>
        </div>
      </div>
    </div>
  </footer>

  <script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>
