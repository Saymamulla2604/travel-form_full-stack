<?php
$insert=false;
if(isset($_POST['name']))
{
    
   $server="localhost";
   $username="root";
   $password="";

   $con =mysqli_connect($server,$username,$password );
   if(!$con)
   {
    die("connection to this database failed due to ".mysqli_connect_error());
   }
  // echo "Success connection";
   $name=$_POST['name'];
   $gender=$_POST['gender'];
   $age=$_POST['age'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $desc=$_POST['desc'];
   

   $sql ="INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
   //echo $sql;
   if($con->query($sql)==true)
   {
   // echo"successfully inserted";
   $insert=true;
   }
   else{
    echo "ERROR: $sql <br> $con->error";
   }
   $con->close();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="IIT kharagpur">
    <div class="container">
        <h3>welcome to travel form </h3>
        <p>enter your details and submit this form </p>
        <?php
        if($insert==true)
        {
            echo "<p class='submitmsg' style='color: green;'>thankyou for submitting your form </p>";
        }
        
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="enter your name">
            <input type="number" name="age" id="age" placeholder="enter your age">
            <input type="text" name="gender" id="gender" placeholder="enter your gender">
            <input type="email" name="email" id="email" placeholder="enter your email">
            <input type="phone" name="phone" id="phone" placeholder="enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="enter any other information here"></textarea>
            <button class="btn" >Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>