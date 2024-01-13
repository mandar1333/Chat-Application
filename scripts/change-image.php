<?php
require_once('config.php');

if (isset($_POST['id']) && isset($_FILES['image'])) {
    $uid = $_POST['id'];
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
            $sql = "UPDATE `user_details` SET `image` = 'uploads/$randomNumber.$extension' WHERE `unique_id` = $uid";
            $updateImageQuery = mysqli_query($conn, $sql);
            if ($updateImageQuery) {
                echo 'sucess';
            }
        } else {
            echo "Error uploading the file.";
        }
    } else {
        echo "Select Image in PNG, JPG, JPEG format.";
    }
}

mysqli_close($conn);
