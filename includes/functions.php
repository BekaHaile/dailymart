<?php

/**
 * Created by PhpStorm.
 * User: mel
 * Date: 4/22/2016
 * Time: 7:03 AM
 */

function redirect_to($new_location)
{
    header("Location: " . $new_location);
    exit;
}

function mysql_prep($string)
{
    global $connection;
    $escaped_string = mysqli_real_escape_string($connection, $string);

    return $escaped_string;
}

function confirm_query($result_set)
{
    if (!$result_set) {
        $_SESSION["art_error"] = ("Database query failed.");
    }
}

function form_errors($errors = array())
{
    $output = "";
    if (!empty($errors)) {
        $output .= "<div class = \"error\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach ($errors as $key => $error) {
            $output .= "<li>";
            $output .= htmlentities($error);
            $output .= "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }

    return $output;
}

function sqlsrv_escape($str)
{
    if (get_magic_quotes_gpc()) {
        $str = stripslashes(trim($str));
    }
    return trim(str_replace("'", "''", $str));
}

//Find View
function find_all_view_category()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[view_item_catagory] order by catagory_description;";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_view_Category_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[view_item_catagory] ";
    $query .= "WHERE code = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_all_view_product_group()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[view_product_group] order by group_description;";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_view_product_group_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[view_product_group] ";
    $query .= "WHERE code = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_all_view_brand()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[view_brand] order by brand_description;";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_view_brand_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[view_brand] ";
    $query .= "WHERE code = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_all_view_item()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[view_item] order by item_description_english;";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_view_item_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[view_item] ";
    $query .= "WHERE item_code = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_all_view_price()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[view_sales_price];";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_view_price_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[view_sales_price] ";
    $query .= "WHERE price_id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_all_view_discount()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[view_price_discount];";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_view_discount_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[view_price_discount] ";
    $query .= "WHERE discount_id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}


//find all
function find_all_admins()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[user];";
    $params = array();
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $admin_set = sqlsrv_query($connection, $query, $params, $options);
    confirm_query($admin_set);

    return $admin_set;
}

function find_all_customers()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[customer];";
    $params = array();
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $admin_set = sqlsrv_query($connection, $query, $params, $options);
    confirm_query($admin_set);

    return $admin_set;
}

function find_all_Category()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[category] order by title_en";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_all_Category_no_image()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[category] where image != null or image != '' order by title_en";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_all_product_group()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[product_group] order by title_en;";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_all_product_group_order_by_cat()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[product_group] order by category_id;";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_all_brand()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[brand] order by title_en;";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_all_item()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[item] order by title_en;";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_all_price()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[price];";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_all_discount()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[price_discount];";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_all_slider()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[slider];";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_home_slider()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[slider] where created_for = 'Home Page';";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_category_slider($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[slider] where created_for = '{$id}';";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_all_top_item()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[top_item];";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_top_six_item()
{
    global $connection;

    $query = "SELECT TOP 6 * ";
    $query .= "FROM [dbo].[top_item];";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_all_notification()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[notification];";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_all_order()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[order] order by date_time";
    $result_set = sqlsrv_query($connection, $query);
    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));

    }

    return $result_set;
}

function find_all_cart()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[cart] order by date_time";
    $result_set = sqlsrv_query($connection, $query);
    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));

    }
    return $result_set;
}

function find_all_location()
{
    global $connection;

    $query = "SELECT location ,location_desc ";
    $query .= "FROM [dbo].[inventory_by_location] group by location, location_desc";
    $result_set = sqlsrv_query($connection, $query);
    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));

    }
    return $result_set;
}

//find by id
function find_all_admin_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[user] WHERE  id = '{$id}'";
    $admin_set = sqlsrv_query($connection, $query);
    confirm_query($admin_set);

    if ($admin_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($admin_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }

}

function find_all_customer_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[customer] WHERE  id = '{$id}'";
    $admin_set = sqlsrv_query($connection, $query);
    confirm_query($admin_set);

    if ($admin_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($admin_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }

}

function find_category_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[category] WHERE id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_category_by_cat_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[category] WHERE category_id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_product_group_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[product_group] WHERE id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_product_group_by_pro_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[product_group] WHERE product_id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_brand_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[brand] WHERE id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_brand_by_brand_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[brand] WHERE brand_id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_item_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[item] WHERE id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_item_by_item_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[item] WHERE item_id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_price_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[price] WHERE id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_price_by_price_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[price] WHERE price_id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_discount_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[discount] WHERE id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_discount_by_discount_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[discount] WHERE discount_id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_slider_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[slider] WHERE id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_notification_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[notification] WHERE id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_order_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[order] WHERE id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_cart_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[cart] WHERE id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }

}

//find user
function find_all_user_by_email($email)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[user] WHERE  email = '{$email}'";
    $user_set = sqlsrv_query($connection, $query);
//    confirm_query($user_set);

    if ($user_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($user_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_admin_by_username($username)
{
    global $connection;

    $sql = "select * from [DailyMart].[dbo].[user] WHERE email = '{$username}'";
    $stmt = sqlsrv_query($connection, $sql);
    confirm_query($stmt);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }

}

function find_customer_by_mobile($mobile)
{
    global $connection;

    $sql = "select * from [DailyMart].[dbo].[user] WHERE mobile_number = '{$mobile}'";
    $stmt = sqlsrv_query($connection, $sql);
    confirm_query($stmt);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }

}

function find_price_by_item_id($id)
{
    global $connection;

    $year = date("Y");
    $month = date("m");
    $day = date("d");

    $date = $year . "-" . $month . "-" . $day;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[price] WHERE item_id = '{$id}' and [start_date] <='{$date}' and [end_date]>='{$date}';";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_discount_by_item_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[price_discount] WHERE item_id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_product_group_by_category_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[product_group] WHERE category_id = '{$id}'";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_brand_by_product_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[brand] WHERE product_id = '{$id}'";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_item_by_brand_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[item] WHERE brand_id = '{$id}'";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_item_by_product_group_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[item] WHERE product_id = '{$id}' order by brand_id, title_en";
    $params = array();
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $result_set = sqlsrv_query($connection, $query, $params, $options);
    confirm_query($result_set);

    return $result_set;
}

function find_all_notification_by_mobile($mobile)
{
    global $connection;

    $query = "SELECT * FROM [dbo].[notification] ";
    $query .= "where rtrim(mobile_number) = '{$mobile}';";
    $result_set = sqlsrv_query($connection, $query);

    confirm_query($result_set);

    if ($result_set === false) {
        return null;
    } else {
        return $result_set;
    }


}

function find_all_notification_by_mobile_status($mobile)
{
    global $connection;

    $query = "SELECT * FROM [dbo].[notification] ";
    $query .= "where mobile_number = '{$mobile}' and status = 0;";
    $params = array();
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $result_set = sqlsrv_query($connection, $query, $params, $options);

    confirm_query($result_set);

    if ($result_set === false) {
        return null;
    } else {
        return $result_set;
    }


}

function find_all_product_group_by_item($item)
{
    global $connection;

    $query = "SELECT product_id ";
    $query .= "FROM [dbo].[item] where title_en like '%{$item}%' group by product_id order by product_id;";
    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_item_by_product_group_id_search($id, $key)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[item] WHERE title_en like '%{$key}%' and  product_id = '{$id}' order by title_en";
    $params = array();
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $result_set = sqlsrv_query($connection, $query, $params, $options);
    confirm_query($result_set);

    return $result_set;
}

function check_user($email)
{
    global $connection;

    $email = sqlsrv_escape(trim($email));

    $query = "SELECT * ";
    $query .= "FROM [dbo].[user] ";
    $query .= "WHERE LOWER([email]) = LOWER('{$email}');";
    $user_set = sqlsrv_query($connection, $query);
    confirm_query($user_set);

    if ($row = sqlsrv_fetch_array($user_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return false;
    }

}

function check_account($mobile)
{
    global $connection;

    $mobile = sqlsrv_escape(trim($mobile));

    $query = "SELECT * ";
    $query .= "FROM [dbo].[customer] ";
    $query .= "WHERE LOWER([mobile_number]) = LOWER('{$mobile}');";
    $user_set = sqlsrv_query($connection, $query);
    confirm_query($user_set);

    if ($row = sqlsrv_fetch_array($user_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return false;
    }

}

function check_inventory_balance($item, $location, $quantity)
{
    global $connection;

    $item = sqlsrv_escape(trim($item));
    $location = sqlsrv_escape(trim($location));
    $quantity = sqlsrv_escape(trim($quantity));

    $query = "SELECT * ";
    $query .= "FROM [dbo].[inventory_by_location] ";
    $query .= "WHERE item_no ='{$item}' and rtrim(location) = rtrim('{$location}') and convert(decimal,quantity) >= convert(decimal,{$quantity});";
    $params = array();
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $result_set = sqlsrv_query($connection, $query, $params, $options);

    confirm_query($result_set);

    if ($result_set === false) {
        return null;
    } else {
//        $_SESSION["art_error"] = $query;
        return $result_set;
    }

}

function check_customer_by_mobile_and_otp($mobile, $otp)
{
    global $connection;

    $sql = "select * from [DailyMart].[dbo].[customer] WHERE mobile_number = '{$mobile}' and message = '{$otp}';";
    $stmt = sqlsrv_query($connection, $sql);
    confirm_query($stmt);

    if (sqlsrv_has_rows($stmt)) {
        if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function find_all_cart_by_customer($id)
{
    global $connection;

    $query = "SELECT * FROM [dbo].[cart] ";
    $query .= "where customer_id = '{$id}';";
    $params = array();
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $result_set = sqlsrv_query($connection, $query, $params, $options);

    confirm_query($result_set);

    if ($result_set === false) {
        return null;
    } else {
        return $result_set;
    }


}

function find_all_order_by_customer($id)
{
    global $connection;

    $query = "SELECT * FROM [dbo].[order] ";
    $query .= "where customer_id = '{$id}';";
    $params = array();
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $result_set = sqlsrv_query($connection, $query, $params, $options);

    confirm_query($result_set);

    if ($result_set === false) {
        return null;
    } else {
        return $result_set;
    }
}

function find_all_order_by_customer_date($id, $year, $month, $day, $hour, $minute)
{
    global $connection;

    $query = "SELECT * FROM [dbo].[order] ";
    $query .= "where customer_id = '{$id}' and datepart(year, [date_time]) = '{$year}' and datepart(month, [date_time]) = '{$month}'
              and datepart(day, [date_time]) = '{$day}' and datepart(hour, [date_time]) = '{$hour}' and datepart(minute, [date_time]) = '{$minute}' ;";
    $params = array();
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $result_set = sqlsrv_query($connection, $query, $params, $options);

    confirm_query($result_set);

    if ($result_set === false) {
        return null;
    } else {
        return $result_set;
    }
}

function find_group_order_by_customer_date($id)
{
    global $connection;

    $query = "SELECT DATEPART(year, [date_time]) as year, DATEPART(month, [date_time]) as month, DATEPART(day, [date_time]) as day, DATEPART(hour,
    [date_time]) as hour, DATEPART(minute, [date_time]) as minute,COUNT(*) AS Totals ";
    $query .= "FROM [dbo].[order] where customer_id = '{$id}' and DATEPART(year, [date_time]) != '' ";
    $query .= "GROUP BY DATEPART(year, [date_time]), DATEPART(month, [date_time]) , DATEPART(day, [date_time]) , DATEPART(hour,
              [date_time]) , DATEPART(minute, [date_time]) ";
    $query .= "order by DATEPART(year, [date_time]) desc, DATEPART(month, [date_time]) desc, DATEPART(day, [date_time]) desc,
               DATEPART(hour, [date_time]) desc, DATEPART(minute, [date_time]) desc;";
    $params = array();
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $result_set = sqlsrv_query($connection, $query, $params, $options);

    confirm_query($result_set);

    if ($result_set === false) {
        return null;
    } else {
        return $result_set;
    }


}

function find_order_by_order_id($id)
{
    global $connection;

    $query = "SELECT DATEPART(year, [date_time]) as year, DATEPART(month, [date_time]) as month, DATEPART(day, [date_time]) as day, COUNT(*) AS total,
  SUM(CONVERT(DECIMAL(18,2),replace(total_price, ',', ''))) as total_price, order_id,location ,delivery_method ";
    $query .= "FROM [dbo].[order] where customer_id = '{$id}' and DATEPART(year, [date_time]) != '' ";
    $query .= "GROUP BY DATEPART(year, [date_time]), DATEPART(month, [date_time]) , DATEPART(day, [date_time]), order_id,location,delivery_method ";
    $query .= "order by order_id desc, DATEPART(year, [date_time]) desc, DATEPART(month, [date_time]) desc, DATEPART(day, [date_time]) desc;";
    $params = array();

    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $result_set = sqlsrv_query($connection, $query, $params, $options);

    confirm_query($result_set);

    if ($result_set === false) {
        return null;
    } else {
        return $result_set;
    }


}

function find_my_group_order_by_order_id($id)
{
    global $connection;

    $query = "SELECT DATEPART(year, [date_time]) as year, DATEPART(month, [date_time]) as month, DATEPART(day, [date_time]) as day, COUNT(*) AS total,
  SUM(CONVERT(DECIMAL(18,2),replace(total_price, ',', ''))) as total_price, order_id, name,mobile_no,delivery_method,payment_method,land_mark,time_range,
  delivery_date,tin_number,location ";
    $query .= "FROM [dbo].[order] where order_id = '{$id}' and DATEPART(year, [date_time]) != '' ";
    $query .= "GROUP BY DATEPART(year, [date_time]), DATEPART(month, [date_time]) , DATEPART(day, [date_time]), order_id , name,mobile_no,delivery_method,
    payment_method,land_mark,time_range, delivery_date,tin_number,location ";
    $query .= "order by order_id desc, DATEPART(year, [date_time]) desc, DATEPART(month, [date_time]) desc, DATEPART(day, [date_time]) desc;";
    $user_set = sqlsrv_query($connection, $query);
    confirm_query($user_set);

    if ($row = sqlsrv_fetch_array($user_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return false;
    }

}

function find_my_order_by_order_id($id)
{
    global $connection;

    $query = "SELECT * FROM [dbo].[order] ";
    $query .= "where order_id = '{$id}';";
    $params = array();
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $result_set = sqlsrv_query($connection, $query, $params, $options);

    confirm_query($result_set);

    if ($result_set === false) {
        return null;
    } else {
        return $result_set;
    }
}

//create
function create_user($fname, $lname, $name, $email, $pass, $role)
{
    global $connection;

    $fname = sqlsrv_escape($fname);
    $lname = sqlsrv_escape($lname);
    $name = sqlsrv_escape($name);
    $email = sqlsrv_escape($email);
    $pass = sqlsrv_escape($pass);
    $role = sqlsrv_escape($role);

    $query = "INSERT INTO [dbo].[user]([first_name] ,[last_name] ,[user_name] ,[email] ,[password] ,[role])";
    $query .= " VALUES('{$fname}','{$lname}',N'{$name}','{$email}' ,'{$pass}','{$role}');";

    $user_set = sqlsrv_query($connection, $query);
    confirm_query($user_set);

    if ($user_set) {
        // Success
        $_SESSION["art_message"] = "User Created.";
        redirect_to('users.php');
    } else {
        // Failure
        $_SESSION["art_error"] = "User creation failed.";
    }
}

function create_customer($fname, $mname, $gender, $mobile, $message, $name, $email, $pass, $role)
{
    global $connection;

    $fname = sqlsrv_escape($fname);
    $mname = sqlsrv_escape($mname);
    $gender = sqlsrv_escape($gender);
    $mobile = sqlsrv_escape($mobile);
    $message = sqlsrv_escape($message);
    $name = sqlsrv_escape($name);
    $email = sqlsrv_escape($email);
    // $date_of_birth = sqlsrv_escape($date_of_birth);
    // $country = sqlsrv_escape($country);
    // $city = sqlsrv_escape($city);
    $pass = sqlsrv_escape($pass);
    $role = sqlsrv_escape($role);

    $query = "INSERT INTO [dbo].[customer]([first_name] ,[middle_name] ,";
    $query .= "[mobile_number] ,[message] ,[user_name] ,[email] ,[gender] ,[password] ,[role])";
    $query .= " VALUES('{$fname}','{$mname}','{$mobile}',{$message},N'{$name}','{$email}',";
    $query .= "'{$gender}','{$pass}','customer');";

    $user_set = sqlsrv_query($connection, $query);
    confirm_query($user_set);

    if ($user_set) {
        // Success

        return true;
    } else {
        // Failure
        return false;
    }

}

function create_category($cat, $logo, $user)
{
    global $connection;

    $cats = find_view_Category_by_id(sqlsrv_escape($cat));
    $cat = $cats["code"];
    $title_en = $cats["catagory_description"];
    $title_am = $cats["amharic_name"];
    $logo = sqlsrv_escape($logo);
    $user = sqlsrv_escape($user);
    $year = date("Y");
    $month = date("m");
    $day = date("d");

    $date = $year . "-" . $month . "-" . $day;

    $query = "INSERT INTO [DailyMart].[dbo].[category] ([category_id] ,[title_en] ,[title_am] ,[image]  ,[created_by] ,[created_at]) ";
    $query .= "VALUES({$cat},N'{$title_en}',N'{$title_am}',N'{$logo}',{$user},N'{$date}');";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set) {
        // Success
        $_SESSION["art_message"] = "Category 1 Created.";
        redirect_to("categories.php");
    } else {
        // Failure
        $_SESSION["art_error"] = "Category 1 creation failed.";
    }
}

function create_product_group($pro, $logo, $user)
{
    global $connection;

    $pros = find_view_product_group_by_id(sqlsrv_escape($pro));
    $cat = find_category_by_cat_id($pros["item_catagory_code"])["id"];
    $pro = $pros["code"];
    $title_en = $pros["group_description"];
    $title_am = $pros["amharic_name"];
    $logo = sqlsrv_escape($logo);
    $user = sqlsrv_escape($user);
    $year = date("Y");
    $month = date("m");
    $day = date("d");


    $date = $year . "-" . $month . "-" . $day;

    $query = "INSERT INTO [dbo].[product_group] ([product_Id] ,[category_id] ,[title_en] ,[title_am] ,[image] ,[created_by] ,[created_at]) ";
    $query .= "VALUES({$pro},{$cat},N'{$title_en}',N'{$title_am}',N'{$logo}',{$user},N'{$date}');";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set) {
        // Success
        $_SESSION["art_message"] = "Category 2 Created.";
        redirect_to("productGroup.php");
    } else {
        // Failure
        $_SESSION["art_error"] = "Category 2 creation failed.";
    }
}

function create_brand($brand, $logo, $user)
{
    global $connection;

    $brands = find_view_brand_by_id(sqlsrv_escape($brand));
    $pro = find_product_group_by_pro_id($brands["product_group_code"])["id"];
    $brand = $brands["code"];
    $title_en = $brands["brand_description"];
    $title_am = $brands["amharic_name"];
    $logo = sqlsrv_escape($logo);
    $user = sqlsrv_escape($user);
    $year = date("Y");
    $month = date("m");
    $day = date("d");

    $date = $year . "-" . $month . "-" . $day;

    $query = "INSERT INTO [dbo].[brand] ([brand_id] ,[product_id] ,[title_en] ,[title_am] ,[image] ,[created_by] ,[created_at]) ";
    $query .= "VALUES({$brand},{$pro},N'{$title_en}',N'{$title_am}',N'{$logo}',{$user},N'{$date}');";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set) {
        // Success
        $_SESSION["art_message"] = "Category 3 Created.";
        redirect_to("brand.php");
    } else {
        // Failure
        $_SESSION["art_error"] = "Category 3 creation failed.";
    }
}

function create_item($item, $specen, $specam, $logo, $user)
{
    global $connection;

    $item = find_view_item_by_id(sqlsrv_escape($item));
    $items = $item["item_code"];
    $cat = find_category_by_cat_id($item["item_catagory_code"])["id"];
    $pro = find_product_group_by_pro_id($item["product_group_code"])["id"];
    $brand = find_brand_by_brand_id($item["brand_code"])["id"];
    $title_en = $item["item_description_english"];
    $title_am = $item["item_description_amharic"];
    $specen = sqlsrv_escape($specen);
    $specam = sqlsrv_escape($specam);
    $logo = sqlsrv_escape($logo);
    $user = sqlsrv_escape($user);
    $year = date("Y");
    $month = date("m");
    $day = date("d");

    $date = $year . "-" . $month . "-" . $day;

    $query = "INSERT INTO [dbo].[item] ([item_id] ,[category_id] ,[product_id] ,[brand_id] ,[title_en] ,[title_am] ,[image] ,[specifications_en] ,[specifications_am] ,[created_by],[created_at]) ";
    $query .= "VALUES({$items},{$cat},{$pro},{$brand},N'{$title_en}',N'{$title_am}',N'{$logo}',N'{$specen}',N'{$specam}',{$user},N'{$date}');";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set) {
        // Success
        $_SESSION["art_message"] = "Item Created.";
        redirect_to("item.php");
    } else {
        // Failure
        $_SESSION["art_error"] = "Item creation failed.";
    }
}

function create_slider($created_for, $image, $user)
{
    global $connection;

    $created_for = sqlsrv_escape($created_for);
    $image = sqlsrv_escape($image);
    $user = sqlsrv_escape($user);
    $year = date("Y");
    $month = date("m");
    $day = date("d");

    $date = $year . "-" . $month . "-" . $day;

    $query = "INSERT INTO [dbo].[slider] ([created_for] ,[image] ,[created_by] ,[created_at]) ";
    $query .= "VALUES('{$created_for}','{$image}',{$user},'{$date}');";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set) {
        // Success
        $_SESSION["art_message"] = "Slider Created.";
        redirect_to("slider.php");
    } else {
        // Failure
        $_SESSION["art_error"] = "Slider creation failed.";
    }
}

function create_top_item($id)
{
    global $connection;

    $id = sqlsrv_escape($id);


    $query = "INSERT INTO [dbo].[top_item] ([item_id]) ";
    $query .= "VALUES('{$id}');";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set) {
        // Success
        $_SESSION["art_message"] = "Top Product Created.";
        redirect_to("topItem.php");
    } else {
        // Failure
        $_SESSION["art_error"] = "Top Product creation failed.";
    }
}

function create_order($customer_id, $name, $mobile_no, $item, $item_description, $uom, $qty, $unit_price, $total_price,
                      $delivery_method, $payment_method, $bank_name, $dailymart_bank_acc_no, $customer_acc_no, $bank_transaction_id,
                      $payer_name, $status, $delivery, $location, $delivery_date, $time_range, $landmark, $tin_number, $bill_to_name, $order_id)
{

    global $connection;

    $query = "INSERT INTO [dbo].[order] ([customer_id] ,[name] ,[mobile_no] ,[item]  ,[item_description] ,[uom],
	[qty],[unit_price],[total_price],[delivery_method],[payment_method],[bank_name],[dailymart_bank_acc_no],[customer_acc_no],[bank_transaction_id],
	[payer_name],[status],[location],[land_mark] ,[delivery_date] ,[time_range] ,[tin_number] ,[bill_to_name], [order_id]) ";
    $query .= "VALUES(N'{$customer_id}',N'{$name}',N'{$mobile_no}',N'{$item}',N'{$item_description}',N'{$uom}',N'{$qty}',N'{$unit_price}'
	,N'{$total_price}',N'{$delivery_method}',N'{$payment_method}',N'{$bank_name}',N'{$dailymart_bank_acc_no}',N'{$customer_acc_no}',N'{$bank_transaction_id}'
	,N'{$payer_name}',N'{$status}',N'{$location}',N'{$landmark}',N'{$delivery_date}',N'{$time_range}',N'{$tin_number}',N'{$bill_to_name}', N'{$order_id}')";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set) {
        // Success
//        $_SESSION["art_message"] = "Order Created.";
        return true;
    } else {
        // Failure
//        $_SESSION["art_error"] = "Order failed." . $query;
        return false;
    }

}

function create_cart($customer_id, $name, $mobile_no, $item, $item_description, $uom, $qty, $unit_price, $total_price)
{

    global $connection;

    $query = "INSERT INTO [dbo].[cart] ([customer_id] ,[name] ,[mobile_no] ,[item]  ,[item_description] ,[uom],
	[qty],[unit_price],[total_price]) ";
    $query .= "VALUES(N'{$customer_id}',N'{$name}',N'{$mobile_no}',N'{$item}',N'{$item_description}',N'{$uom}',N'{$qty}',N'{$unit_price}'
	,N'{$total_price}')";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    if ($result_set) {
        // Success
//        $_SESSION["art_message"] = "Added to cart successfully! " . $query;
        return true;
    } else {
        // Failure
//        $_SESSION["art_error"] = "Add to cart failed. " . $query;
        return false;
    }

}

function create_notification($title, $description, $date_time)
{

    global $connection;

    $query = "INSERT INTO [dbo].[notification] ([title] ,[description] ,[date_time] ) ";
    $query .= "VALUES(N'{$title}',N'{$description}',N'{$date_time}')";

    $result_set = sqlsrv_query($connection, $query);
    //confirm_query($result_set);

    if ($result_set) {
        // Success
        $_SESSION["art_message"] = "Notification Created.";
        return true;
    } else {
        // Failure
        $_SESSION["art_error"] = "Notification creation failed.";
        return false;
    }

}

//password hash
function password_encrypt($password)
{
    $hash_format = "2y$10$";
    $salt_length = 22;
    $salt = generate_salt($salt_length);
    $format_and_salt = $hash_format . $salt;
    $hash = crypt($password, $format_and_salt);

    return $hash;

}

function generate_salt($length)
{
    $unique_random_string = md5(uniqid(mt_rand(), true));

    // Valid characters for a salt are [a-zA-Z0-9./]
    $base64_string = base64_encode($unique_random_string);

    // But not '+' which is valid in base64 encoding
    $modified_base64_string = str_replace('+', '.', $base64_string);

    // Truncate string to the correct length
    $salt = substr($modified_base64_string, 0, $length);

    return $salt;
}

function password_check($password, $existing_hash)
{
//     existing hash contains format and salt at start
    $hash = "0x" . hash('sha512', $password);

    if (trim($password) === trim($existing_hash)) {
        return true;
    } else {
        $_SESSION['art_error'] = $existing_hash . "            " . $hash;
        return false;
    }

}


//Login customer
function find_customer_by_mobile_and_pass($mobile, $password)
{
    global $connection;

    $sql = "select * from [DailyMart].[dbo].[customer] WHERE status = 1 and mobile_number = '{$mobile}' and password = '{$password}';";
    $stmt = sqlsrv_query($connection, $sql);
    confirm_query($stmt);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_has_rows($stmt)) {
        if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            return $row;
        } else {
            return null;
        }
    } else {
        return null;
    }
}

function attempt_login_customer($mobile, $password)
{
    $admin = find_customer_by_mobile_and_pass($mobile, $password);

    if (isset($admin)) {

        //password matches
        return $admin;

    } else {

        //admin not found
        return false;
    }
}

function customer_logged_in()
{
    return isset($_SESSION['customer_id']);
}

function confirm_customer_logged_in()
{
    if (!logged_in()) {
        $_SESSION["customer_id"] = null;
        $_SESSION["username"] = null;
        $_SESSION["role"] = null;
        redirect_to("login.php");
    }
}


//login admin
function find_admin_by_username_and_pass($username, $password)
{
    global $connection;

    $sql = "select * from [DailyMart].[dbo].[user] WHERE email = '{$username}' and password = '{$password}';";
    $stmt = sqlsrv_query($connection, $sql);
    confirm_query($stmt);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_has_rows($stmt)) {
        if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            return $row;
        } else {
            return null;
        }
    } else {
        return null;
    }
}

function attempt_login($username, $password)
{
    $admin = find_admin_by_username_and_pass($username, $password);

    if (isset($admin)) {

        //password matches
        return $admin;

    } else {

        //admin not found
        return false;
    }
}

function logged_in()
{
    return isset($_SESSION['admin_id']);
}

function confirm_logged_in()
{
    if (!logged_in()) {
        $_SESSION["admin_id"] = null;
        $_SESSION["username"] = null;
        $_SESSION["role"] = null;
        redirect_to("../account/login.php");
    }
}

function confirm_user_logged_in()
{
    if (!logged_in() || strtolower($_SESSION['role']) != 'user') {
        $_SESSION["admin_id"] = null;
        $_SESSION["username"] = null;
        $_SESSION["role"] = null;
        $_SESSION['art_error'] = 'Please try again!!';
        redirect_to("../account/login.php");
    }
}

function confirm_company_logged_in()
{
    if (!logged_in() || strtolower($_SESSION['role']) != 'company') {
        $_SESSION["admin_id"] = null;
        $_SESSION["username"] = null;
        $_SESSION["role"] = null;
        redirect_to("../account/login.php");
        $_SESSION['art_error'] = 'Please try again!!';
    }
}

function confirm_sales_logged_in()
{
    if (!logged_in() || strtolower($_SESSION['role']) != 'sales') {
        $_SESSION["admin_id"] = null;
        $_SESSION["username"] = null;
        $_SESSION["role"] = null;
        redirect_to("../account/login.php");
        $_SESSION['art_error'] = 'Please try again!!';
    }
}

function upload_file($name)
{
    $image_url = null;
    $imgFile = $_FILES[$name]['name'];
    $tmp_dir = $_FILES[$name]['tmp_name'];
    $imgSize = $_FILES[$name]['size'];

    if (empty($imgFile)) {

        $_SESSION["art_error"] = "Please Select File.";
    } else {
        $upload_dir = 'user_images/'; // upload directory
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf'); // valid extensions

        // rename uploading image
        $image_url = rand(1000, 1000000) . $imgFile;

        // allow valid image file formats
        if (in_array($imgExt, $valid_extensions)) {
            // Check file size '5MB'
            if ($imgSize < 100000000) {
                move_uploaded_file($tmp_dir, "admin/" . $upload_dir . $image_url);
                $image_url = $upload_dir . $image_url;
            } else {
                $_SESSION["art_error"] = "Sorry, your file is too large.";
            }
        } else {
            $_SESSION["art_error"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }
    return $image_url;
}

function upload_image($name)
{
    $image_url = null;
    $imgFile = $_FILES[$name]['name'];
    $tmp_dir = $_FILES[$name]['tmp_name'];
    $imgSize = $_FILES[$name]['size'];

    if (empty($imgFile)) {

        //$_SESSION["art_error"] = "Please Select Image File.";
    } else {
        $upload_dir = 'user_images/'; // upload directory
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf'); // valid extensions

        // rename uploading image
        $image_url = rand(1000, 1000000) . $imgFile;

        // allow valid image file formats
        if (in_array($imgExt, $valid_extensions)) {
            // Check file size '5MB'
            if ($imgSize < 100000000) {
                move_uploaded_file($tmp_dir, $upload_dir . $image_url);
                $image_url = $upload_dir . $image_url;
            } else {
                $_SESSION["art_error"] = "Sorry, your file is too large.";
            }
        } else {
            $_SESSION["art_error"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }
    return $image_url;
}

function upload_image_with_title($title, $name)
{
    $image_url = null;
    $imgFile = $_FILES[$name]['name'];
    $tmp_dir = $_FILES[$name]['tmp_name'];
    $imgSize = $_FILES[$name]['size'];

    if (empty($imgFile)) {

        //$_SESSION["art_error"] = "Please Select Image File.";
    } else {
        $upload_dir = 'user_images/'; // upload directory
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf'); // valid extensions

        // rename uploading image
        $image_url = $title . "." . $imgExt;

        // allow valid image file formats
        if (in_array($imgExt, $valid_extensions)) {
            // Check file size '5MB'
            if ($imgSize < 100000000) {
                unlink($upload_dir . $image_url); //remove the file

                move_uploaded_file($tmp_dir, $upload_dir . $image_url);
                $image_url = $upload_dir . $image_url;
                //$_SESSION["art_error"] = "Please Select Image File.";
            } else {
                $_SESSION["art_error"] = "Sorry, your file is too large.";
            }
        } else {
            $_SESSION["art_error"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }
    return $image_url;
}

function image_gallery_from_folder($folder_path)
{
    $num_files = glob($folder_path . "*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE);

    $folder = opendir($folder_path);

    $output = "";
    if ($num_files > 0) {
        while (false !== ($file = readdir($folder))) {
            $file_path = $folder_path . $file;
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif' || $extension == 'bmp') {

                $output = "<a href= \" ";
                $output .= $file_path;
                $output .= "\"> <img src = \"";
                $output .= $file_path;
                $output .= "\"";
                $output .= "height = \"250\" width = \"250\" /></a >";

            }
        }
    } else {
        $output = null;
    }
    closedir($folder);

    return $output;
}

function send_mail($message_body)
{
    //$mailhost, $musername, $mpassword, $mport,
    $mailhost = "localhost";
    $musername = 'mel@local';
    $mpassword = '12345678';
    $mport = 25;
    $site_root = 'http://localhost/mailer.php';
    $mpassword = trim($mpassword);
    $musername = trim($musername);
    try {
        require_once("PHPMailer_5.2.4/class.phpmailer.php");

        $mail = new PHPMailer();
        $mail->IsSMTP();
        //$mail->SMTPDebug = 1; // for debug purpose
        $mail->SMTPAuth = true;
        //$mail->SMTPSecure = 'tls';
        $mail->Host = $mailhost;
        $mail->Port = $mport; // or 587
        $mail->IsHTML(true);
        $mail->Username = $musername;
        $mail->Password = $mpassword;
        $mail->SetFrom($musername);
        $mail->Subject = "Contact Form Shemu website";
        $mail->Body = $message_body;
        $mail->AddAddress('postmaster@localhost');

    } catch (Exception $e) {
        return false;
        //echo "We tried sending you a confirmation email. But we were unable to do so.";
    }
    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        return false;
    } else {
        return true;
        //echo "We have sent a reservation email to you.  <a href='index.php'>Return Back</a>";
        //header('Location: index.php');
        //exit();
    }
    return true;
}

function email_to_admin($user_name, $user_email, $message)
{
    global $connection;

    $safe_user_name = mysqli_real_escape_string($connection, $user_name);
    $safe_user_email = mysqli_real_escape_string($connection, $user_email);
    $safe_message = mysqli_real_escape_string($connection, $message);

    $qurey = "INSERT INTO `contact`(`username`, `emial`, `message`)";
    $qurey .= " VALUES ('{$safe_user_name}','{$safe_user_email}','{$safe_message}')";

    $contact_set = mysqli_query($connection, $qurey);
    confirm_query($contact_set);
    if ($contact_set) {
        $_SESSION["art_message"] = "Successfully Send Message.";
    } else {
        $_SESSION["art_error"] = "Please try again.";
    }

}

function validatePhone($string)
{
    $numbersOnly = ereg_replace("[^0-9]", "", $string);
    $numberOfDigits = strlen($numbersOnly);
    if ($numberOfDigits == 10 || $numberOfDigits = 12) {
        echo $numbersOnly;
    } else {
        echo 'Invalid Phone Number';
    }
}

/**
 * Storing new user
 * returns user details
 */
function storeUser($name, $email, $mobile)
{
    global $connection;

    $query = "INSERT INTO users(username,email,mobile) VALUES('{$name}','{$email}' ,'{$mobile}' )";
    $user_set = mysqli_query($connection, $query);
    confirm_query($user_set);

    if ($user_set) {

        $u_query = "SELECT * FROM users WHERE email = '{$email}'";
        $user_stmt = mysqli_query($connection, $u_query);

        $user = mysqli_fetch_assoc($user_stmt);

        return $user;

    } else {
        return false;
    }

}


//fro abdi

function find_category_ids()
{

    global $connection;
    $category_ids = array();

    $query = "SELECT * ";
    $query .= "FROM [dbo].[category] order by title_en";
    $result_set = sqlsrv_query($connection, $query);
    // confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    //if($query) {
    while ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        array_push($category_ids, $row['category_id']);

    }
//}
    return $category_ids;
}

function find_category_names()
{

    global $connection;
    $category_names = array();

    $query = "SELECT * ";
    $query .= "FROM [dbo].[category] order by title_en";
    $result_set = sqlsrv_query($connection, $query);
    // confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    //if($query) {
    while ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        array_push($category_names, $row['title_en']);

    }
//}
    return $category_names;
}

function find_product_ids()
{

    global $connection;
    $product_ids = array();

    $query = "SELECT * ";
    $query .= "FROM [dbo].[product_group] order by title_en";
    $result_set = sqlsrv_query($connection, $query);
    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    //if($query) {
    while ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        array_push($product_ids, $row['product_Id']);

    }
//}
    return $product_ids;
}

function find_product_names()
{

    global $connection;
    $product_names = array();

    $query = "SELECT * ";
    $query .= "FROM [dbo].[product_group] order by title_en";
    $result_set = sqlsrv_query($connection, $query);
    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    //if($query) {
    while ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        array_push($product_names, $row['title_en']);

    }
//}
    return $product_names;

}

function find_brand_ids()
{

    global $connection;
    $brand_ids = array();

    $query = "SELECT * ";
    $query .= "FROM [dbo].[brand] order by title_en";
    $result_set = sqlsrv_query($connection, $query);
    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    //if($query) {
    while ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        array_push($brand_ids, $row['brand_id']);

    }
//}
    return $brand_ids;
}

function find_brand_names()
{

    global $connection;
    $brand_names = array();

    $query = "SELECT * ";
    $query .= "FROM [dbo].[brand] order by title_en";
    $result_set = sqlsrv_query($connection, $query);
    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    //if($query) {
    while ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        array_push($brand_names, $row['title_en']);

    }
//}
    return $brand_names;

}


function find_items($header_ids)
{
    global $connection;

//$find_header_ids = find_header_ids();
    $find_header_ids = $header_ids;
    $size_find_header_ids = count($find_header_ids);
    $items_all = array();
    for ($v = 0; $v < $size_find_header_ids; $v++) {
        $items = array();
        $query = "SELECT * ";
        $query .= "FROM [dbo].[item] where category_id='" . $find_header_ids[$v][0] . "' and product_id='" . $find_header_ids[$v][1] . "' and brand_id='" . $find_header_ids[$v][2] . "'";
        $result_set = sqlsrv_query($connection, $query);

        if ($result_set === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {

            array_push($items, $row['title_en']);


        }
        array_push($items_all, $items);

    }

    return $items_all;

}

//echo find_items();
function in_not_multi_array($element, $array)
{
    $size_array = count($array);
    if ($size_array > 0) {
        for ($b = 0; $b < $size_array; $b++) {
            if ($array[$b][0] == $element[0] && $array[$b][1] == $element[1] && $array[$b][2] == $element[2]) {
                return false;
            } else {
                return true;
            }
        }
    } else {
        return true;
    }
}

function find_headers()
{
    global $connection;
    $category_names = find_category_names();
    $product_names = find_product_names();
    $brand_names = find_brand_names();
    $category_ids = find_category_ids();
    $product_ids = find_product_ids();
    $brand_ids = find_brand_ids();
    $size_category_names = count($category_names);
    $size_product_names = count($product_names);
    $size_brand_names = count($brand_names);
    $header_names = array();
    $header_ids = array();
    $header_names_ids = array();
    for ($z = 0; $z < $size_category_names; $z++) {
        for ($j = 0; $j < $size_product_names; $j++) {
            for ($x = 0; $x < $size_brand_names; $x++) {
                $headers_single_names = array();
                $headers_single_ids = array();
                $query = "SELECT * ";
                $query .= "FROM [dbo].[item] where category_id='" . $category_ids[$z] . "' and product_id='" . $product_ids[$j] . "' and brand_id='" . $brand_ids[$x] . "'";
                $result_set = sqlsrv_query($connection, $query);
                //$row_count = sqlsrv_num_rows($result_set);
                $row_count = 0;
                //echo $category_ids[$z]. " ". $product_ids[$j]. " ". $brand_ids[$x] . " ".$row_count. "<br>";
                if ($result_set === false) {
                    die(print_r(sqlsrv_errors(), true));
                }
                //if($query) {
                //if($row_count > 0){
                //echo "1";
                while ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {


                    array_push($headers_single_names, $category_names[$z]);
                    array_push($headers_single_names, $product_names[$j]);
                    array_push($headers_single_names, $brand_names[$x]);
                    if (in_not_multi_array($headers_single_names, $header_names)) {
                        array_push($header_names, $headers_single_names);
                    }

                    array_push($headers_single_ids, $category_ids[$z]);
                    array_push($headers_single_ids, $product_ids[$j]);
                    array_push($headers_single_ids, $brand_ids[$x]);
                    if (in_not_multi_array($headers_single_ids, $header_ids)) {
                        array_push($header_ids, $headers_single_ids);
                    }


                }


            }

        }
    }

    array_push($header_names_ids, $header_ids);
    array_push($header_names_ids, $header_names);
    return $header_names_ids;
}

function find_header_ids()
{
    global $connection;

    $category_ids = find_category_ids();
    $product_ids = find_product_ids();
    $brand_ids = find_brand_ids();
    $size_category_ids = count($category_ids);
    $size_product_ids = count($product_ids);
    $size_brand_ids = count($brand_ids);
    $headers = array();
    for ($z = 0; $z < $size_category_ids; $z++) {
        for ($j = 0; $j < $size_product_ids; $j++) {
            for ($x = 0; $x < $size_brand_ids; $x++) {
                $headers_single = array();
                $query = "SELECT * ";
                $query .= "FROM [dbo].[item] where category_id='" . $category_ids[$z] . "' and product_id='" . $product_ids[$j] . "' and brand_id='" . $brand_ids[$x] . "'";
                $result_set = sqlsrv_query($connection, $query);

                $row_count = 0;

                if ($result_set === false) {
                    die(print_r(sqlsrv_errors(), true));
                }

                while ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {


                    array_push($headers_single, $category_ids[$z]);
                    array_push($headers_single, $product_ids[$j]);
                    array_push($headers_single, $brand_ids[$x]);
                    if (in_not_multi_array($headers_single, $headers)) {
                        array_push($headers, $headers_single);
                    }

                }

            }

        }
    }
    return $headers;
}

function find_all_land_mark_price()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[land_mark_price] ";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;

}

function find_land_mark_by_entry_no($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[land_mark] WHERE id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    // confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }

}

function find_land_mark_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[land_mark] WHERE code = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    // confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }

}

function find_land_mark_price_by_entry_no($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[land_mark_price] WHERE id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    // confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }
}

function find_shop_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[shop] WHERE location_code = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    // confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }

}

function find_all_Date()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[date] ";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_all_Time_range()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[time_range] ";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_all_Land_mark()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[land_mark] ";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_all_shops()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [DailyMart].[dbo].[shop] ";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;

}

function find_date_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[date] WHERE id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    // confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }

}

function find_time_range_by_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[time_range] WHERE id = '{$id}'";
    $result_set = sqlsrv_query($connection, $query);
    // confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }

}

function find_land_mark_price_by_id($date, $time_range, $land_mark_code, $shop_code)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[land_mark_price] WHERE date = '{$date}' and time_range = '{$time_range}' and land_mark_code='{$land_mark_code}' and shop_code='{$shop_code}'";
    $result_set = sqlsrv_query($connection, $query);
    // confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }


}

function create_land_mark_price($date, $time_range, $land_mark_code, $shop_code, $price)
{

    global $connection;

    $query = "INSERT INTO [dbo].[land_mark_price] ([date] ,[time_range]   ,[land_mark_code],
	[shop_code],[price]) ";

//$query .= "VALUES(N'hello',N'hello',N'hello',N'hello',N'hello',N'hello',N'hello',N'hello'
//	,N'hello')";

    $query .= "VALUES(N'{$date}',N'{$time_range}',N'{$land_mark_code}',N'{$shop_code}'
	,N'{$price}')";

    $result_set = sqlsrv_query($connection, $query);
    //confirm_query($result_set);

    if ($result_set) {
        // Success
        // $_SESSION["art_message"] = "Category 1 Created.";
        // redirect_to("categories.php");
    } else {
        // Failure
        // $_SESSION["art_error"] = "Category 1 creation failed.";
    }
    return "success";
}

function find_date_by_date($title_en)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[date] WHERE title_en = '{$title_en}'";
    $result_set = sqlsrv_query($connection, $query);
    // confirm_query($result_set);

    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($result_set, SQLSRV_FETCH_ASSOC)) {
        return $row;
    } else {
        return null;
    }

}


//beka

function find_all_order_by_order_grouping()
{
    global $connection;

    $query = "SELECT order_id, CAST(date_time AS DATE) as order_date, name, mobile_no, payment_method, delivery_method, SUM(CAST(total_price as decimal)) as 'total_price', SUM(CAST(qty as int)) as 'total_quantity', customer_id, location, status, delivery_date, time_range, land_mark ";
    $query .= "FROM [dbo].[order] where status = '0' GROUP BY name, order_id, mobile_no, payment_method, delivery_method, CAST(date_time AS DATE), customer_id, location, status, delivery_date, time_range, land_mark order by CAST(date_time AS DATE) DESC, order_id DESC";
    $result_set = sqlsrv_query($connection, $query);
    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    return $result_set;
}

function find_all_order_by_order_id($order_id, $customer_id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[order] where order_id = '$order_id' AND customer_id = '$customer_id'";
    $result_set = sqlsrv_query($connection, $query);
    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    return $result_set;
}

function find_single_order_by_order_id($order_id, $customer_id)
{
    global $connection;

    $query = "SELECT TOP 1 * ";
    $query .= "FROM [dbo].[order] where order_id = '$order_id' AND customer_id = '$customer_id'";
    $result_set = sqlsrv_query($connection, $query);
    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    return $result_set;
}

function find_max_order_id()
{
    global $connection;

    $query = "SELECT MAX(CAST(order_id as decimal(18))) as order_id FROM [dbo].[order]";
    $result_set = sqlsrv_query($connection, $query);
    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    return $result_set;
}

function find_all_faq()
{
    global $connection;

    $query = "SELECT * FROM [dbo].[faq]";
    $result_set = sqlsrv_query($connection, $query);
    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    return $result_set;
}

function find_faq_by_id($id)
{
    global $connection;

    $query = "SELECT * FROM [dbo].[faq] where id='$id'";
    $result_set = sqlsrv_query($connection, $query);
    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    return $result_set;
}

function find_all_time_range_and_price_by_shop_id($shop, $landmark, $time)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[land_mark_price] where shop_code = '$shop' AND land_mark_code = '$landmark' AND date = '$time' ";
    $result_set = sqlsrv_query($connection, $query);
    if ($result_set === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    return $result_set;
}

function find_product_group_by_brand_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[product_group] WHERE brand_id = '{$id}'";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

function find_item_by_product_id($id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM [dbo].[item] WHERE product_id = '{$id}'";

    $result_set = sqlsrv_query($connection, $query);
    confirm_query($result_set);

    return $result_set;
}

?>