<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/Home">Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/Profile/<?php echo $_SESSION['userID'] ?>">My Channel <span class="sr-only">(current)</span></a></li>
        <li><a href="/Follow">Subscriptions</a></li>
        <li><a href="/Upload/add">Upload</a></li>
        <li><a href="/Saved">Bookmarks</a></li>
        <li><a href="/Home/Tickets">Contact Us</a></li>
        <li><a href="/Home/Faq">FAQs</a></li>

      </ul>
      <form class="navbar-form navbar-left" method="post" action="/Home/Search">
        <div class="form-group">
          <input type="text" name = "q" class="form-control" placeholder="Search">

        <select name="select_catalog" id="select_catalog" class="form-control">
            <optgroup label="All">
            <option value="Users">Users</option>
            <option value="video_title">Title</option>
            </optgroup>
            <optgroup label="Games">
            <?php
            foreach($data['games'] as $game){
              echo "<option value='$game->ID'>$game->game_name</option>";
            }
            ?>
            </optgroup>
        </select>
        </div>
        <button type="submit" name="action" value='Search' class="btn btn-default">Search</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/Login/doLogout">Logout</a>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>