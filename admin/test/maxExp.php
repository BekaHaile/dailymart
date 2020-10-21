<?php include("../../includes/db_connection.php"); ?>
<?php include("../../includes/functions.php"); ?>
<?php

if (isset($_POST['c_id'])) {
    $data = $_POST['c_id'];

    $exp = find_all_jobExperience_by_id($data);

    $sql = "select * from [dbo].[JobExperience] WHERE start >= '{$exp['start']}' order by start;";
    $res = sqlsrv_query($connection, $sql);

    echo "<option value=''>Greater Than ".$exp['JobExperience']."</option>";

    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        echo "<option value='" . $row["JobExperienceID"] . "'>" . $row["JobExperience"] . "</option>";
    }

} else {
    header('location: ./');
}
?>
