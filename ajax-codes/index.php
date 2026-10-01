<!-- this is the 3rd file -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/3-style.css">
    <style>

    </style>
</head>

<body>
    <table id="main" border="0" cellspacing="0">
        <tr>
            <td id="header">
                <h1>CRUD records with PHP, Ajax & JQuery</h1>
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
    <div id="modal">
        <div id="modal-form">
            <h2>Edit Form</h2>
            <table cellpadding="10px" width="100%">
            </table>
            <button id="close-btn">Close</button>
        </div>
    </div>


    <!-- JS implementation -->
    <script src="js/jquery-4.0.0.min.js"></script>
    <script>
        $(document).ready(function () {

            // $('#modal').css('display', 'block'); //not needed here though

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
                if (fname == '' || lname == '') {
                    $('#error-message').html("All fields are required").slideDown();
                    $('#success-message').slideUp();
                } else {
                    $.ajax({
                        url: "4-ajax-insert.php",
                        type: "POST",
                        data: {
                            first_name: fname, //fname, lname ta ekhaner var fname, lname theke neya
                            last_name: lname
                        },
                        success: function (data) {
                            if (data == 1) {
                                loadTable();
                                $('#addForm').trigger('reset');
                                $('#success-message').html("Data inserted successfully").slideDown();
                                $('#error-message').slideUp();
                            } else {
                                alert("Can't save the record");
                            }
                        }
                    });
                }
            });

            // delete-btn functions code
            $(document).on("click", ".delete-btn", function () {
                if (confirm("Do you really want to delete this")) {
                    var studentId = $(this).data('id'); //ekhane id lekha hoise, karon delete-btn er sathe data-id lekha hoisilo
                    var element = this; //here this means .delete-btn
                    alert(studentId);
                    $.ajax({
                        url: "5-ajax-delete.php",
                        type: "POST",
                        data: { id: studentId },
                        success: function (data) {
                            if (data == 1) {
                                $(element).closest("tr").fadeOut();
                            } else {
                                alert("Can't delete the record");
                            }
                        }
                    });
                }
            });

            // show modal box
            $(document).on("click", ".edit-btn", function () {
                $('#modal').show();
                var studentId = $(this).data('eid');
                // alert(studentId);

                $.ajax({
                    url: "6-load-update-form.php",
                    type: 'POST',
                    data: { id: studentId },
                    success: function (data) {
                        $('#modal-form table').html(data);
                    }
                });
            });
            // hide modal box
            $('#close-btn').click(function () {
                $('#modal').css('display', 'none'); // $('#modal').hide(); aita likleo hoi
            });
            //save update form
            $(document).on("click", ".edit-submit", function () {
                var stuId = $("#edit-id").val();
                var fname = $("#edit-lname").val();
                var lname = $("#edit-submit").val();
                $.ajax ({
                    url: "7-ajax-update-form.php",
                    type: "POST",
                    data: {
                        id: stuId,
                        first_name: fname,
                        last_name: lname //stuId, fname, lname ta ekhaner var fname, lname theke neya
                },
                    success: function(data){
                        $('#modal').hide();
                    }
                });

            });
        });
    </script>
</body>

</html>