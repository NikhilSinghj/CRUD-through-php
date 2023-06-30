

<?php


error_reporting(E_ALL);
ini_set('display_errors',1);

// include (reg.php);

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$gen='';

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// echo password_verify('ub3rs3cur3', $hash)? 'Correct password!' 
//                                         : 'Incorrect password!';

// connecting php with html

$conn = mysqli_connect('localhost', 'nikhil', 'Nik212107@','registration');
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// to check password match or not

// if (isset($_POST['password'])){
 
  
//   if($password != $cpassword){
//        echo "<b>passwords doesn't match</b>";
//   }
 
//  }

// check duplicate email


$check=" SELECT * FROM student WHERE (email='$email');";

$result=mysqli_query($conn,$check);

if (mysqli_num_rows($result) > 0) {
  
  $row = mysqli_fetch_assoc($result);
  if($email==isset($row['email']))
  {
          echo "<b>The Email You Entered Is Allready Exist</b>";
  }
}
else{



//  to validate input characters of password

$password = $_POST['password'];
  
$specialChars = preg_match('@[\w_]@', $password);

if(!$specialChars || strlen($password) < 8 || strlen($password)>15) {
    // echo "$password";
    echo '<b>Password should be at least 8 and atmost 15 characters in length <br> Password should include at least one upper case letter, one number, and one special character</b>';
}else{
    echo '<b>Strong password</b>';
    echo "<br>";

    if($password != $cpassword){
      echo "<b>passwords doesn't match</b>";
    }

    else{
    
  // to enter the record
    $sql="INSERT INTO student (firstname , lastname, email,gender,contact,address,password) VALUES('$firstname','$lastname','$email','$gender','$contact','$address','$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        echo "<b>New record created successfully</b>";

        echo"<br>";
              // display gender as Male, Female,Other

  echo "Your Record <br>";
        
        if ( $gender == 'm'){
          $gen = "Male";
        }
        elseif($gender == 'f'){
          $gen = "Female";
        }
        else{
          $gen = "Other";
        }
        echo "<table>";
        echo "<table border='1'>
        <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Contact</th>
        <th>Address</th>
        </tr>";

        echo "<tr>";

        echo "<td>".$firstname. "</td>";
        echo "<td>".$lastname. "</td>";
        echo "<td>".$email. "</td>";
        echo "<td>".$gender. "</td>";
        echo "<td>".$contact. "</td>";
        echo "<td>".$address. "</td>";

        echo "</tr>";

        echo "</table>";
        

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);


}
}
}

    ?>
    
    

