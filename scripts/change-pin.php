<?php
require_once('config.php');

if (isset($_POST['id']) && isset($_POST['pin'])) {
    $uid = $_POST['id'];
    $pin = $_POST['pin'];

    $sql = "UPDATE `user_details` SET `pin` = $pin WHERE `unique_id` = $uid";
    $updatePinQuery = mysqli_query($conn, $sql);

    if ($updatePinQuery) {
        echo "sucess";
    } else {
        echo "something went wrong.";
    }
}

mysqli_close($conn);
