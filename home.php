<?php
require_once('scripts/config.php');

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// echo '<p class="font-bold text-4xl text-red-500 text-center">' . $_SESSION['user'] . '</p>';

$uniqueID = $_SESSION['user'];

$senderImage = "";

$sql = "SELECT * FROM `user_details` WHERE `unique_id` = $uniqueID";
$verifyQuery = mysqli_query($conn, $sql);

if ($data = mysqli_fetch_assoc($verifyQuery)) {
    $userName = $data['name'];
    $senderImage = $data['image'];
}

mysqli_close($conn);

require('nav.php');

?>

<input type="hidden" value="<?php echo $uniqueID ?>" id="hfn1" />

<input type="hidden" value="<?php echo $senderImage ?>" id="hfsimage" />

<input type="hidden" id="hf2" />

<input type="hidden" id="hfrimage" />


<div class="flex">
    <div class="flex-1 p:2 sm:px-4 justify-between flex flex-col h-screen w-3/5 ml-5 md:ml-16 lg:ml-[230px] z-0">
        <div class="flex flex-col sm:items-center justify-between md:py-3 border-b-2 border-gray-200">
            <div class="w-full h-20 flex md:hidden items-center justify-end gap-4 px-2">
                <i class="fa-solid fa-magnifying-glass-plus text-2xl text-indigo-700" id="openModal"></i>
                <i class="fa-solid fa-comments text-2xl text-sky-600"></i>
                <div class="h-12 w-12 rounded-full">
                    <img src="2nd feb opheem.jpg" alt="" class="h-full w-full object-cover rounded-full">
                </div>
            </div>

            <div class="flex justify-between w-full">
                <div class="relative flex items-center space-x-4">
                    <div class="profileStatus relative hidden">
                        <span class="userSatus absolute text-green-500 right-0 bottom-0 h-4 w-4 rounded-full">
                        </span>
                        <div class="h-14 w-14 rounded-full ml-2">
                            <img src="' . $image . '" alt="" class="h-full w-full object-cover rounded-full" id="selectedImage">
                        </div>
                    </div>
                    <div class="flex flex-col leading-tight">
                        <div class="text-xl mt-1 flex items-center">
                            <span class="text-gray-700 mr-3 font-semibold" id="selectedName"></span>
                        </div>
                        <h3 class="text-md font-semibold" id="selectedStatus"></h3>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="blockButton pointer-events-none h-8 w-8 rounded-full bg-gray-200 flex justify-center items-center mr-1 cursor-pointer hover:bg-gray-300">
                        <i class="fa-solid fa-ellipsis-vertical text-xl"></i>
                    </div>

                    <div id="blockWindow" class="block-window hidden cursor-pointer pl-2.5 pt-1 h-8 w-16 absolute top-12 right-[27%] rounded-md bg-gray-500 border border-gray-300 bg-white rounded shadow hover:bg-gray-100 hover:text-red-400" onclick="block()">
                        <span class="text-center font-semibold text-red-500">Block</span>
                    </div>
                </div>
            </div>
        </div>
        <div id="messages" class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
            <div class="h-full w-full flex justify-center items-center font-normal text-xl">Select A User to Start Chat.</div>
        </div>
        <div class="border-t-2 border-gray-200 px-4 pt-3 mb-3">
            <div class="pointer relative flex pointer-events-none">
                <span class="absolute inset-y-0 flex items-center">
                    <button type="button" class="ml-1 inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none" id="emojiButton">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="yellow" class="h-6 w-6 text-black bg-gray-600 rounded-full">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </button>
                </span>
                <input type="text" id="messageInput" name="emoji" placeholder="Write your message!" onkeydown="handleKeyDown(event)" class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-[whitesmoke] rounded-md py-3">

                <div id="emojiWindow" class="emoji-window hidden min-h-40 w-40 absolute left-2 bottom-11 rounded-md bg-gray-500 mt-2 p-2 border border-gray-300 bg-white rounded shadow">
                    <span class="emoji cursor-pointer">&#128515;</span>
                    <span class="emoji cursor-pointer">&#128516;</span>
                    <span class="emoji cursor-pointer">&#128517;</span>
                    <span class="emoji cursor-pointer">&#128521;</span>
                    <span class="emoji cursor-pointer">&#128525;</span>
                    <span class="emoji cursor-pointer">&#128526;</span>
                    <span class="emoji cursor-pointer">&#128527;</span>
                    <span class="emoji cursor-pointer">&#128536;</span>
                    <span class="emoji cursor-pointer">&#128537;</span>
                    <span class="emoji cursor-pointer">&#128540;</span>
                    <span class="emoji cursor-pointer">&#128541;</span>
                    <span class="emoji cursor-pointer">&#128544;</span>
                    <span class="emoji cursor-pointer">&#128548;</span>
                    <span class="emoji cursor-pointer">&#128549;</span>
                    <span class="emoji cursor-pointer">&#128552;</span>
                    <span class="emoji cursor-pointer">&#128553;</span>
                    <span class="emoji cursor-pointer">&#128556;</span>
                    <span class="emoji cursor-pointer">&#128557;</span>
                    <span class="emoji cursor-pointer">&#128561;</span>
                    <span class="emoji cursor-pointer">&#128562;</span>
                    <span class="emoji cursor-pointer">&#128563;</span>
                    <span class="emoji cursor-pointer">&#128564;</span>
                    <span class="emoji cursor-pointer">&#128565;</span>
                    <span class="emoji cursor-pointer">&#128567;</span>
                    <span class="emoji cursor-pointer">&#128570;</span>
                    <span class="emoji cursor-pointer">&#128579;</span>
                    <span class="emoji cursor-pointer">&#128580;</span>
                    <span class="emoji cursor-pointer">&#128581;</span>
                    <span class="emoji cursor-pointer">&#128582;</span>
                    <span class="emoji cursor-pointer">&#128584;</span>
                    <span class="emoji cursor-pointer">&#128586;</span>
                </div>

                <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
                    <button type="button" id="fileButton" class="mr-1 inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="blue" class="h-6 w-6 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                        </svg>
                    </button>
                    <button type="button" class="inline-flex items-center justify-center rounded-lg px-3 py-2.5 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none" onclick="sendMessage()">
                        <span class="font-semibold text-lg">Send</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 ml-2 transform rotate-90">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="h-screen w-[25%] hidden md:block bg-[whitesmoke]">
        <div class="min-h-20 w-full flex justify-center py-2 items-center gap-5 px-3 sm:px-6 lg:px-10">
            <h2 class="font-semibold text-lg text-indigo-600 hidden sm:block"><?php echo $userName ?></h2>
            <div class="h-14 w-14 rounded-full">
                <img src="<?php echo $senderImage ?>" alt="" class="h-full w-full rounded-full">
            </div>
        </div>

        <div class="flex justify-between items-center py-2">
            <h3 class="p-3 text-lg font-semibold text-red-400">All Chats</h3>
            <div class="flex">
                <i class="fa-solid fa-user-plus pr-3 mt-1 cursor-pointer text-xl text-teal-500 hover:text-teal-600" id="openModal2"></i>
                <i class="fa-solid fa-people-line pr-3 cursor-pointer text-2xl text-indigo-500 hover:text-indigo-600" id="openGroupModal"></i>
            </div>
        </div>

        <div class="myFriends scroll-smooth w-full h-[440px] overflow-y-auto px-3 flex flex-col gap-1">
            <?php
            require('scripts/config.php');

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
                    echo "<div class='flex min-h-16 py-2 items-center pl-1 l:pl-3 border-[1px] rounded-md bg-white gap-2 lg:gap-3 cursor-pointer' onclick=\"selectUser(" . $uniqueID . ",'" . $senderImage . "'," . $temp_id . ", '" . $name . "','" . $image . "', '" . $status . "')\">
                           <div class='h-14 w-14 rounded-full'>
                            <img src='" . $image . "' alt='' class='h-full w-full object-cover rounded-full'>
                           </div>
                           <div class='flex flex-col'>
                              <h3 class='font-semibold'>" . $name . "</h3>";

                    if ($status == 'Online') {
                        echo '<h3 class="text-green-500 text-md font-semibold">Online</h3>';
                    } else {
                        echo '<h3 class="text-gray-400 text-md font-semibold">Offline</h3>';
                    }

                    echo '</div>
                   </div>';
                }
            }

            mysqli_close($conn);
            ?>
        </div>

        <!-- ---------------------------------- -->
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal hidden py-4 inset-0 bg-black bg-opacity-50 backdrop-blur-lg fixed h-screen top-0 left-0 flex items-center justify-center">
        <div class="modal-content bg-white w-11/12 sm:w-3/4 md:w-1/2 lg:w-2/5 rounded-lg p-6">
            <div class="h-8 w-full flex items-center justify-between">
                <h3 class="text-lg font-semibold text-blue-700">Add Friends</h3>
                <i class="fa-solid fa-xmark text-red-500 text-2xl cursor-pointer" id="closeModal"></i>
            </div>

            <div class="flex items-center h-14 w-full pr-4">
                <input type="search" placeholder="search here" id="myInput" class="px-5 w-full rounded-lg h-10 border-0 bg-[whitesmoke] border-[1px] border-gray-300" />
            </div>

            <div class="box h-72 overflow-y-auto pt-4 pr-2">
                <!-- <?php
                        require('scripts/config.php');

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
                                        echo '<div class="h-8 w-20 text-white text-sm bg-green-500 rounded-md mr-3 flex gap-1 justify-center items-center font-semibold">
                                                <button class="cursor-default">Accept</button>
                                            </div>';
                                    } else {
                                        echo '<div class="h-8 w-20 text-white text-sm bg-yellow-500 rounded-md mr-3 flex gap-1 justify-center items-center font-semibold">
                                                <button class="cursor-default">Requested</button>
                                            </div>';
                                    }
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

                        mysqli_close($conn);
                        ?> -->
            </div>
        </div>
    </div>

    <div id="myModal2" class="modal hidden py-4 inset-0 bg-black bg-opacity-50 backdrop-blur-lg fixed h-screen top-0 left-0 flex items-center justify-center">
        <div class="modal-content-2 bg-white w-11/12 sm:w-3/4 md:w-1/2 lg:w-2/5 rounded-lg p-6">
            <div class="h-8 w-full flex items-center justify-between">
                <h3 class="text-lg font-semibold text-blue-700">Selected File</h3>
                <i class="close2 fa-solid fa-xmark text-red-500 text-2xl cursor-pointer"></i>
            </div>
            <div class="h-72 w-full flex justify-center items-center">
                <img id="imagePreview" src="" alt="Image Preview" class="h-56 w-56 rounded-md" style="display: none;">
                <video id="videoPreview" src="" alt="Video Preview" controls class="h-60 w-80 rounded-md" style="display: none;"></video>
                <iframe id="documentPreview" src="" class="h-60 w-80 rounded-md border-[1px] border-black" frameborder="0" style="display: none;"></iframe>
            </div>
            <p id="fileName" class="mb-2 text-gray-500"></p>
            <p id="fileType" class="mb-4 text-gray-500"></p>
            <a href="#" id="fileLink" class="hidden bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Download File</a>
            <div class="w-full flex justify-end">
                <button id="sendButton" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg" onclick="sendFile()">Send</button>
            </div>
        </div>
    </div>


    <div id="myModal3" class="hidden py-4 inset-0 bg-black bg-opacity-50 backdrop-blur-lg fixed h-screen top-0 left-0 flex items-center justify-center">
        <div class="modal-content-2 bg-white bg-opacity-10 w-11/12 sm:w-3/4 md:w-[62%] rounded-lg p-6">
            <div class="h-8 w-full flex items-center justify-between">
                <p class="fileName text-center font-semibold text-lg mb-3 bg-[#333] text-gray-100 rounded-md px-2 py-1"></p>
                <i class="close3 fa-solid fa-xmark text-white text-3xl cursor-pointer"></i>
            </div>
            <div class="h-[450px] w-full flex justify-center items-center">
                <img id="imagePreview2" src="" alt="Image Preview" class="h-[450px] w-[450px] rounded-md">
                <video id="videoPreview2" src="" alt="Video Preview" controls class="h-[450px] w-[450px] rounded-md"></video>
                <iframe id="documentPreview2" src="" class="h-[450px] w-[400px] rounded-md border-2 border-white" frameborder="0"></iframe>
            </div>
            <!-- <p class="fileName text-center font-semibold text-lg pt-3"></p> -->
            <a href="#" class="hidden bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Download File</a>
        </div>
    </div>


    <div id="myGroupModal" class="hidden py-4 inset-0 bg-black bg-opacity-50 backdrop-blur-lg fixed h-screen top-0 left-0 flex items-center justify-center">
        <div class="modal-content bg-white w-11/12 sm:w-3/4 md:w-1/2 lg:w-2/5 rounded-lg p-6">
            <div class="h-8 w-full flex items-center justify-between">
                <h3 class="text-lg font-semibold text-blue-700">Create Group</h3>
                <i class="fa-solid fa-xmark text-red-500 text-2xl cursor-pointer close4"></i>
            </div>

            <div class="flex justify-center items-center">
                <div class="min-h-80 w-full flex justify-center items-center flex-col pt-8">
                    <input id="file-input" type="file" accept="image/*" class="hidden" name='image'>
                    <div id="image-preview" class="w-32 h-32 border border-gray-700 rounded-full"></div>
                    <label for="file-input" class="cursor-pointer mt-3 px-3 rounded-full font-semibold bg-green-500 hover:bg-green-400">Select a photo</label>
                </div>
            </div>

            <div class="box h-72 overflow-y-auto pt-4 pr-2">
                <input type="text" placeholder="Enter Group Name" class="px-4 mt-2 w-full rounded-md h-10 border-0 border-[1px] border-gray-300" required />
                <input type="text" placeholder="Enter Group Description" class="px-4 my-3 w-full rounded-md h-10 border-0 border-[1px] border-gray-300" />
                <label for="" class="text-teal-800 font-semibold">Add Friends <span class="font-bold text-xl text-red-500">+</span></label>
            </div>
        </div>
    </div>

</div>

<script>
    var interval = setInterval(refresh, 2000);


    var emojiButton = document.getElementById('emojiButton');
    var emojiWindow = document.getElementById('emojiWindow');
    var textBox = document.getElementById('messageInput');

    emojiButton.addEventListener('click', function(event) {
        event.stopPropagation();
        emojiWindow.classList.remove('hidden');
    });

    emojiWindow.addEventListener('click', function(event) {
        if (event.target.classList.contains('emoji')) {
            var emoji = event.target.innerHTML;
            textBox.value += emoji;
            emojiWindow.classList.add('hidden');
        }
    });

    window.addEventListener('click', function(event) {
        if (!emojiWindow.contains(event.target) && event.target !== emojiButton) {
            emojiWindow.classList.add('hidden');
        }
    });

    // ----------------------------------------------------


    var blockButton = document.querySelector('.blockButton');
    var blockWindow = document.getElementById('blockWindow');

    blockButton.addEventListener('click', function(event) {
        event.stopPropagation();
        blockWindow.classList.remove('hidden');
    });

    window.addEventListener('click', function(event) {
        if (!blockWindow.contains(event.target) && event.target !== blockButton) {
            blockWindow.classList.add('hidden');
        }
    });


    var mainFile = [];


    function dropDown() {
        document.querySelector('#submenu').classList.toggle('hidden')
        document.querySelector('#arrow').classList.toggle('rotate-0')
    }

    function Openbar() {
        document.querySelector('.sidebar').classList.toggle('left-[-300px]');
    }

    // JavaScript code to handle modal functionality
    document.getElementById('openModal').addEventListener('click', function() {
        document.getElementById('myModal').classList.remove('hidden');
    });

    document.getElementById('openModal2').addEventListener('click', function() {
        document.getElementById('myModal').classList.remove('hidden');
    });

    document.getElementById('openGroupModal').addEventListener('click', function() {
        document.getElementById('myGroupModal').classList.remove('hidden');
    });

    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('myModal').classList.add('hidden');
    });

    // -------------------------------------

    function addfriend(id) {
        var sender = document.querySelector('#hfn1').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'scripts/add-friend.php', true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var responseData = xhr.responseText;
                if (responseData == "sucess") {
                    toastr.success('Friend Request Sent.', '', {
                        closeButton: true,
                        progressBar: true,
                        positionClass: 'toast-center'
                    });
                } else {
                    toastr.error(responseData, '', {
                        closeButton: true,
                        progressBar: true,
                        positionClass: 'toast-center',
                    });
                }
            }
        };

        var formData = new FormData();
        formData.append('sender', sender);
        formData.append('reciever', id);

        xhr.send(formData);
    }

    // ------------------------------------

    var inputField = document.getElementById('myInput');
    var box = document.querySelector('.box');
    var boxdata = document.querySelector('.box').innerHTML;

    inputField.addEventListener('input', function(event) {
        var sender = document.querySelector('#hfn1').value;
        var inputValue = event.target.value;

        if (inputValue != "") {
            clearInterval(interval);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'scripts/search.php', true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    var responseData = xhr.responseText;
                    box.innerHTML = responseData;
                }
            };

            var formData = new FormData();
            formData.append('sender', sender);
            formData.append('name', inputValue);

            xhr.send(formData);
        } else {
            box.innerHTML = boxdata;
            interval = setInterval(refresh, 2000);
        }
    });

    // ----------------------------------

    function myFunction() {
        var sender = document.querySelector('#hfn1').value;
        var senderImage = document.querySelector('#hfsimage').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'scripts/fetch-added-friends.php', true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var responseData = xhr.responseText;
                var friends = document.querySelector('.myFriends');

                if (responseData != "") {
                    friends.innerHTML = responseData;
                } else {
                    friends.innerHTML = '<div class="h-full w-full flex justify-center items-center"><p class="text-xl">Add Friends to Chat.</p></div>';
                }
            }
        };

        var formData = new FormData();
        formData.append('sender', sender);
        formData.append('senderImage', senderImage);
        xhr.send(formData);
    }

    setInterval(myFunction, 2000);

    function selectUser(sender, senderImage, reciever, name, image, status) {
        document.querySelector('.profileStatus').style.display = 'block';
        document.querySelector('.pointer').style.pointerEvents = 'auto';
        document.querySelector('.blockButton').style.pointerEvents = 'auto';

        document.querySelector('#hfrimage').value = image;
        document.querySelector('#hfsimage').value = senderImage;

        document.querySelector('#hf2').value = reciever;
        document.querySelector('#selectedName').innerHTML = name;
        document.querySelector('#selectedImage').src = image;

        var userSatus = document.querySelector('.userSatus');

        var sts = document.querySelector('#selectedStatus');
        sts.innerHTML = status;

        if (status == 'Online') {
            sts.style.color = '#48bb78';
            userSatus.style.background = '#48bb78';
        } else {
            sts.style.color = 'darkgray';
            userSatus.style.background = 'darkgray';
        }

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'scripts/messages.php', true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var responseData = xhr.responseText;
                var messageBox = document.querySelector('#messages');

                if (responseData != "") {
                    messageBox.innerHTML = responseData;
                    messageBox.scrollTop = messageBox.scrollHeight;
                } else {
                    messageBox.innerHTML = '<div class="h-full w-full flex justify-center items-center"><p class="text-xl">Start Chat by Sending a Message.</p></div>';
                }
            }
        };

        var formData = new FormData();
        formData.append('sender', sender);
        formData.append('senderImage', senderImage);
        formData.append('reciever', reciever);
        formData.append('recieverImage', image);
        xhr.send(formData);
    }

    function refresh() {
        var sender = document.querySelector('#hfn1').value;
        var box2 = document.querySelector('.box');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'scripts/refresh.php', true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var responseData = xhr.responseText;
                box2.innerHTML = responseData;
            }
        };


        var formData = new FormData();
        formData.append('sender', sender);
        xhr.send(formData);
    }

    // setInterval(refresh, 1000);

    function sendMessage() {
        var message = document.querySelector('#messageInput').value;
        var sender = document.querySelector('#hfn1').value;
        var reciever = document.querySelector('#hf2').value;
        var simg = document.querySelector('#hfsimage').value;
        var rimg = document.querySelector('#hfrimage').value;


        if (message != '' && reciever != '' && rimg != '') {
            document.querySelector('#messageInput').value = '';

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'scripts/insert-message.php', true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    var responseData = xhr.responseText;

                    var messageBox = document.querySelector('#messages');
                    if (responseData != "") {
                        messageBox.innerHTML = responseData;
                        messageBox.scrollTop = messageBox.scrollHeight;
                    } else {
                        messageBox.innerHTML = '<div class="h-full w-full flex justify-center items-center"><p class="text-xl">Start Chat by Sending a Message.</p></div>';
                    }
                }
            };

            var formData = new FormData();
            formData.append('message', message);
            formData.append('sender', sender);
            formData.append('senderImage', simg);
            formData.append('reciever', reciever);
            formData.append('recieverImage', rimg);
            xhr.send(formData);
        }
    }

    function sendFile() {
        var sender = document.querySelector('#hfn1').value;
        var reciever = document.querySelector('#hf2').value;
        var simg = document.querySelector('#hfsimage').value;
        var rimg = document.querySelector('#hfrimage').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'scripts/insert-file.php', true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var responseData = xhr.responseText;
                var messageBox = document.querySelector('#messages');

                if (responseData != "") {
                    messageBox.innerHTML = responseData;
                    messageBox.scrollTop = messageBox.scrollHeight;
                } else {
                    messageBox.innerHTML = '<div class="h-full w-full flex justify-center items-center"><p class="text-xl">Start Chat by Sending a Message.</p></div>';
                }

                document.getElementById('myModal2').classList.add('hidden');
                document.getElementById('documentPreview').src = '';
                document.getElementById('imagePreview').src = '';
                document.getElementById('videoPreview').src = '';
            }
        };

        var formData = new FormData();
        formData.append('file', mainFile);
        formData.append('sender', sender);
        formData.append('senderImage', simg);
        formData.append('reciever', reciever);
        formData.append('recieverImage', rimg);
        xhr.send(formData);
    }

    document.getElementById('fileButton').addEventListener('click', function() {
        var fileInput = document.createElement('input');
        fileInput.type = 'file';

        fileInput.addEventListener('change', function(e) {
            var file = e.target.files[0];
            mainFile = file;

            document.getElementById('fileName').textContent = file.name;
            document.getElementById('fileType').textContent = file.type;

            var reader = new FileReader();
            reader.onload = function(event) {
                var documentPreview = document.getElementById('documentPreview');
                var imagePreview = document.getElementById('imagePreview');
                var videoPreview = document.getElementById('videoPreview');
                if (file.type.startsWith('image/')) {
                    imagePreview.src = event.target.result;
                    imagePreview.style.display = 'block';
                    videoPreview.style.display = 'none';
                    documentPreview.style.display = 'none';

                    document.getElementById('myModal2').classList.remove('hidden');
                } else if (file.type.startsWith('video/')) {
                    videoPreview.src = event.target.result;
                    videoPreview.style.display = 'block';
                    imagePreview.style.display = 'none';
                    documentPreview.style.display = 'none';

                    document.getElementById('myModal2').classList.remove('hidden');
                } else if (file.type === 'application/pdf' || file.type === 'application/msword' || file.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || file.type === 'text/plain') {
                    documentPreview.src = event.target.result;
                    documentPreview.style.display = 'block';
                    imagePreview.style.display = 'none';
                    videoPreview.style.display = 'none';

                    document.getElementById('myModal2').classList.remove('hidden');
                } else {
                    toastr.error('Unsupported Format.', '', {
                        closeButton: true,
                        progressBar: true,
                        positionClass: 'toast-center',
                    });
                }
            };
            reader.readAsDataURL(file);
        });

        fileInput.click();
    });

    document.querySelector('.close2').addEventListener('click', function() {
        document.getElementById('myModal2').classList.add('hidden');
        document.getElementById('filePreview').src = '';
    });


    var msgDiv = document.querySelector('#messages');
    var scrolledToBottom = true;

    function scrollToBottom() {
        if (scrolledToBottom) {
            msgDiv.scrollTop = msgDiv.scrollHeight;
        }
    }

    function msgFunction() {
        var sender = document.querySelector('#hfn1').value;
        var reciever = document.querySelector('#hf2').value;
        var senderImage = document.querySelector('#hfsimage').value;
        var recieverImage = document.querySelector('#hfrimage').value;

        if (sender !== '' && reciever !== '' && senderImage !== '' && recieverImage !== '') {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'scripts/messages.php', true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    var responseData = xhr.responseText;
                    var messageBox = document.querySelector('#messages');

                    if (responseData != "") {
                        messageBox.innerHTML = responseData;
                        scrollToBottom();
                    } else {
                        messageBox.innerHTML = '<div class="h-full w-full flex justify-center items-center"><p class="text-xl">Start Chat by Sending a Message.</p></div>';
                    }
                }
            };

            var formData = new FormData();
            formData.append('sender', sender);
            formData.append('senderImage', senderImage);
            formData.append('reciever', reciever);
            formData.append('recieverImage', recieverImage);
            xhr.send(formData);
        }
    }

    msgDiv.addEventListener('scroll', function() {
        scrolledToBottom = msgDiv.scrollHeight - msgDiv.scrollTop === msgDiv.clientHeight;
    });

    setInterval(msgFunction, 2000);

    const showImage = document.querySelector("#imagePreview2");
    const showVideo = document.querySelector("#videoPreview2");
    const showDocument = document.querySelector("#documentPreview2");

    const showName = document.querySelector(".fileName");

    function showFile(fileSrc, name, type) {
        console.log(fileSrc + ' ' + name + ' ' + type);
        document.getElementById('myModal3').classList.remove('hidden');

        if (type == 'image') {
            showImage.style.display = 'block';
            showVideo.style.display = 'none';
            showDocument.style.display = 'none';

            showImage.src = fileSrc;
            showName.innerHTML = name;
        } else if (type == 'video') {
            showImage.style.display = 'none';
            showVideo.style.display = 'block';
            showDocument.style.display = 'none';

            showVideo.src = fileSrc;
            showName.innerHTML = name;
        } else if (type == 'document') {
            showImage.style.display = 'none';
            showVideo.style.display = 'none';
            showDocument.style.display = 'block';

            showDocument.src = fileSrc;
            showName.innerHTML = name;
        }
    }

    document.querySelector('.close3').addEventListener('click', function() {
        document.getElementById('myModal3').classList.add('hidden');
        showDocument.src = '';
        showImage.src = '';
        showVideo.src = '';
    });

    document.querySelector('.close4').addEventListener('click', function() {
        document.getElementById('myGroupModal').classList.add('hidden');
    });

    function handleKeyDown(event) {
        if (event.key === "Enter") {
            sendMessage();
        }
    }

    function accept(friend) {
        var sender = document.querySelector('#hfn1').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'scripts/accept.php', true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var responseData = xhr.responseText;
            }
        };

        var formData = new FormData();
        formData.append('sender', sender);
        formData.append('friend', friend);
        xhr.send(formData);
    }

    function block() {
        var sender = document.querySelector('#hfn1').value;
        var friend = document.querySelector('#hf2').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'scripts/block.php', true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var responseData = xhr.responseText;
                blockWindow.classList.add('hidden');

                if (responseData == 'sucess') {
                    toastr.success('Friend Blocked.', '', {
                        closeButton: true,
                        progressBar: true,
                        positionClass: 'toast-center'
                    });

                    document.querySelector('.profileStatus').style.display = 'none';
                    document.querySelector('.pointer').style.pointerEvents = 'none';
                    document.querySelector('#selectedName').innerHTML = '';
                    document.querySelector('#selectedStatus').innerHTML = '';
                    document.querySelector('#messages').innerHTML = '<div class="h-full w-full flex justify-center items-center font-normal text-xl">Select A User to Start Chat.</div>';
                    document.querySelector('#hf2').value = '';
                    document.querySelector('.blockButton').style.pointerEvents = 'none';
                } else {
                    toastr.error(responseData, '', {
                        closeButton: true,
                        progressBar: true,
                        positionClass: 'toast-center',
                    });
                }
            }
        };

        var formData = new FormData();
        formData.append('sender', sender);
        formData.append('friend', friend);
        xhr.send(formData);
    }

    function logout() {
        var sender = document.querySelector('#hfn1').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'scripts/logout.php', true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var responseData = xhr.responseText;
                location.reload();
            }
        };

        var formData = new FormData();
        formData.append('sender', sender);
        xhr.send(formData);
    }
</script>
</body>

</html>