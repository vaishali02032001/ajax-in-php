<!DOCTYPE html>
<html>

<head>
    <title>AJAX</title>
    <link rel="stylesheet" href="stylee.css">

<body>
    <div class="container">
        <div Class="BO">
            <a href="http://localhost/ajax_in_php/show_data.php"><img src="images/log-out.jpg" style="width:30px ;height:20px ;padding-right:90%; padding-top:-20px;"></a>
            <h2>ADD RECORDS with PHP & AJAX </h2>
            <div style="padding-top:-60px;  display:flex; ">
                SEARCH : <input type="text" id="search-data">
            </div>
        </div>
        <div class="BOX" style="background-color:#FFD23F">
            <form id="addform">
                FIRST NAME : <input type="text" id="first_name">&nbsp;&nbsp;
                LAST NAME : <input type="text" id="last_name">
                <input type="submit" id="save" value="save" class="btn">
            </form>
        </div>
        <table>
            <tr>
                <td id="table"></td>
            </tr>
        </table>
        <div id="error-message"></div>
        <div id="success-message"></div>



        <!-- edit page -->
        <div id="modal">
            <div id="modal-form">
                <h2>EDIT FORM</h2>
                <table cellpading="10px" width="100%">
                    <!-- <tr>
                <td>first name</td>
                <td><input type="text" id="first_name" style="width:100%"></td>
            </tr>
            <tr>
                <td>last name</td>
                <td><input type="text" id="last_name" style="width:100%"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" id="update" value="update"></td>
            </tr> -->
                </table>
                <div id="close-btn">X</div>
            </div>
        </div>










        <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script type="text/javascript">
            $(document).ready(function() { //The $(document).ready() function is a jQuery method that waits until the HTML document is fully loaded before executing the code inside it.
                function loadtable() { //The loadtable() function is defined inside this block, which means it will only be executed when the document is ready.

                    $.ajax({
                        url: "ajax-load.php",
                        type: "POST", //The request is sent as a POST request
                        success: function(data) { // when the response is received, the success callback function is executed.
                            $("#table").html(data);

                        }
                    });
                }
                loadtable(); // load table records on page load

                //insert new record
                $("#save").on("click", function(e) {
                    e.preventDefault(); //stop the default program  "input type submit" 

                    var fname = $("#first_name").val(); //val() = 
                    var lname = $("#last_name").val();
                    if (fname == "" || lname == "") {
                        $("#error-message").html("All field are required").slideDown();
                        $("#success-message").slideUp();
                    } else {
                        $.ajax({
                            url: "insert.php",
                            type: "POST",
                            data: {
                                first_name: fname,
                                last_name: lname
                            },
                            success: function(data) {
                                if (data == 1) {
                                    loadtable();
                                    $("#addform").trigger("reset");
                                    $("#success-message").html("Data inserted successfully.").slideDown();
                                    $("#error-message").slideUp();
                                } else {
                                    $("#error-message").html("can't save record").slideDown();
                                    $("#success-message").slideup();

                                }

                            }
                        });
                    }
                });


                //Delete record
                $(document).on("click", ".button", function() {
                    if (confirm("do you really want to delete record ?")) {
                        var studentid = $(this).data("id");
                        var v = this;

                        $.ajax({
                            url: "delete.php",
                            type: "POST",
                            data: {
                                id: studentid
                            }, //id taken as a key attribute........studentid is a variable than the click button event is store
                            success: function(data) {
                                if (data == 1) { //$(v) refers to the button element that was clicked, stored in the v variable.
                                    $(v).closest("tr").remove();
                                } else {
                                    $("#error-message").html("can't deleted record").slideDown();
                                    $("#success-message").slideup();

                                } // the button is likely a child element of a table row (tr), so closest("tr") finds the parent table row element.

                            }
                        })
                    }
                });



                // show modal box
                $(document).on("click", ".edit-btn", function() {
                    $("#modal").show();
                    var studentid = $(this).data("eid");
                    var v = this;

                    $.ajax({
                        url: "update.php",
                        type: "POST",
                        data: {
                            id: studentid
                        }, //id taken as a key attribute........studentid is a variable than the click button event is store
                        success: function(data) {
                            $("#modal-form table").html(data);
                        }
                    })
                });



                //close modal box
                $("#close-btn").on("click", function() {
                    $("#modal").hide();

                });



                //save update form
                $(document).on("click", "#update", function() {
                    var stuid = $("#edit_id").val();
                    var fname = $("#edit_fname").val();
                    var lname = $("#edit_lname").val();

                    $.ajax({
                        url: "ajax-update-form.php",
                        type: "POST",
                        data: {
                            id: stuid,
                            first_name: fname,
                            last_name: lname
                        },
                        success: function(data) {
                            if (data == 1) {
                                $("#modal").hide();
                                loadtable();
                            }
                        }
                    })
                });



                //live search
                $("#search-data").on("keyup", function() {
                    var search_term = $(this).val();

                    $.ajax({
                        url: "search.php",
                        type: "POST",
                        data: {
                            search: search_term
                        },
                        success: function(data) {
                            $("#table").html(data);
                        }
                    })
                })
            });
        </script>
    </div>
</body>
</head>

</html>