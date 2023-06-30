<?php 

error_reporting(E_ALL);
ini_set('display_errors',1);

// connecting php with database

$conn = mysqli_connect('localhost', 'nikhil', 'Nik212107@','registration');
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
 


$email=$_POST['email'];
$password = $_POST['password'];


$check=" SELECT * FROM student WHERE (email='$email');";

$result=mysqli_query($conn,$check);



if($row["user"]=='admin'){
    $sql="SELECT * FROM student ";
    $result3=mysqli_query($conn,$sql);
    $row3 = mysqli_fetch_assoc($result3);
    echo "<b>All User Details!<b> <br><br>";
    
    while($row3=mysqli_fetch_assoc($result3)){
                 
    
                  echo " First Name : " . $row3['firstname'] ."<br>".
                  "Last Name :" . $row3['lastname'] ."<br>".
                  "Email :" . $row3['email'] ."<br>".
                  "Gender :" . $row3['gender'] . "<br>".
                  "Contact :" . $row3['contact'] ."<br>".
                  "Address :" . $row3['address']."<br>";
    }
}

else {
    
    header("location: index.html");
}
    

if($check["type"]=='admin'){
  $sql="SELECT * FROM student ";
  $result3=mysqli_query($conn,$sql);
  $row3 = mysqli_fetch_assoc($result3);
  
               echo "All User Details!<br>";
  
                echo " First Name : " . $row2["firstname"] ."<br>".
                "Last Name :" . $row2["lastname"] ."<br>".
                "Email :" . $row2["email"] ."<br>".
                "Gender :" . $row2["gender"] . "<br>".
                "Contact :" . $row2["contact"] ."<br>".
                "Address :" . $row2["address"]."<br>";

}


 
 ?>