<?php
require_once('config.php');

if (isset($_POST['email']) || isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `user_details` WHERE `email` = '$email'";
    $verifyQuery = mysqli_query($conn, $sql);

    if ($data = mysqli_fetch_assoc($verifyQuery)) {
        $user_email = $data['email'];
        $user_password = $data['password'];
        $uniqueId = $data['unique_id'];
        $pin = $data['pin'];

        if ($user_email == $email && $user_password == $password) {
            if ($pin == 0) {
                echo $uniqueId;
            } else {
                echo "sucess";
            }
        } else {
            echo "Invalid Password.";
        }
    } else {
        echo "Email Doesn't Exists.";
    }
}

mysqli_close($conn);
