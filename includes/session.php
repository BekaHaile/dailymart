<?php
if (!(session_start())) {
    session_start();
}

    if(!isset($_SESSION['lang']))
        $_SESSION['lang'] = 'en';
    else if(isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])){
        if($_GET('lang') == 'en')
            $_SESSION['lang'] = 'en';
        else
            $_SESSION['lang'] = 'am';
    }


if(file_exists("languages/".$_SESSION['lang'].".php"))
    require_once "languages/".$_SESSION['lang'].".php";
?>
<?php
function art_message()
{
    if (isset($_SESSION["art_message"])) {

        $output = "<div class=\"alert alert-success\">";
        //$output .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>";
        $output .= "<strong>Success! </strong> ".$_SESSION["art_message"] ."</div>";

        // clear message after use
        $_SESSION["art_message"] = null;

        return $output;
    }
    if (isset($_SESSION["art_error"])) {
        $output = "<div class=\"alert alert-danger\">";
        //$output .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>";
        $output .= "<strong></strong> ".$_SESSION["art_error"] ."</div>";

        // clear message after use
        $_SESSION["art_error"] = null;

        return $output;
    }
    return null;
}

function errors()
{
    if (isset($_SESSION["errors"])) {
        $errors = $_SESSION["errors"];

        // clear message after use
        $_SESSION["errors"] = null;

        return $errors;
    }
}

?>