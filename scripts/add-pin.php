<?php
require_once('config.php');

if (isset($_POST['id']) && isset($_POST['pin'])) {
    $uid = $_POST['id'];
    $pin = $_POST['pin'];

    $sql = "UPDATE `user_details` SET `pin` = $pin WHERE `unique_id` = $uid";
    $updatePinQuery = mysqli_query($conn, $sql);

    if ($updatePinQuery) {
        $sql = "UPDATE `user_details` SET `status` = 'Online' WHERE `unique_id` = $uid";
        $updateStatusQuery = mysqli_query($conn, $sql);

        session_start();
        $_SESSION['user'] = $uid;
        echo "sucess";
    } else {
        echo "something went wrong.";
    }
}

mysqli_close($conn);
