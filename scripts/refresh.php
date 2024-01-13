<?php
require('config.php');

if (isset($_POST['sender'])) {
    $uniqueID = $_POST['sender'];

    $sql = "SELECT * FROM `user_details` WHERE `unique_id` != $uniqueID";
    $fetchAllQuery = mysqli_query($conn, $sql);

    while ($data = mysqli_fetch_assoc($fetchAllQuery)) {
        $name = $data['name'];
        $image = $data['image'];
        $status = $data['status'];
        $temp_id = $data['unique_id'];

        echo '<div class="mt-1 flex min-h-16 py-2 justify-between items-center pl-1 l:pl-3 border-2 rounded-md bg-white gap-2 lg:gap-3">
                    <div class="flex items-center gap-2">
                        <div class="h-14 w-14 rounded-full ml-2">
                          <img src="' . $image . '" alt="" class="h-full w-full object-cover rounded-full">
                        </div>
                        <div class="flex flex-col ml-2">
                          <h3 class="font-semibold">' . $name . '</h3>';

        if ($status == 'Online') {
            echo '<p class="text-green-500 text-md font-semibold">Online</p>';
        } else {
            echo '<p class="text-gray-400 text-md font-semibold">Offline</p>';
        }

        echo '</div>
                    </div>';

        $sql2 = "SELECT * FROM `requests` WHERE 
                    (`sender_id` = $uniqueID AND `reciever_id` = $temp_id) OR 
                    (`sender_id` = $temp_id AND `reciever_id` = $uniqueID)";
        $checkStatusQuery = mysqli_query($conn, $sql2);

        if ($check = mysqli_fetch_assoc($checkStatusQuery)) {
            $status = $check['status'];
            $senderID = $check['sender_id'];
            $recieverID = $check['reciever_id'];

            if ($status == 'friend') {
                echo '<div class="h-8 w-20 text-white text-sm bg-teal-600 rounded-md mr-3 flex gap-1 justify-center items-center font-semibold">
                                    <button class="cursor-default">Friend</button>
                                </div>';
            } elseif ($status == 'request') {
                if ($uniqueID == $recieverID) {
                    echo '<div class="h-8 w-20 text-white text-sm bg-green-500 rounded-md mr-3 flex gap-1 justify-center items-center font-semibold hover:cursor-pointer" onclick="accept(' . $temp_id . ')">
                                    <button>Accept</button>
                                </div>';
                } else {
                    echo '<div class="h-8 w-20 text-white text-sm bg-yellow-500 rounded-md mr-3 flex gap-1 justify-center items-center font-semibold">
                                    <button class="cursor-default">Requested</button>
                                </div>';
                }
            } else if ($status == 'block') {
                echo '<div class="h-8 w-20 text-white text-sm bg-gray-300 rounded-md mr-3 flex gap-1 justify-center items-center font-semibold">
                                    <button class="cursor-default">Blocked</button>
                                </div>';
            } else {
                echo '<div class="h-8 w-20 text-white text-sm bg-blue-600 rounded-md mr-3 flex gap-1 justify-center items-center font-semibold cursor-pointer hover:bg-blue-700" onclick="addfriend(' . $temp_id . ')">
                                    <i class="fa-solid fa-user-plus"></i>
                                    <button">ADD</button>
                                </div>';
            }
        } else {
            echo '<div class="h-8 w-20 text-white text-sm bg-blue-600 rounded-md mr-3 flex gap-1 justify-center items-center font-semibold cursor-pointer hover:bg-blue-700" onclick="addfriend(' . $temp_id . ')">
                                <i class="fa-solid fa-user-plus"></i>
                                <button>ADD</button>
                            </div>';
        }

        echo '</div>';
    }
}

mysqli_close($conn);
