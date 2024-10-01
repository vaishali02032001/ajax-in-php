<?php 

  $student_id = $_POST["id"];

  $conn = mysqli_connect("localhost","root","","ajax") or die('connection failed');

  $query = "SELECT * FROM students where id = {$student_id}";

  $result =mysqli_query($conn,$query);
  $table=  " ";

if(mysqli_num_rows($result)>0){

   while($row =mysqli_fetch_assoc($result)){
        $table .="<tr>
         <td>first name</td>
                <td><input type='text' id='edit_fname' style='width:100%' value='{$row["first_name"]}'></td>
                <td><input type='hidden' id='edit_id' value='{$row["ID"]}'></td>
                </tr>
                
            <tr>
                <td>last name</td>
                <td><input type='text' id='edit_lname' style='width:100%' value='{$row["last_name"]}'></td>
            </tr>
            <tr>
                <td></td>
                <td><input type='submit' id='update' value='update'></td>
            
        </tr>";
    }

    // $table .="</table>";

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
  background-color: gray;
  color:beige;
}
.edit-btn{
  border-radius: 10px;
   padding:10px 20px;
   background-color:green;
   color:beige;
}

</style>