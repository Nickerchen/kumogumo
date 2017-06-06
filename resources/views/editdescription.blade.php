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


@include('layouts.nav')

  <header class="intro-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <div class="site-heading">
            <h1>edit description</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

        <section>
               <h2>enter your new description below:</h2>

               <form method="POST" action="/update/{{Auth::user()->id}}">
                 {{ csrf_field() }}
                 <div class="form-group">
                   <textarea id="body" name="body" rows="5" cols="25" class="form-control" maxlength="200"></textarea>
                   <span id="characters">200 characters left</span>
                   <br>

                   <div><input type="submit" value="submit"></div>
                </div>

                     @include ('layouts.errors')
               </form>
           </section>



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

  <script>
    $('textarea').keyup(updateCount);
    $('textarea').keydown(updateCount);

    function updateCount() {
        var limit = 200
        var cs = $(this).val().length;
        $('#characters').text(limit - cs + " characters left");
    }</script>

</body>
</html>
