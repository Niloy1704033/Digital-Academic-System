<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nsa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$institute=$_POST['institute'];
$account=$_POST['acc'];
$pass=$_POST['pass'];
$passs=sha1($pass);
//$customerpass=$_POST['pass'];
//$expense=$_POST['e'];

$sql = "INSERT INTO teacher(fname,lname,email,institute,acno,password)
VALUES ('$fname', '$lname','$email','$institute','$account','$passs')";


if ($conn->query($sql) === TRUE) {
    echo "<h1 style='background-color:#990000;color:white;text-align:center'>REGISTRATION SUCCESSFUL</h1>";
    $eql = "SELECT tid FROM teacher WHERE fname='$fname' AND email='$email'";
    $result = $conn->query($eql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<h1 style='color:white;background-color:#990000;text-align:center'>CONGRATS!! YOUR PASS IS <span>".$row['tid']."</span>!!!</h1>";
        }
      }

} else {
    echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();
?>
