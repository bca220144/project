<html>
    <head>
        
        <title>STAFF MANAGEMENT</title>
        <link rel="stylesheet" href="managestaff.css">
    </head>
    <body>
        <nav>
            <div class="staffnav">
                <a href="homepage.html">HOME</a>
        </nav>
      
    
    </body>
<div class="ManagestaffPhp">
<h1> STAFF  MANAGEMENT</h1>
<?php
$conn = mysqli_connect("localhost","root","","project");
if(!$conn)

{
    echo "database not connected";

}
$sql="SELECT * FROM `staff`";
$data=mysqli_query($conn,$sql);
 if(mysqli_num_rows($data) > 0){
    echo "<table border=1>";
    echo"<tr>";
    echo "<th>name</th>";
    echo "<th>email</th>";
    echo "<th>phone number</th>";
    echo "<th>user id</th>";
    echo "<th>delete</th>";
    echo "<th>edit</th>";
    

    echo"</tr>";
     while($row=mysqli_fetch_assoc($data)){
        $id=$row['staff_email'];
        echo "<tr>";
        echo "<td>".$row['staff_name']."</td>";
        echo "<td>".$row['staff_email']."</td>";
        echo "<td>".$row['phone_no']."</td>";
        echo "<td>".$row['staff_id']."</td>";
        echo "<td>
        <form method='POST'>
         <button value='$id' name='userdel' type='submit'>DELETE</button>
         </form>
         </td>";
         echo "<td>
         <form method='POST'>
         <button value='$id' name='useredit' type='submit'>EDIT</button>
         </form>
         </td>";
 
         
        echo "</tr>";
        
     }
    echo "</table>";
 }
 ?>
 </div>
 </html>
 <?php
 
 $conn = mysqli_connect("localhost","root","","project");
 if(!$conn)
 
 {
     echo "database not connected";
 
 }
 if(isset($_POST['userdel']))
 {
    $id = $_POST['userdel'];
    if(!empty($_POST['userdel'])){
        $sql="DELETE FROM `staff` WHERE `staff_email`='$id'";
        $data = mysqli_query($conn,$sql);

        $sql1="DELETE FROM `login` WHERE `email`='$id'";
        $data1 = mysqli_query($conn,$sql1);
        echo"<script>window.location.replace('managestaff.php');</script>";

    }
 }
 ?>
 