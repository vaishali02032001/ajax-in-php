<!DOCTYPE html>
<html>                    
    <head>
        <style>
             .BOX{
            padding:20px;
            }
            .BO{
                background-color:#ff7f50;
                margin-bottom: -20px;
                padding: 20px;
                text-align: center;
                color:white;
            }
.btn{
    margin-left: 45%;
    padding:10px;
    border-radius: 10px;
    color:black;
    background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%) ;
}
th{
    background-color: darkgray;
    color:white;

}
 </style>

    <title>AJAX</title>
    <body>
        <div class="container">
            <div Class="BO">
                <h2>PHP WITH AJAX</h2>
                </div>
                <div class="BOX" style="background-color:#008080">
                    <input type="submit" id="Load-Data" value="Load Data" class="btn">
                    <a href="http://localhost/ajax_in_php/insert_data.php"><img src="images/6713857.png" style="width:30px ;height:20px ;padding-left:40%"></a>
                </div>
                 <!-- <a href="http://localhost/ajax_in_php/insert_data.php"><input type="submit" id="logout" value="logout"></a> -->
                <table>
                <tr>
            <td id="table-data"></td>
            </tr>
</table>    
<!-- <table border="1px"cellspacing="0" width="60%" cellpadding="10px" style="margin:0px 20% " id="table-data">
    <tr>
        <th >ID</th>
        <th>NAME</th>
    </tr>
    <tr>
    <td align="center">1</td>
    <td align="center">vaishali sharma</td>
    </tr>
</table> -->



<!-- AJAX :ASYNCHRONOUS JAVASCRIPT and XML -->

<!-- loads the jQuery library from a CDN -->
 <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>    
 <script type="text/javascript">
$(document).ready(function(){                                //jquery method that entire html code is execuded inside the function
    $("#Load-Data").on("click",function(e){                 //Attaches a click event listener to an element with the ID Load-Data.   
    $.ajax({
         url:"ajax-load.php",                              //server side script handle the request
         type:"POST",                                     //request
         success:function(data){                         // specifies a callback function that will be executed when the request is successful , data parameter represents the response data from the server
            $("#table-data").html(data);                //When the request is successful, sets the response data as the HTML content of an element with the ID table-data.
         }
});

    });
    });






 </script>
    </div>
    </body>
    </head>
</html>