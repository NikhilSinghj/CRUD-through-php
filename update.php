<?php

// include('reg.php');
 
error_reporting(E_ALL);
ini_set('display_errors',1);

// connecting php with html

$conn = mysqli_connect('localhost', 'nikhil', 'Nik212107@','registration');
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$contact=$_POST['contact'];
$address=$_POST['address'];

// check duplicate email

// $check=" SELECT * FROM student WHERE (email='$email');";

// $result=mysqli_query($conn,$check);

// if (mysqli_num_rows($result) > 0) {
  
//   $row = mysqli_fetch_assoc($result);
//   if($email==isset($row['email']))
//   {
//           echo "<b>The Email You Entered Is Allready Exist</b>";
//   }
// }

// else{

$query="UPDATE student SET firstname='$firstname',lastname='$lastname',email='$email',gender='$gender',contact='$contact',address='$address' WHERE email='$email'";
$save=mysqli_query($conn,$query);
if($save){
  echo "Detail Updated Successfully!";
}
else{
  echo "Not Updated";
}


// }       


mysqli_close($conn);

?>