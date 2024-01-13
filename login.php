<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <style>
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
            font-weight: 500;
            height: 80px;
            width: 200px;
        }
    </style>
</head>

<body>
    <div class="h-screen flex flex-col md:flex-row">
        <div class="left w-full md:w-1/2">
            <div class="h-[15%] w-full justify-start items-center pl-5 sm:pl-10 flex gap-3">
                <img src="icons8-chat-94.png" alt="" class="h-12 w-12">
                <h3 class="font-semibold text-xl text-indigo-800">Convo Station</h3>
            </div>

            <div class="h-[85%] flex justify-center items-center">
                <img src="Messaging.gif" alt="" class="h-[370px] md:h-[450px] w-[420px] md:w-[500px]">
            </div>
        </div>

        <div class="w-full md:w-1/2 flex justify-center items-center px-0 md:px-5 lg:px-0 pb-10 md:pb-0">
            <div class="right mt-10 sm:mx-auto w-4/5 sm:w-full sm:max-w-sm">
                <div class="space-y-6" action="#" method="POST">
                    <h3 class="font-bold text-xl text-teal-500 text-center">WELCOME</h3>
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-[9px] text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="text-sm">
                                <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-[9px] text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <button type="button" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-[10px] text-md font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" onclick="login()">Sign in</button>
                    </div>
                </div>

                <p class="mt-10 text-center text-sm text-gray-500">
                    Dont have a Account ?
                    <a href="index.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">REGISTER</a>
                </p>
            </div>
        </div>
    </div>
</body>

<script>
    function login() {
        var email = document.querySelector('#email').value;
        var password = document.querySelector('#password').value;

        if (email == "" || password == "") {
            toastr.error('please fill all details.', '', {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-center',
            });
        } else {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'scripts/verification.php', true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    var responseData = xhr.responseText;
                    var containsInt = /\d/.test(responseData);

                    if (!containsInt) {
                        if (responseData == "sucess") {
                            var url = "validate.php?email=" + encodeURIComponent(email);
                            window.location.href = url;
                        } else {
                            toastr.error(responseData, '', {
                                closeButton: true,
                                progressBar: true,
                                positionClass: 'toast-center',
                            });
                        }
                    } else {
                        var dataToSend = responseData;
                        var url = "pin.php?id=" + encodeURIComponent(dataToSend);
                        window.location.href = url;
                    }
                }
            };

            var formData = new FormData();
            formData.append('email', email);
            formData.append('password', password);
            xhr.send(formData);
        }
    }
</script>

</html>