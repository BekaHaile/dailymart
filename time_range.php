<?php
include("includes/db_connection.php");
include("includes/session.php");
include("includes/functions.php"); ?>
<?php
   if (isset($_POST['type']) && isset($_POST['time'])) {
    $type = $_POST['type'];
    $time = $_POST['time'];

    $shop = $_POST["shop"];
    $landmark = $_POST["landmark"];

     $time_range = find_all_time_range_and_price_by_shop_id($shop, $landmark, $time);


    if($type == 'Pickup' && $time == 'Tomorrow'){
        ?>
        <select class="form-control" id="timerange" name="timerange" required="required"
                                    onchange="displayPrice()"
                                    style="border-radius: 0 0 15px 15px;;border: 3px solid lightgray;">
                                    <option disabled selected hidden><?php echo $lang['chooseConvenientTime']; ?></option>
            <?php
            $hour = strtotime("07:00");
            $hourTime = date('H:i', $hour);
            $nexthour = strtotime($hourTime) + 60*60;
            $nextHourTime = date('H:i', $nexthour);

            while(strtotime($hourTime)<strtotime("19:00")){
            ?>
            <option value="<?php echo $hourTime."-".$nextHourTime ?>"> <?php echo $hourTime."-".$nextHourTime ?> </option>

            <?php 
                $hour = strtotime($hourTime) + 60*60;
                $hourTime = date('H:i', $hour);
                $nexthour = strtotime($hourTime) + 60*60;
                $nextHourTime = date('H:i', $nexthour);
                } ?>
        </select>
        <span class="fa fa-caret-down" style="margin-left: -35px;font-size: 25px;padding-top: 10px;"></span>
<?php
    } elseif ($type == 'Pickup' && $time == 'Today'){
        ?>
        <select class="form-control" id="timerange" name="timerange" required="required"
                                    onchange="displayPrice()"
                                    style="border-radius: 0 0 15px 15px;;border: 3px solid lightgray;">
                                    <option disabled selected hidden><?php echo $lang['chooseConvenientTime']; ?></option>
            <?php 
                $var2 = strtotime(date('H:00')) + 60*60;
                $var = date('H:i', $var2);
                $hour = strtotime($var) + 60*60;
                $hourTime = date('H:i', $hour);
                $nexthour = strtotime($hourTime) + 60*60;
                $nextHourTime = date('H:i', $nexthour); 

                while(strtotime($hourTime)<strtotime("19:00")){
            ?>
            <option value="<?php echo $hourTime."-".$nextHourTime ?>"> <?php echo $hourTime."-".$nextHourTime ?> </option>

                <?php 
                    $hour = strtotime($hourTime) + 60*60;
                    $hourTime = date('H:i', $hour);
                    $nexthour = strtotime($hourTime) + 60*60;
                    $nextHourTime = date('H:i', $nexthour);
                    } ?>

        </select>
        <span class="fa fa-caret-down" style="margin-left: -35px;font-size: 25px;padding-top: 10px;"></span>
        <?php
    } elseif ($type == 'Deliver' && $time == 'Today'){
        ?>
        <select class="form-control" id="timerange" name="timerange" required="required"
                                    onchange="displayPrice()"
                                    style="border-radius: 0 0 15px 15px;;border: 3px solid lightgray;">
                                    <option disabled selected hidden><?php echo $lang['chooseConvenientTime']; ?></option>
            <?php

            $count = 1;
        
        while ($row = sqlsrv_fetch_array($time_range, SQLSRV_FETCH_ASSOC)) {

            $var2 = strtotime(date('H:00')) + 60*60;
            $var = date('H:i', $var2);

            $hour = strtotime(substr($row['time_range'],0,5));
            $hourTime = date('H:i', $hour);

            if(strtotime($hourTime) > strtotime($var)){
                $price = $row['price'];
                if($count < 3){
                    $price = $price + 50;
                    $count++;
                }
         ?>
            <option value="<?php echo $row['time_range'].' / '.' ETB '.$price?>"><?php echo $row['time_range'].' / '.' ETB '.$price?></option>

        <?php }
         } ?>

        </select>
        <span class="fa fa-caret-down" style="margin-left: -35px;font-size: 25px;padding-top: 10px;"></span>
        <?php
    } elseif ($type == 'Deliver' && $time == 'Tomorrow'){
        ?>
        <select class="form-control" id="timerange" name="timerange" required="required"
                                    onchange="displayPrice()"
                                    style="border-radius: 0 0 15px 15px;;border: 3px solid lightgray;">
                                    <option disabled selected hidden><?php echo $lang['chooseConvenientTime']; ?></option>
            <?php
        
        while ($row = sqlsrv_fetch_array($time_range, SQLSRV_FETCH_ASSOC)) {
         ?>
            <option value="<?php echo $row['time_range'].' / '.' ETB '.$row['price']?>"><?php echo $row['time_range'].' / '.' ETB '.$row['price']?></option>

        <?php } ?>

        </select>
        <span class="fa fa-caret-down" style="margin-left: -35px;font-size: 25px;padding-top: 10px;"></span>
        <?php
    }
} 
?>