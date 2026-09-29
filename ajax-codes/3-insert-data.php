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
                First Name :<input type="text" id="fname">&nbsp;&nbsp;&nbsp;&nbsp;
                Last Name : <input type="text" id="lname">
                <input type="submit" id="save-button" value="save">
            </td>
        </tr>
        <tr>
            <td id="table-data">
                
            </td>
        </tr>
    </table>
    <script src="js/jquery-4.0.0.min.js"></script>
    <script>
        $(document).ready(function () {
            function loadTable() {
                $.ajax({
                    url: "2-ajax-load.php",
                    type: "POST", //EKHANE ajax e form er vitoreo method: POST lekhha lage na. sudhu script er vitor type: POST liklei hoi
                    success: function (data) {
                        $('#table-data').html(data);
                    }
                });
            }
            loadTable();
            ('#save-button').on("click", function(e){
                e.preventDefault();
                var fname = $("$fname").val();
                var lname = $("$lname").val();
            });
            $.ajax({
                url: "4-ajax-insert.php",
                type: "POST",
                data: {first_name: fname, last_name: lname},
                success: function(data){
                    loadTable();
                }
            });
        });
    </script>
</body>

</html>