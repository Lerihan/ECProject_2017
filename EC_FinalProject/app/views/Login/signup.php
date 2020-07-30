<html>
  </head>
    <title>Register</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="/css/signup.css">
  </head>

  <body>
  <div class="container">
        <form action="/Login/Signup" class="form-signin" method="post">
          <h2 class="form-signin-heading">Registration</h2>

          <label for="inputPassword" class="sr-only">First Name</label>
          <input type="text" id="inputPassword" name="first_name"  class="form-control" placeholder="First Name" required autofocus><br />

          <label for="inputPassword" class="sr-only">Password</label>
          <input type="text" id="inputPassword" name="last_name"  class="form-control" placeholder="Last Name" required><br />

          <label for="inputPassword" class="sr-only">Password</label>
          <input type="text" id="inputPassword" name="username"  class="form-control" placeholder="Username" required><br />

          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" name="email_address" id="inputEmail" class="form-control" placeholder="Email address" required><br />

          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" name="password"  class="form-control" placeholder="Password" required><br />

        	<button class="btn btn-lg btn-primary btn-block" type="submit" name="action" value="Signup">Register</button>
        </form>

        <form action="/Login/Signup" class="form-signin" method="post">
        	<button class="btn btn-lg btn-warning btn-block" type="submit" name="action" value="Cancel">Cancel</button>
        </form>
      </div>
  </body>
</html>