<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/3-style.css">
</head>

<body>
    <table id="main" border="0" cellspacing="0">
        <tr>
            <td id="header">
                <h1>Add records with PHP & Ajax</h1>
            </td>
        </tr>
        <tr>
            <td id="table-form">
                <form id="addForm">
                    First Name :<input type="text" id="fname">&nbsp;&nbsp;&nbsp;&nbsp;
                    Last Name : <input type="text" id="lname">
                    <input type="submit" id="save-button" value="save">
                </form>
            </td>
        </tr>
        <tr>
            <td id="table-data">

            </td>
        </tr>
    </table>
    <div id="error-message"></div>
    <div id="success-message"></div>
    <script src="js/jquery-4.0.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // load Table records
            function loadTable() {
                $.ajax({
                    url: "2-ajax-load.php",
                    type: "POST", //EKHANE ajax e form er vitoreo method: POST lekhha lage na. sudhu script er vitor type: POST liklei hoi
                    success: function (data) {
                        $('#table-data').html(data);
                    }
                });
            }
            loadTable(); //load Table records on page load

            // insert new records
            $('#save-button').on("click", function (e) {
                e.preventDefault();
                var fname = $("#fname").val();
                var lname = $("#lname").val();
                if (fname == '' || lname== ''){
                $('#error-message').html("All fields are required").slideDown();
                $('success-message').slideUp();
            } else {
                $.ajax({
                    url: "4-ajax-insert.php",
                    type: "POST",
                    data: {
                        first_name: fname,
                        last_name: lname
                    },
                    success: function (data) {
                        if (data == 1) {
                            loadTable();
                            $('#addForm').trigger('reset');
                            $('#success-message').html("Data inserted successfully").slideDown();
                            $('error-message').slideUp();
                        } else {
                            alert("Can't save the record");
                        }
                    }
                });
            }

            $.ajax({
                url: "4-ajax-insert.php",
                type: "POST",
                data: {
                    first_name: fname,
                    last_name: lname
                },
                success: function (data) {
                    if (data == 1) {
                        loadTable();
                        $('#addForm').trigger('reset');
                    } else {
                        alert("Can't save the record");
                    }
                }
            });
        });
        });
    </script>
</body>

</html>