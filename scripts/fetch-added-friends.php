<?php
require('config.php');

if (isset($_POST['sender']) && isset($_POST['senderImage'])) {
    $uniqueID = $_POST['sender'];
    $senderImage = $_POST['senderImage'];

    $sql3 = "SELECT *
    FROM `user_details`
    WHERE `unique_id` != $uniqueID
    ORDER BY CASE WHEN `status` = 'Online' THEN 1 ELSE 2 END";
    $fetchFriendsQuery = mysqli_query($conn, $sql3);

    while ($data = mysqli_fetch_assoc($fetchFriendsQuery)) {
        $name = $data['name'];
        $image = $data['image'];
        $status = $data['status'];
        $temp_id = $data['unique_id'];

        $sql4 = "SELECT * FROM `requests` WHERE 
                    ( (`sender_id` = $uniqueID AND `reciever_id` = $temp_id) OR 
                    (`sender_id` = $temp_id AND `reciever_id` = $uniqueID) ) AND `status` = 'friend'";
        $findUserQuery = mysqli_query($conn, $sql4);

        if ($userData = mysqli_fetch_assoc($findUserQuery)) {
            echo "<div class='flex min-h-16 py-2 items-center pl-1 l:pl-3 border-[1px] rounded-md bg-white gap-2 lg:gap-3 cursor-pointer hover:bg-gray-200' onclick=\"selectUser(" . $uniqueID . ",'" . $senderImage . "'," . $temp_id . ", '" . $name . "','" . $image . "', '" . $status . "')\">
                <div class='h-14 w-14 rounded-full'>
                    <img src='" . $image . "' alt='' class='h-full w-full object-cover rounded-full'>
                </div>
                <div class='flex flex-col'>
                    <h3 class='font-semibold'>" . $name . "</h3>";

            if ($status == 'Online') {
                echo '<h3 id="scriptStatus" class="text-green-500 text-md font-semibold">Online</h3>';
            } else {
                echo '<h3 id="scriptStatus" class="text-gray-400 text-md font-semibold">Offline</h3>';
            }

            echo '</div>
            </div>';
        }
    }
}

mysqli_close($conn);
