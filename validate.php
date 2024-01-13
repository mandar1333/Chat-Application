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

<?php
$dataReceived = $_GET['email'];
?>

<body>
    <div class="h-screen flex justify-center items-center bg-gray-700 bg-opacity-75">
        <div class="pin w-80 bg-[whitesmoke] py-10 rounded-md">
            <input type="hidden" value="<?php echo $dataReceived ?>" id="hf1" />
            <h3 class="text-center mb-1 text-lg font-semibold text-orange-600 py-5">Enter 4 Digit PIN</h3>

            <div id="otp" class="flex flex-row justify-center text-center">
                <input class="m-2 ml-0 h-10 w-10 text-center" type="text" id="first" maxlength="1" oninput="moveToNextInput(this, 'second')" onkeydown="moveToPreviousInput(event, this, 'first')" onkeypress="return isNumberKey(event)" autocomplete="off" />
                <input class="m-2 h-10 w-10 text-center" type="text" id="second" maxlength="1" oninput="moveToNextInput(this, 'third')" onkeydown="moveToPreviousInput(event, this, 'first')" onkeypress="return isNumberKey(event)" autocomplete="off" />
                <input class="m-2 h-10 w-10 text-center" type="text" id="third" maxlength="1" oninput="moveToNextInput(this, 'fourth')" onkeydown="moveToPreviousInput(event, this, 'second')" autocomplete="off" />
                <input class="m-2 h-10 w-10 text-center" type="text" id="fourth" maxlength="1" onkeydown="moveToPreviousInput(event, this, 'third')" onkeypress="return isNumberKey(event)" autocomplete="off" />
            </div>

            <div class="flex justify-center pt-5 w-full">
                <input type="button" value="Submit" class="
                  px-5
                  py-2
                  mt-4
                  text-sm
                  font-medium
                  leading-5
                  text-center text-white
                  transition-colors
                  duration-150
                  bg-blue-600
                  border border-transparent
                  rounded-lg
                  cursor-pointer
                  hover:bg-blue-700
                  focus:outline-none" onclick="submit()" />
            </div>
        </div>
</body>

<script>
    function moveToNextInput(currentInput, nextInputId) {
        var input = currentInput.value;
        var isNumber = /^\d+$/.test(input);

        if (isNumber) {
            var nextInput = document.getElementById(nextInputId);
            nextInput.focus();
        }
    }

    function moveToPreviousInput(event, currentInput, previousInputId) {
        var keyCode = event.keyCode || event.which;

        if (keyCode === 8 && currentInput.value === '') {
            var previousInput = document.getElementById(previousInputId);
            previousInput.focus();

            event.preventDefault();
        }
    }

    function isNumberKey(event) {
        var charCode = event.which ? event.which : event.keyCode;
        return (charCode >= 48 && charCode <= 57) && !event.shiftKey && !event.altKey && !event.ctrlKey && !event.metaKey;
    }

    function submit() {
        var email = document.querySelector('#hf1').value;

        var first = document.querySelector('#first').value;
        var second = document.querySelector('#second').value;
        var third = document.querySelector('#third').value;
        var fourth = document.querySelector('#fourth').value;

        var pin = first + second + third + fourth;

        if (first == "" || second == "" || third == "" || fourth == "") {} else {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'scripts/check-pin.php', true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    var responseData = xhr.responseText;
                    if (responseData == "sucess") {
                        var url = "home.php";
                        window.location.href = url;
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
            formData.append('email', email);
            formData.append('pin', pin);

            xhr.send(formData);
        }
    }
</script>

</html>