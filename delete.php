<?php
include('server.php');
if(isset($_GET['id']) && !empty($_GET['id'])){
  $tid = $_GET['id'];
	$query = "SELECT location FROM files WHERE id = '$tid'";
	$result = mysqli_query($db, $query);
	$r = mysqli_fetch_assoc($result);
  if(unlink($r['location'])){
  	$query="DELETE FROM files WHERE id = '$tid'";
  	mysqli_query($db, $query);
  	header("Location: document.php");
    exit();
  }
}else{
	header("Location: document.php");
  exit();
}


?>
