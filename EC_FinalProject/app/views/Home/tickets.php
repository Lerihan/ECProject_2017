<html>
  </head>
    <title>Contact Us</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <?php include("css/navigation.php");?>
  </head>

  <body>
    <div class="container">
      <form method="post" action="/home/tickets"><br />
        <label for="title">Title</label>
        <input name="title" id="title" class="form-control" placeholder="Ticket Title" required autofocus>

        <br />

        <label for="description">Ticket Message</label><br />
        <textarea name="description" class = "form-control" rows = "5" cols="50" placeholder="Enter ticket message here..."></textarea><br />
        <input type="submit" class="btn btn-success" name="action" value='Submit' />
      </form>
    </div>
  </body>
</html>