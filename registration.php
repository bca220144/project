<html>

    <head>
        <link rel="stylesheet" href="registration1.css">
    </head>
   <nav>
    <a href="homepage.html"> HOME</a>

    <div class="Registrationcontainer">
    <body>
       
        <form class="RegistrationForm" action="" method="post">
             <h1><u> SIGN UP</u></h1> 
             <input class="RegistrationInput" type="text" name="name" placeholder="enter your username">
             <input class="RegistrationInput" type="email" name="email" placeholder="enter your email">
             <input class="RegistrationInput" type="number" name="number" placeholder="enter your number">
             <input class="RegistrationInput" type="password" name="password" placeholder="enter your password">
             <input class="RegistrationInput" type="password" name="confirm" placeholder="confirm your password">
             <input class="RegistrationSubmit" type="submit"  name="submit" value="submit">
             <p>Already have an account?<br>
             <a href="login.php">sign in here</a></p>



        </form>
    </body>
    </div>
    
</html>
<?php
$conn = mysqli_connect("localhost","root","","project");
if(!$conn)
{
    echo "database not connected";

}
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];
    $type=0;
    if($password===$confirm)
    {
       $sql=" INSERT INTO `register`(`name`, `email`, `number`, `password`) VALUES ('$name','$email','$number','$password')";
       $data=mysqli_query($conn,$sql);
       $sql1="INSERT INTO `login`(`email`, `password`, `user_code`) VALUES ('$email','$password','$type')";
       $data1=mysqli_query($conn,$sql1);
       if($data && $data1)
       {
         echo "<script>alert( 'record added')</script>" ;

       }
         else{
         echo "<script>alert(' No record added')</script>";   
          }

    }
    else{
        echo "<script>alert(' password doesn't match') </script>";

        
    }
    
}
    ?>