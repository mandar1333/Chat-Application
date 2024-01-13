<?php
require_once('config.php');

if (isset($_POST['email']) && isset($_POST['code'])) {
    $email = $_POST['email'];
    $code = $_POST['code'];

    $sql = "SELECT * FROM `verify` WHERE `email` = '$email' ORDER BY `id` DESC";
    $verifyQuery = mysqli_query($conn, $sql);

    if ($data = mysqli_fetch_assoc($verifyQuery)) {
        $usercode = $data['code'];

        if ($code == $usercode) {
            echo "sucess";
        } else {
            echo "Invalid Code";
        }
    }
}

mysqli_close($conn);
