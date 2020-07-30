<html>
  </head>
    <title>Password Change</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="/css/login.css">
     <?php include("css/navigation.php");?>
  </head>

  <body>
    <div class="container">
    
        <form class="form-signin" method="post">
            <h2 class="form-signin-heading">Password Change</h2>
            <label for="inputEmail" class="sr-only">Current Password</label>
            <input type="password" name="currPassword" id="inputEmail" class="form-control" placeholder="Current Password" required autofocus>
            <label for="inputPassword" class="sr-only">New Password</label>
            <input type="password" id="inputPassword" name="newPassword"  class="form-control" placeholder="New Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="action" value="Sumbit">Change Password</button>
        </form>

        <form class="form-signin" method="post">
            <button class="btn btn-info btn-warning btn-block" type="submit" name="action" value="Back">Cancel</button>
        </form>

    </div>
  </body>
</html>