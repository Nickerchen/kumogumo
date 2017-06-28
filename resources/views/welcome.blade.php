<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>kumogumo</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Styles -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet"  type="text/css">
    </head>
    <body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.9";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

@include('layouts.nav')

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
                      @if (!Auth::check())
                      <ul id="useritems">
                        <li>
                          <a href="/register">register</a>
                        </li>
                        <li>
                          <a href="/login">login</a>
                        </li>
                      </ul>
                      @endif

        </div>



      </div>
    </div>
  </div>

  <hr>

        <div class="cookiewarning bg-warning">
            <p>This website uses cookies. By using this site you are consenting to cookies being used. Click <a href="/privacypolicy">here</a> for more information</p>
            <span class="btn btn-warning btn-xl">Accept</span>
        </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <p class="copyright text-muted">
            <ul class ="footercontent">

              <li> <a href="/contact">Kontakt und Impressum</a></li>
              <li> <a href="/privacypolicy">Datenschutz</a></li>
              <li>James Friesen 2017</li>
                <div class="fb-like" data-href="http://kumogumo.herokuapp.com/" data-width="50" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
            </ul>
          </p>
        </div>
      </div>
    </div>
  </footer>


  <script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="{!! asset('js/cookie.js') !!}"></script>

</body>
</html>
