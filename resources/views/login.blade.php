<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
  </head>

  <body style="background-color: #fefedf;">
    <div class="container">
      <div class="row">
      </div>
      <div class="row">
        <h1 class="h3  mt-5 font-weight-normal">Welcome to SIEMIM SY</h1>
      </div>
      <div class="row">
        <div class="col-md-4">
          <form method="post"  action="/login/auth">
            {!! csrf_field() !!}
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="username" required="" placeholder="Masukkan Username">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" required="" placeholder="Masukkan Password">
            </div>
            <div class="form-group">
              <button class="btn btn-block" style="background-color:#00917c;" type="submit">Login</button>
            </div>
          </form>
        </div>
      </div>  
    </div>
  </body>
</html>