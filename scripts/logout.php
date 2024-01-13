<?php
require_once('config.php');

session_start();

if (isset($_POST['sender'])) {
    $sender = $_POST['sender'];
    $friend = $_POST['friend'];

    $sql = "UPDATE `user_details` SET `status` = 'Offline' WHERE `unique_id` = $sender";
    $updateStatusQuery = mysqli_query($conn, $sql);

    if ($updateStatusQuery) {
        echo 'sucess';
        $_SESSION['user'] = '';
        session_destroy();
    } else {
        echo 'something went wrong';
    }
}

mysqli_close($conn);
