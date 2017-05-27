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
            <a href="/login">login</a>
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
            <h1>kumogumo</h1>
            <span class="subheading">small and tidy microblogging</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">



        <div class="post">
          <h2 class="post-content">


                          kumogumo is a microblogging plattform to connect with friends and strangers <br>
                          we like to reduce fluff, to get to the core of what makes life interesting <br>
                          simply log in or create an account and start connecting with others <br>
                      </h2>

                      <ul id="loginlist">
                        <li id="register">
                          <a href="/register">register</a>
                        </li>
                        <li id="login">
                          <a href="/login">login</a>
                        </li>
                      </ul>

        </div>


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
