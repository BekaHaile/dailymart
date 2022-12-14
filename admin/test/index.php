<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <title>Change dropdown options based on another dropdown dynamically using ajax || Mitrajit's Tech Blog</title>
    <style>
        span {
            clear: both;
            display: block;
            margin-bottom: 30px;
        }

        span a {
            font-weight: bold;
            color: #0099FF;
        }

        label {
            display: block;
            clear: both;
            margin-top: 20px;
            margin-bottom: 3px;
        }

        select {
            width: 200px;
        }

        #country {
            margin-right: 30px;
        }
    </style>

    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="js.js"></script>
</head>
<?php include("../../includes/db_connection.php");

if(isset($_POST["submit"])){
    echo $_POST["country"] . "        ";
    echo $_POST["state"];
}

?>

<body>
<span>Read the full article -- <a
        href="http://www.mitrajit.com/populate-dropdown-list-based-selection-another-dropdown-list-using-ajax/"
        target="_blank">Populate a dropdown list based on selection another dropdown option using ajax</a> in <a
        href="http://www.mitrajit.com/">Mitrajit's Tech Blog</a></span>

<div class="">
    <form action="#" method="post">
        <label>Country :</label>
        <select name="country" id="country">
            <option value=''>------- Select --------</option>
            <?php
            $sql = "SELECT * FROM dbo.JobCategoryNew";
            $res = sqlsrv_query($connection, $sql);

            while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
                echo "<option value='" . trim($row["JobCategoryID"]) . "'>" . $row["JobCategory"] . "</option>";
            }

            ?>
        </select>

        <label>State :</label>
        <select name="state" id="state">
            <option>------- Select --------</option>
        </select>

        <input name="submit" type="submit" value="Send" />
    </form>

</div>

</body>
</html>
