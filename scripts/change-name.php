<?php
require_once('config.php');

if (isset($_POST['id']) && isset($_POST['name'])) {
    $uid = $_POST['id'];
    $name = $_POST['name'];

    $words = explode(' ', $name);

    $capitalizedWords = [];
    foreach ($words as $word) {
        if (ctype_lower(substr($word, 0, 1))) {
            $word = ucfirst($word);
        } elseif (ctype_lower(str_replace(' ', '', $word))) {
            $word = ucwords($word);
        }
        $capitalizedWords[] = $word;
    }

    $name = implode(' ', $capitalizedWords);

    $sql = "UPDATE `user_details` SET `name` = '$name' WHERE `unique_id` = $uid";
    $updatePinQuery = mysqli_query($conn, $sql);

    if ($updatePinQuery) {
        echo "sucess";
    } else {
        echo "something went wrong.";
    }
}

mysqli_close($conn);
