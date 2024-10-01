<?php

$student_id =$_POST["id"];
$firstname = $_POST["first_name"];
$lastname = $_POST["last_name"];

$conn = mysqli_connect("localhost","root","","ajax") or die('connection failed');

$query = "UPDATE students SET first_name ='{$firstname}',last_name ='{$lastname}'WHERE id ={$student_id}";

if(mysqli_query($conn,$query)){
    echo"1";

}else{
    echo "0";
}