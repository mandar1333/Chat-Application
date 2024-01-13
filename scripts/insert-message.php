<?php
require_once('config.php');

if (isset($_POST['message']) && isset($_POST['sender']) && isset($_POST['reciever']) && isset($_POST['senderImage']) && isset($_POST['recieverImage'])) {
    $sender = $_POST['sender'];
    $reciever = $_POST['reciever'];
    $senderImage = $_POST['senderImage'];
    $recieverImage = $_POST['recieverImage'];
    $msg = $_POST['message'];

    $date = time();
    $timestamp = date('Y-m-d H:i:s', $date);

    $date = date('Y-m-d');

    $sql8 = "INSERT INTO `messages` (`sender`,`reciever`,`message`,`type`,`timestamp`,`date`) VALUES ($sender,$reciever,'$msg','text','$timestamp','$date')";

    $insertMessageQuery = mysqli_query($conn, $sql8);

    $sql = "SELECT * FROM `messages` WHERE 
    ( (`sender` = $sender AND `reciever` = $reciever) OR 
    (`sender` = $reciever AND `reciever` = $sender) ) ORDER BY `timestamp`";
    $fetchMessagesQuery = mysqli_query($conn, $sql);

    while ($data = mysqli_fetch_assoc($fetchMessagesQuery)) {
        $message = $data['message'];
        $type = $data['type'];
        $temp_sender = $data['sender'];
        $temp_reciever = $data['reciever'];
        $file_path = $data['file_path'];

        if ($temp_sender == $sender && $temp_reciever == $reciever) {
            if ($type == 'text') {
                echo '<div class="chat-message">
                <div class="flex items-end justify-end">
                    <div class="flex flex-col space-y-2 text-sm max-w-xs mx-2 order-1 items-end">
                        <div>
                            <span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-gray-700 font-semibold text-white">
                                ' . $message . '
                            </span>
                        </div>
                    </div>
                    <img src="' . $senderImage . '" class="w-6 h-6 rounded-full order-2">
                </div>
            </div>';
            } elseif ($type == 'image') {
                echo '<div class="chat-message">
                <div class="flex items-end justify-end">
                    <div class="flex flex-col space-y-2 text-sm max-w-[400px] mx-2 order-1 items-end cursor-pointer hover:opacity-80">
                        <div>
                            <img src="' . $file_path . '" class="h-32 w-32 rounded-md">
                        </div>
                    </div>
                    <img src="' . $recieverImage . '" class="w-6 h-6 rounded-full order-2">
                </div>
              </div>';
            } elseif ($type == 'video') {
            } elseif ($type == 'document') {
                $extension = substr($message, strrpos($message, '.') + 1);

                echo '<div class="chat-message">
                <div class="flex items-end justify-end">
                    <div class="flex flex-col space-y-2 text-sm max-w-[400px] mx-2 order-1 items-end">
                        <div>
                            <span class="flex items-center gap-3 px-3 py-2 rounded-lg inline-block rounded-br-none bg-amber-500 font-semibold text-black">
                                <div class="h-9 w-9 px-2 rounded-full text-md font-bold bg-slate-500 text-gray-100 flex justify-center items-center">' . strtoupper($extension) . '</div>
                                <h3 class="break-all">' . $message . '</h3>
                            </span>
                        </div>
                    </div>
                    <img src="' . $senderImage . '" class="w-6 h-6 rounded-full order-2">
                </div>
            </div>';
            }
        } elseif ($temp_sender == $reciever && $temp_reciever == $sender) {
            if ($type == 'text') {
                echo '<div class="chat-message">
                <div class="flex items-end">
                    <div class="flex flex-col space-y-2 text-sm max-w-xs mx-2 order-1 items-end">
                        <div>
                            <span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-gray-200 font-semibold text-black">
                                ' . $message . '
                            </span>
                        </div>
                    </div>
                    <img src="' . $recieverImage . '" class="w-6 h-6 rounded-full order-2">
                </div>
            </div>';
            } elseif ($type == 'image') {
                echo '<div class="chat-message">
                <div class="flex items-end">
                    <div class="flex flex-col space-y-2 text-sm max-w-[400px] mx-2 order-1 items-end cursor-pointer hover:opacity-80">
                        <div>
                            <img src="' . $file_path . '" class="h-32 w-32 rounded-md">
                        </div>
                    </div>
                    <img src="' . $recieverImage . '" class="w-6 h-6 rounded-full order-2">
                </div>
              </div>';
            } elseif ($type == 'video') {
            } elseif ($type == 'document') {
                $extension = substr($message, strrpos($message, '.') + 1);

                echo '<div class="chat-message">
                <div class="flex items-end">
                    <div class="flex flex-col space-y-2 text-sm max-w-[400px] mx-2 order-1 items-end">
                        <div>
                            <span class="flex items-center gap-3 px-3 py-2 rounded-lg inline-block rounded-br-none bg-amber-500 font-semibold text-black">
                                <div class="h-9 w-9 px-2 rounded-full text-md font-bold bg-slate-500 text-gray-100 flex justify-center items-center">' . strtoupper($extension) . '</div>
                                <h3 class="break-all">' . $message . '</h3>
                            </span>
                        </div>
                    </div>
                    <img src="' . $recieverImage . '" class="w-6 h-6 rounded-full order-2">
                </div>
            </div>';
            }
        }
    }
}

mysqli_close($conn);
