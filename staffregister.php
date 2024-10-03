<html>

    <head>
        <link rel="stylesheet" href="staffregister1.css">
    </head>
    <div class="staffRegistercontainer">
    <body>
        <form class="staffregisterForm" action="" method="post">
             <h1><u> REGISTRATION</u></h1> 
             <input class="staffRegisterInput" type="text" name="staff_name" placeholder="enter staff name">
             <input class="staffRegisterInput" type="email" name="staff_email" placeholder="enter your email">
             <input class="staffRegisterInput" type="password" name="staff_pword" placeholder="enter password">
             <input class="staffRegisterInput" type="text" name="phone_no" placeholder="enter phone number">
             <input class="staffRegisterSubmit" type="submit"  name="submit" value="Add">

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
    $staff_name=$_POST['staff_name'];
    $staff_email=$_POST['staff_email'];
    $staff_pword=$_POST['staff_pword'];
    $phone_no=$_POST['phone_no'];
    $type=1;
      $sql ="INSERT INTO `staff`(`staff_name`, `staff_email`, `staff_pword`, `phone_no`) VALUES ('$staff_name','$staff_email','$staff_pword','$phone_no')";
                    $data=mysqli_query($conn,$sql);
    $sql1="INSERT INTO `login`(`email`, `password`, `user_code`) VALUES ('$staff_email','$staff_pword','$type')";
   $data1=mysqli_query($conn,$sql1);

       if($data && $data)
       {
         echo "<script>alert( 'record added')</script>" ;

       }
         else{
         echo "<script>alert(' No record added')</script>";   
          }

    }

  
   
    ?>