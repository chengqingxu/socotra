<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Socotra@Checkfront</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link rel='stylesheet' href='css\register.css'>
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
  <div class = "container my-5">
    <div class="card w-75">
      <div class="card-body px-4 py-4">
        <h4 class="card-title pb-4">Register</h4>
        <form method="post" action="register.php">
          <?php include('errors.php'); ?>
          <div class="form-group row">
          <label for="inputName"  class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="text" name="username" class="form-control" id="inputName" placeholder="Name" value="<?php echo $username; ?>">
          </div>
          </div>
          <div class="form-group row">
           <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
           <div class="col-sm-10">
             <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $email; ?>">
           </div>
         </div>
          <div class="form-group row">
            <label for="inputPassword1" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password_1" class="form-control" id="inputPassword" placeholder="Password">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword2" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
              <input type="password" name="password_2" class="form-control" id="inputPassword" placeholder="Password">
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
              <button type="submit" name= "register" class="btn btn-primary">Register</button>
            </div>
          </div>
          <p>
            Already a member? <a href="login.php">Sign in</a>
          </p>
        </form>
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
