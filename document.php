<?php
include('server.php');
 //if user is not logged in, they cannot access this page.
 if(empty($_SESSION['username'])){
	 header('location: login.php');
   exit();
 }
?>
<!doctype html>
<html lang="en">
  <head>
  <script>
    function DeleteFile(id) {
        if (confirm("Are you sure?")) {
            // your deletion code
            window.location.href='delete.php?id='+id;
        }
        return false;
    }
  </script>
    <title>Socotra@Checkfront</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel='stylesheet' href='css\document.css'>
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
                        <a class="nav-link linktext" href="posts.php"><span style= "color:black;">Posts</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linktext" href="submitPost.php"><span style= "color:black;">Posting</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linktext" href="document.php"><span style= "color:black;">Documents</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linktext" href="contact.php"><span style= "color:black;">Contact</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linktext" href="index.php?logout='1'"><span style= "color:black;">Logout</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linktext" href="about.php"><span style= "color:black;">About</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class = "container">
      	<!-- notification message -->
      	<?php if (isset($_SESSION['success'])) : ?>
          <div class="error success" >
          	<h3>
              <?php
              	echo $_SESSION['success'];
              	unset($_SESSION['success']);
              ?>
          	</h3>
          </div>
      	<?php endif ?>

        <!-- logged in user information -->
        <?php  if (isset($_SESSION["username"])) : ?>
        	<p>Welcome <strong><?php echo $_SESSION["username"]; ?></strong></p>
        	<p> <a href="document.php?logout='1'" style="color: red;">logout</a> </p>
        <?php endif ?>
        <?php
          if(isset($_POST['upsubmit'])){
              $file = $_FILES['upfile'];
              $fileName = $_FILES['upfile']['name'];
              $fileTmpname = $_FILES['upfile']['tmp_name'];
              $fileSize = $_FILES['upfile']['size'];
              $fileError = $_FILES['upfile']['error'];
              $fileType = $_FILES['upfile']['type'];
              $fileExt = explode('.',$fileName);
              $fileActualExt = strtolower(end($fileExt));

              $allowed = array('jpg', 'jpeg', 'png', 'pdf');
              if(in_array($fileActualExt, $allowed)){
                 if($fileError === 0){
                   if($fileSize < 10000000){
                      $fileDestination = 'document/'.$fileName;
                      move_uploaded_file($fileTmpname, $fileDestination);
                      $query = "INSERT INTO files (name, size, type, location)
                    			  VALUES('$fileName', '$fileSize', '$fileType','$fileDestination')";
                      mysqli_query($db, $query);
                   }else{
                     echo "Your file is too big";
                   }
                 }else{
                   echo "There was an erro uploading your file!";
                 }
              }else{
                echo "You cannot upload files of this type!";
              }

          }
        ?>
        <form method="post" action = "document.php"enctype="multipart/form-data">
            <input type="file" name="upfile"/>
            <button name="upsubmit">Upload</button>
        </form>
        <?php

        $query = "SELECT * FROM files";
        $result = mysqli_query($db, $query);
        ?>
        <table class = "table">
            <thead>
              <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Size</th>
                <th>Type</th>
                <th>Location</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
            <?php
  	         while($r = mysqli_fetch_assoc($result)){
               ?>
               <tr>
                 <td><?php echo $r['id'] ?></td>
                 <td><?php echo $r['name'] ?></td>
                 <td><?php echo $r['size'] ?></td>
                 <td><?php echo $r['type'] ?></td>
                 <td><a href="<?php echo $r['location'] ?>">View</a></td>
                 <td><a href="#" onclick='DeleteFile(<?php echo $r['id'] ?>)'>Delete</a></td>
               </tr>
               <?php
                }
                ?>
              </tbody>
          </table>
    </div>
    <footer class="footer">
      <div class="container">
        <span class="text-muted">&copy;2017 Team Socotra.</span>
      </div>
    </footer>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
