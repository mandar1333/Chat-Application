<?php
require_once('config.php');

$fname = $_POST['fname'];
$username = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];

$words = explode(' ', $username);

$capitalizedWords = [];
foreach ($words as $word) {
    if (ctype_lower(substr($word, 0, 1))) {
        $word = ucfirst($word);
    } elseif (ctype_lower(str_replace(' ', '', $word))) {
        $word = ucwords($word);
    }
    $capitalizedWords[] = $word;
}

$username = implode(' ', $capitalizedWords);

if (isset($_FILES['image'])) {
    $file = $_FILES['image'];
    $uploadedFileName = $_FILES['image']['name'];
    $uploadedFileType = $_FILES['image']['type'];
    $uploadedFileTmpPath = $_FILES['image']['tmp_name'];

    $allowedImageTypes = ['image/jpeg', 'image/png', 'image/jpg'];

    if (in_array($uploadedFileType, $allowedImageTypes)) {
        $ext = explode('.', $uploadedFileName);
        $extension = $ext[1];
        $randomNumber = mt_rand(10000000, 99999999);

        $targetDirectory = "../uploads/";
        $targetFilePath = $targetDirectory . $randomNumber . '.' . $extension;

        if (move_uploaded_file($uploadedFileTmpPath, $targetFilePath)) {
            $sql = "INSERT INTO `user_details` (`unique_id`,`name`,`email`,`password`,`image`,`pin`,`status`) VALUES ($randomNumber,'$username','$email','$password','uploads/$randomNumber.$extension',0,'Offline')";
            $insertDetailsquery = mysqli_query($conn, $sql);
            if ($insertDetailsquery) {
                echo $randomNumber;
            }
        } else {
            echo "Error uploading the file.";
        }
    } else {
        echo "Select Image in PNG, JPG, JPEG format.";
    }
} else {
    echo "Please upload a profile picture";
}
mysqli_close($conn);
