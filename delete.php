<?php 

error_reporting(E_ALL);
ini_set('display_errors',1);

// connecting php with database

$conn = mysqli_connect('localhost', 'nikhil', 'Nik212107@','registration');
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$em=$_GET['em'];
// $us=$_GET['us'];

// $sql2="SELECT * FROM student ";
// $result2=mysqli_query($conn,$sql2);

$query="UPDATE student SET deleted=1 WHERE email='$em' AND user <> 'admin' ";
$save=mysqli_query($conn,$query);
if($save){

  

    $sql="SELECT * FROM student WHERE deleted <> 1";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    echo "<b>All User Details!<b> <br><br>";

    
      echo "<table>";
      echo "<table border='3'>
      <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Gender</th>
      <th>Contact</th>
      <th>Address</th>
      
      </tr>";

    while($row=mysqli_fetch_assoc($result)){
                 
    

      echo "<tr>";

      echo "<td>".$row['firstname']. "</td>";
      echo "<td>".$row['lastname']. "</td>";
      echo "<td>".$row['email']. "</td>";
      echo "<td>".$row['gender']. "</td>";
      echo "<td>".$row['contact']. "</td>";
      echo "<td>".$row['user']. "</td>";

      echo "</tr>";

      
      
                  }
      echo "</table>";

// header("Location:http://localhost/std/reg.php");
// exit();

}
else{
  echo "Not Updated";
}
  



mysqli_close($conn);




 ?>

 