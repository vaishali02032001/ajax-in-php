<?php 

$studentid = $_POST["id"];
 $conn = mysqli_connect("localhost","root","","ajax") or die("connection failed");
 $sql ="DELETE FROM students WHERE id = {$studentid}";
 if(mysqli_query($conn,$sql)){
    echo"1";

}else{
    echo "0";
}
?>