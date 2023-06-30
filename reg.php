

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
$hashed_password = password_hash($password, PASSWORD_BCRYPT);


$check2=" SELECT * FROM student WHERE (email='$email');";
$result2=mysqli_query($conn,$check2);

$check=" SELECT email,password,user FROM student WHERE (email='$email');";
$result=mysqli_query($conn,$check);


while($row=mysqli_fetch_assoc($result)){
    $check_username = $row['email'];
    $password_verify= password_verify($password , $row['password']);;

    if ($email == $check_username && $password_verify==1){
      //  echo "po";
          if (mysqli_num_rows($result2) > 0) {
            // echo "fg";
            if($row["user"]=='admin'){
              $sql="SELECT * FROM student WHERE deleted <> 1";
              $result3=mysqli_query($conn,$sql);
              $row3 = mysqli_fetch_assoc($result3);
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
              <th>User</th>
              <th>Edit</th>
              <th>Delete</th>
              </tr>";

              while($row3=mysqli_fetch_assoc($result3)){
                           
              
                echo "<tr>";

                echo "<td>".$row3['firstname']. "</td>";
                echo "<td>".$row3['lastname']. "</td>";
                echo "<td>".$row3['email']. "</td>";
                echo "<td>".$row3['gender']. "</td>";
                echo "<td>".$row3['contact']. "</td>";
                echo "<td>".$row3['address']. "</td>";
                echo "<td>".$row3['user']. "</td>";
          
                echo" <td> <a href='edit.php?fn=$row3[firstname] & ln=$row3[lastname] & em=$row3[email] & gen=$row3[gender] & con=$row3[contact] & add=$row3[address] ' >Edit</a> </td>";
                        
                echo" <td> <a href='delete.php?em=$row3[email] ' >Delete</a> </td>";
                            
                echo "</tr>";
                            
              }  
                echo "</table>";

            }
            else{
              // echo "sdfgh";
                $row2 = mysqli_fetch_assoc($result2);
                
                echo " User Details!<br>";
  
                echo "<table>";
                echo "<table border='3'>
                <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Contact</th>
                <th>Address</th>
                <th>User</th>
                <th>Edit</th>
                </tr>";

                echo "<tr>";

                echo "<td>".$row2['firstname']. "</td>";
                echo "<td>".$row2['lastname']. "</td>";
                echo "<td>".$row2['email']. "</td>";
                echo "<td>".$row2['gender']. "</td>";
                echo "<td>".$row2['contact']. "</td>";
                echo "<td>".$row2['address']. "</td>";
                echo "<td>".$row2['user']. "</td>";
        
                echo" <td> <a href='edit.php?fn=$row2[firstname] & ln=$row2[lastname] & em=$row2[email] & gen=$row2[gender] & con=$row2[contact] & add=$row2[address]' >Edit</a> </td>";

                echo "</tr>";

                echo "</table>";
        

                
      

            // $var= <input type="button" value="edit" onClick="document.location.href='some/page'" />;
                

            } 
          }
         
      }
    
    elseif($email == $check_username && $password_verify !=1){
        echo "Password Does Not Matched";
    }  
    
    else{
         echo "asdfghjkl";
    }
    
}

?>



<!-- error_reporting(E_ALL);
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



if (mysqli_num_rows($result) > 0) {
  
  $row = mysqli_fetch_assoc($result);

    echo " First Name : " . $row["firstname"] ."<br>".
    "Last Name :" . $row["lastname"] ."<br>".
    "Email :" . $row["email"] ."<br>".
    "Gender :" . $row["gender"] . "<br>".
    "Contact :" . $row["contact"] ."<br>".
    "Address :" . $row["address"]."<br>";
    
    mysqli_close($conn);

}

else {
    
    header("location: index.html");

    

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


 } -->

 

 
           









