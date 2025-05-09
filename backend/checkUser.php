<?php
            //setcookie("active", "", time() - 3600, "/");

if (
    isset($_COOKIE['active']) && $_COOKIE['active'] == 'true'
) {
    echo 'true';
} else {
    echo 'false';
}

?>
