<?php
session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'eportfolio');
//$db = mysqli_connect('localhost', 'socotra_socotra', 'camosuncapstone2018', 'socotra_eportfolio');

// REGISTER USER
if (isset($_POST['register'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password_1)) {
    array_push($errors, "Password is required");
  }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM members WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO members (username, email, password)
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
    if($username == "manny" || $username == "hayden" || $username == "matt" || $username == "eric"){
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: members.php');
      exit();
    }else{
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: contact.php');
      exit();
    }
  }
}

//login
if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($username)) {
    array_push($errors, "*Username is required");
  }
  if (empty($password)) {
    array_push($errors, "*Password is required");
  }
  if(count($errors) == 0){
    $password = md5($password);
    $query = "SELECT * FROM members where username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) == 1){
      if($username == "manny" || $username == "hayden" || $username == "matt" || $username == "eric"){
        $_SESSION['username'] = $username;
        header('location: members.php');
        exit();
      }else{
        $_SESSION['username'] = $username;
        header('location: contact.php');
        exit();
      }

    }else{
      array_push($errors, "*The user/password combnation is not correct");
      header('location: login.php');
      exit();
    }
  }

}
//submit a post
if (isset($_POST['submitPost'])){
  $title = mysqli_real_escape_string($db, $_POST['postTitle']);
  $author = mysqli_real_escape_string($db, $_POST['author']);
  $content= mysqli_real_escape_string($db, $_POST['postContent']);

  if (empty($title)) {
    array_push($errors, "Title is required");
  }
  if (empty($author)) {
    array_push($errors, "Author is required");
  }
  if (empty($content)) {
    array_push($errors, "content is required");
  }

  if (count($errors) == 0) {
  	$query = "INSERT INTO posts (title, body, author)
  			  VALUES('$title', '$content', '$author')";
  	mysqli_query($db, $query);
    header('location: posts.php');
    exit();
  }else{
    header('location: submitPost.php');
    exit();
  }
}

//logout
if(isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['username']);
  header('location: login.php');
  exit();
}
?>
