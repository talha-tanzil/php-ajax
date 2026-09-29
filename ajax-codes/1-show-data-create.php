<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP with Ajax</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #b0bec5;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            min-height: 590px;
            margin: 0 auto;
            background: white;
        }

        /* Header */
        h1 {
            background: #ffda91;
            text-align: center;
            padding: 15px;
            margin: 0;
            font-size: 36px;
        }

        /* Load Data section */
        .button-box {
            background: turquoise;
            text-align: center;
            padding: 20px;
        }

        button {
            font-size: 20px;
            padding: 5px 10px;
            cursor: pointer;
        }

        /* Table */
        .table-box {
            padding: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 18px;
        }

        th,
        td {
            border: 1px solid #555;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #66a9f7;
            text-align: center;
        }

        tr:nth-child(even) {
            background: #e9eeee;
        }

        tr:nth-child(odd) {
            background: white;
        }

        th:first-child,
        td:first-child {
            width: 100px;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>PHP with Ajax</h1>

        <div class="button-box">
            <button id ="loadbtn">Load Data</button>
        </div>
        <table>
            <tr>
                <div class="table-box" id="table-data">
            
                    <!-- <td id="table-data">
                    </td> no need of this part-->
            </tr>
        </table>
    </div>

    </div>
    <script src="js/jquery-4.0.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#loadbtn').on("click", function (e) {
                $.ajax({
                    url: "2-ajax-load.php",
                    type: "POST", //EKHANE ajax e form er vitoreo method: POST lekhha lage na. sudhu script er vitor type: POST liklei hoi
                    success: function (data) {
                        $('#table-data').html(data);
                    }

                })
            });
        });
    </script>

</body>

</html>