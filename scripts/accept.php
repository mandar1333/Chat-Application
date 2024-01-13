<?php
require_once('config.php');

if (isset($_POST['sender']) && isset($_POST['friend'])) {
    $sender = $_POST['sender'];
    $friend = $_POST['friend'];

    $sql = "UPDATE `requests` SET `status` = 'friend' WHERE 
        (`sender_id` = $sender AND `reciever_id` = $friend) OR 
        (`sender_id` = $friend AND `reciever_id` = $sender)";
    $updateStatusQuery = mysqli_query($conn, $sql);
}

mysqli_close($conn);
