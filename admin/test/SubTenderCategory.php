<?php include("../../includes/db_connection.php"); ?>
<?php include("../../includes/functions.php"); ?>
<?php

if (isset($_POST['pro_id'])) {
    $data = $_POST['pro_id'];

    $sql = "select * from [dbo].[TenderCategory] WHERE ParentID = '{$data}';";
    $res = sqlsrv_query($connection, $sql);

    echo "<option value=''>------- Select --------</option>";

    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        echo "<option value='" . $row["TenderCategoryID"] . "'>" . $row["TenderCategory"] . "</option>";
    }

} else {
    header('location: ./');
}
?>
