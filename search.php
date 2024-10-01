<?php

$search_value = $_POST["search"];

  $conn = mysqli_connect("localhost","root","","ajax") or die('connection failed');

  $query = "SELECT * FROM students WHERE first_name LIKE '%{$search_value}%' OR last_name LIKE '%{$search_value}%'";

  $result =mysqli_query($conn,$query);
  $table=  " ";





if(mysqli_num_rows($result)>0){

   $table = '<table border="1px"cellspacing="0" width="60px" cellpadding="10px" class="centered-table">
    <tr>
        <th width="5px">ID</th>
        <th >NAME</th>
        <th width="1px">EDIT</th>
        <th width="1px">DELETE</th>
       
    </tr>';

    while($row =mysqli_fetch_assoc($result)){
        $table .="<tr><td>{$row["ID"]}</td><td>{$row["first_name"]}   {$row["last_name"]}</td>
        <td><button class='edit-btn' data-eid='{$row["ID"]}'><img src='images/edited.jpg' style='width:20px; height:20px'></button></td>
        <td><button class='button' data-id='{$row["ID"]}'><img src='images/6861362.png' style='width:20px; height:20px'></button></td></tr>";
    }

    $table .="</table>";

    mysqli_close($conn);
    echo $table;
}else{
    echo "no record found";
}


?>




<style>
    .centered-table {
       width:250%;
        margin-left: 30%;
        margin-top:3px;
}
.button{
  border-radius: 10px;
   padding:10px;
  background-color:gray;
  color:beige;
}
.edit-btn{
  border-radius: 10px;
   padding:10px 20px;
   background-color:green;
   color:beige;
}

</style>