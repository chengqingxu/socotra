<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Socotra@Checkfront</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel='stylesheet' href='css\index.css'>
  </head>
  <body>
    <div class = "container">
        <nav class="navbar navbar-toggleable-md navbar-light py-1 my-4 need ">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand " href="index.php"><h5 class = "nametext">Socota@Checkfront</h5></a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link linktext" href="register.php"><span style= "color:black;">Register</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linktext" href="login.php"><span style= "color:black;">Login</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linktext" href="index.php?logout='1'"><span style= "color:black;">Logout</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linktext" href="contact.php"><span style= "color:black;">Contact</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linktext" href="about.php"><span style= "color:black;">About</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class = "container">
       <img src="images\front.jpg" class="img-fluid" alt="Responsive image">
    </div>
    <div class="container-fluid my-5">
      <div class="row">
        <div class="col-sm-12">
           <p class = "famous-text">“Life is either a daring adventure or nothing at all.”</p>
           <p class = "famous-author">―Helen Keller</p>
        </div>
       </div>
    </div>
    <footer class="footer">
      <div class="container">
        <span class="text-muted">&copy;2018 Team Socotra.</span>
      </div>
    </footer>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
