<html>
    <head>
        <link rel="stylesheet" href="manageusers.css">
        <title>MANAGE USERS</title>
    </head>
    <body>
    <nav>
       <a href="homepage.html">HOME</a>
        </nav>
      
    
    </body>
    <div class="ManageusersPhp">
    <h1>  STUDENT MANAGEMENT</h1>
<?php
$conn = mysqli_connect("localhost","root","","project");
if(!$conn)

{
    echo "database not connected";

}
$sql="SELECT * FROM `register`";
$data=mysqli_query($conn,$sql);
 if(mysqli_num_rows($data) > 0){
    echo "<table border=1>";
    echo"<tr>";
    echo "<th>name</th>";
    echo "<th>email</th>";
    echo "<th>number</th>";
    echo "<th>userid</th>";
    echo "<th> delete </th>";

    echo"</tr>";
     while($row=mysqli_fetch_assoc($data)){
        $id=$row['email'];
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['number']."</td>";
        echo "<td>".$row['userid']."</td>";
        echo "<td>
        <form method='POST'>
        <button value='$id' name='userdel' type='submit'>DELETE</button>
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
       $sql="DELETE FROM `register` WHERE `email`='$id'";
       $data = mysqli_query($conn,$sql);

       $sql1="DELETE FROM `login` WHERE `email`='$id'";
       $data1 = mysqli_query($conn,$sql1);
       echo"<script>window.location.replace('manageusers.php');</script>";

   }
}
?>