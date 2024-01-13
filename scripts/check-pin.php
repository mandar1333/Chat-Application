<?php
require_once('config.php');

if (isset($_POST['email']) && isset($_POST['pin'])) {
    $email = $_POST['email'];
    $pin = $_POST['pin'];

    $sql = "SELECT * FROM `user_details` WHERE `email` = '$email'";
    $verifyQuery = mysqli_query($conn, $sql);

    if ($data = mysqli_fetch_assoc($verifyQuery)) {
        $user_pin = $data['pin'];
        $uniqueID = $data['unique_id'];

        if ($user_pin == $pin) {
            $sql = "UPDATE `user_details` SET `status` = 'Online' WHERE `email` = '$email'";
            $updateStatusQuery = mysqli_query($conn, $sql);

            session_start();
            $_SESSION['user'] = $uniqueID;
            echo "sucess";
        } else {
            echo "Invalid PIN";
        }
    }
}

mysqli_close($conn);
