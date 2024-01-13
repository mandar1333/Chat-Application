<?php
require_once('config.php');

if (isset($_POST['sender']) && isset($_POST['reciever'])) {
    $sender = $_POST['sender'];
    $reciever = $_POST['reciever'];

    $sql = "INSERT INTO `requests` (`sender_id`,`reciever_id`,`status`) VALUES ($sender,$reciever,'request')";
    $updateStatusQuery = mysqli_query($conn, $sql);

    if ($updateStatusQuery) {
        echo "sucess";
    } else {
        echo "something went wrong.";
    }
}

mysqli_close($conn);
