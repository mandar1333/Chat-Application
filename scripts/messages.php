<?php
require_once('config.php');

if (isset($_POST['sender']) && isset($_POST['reciever']) && isset($_POST['senderImage']) && isset($_POST['recieverImage'])) {
    $sender = $_POST['sender'];
    $reciever = $_POST['reciever'];
    $senderImage = $_POST['senderImage'];
    $recieverImage = $_POST['recieverImage'];

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
                echo "<div class='chat-message'>
                <div class='flex items-end justify-end'>
                    <div class='flex flex-col space-y-2 text-sm max-w-[400px] mx-2 order-1 items-end cursor-pointer hover:opacity-80'>
                        <div>
                            <img src='" . $file_path . "' class='h-32 w-32 rounded-md' onclick=\"showFile('" . $file_path . "','" . $message . "','image')\">
                        </div>
                    </div>
                    <img src='" . $recieverImage . "' class='w-6 h-6 rounded-full order-2'>
                </div>
            </div>";
            } elseif ($type == 'video') {
                echo "<div class='chat-message'>
                <div class='flex items-end justify-end'>
                    <div class='flex flex-col space-y-2 text-sm max-w-[400px] mx-2 order-1 items-end cursor-pointer hover:opacity-80 rounded-md'>
                        <div>
                            <video id='myVideo' src='" . $file_path . "' alt='Video Preview' poster='uploads/poster.png' class='h-20 w-20 rounded-md' onclick=\"showFile('" . $file_path . "','" . $message . "','video')\"></video>
                        </div>
                    </div>
                    <img src='" . $recieverImage . "' class='w-6 h-6 rounded-full order-2'>
                </div>
              </div>";
            } elseif ($type == 'document') {
                $extension = substr($message, strrpos($message, '.') + 1);

                echo "<div class='chat-message'>
                <div class='flex items-end justify-end'>
                    <div class='flex flex-col space-y-2 text-sm max-w-[400px] mx-2 order-1 items-end cursor-pointer hover:opacity-80'>
                        <div>
                            <span class='flex items-center gap-3 px-3 py-2 rounded-lg inline-block rounded-br-none bg-gradient-to-r from-indigo-800 to-blue-500 font-semibold text-gray-100' onclick=\"showFile('" . $file_path . "','" . $message . "','document')\">
                                <div class='h-9 w-9 px-2 rounded-full text-md font-bold bg-zinc-500 bg-opacity-90 text-gray-100 flex justify-center items-center'>" . strtoupper($extension) . "</div>
                                <h3 class='break-all'>" . $message . "</h3>
                            </span>
                        </div>
                    </div>
                    <img src='" . $senderImage . "' class='w-6 h-6 rounded-full order-2'>
                </div>
            </div>";
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
                echo "<div class='chat-message'>
                <div class='flex items-end'>
                    <div class='flex flex-col space-y-2 text-sm max-w-[400px] mx-2 order-1 items-end cursor-pointer hover:opacity-80'>
                        <div>
                            <img src='" . $file_path . "' class='h-32 w-32 rounded-md' onclick=\"showFile('" . $file_path . "','" . $message . "','image')\">
                        </div>
                    </div>
                    <img src='" . $recieverImage . "' class='w-6 h-6 rounded-full order-2'>
                </div>
            </div>";
            } elseif ($type == 'video') {
                echo "<div class='chat-message'>
                <div class='flex items-end'>
                    <div class='flex flex-col space-y-2 text-sm max-w-[400px] mx-2 order-1 items-end cursor-pointer hover:opacity-80 rounded-md'>
                        <div>
                            <video id='myVideo' src='" . $file_path . "' alt='Video Preview' poster='uploads/poster.png' class='h-20 w-20 rounded-md' onclick=\"showFile('" . $file_path . "','" . $message . "','video')\"></video>
                        </div>
                    </div>
                    <img src='" . $recieverImage . "' class='w-6 h-6 rounded-full order-2'>
                </div>
              </div>";
            } elseif ($type == 'document') {
                $extension = substr($message, strrpos($message, '.') + 1);

                echo "<div class='chat-message'>
                <div class='flex items-end'>
                    <div class='flex flex-col space-y-2 text-sm max-w-[400px] mx-2 order-1 items-end cursor-pointer hover:opacity-80'>
                        <div>
                            <span class='flex items-center gap-3 px-3 py-2 rounded-lg inline-block rounded-br-none bg-gradient-to-r from-indigo-800 to-blue-500 font-semibold text-gray-100' onclick=\"showFile('" . $file_path . "','" . $message . "','document')\">
                                <div class='h-9 w-9 px-2 rounded-full text-md font-bold bg-zinc-500 bg-opacity-90 text-gray-100 flex justify-center items-center'>" . strtoupper($extension) . "</div>
                                <h3 class='break-all'>" . $message . "</h3>
                            </span>
                        </div>
                    </div>
                    <img src='" . $senderImage . "' class='w-6 h-6 rounded-full order-2'>
                </div>
            </div>";
            }
        }

        //     <div class="chat-message">
        //     <div class="flex items-end">
        //         <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
        //             <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-200 font-semibold text-md">Can be verified on any platform using docker</span></div>
        //         </div>
        //         <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-1">
        //     </div>
        // </div>
        // <div class="chat-message">
        //     <div class="flex items-end justify-end">
        //         <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
        //             <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-gray-700 font-semibold text-white">Your error message says permission denied, npm global installs must be given root privileges.</span></div>
        //         </div>
        //         <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-2">
        //     </div>
        // </div>
    }
}

mysqli_close($conn);
