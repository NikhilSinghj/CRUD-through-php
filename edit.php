<?php
// include('reg.php');
 
error_reporting(E_ALL);
ini_set('display_errors',1);

// connecting php with html

$conn = mysqli_connect('localhost', 'nikhil', 'Nik212107@','registration');
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



$fn=$_GET['fn'];
$ln=$_GET['ln'];
$em=$_GET['em'];
$gen=$_GET['gen'];
$con=$_GET['con'];
$add=$_GET['add'];

// isset($_POST['firstname'])



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>documents</title>
    <link rel="stylesheet" href="style.css">
<style>
    * {
    box-sizing: border-box; 
    
  }
 
  
  
  h1{
    text-align: center;
    font-size: 40px;
  }
  
  h2{
    text-align: center;
    font-size: 30px;
  }
  input{
    border-radius:3%;
  }
  
  input[type=address] {
  
    padding: 10px 10px;
    margin: 4px 0;
    
  }

  button[type=submit]{
    
    background-color: rgb(8, 70, 8);
    color: white;
    padding: 16px 32px;
    margin: 4px 2px;
    cursor: pointer;
    margin-left:100px;
    


  }
 
  
 .main{
    
  display:flex;
  flex-direction: row;
  margin-left: 700px;
  margin-right:800px;
  margin-top:100px;
  background-color: rgb(212, 186, 201);
  border-radius:3%;
  padding:2%;
    
}

.instruction{
  margin-left: 650px;
  padding:3%;
}
</style>

  </head>
<body>
         
   
        

        
            <div class="main">

            
                

            
            
            <form  action=" update.php" method="post" >
                 
                <h1>Update Form</h1>
                <h2>Enter Your New Details</h2>

                <label for="firstname"><b>First Name :</b></label> 
                <input type="text" id="firstname" placeholder="Enter your first name"  name="firstname" value="<?php echo "$fn"?>" pattern="[A-Za-z]" >
                <br>
                <br>
                <label for="lastname"><b>Last Name :</b></label> 
                <input type="text" id="lastname" placeholder="Enter your second name" name="lastname" value="<?php echo "$ln"?>" pattern="[A-Za-z]">
              
                <br>
                <br>
                
                <label for="gender"><b>Gender :</b></label> 
                <input type="radio" id="male" name="gender" value="<?php echo "$gen"?>">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="<?php echo "$gen"?>">
                <label for="female">Female</label>
                <input type="radio" id="other" name="gender" value="<?php echo "$gen"?>">
                <label for="other">Other</label>
                <br>
                <br>
                
                <label for="email"><b>Email :</b></label> 
        
                <input type="email" id="email" name="email" placeholder="kiet@email.com"  value="<?php echo "$em"?> "  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                <br>
                <br>

                <label for="contact"><b>Contact :</b></label> 
                <input type="tel" id="contact" name="contact"  placeholder="0123456789" maxlength="10" size="10" value="<?php echo "$con"?>" >
                <br>
                <br>
                <label for="address"><b>Address :</b></label> 
                <input type="address" placeholder="Enter your address" name="address" value="<?php echo "$add"?>">
                <br>
                <br>
                
                
                <div class="button">
                <button type="submit" id="save"  name="submit" ><b>Update</b></button>
              
            </div>
                
            </div>  
        
            </div>
          
  
        <div class="instruction">  <?php
  
                echo "<b>Your Name<b> Should Only Contain Alphabets!";

        ?>  </div>
        


      
</body>
</html>



