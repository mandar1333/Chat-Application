<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <!-- Add the JavaScript files for the emoji picker -->


    <style>
        .emoji-picker {
            position: absolute;
            bottom: 40px;
            right: 10px;
            background-color: white;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            z-index: 1;
            display: none;
        }

        .emoji-picker.show {
            display: block;
        }

        .emoji-picker .emoji {
            display: inline-block;
            padding: 5px;
            cursor: pointer;
        }

        .toast-center {
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .toast-error {
            background-color: red;
        }

        .toast-success {
            background-color: #4cbb17;
        }

        div::-webkit-scrollbar {
            width: 8px;
        }

        div::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 4px;
        }

        div::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }

        div::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }
    </style>

</head>

<body class="scroll-smooth">
    <span class="absolute flex text-black text-3xl top-6 left-7 cursor-pointer -mt-[4px] z-10" onclick="Openbar()">
        <i class="fa-solid fa-bars"></i>
    </span>
    <div class="z-10 flex flex-col justify-between sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] p-2 w-[290px] lg:w-[220px] overflow-y-auto text-center bg-[#333] shadow h-screen duration-1000">
        <div class="text-gray-100 text-xl">
            <div class="p-2.5 mt-1 flex items-center rounded-md ">
                <img src="icons8-chat-94.png" alt="" class="h-8 w-8">
                <h1 class="text-[15px] ml-2 text-lg text-white font-semibold">Convo Station</h1>
                <i class="fa-solid fa-xmark ml-20 cursor-pointer lg:hidden" onclick="Openbar()"></i>
            </div>
            <hr class="my-2 text-gray-600">

            <div>
                <a href="home.php" class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-blue-600">
                    <i class="fa-solid fa-chart-pie text-sky-300"></i>
                    <span class="text-[15px] ml-4 text-gray-200">Dashboard</span>
                </a>
                <a href="profile.php" class="p-2.5 pl-5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-blue-600">
                    <i class="fa fa-user text-yellow-400"></i>
                    <span class="text-[15px] ml-4 text-gray-200">Profile</span>
                </a>
                <a class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-blue-600">
                    <i class="fa-solid fa-gear text-gray-300"></i>
                    <span class="text-[15px] ml-4 text-gray-200">Settings</span>
                </a>
                <a class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-blue-600">
                    <i class="fa-solid fa-user-group text-green-500"></i>
                    <span class="text-[15px] ml-4 text-gray-200">Friends</span>
                </a>
            </div>
        </div>

        <div class="py-3 mt-3 flex items-center px-4 duration-300 cursor-pointer hover:bg-blue-600" onclick="logout()">
            <i class="fa-solid fa-right-from-bracket text-red-500 text-xl"></i>
            <span class="text-[16px] ml-4 text-gray-200">Logout</span>
        </div>
    </div>