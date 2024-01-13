<?php
require_once('config.php');

if (isset($_POST['sender']) && isset($_POST['friend'])) {
    $sender = $_POST['sender'];
    $friend = $_POST['friend'];

    $sql = "UPDATE `requests` SET `status` = 'block' WHERE 
        (`sender_id` = $sender AND `reciever_id` = $friend) OR 
        (`sender_id` = $friend AND `reciever_id` = $sender)";
    $updateStatusQuery = mysqli_query($conn, $sql);

    if ($updateStatusQuery) {
        echo 'sucess';
    } else {
        echo 'something went wrong';
    }
}

mysqli_close($conn);
