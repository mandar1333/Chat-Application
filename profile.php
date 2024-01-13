<?php
require_once('scripts/config.php');

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}


$uniqueID = $_SESSION['user'];

$senderImage = "";

$sql = "SELECT * FROM `user_details` WHERE `unique_id` = $uniqueID";
$verifyQuery = mysqli_query($conn, $sql);

if ($data = mysqli_fetch_assoc($verifyQuery)) {
    $userName = $data['name'];
    $senderImage = $data['image'];
    $userEmail = $data['email'];
}

mysqli_close($conn);

require('nav.php');

?>

<input type="hidden" id="hf1" value="<?php echo $uniqueID ?>">

<div class="flex">
    <div class="flex flex-col justify-center items-center h-screen w-full ml-5 md:ml-16 lg:ml-[220px]">

        <input id="file-input" type="file" accept="image/*" class="hidden" name='image'>
        <img id="image-preview" src="<?php echo $senderImage ?>" alt="" class="h-36 w-36 rounded-full border-[1px] border-black">
        <label for="file-input" class="-mt-5 ml-20"><i class="fa-solid fa-camera text-2xl text-green-400 cursor-pointer"></i></label>

        <button class="changebtn mt-1 py-[1px] px-2 rounded-md bg-indigo-600 text-white hidden hover:bg-indigo-500" onclick="image()">change</button>

        <div class="py-6">
            <div class="flex gap-5 font-semibold text-xl py-1">
                Email : <?php echo '<p class="pl-5 text-indigo-800">' . $userEmail . '</p>' ?>
            </div>
            <div class="flex gap-5 font-semibold text-xl py-4">
                userName : <?php echo '<p class="pl-5 text-indigo-800">' . $userName . '</p>' ?>
                <i class="fa-regular fa-pen-to-square pt-1 pl-2 cursor-pointer" onclick="editName()"></i>
            </div>
            <input type="button" value="Change Pin" class="rounded-md px-4 text-gray-100 font-semibold mt-3 py-1.5 bg-sky-500 cursor-pointer hover:bg-sky-400" onclick="changePin()">
        </div>
    </div>
</div>

<div id="myModal" class="modal hidden py-4 inset-0 bg-black bg-opacity-50 backdrop-blur-lg fixed h-screen top-0 left-0 flex items-center justify-center">
    <div class="modal-content-2 bg-white w-80 rounded-lg p-5">
        <div class="h-8 w-full flex items-center justify-between">
            <h3 class="text-lg font-semibold text-blue-700">Change Username</h3>
            <i class="close fa-solid fa-xmark text-red-500 text-2xl cursor-pointer"></i>
        </div>
        <div class="flex justify-center items-center flex-col gap-6 pt-7">
            <input type="text" class="name w-full rounded-md border-[1px] bg-gray-100">
            <button class="h-8 w-20 rounded-md font-semibold text-white bg-sky-500 cursor-pointer hover:bg-sky-400" onclick="changeName()">Change</button>
        </div>
    </div>
</div>

<div id="myModal2" class="modal hidden py-4 inset-0 bg-black bg-opacity-50 backdrop-blur-lg fixed h-screen top-0 left-0 flex items-center justify-center">
    <div class="modal-content-2 bg-white w-80 rounded-lg p-5 pb-9">
        <div class="h-8 w-full flex items-center justify-between">
            <h3 class="text-lg font-semibold text-blue-700">Change Pin</h3>
            <i class="close2 fa-solid fa-xmark text-red-500 text-2xl cursor-pointer"></i>
        </div>
        <div class="flex justify-center items-center flex-col gap-2 pt-6">
            <h3 class="text-center mb-1 text-lg font-semibold text-orange-600">Enter 4 Digit PIN</h3>

            <div id="otp" class="flex flex-row justify-center text-center pb-4">
                <input class="m-2 ml-0 h-10 w-10 text-center" type="text" id="first" maxlength="1" oninput="moveToNextInput(this, 'second')" onkeydown="moveToPreviousInput(event, this, 'first')" onkeypress="return isNumberKey(event)" autocomplete="off" />
                <input class="m-2 h-10 w-10 text-center" type="text" id="second" maxlength="1" oninput="moveToNextInput(this, 'third')" onkeydown="moveToPreviousInput(event, this, 'first')" onkeypress="return isNumberKey(event)" autocomplete="off" />
                <input class="m-2 h-10 w-10 text-center" type="text" id="third" maxlength="1" oninput="moveToNextInput(this, 'fourth')" onkeydown="moveToPreviousInput(event, this, 'second')" autocomplete="off" />
                <input class="m-2 h-10 w-10 text-center" type="text" id="fourth" maxlength="1" onkeydown="moveToPreviousInput(event, this, 'third')" onkeypress="return isNumberKey(event)" autocomplete="off" />
            </div>
            <button class="h-8 w-20 rounded-md font-semibold text-white bg-sky-500 cursor-pointer hover:bg-sky-400" onclick="submit()">Submit</button>
        </div>
    </div>
</div>

<script>
    var mainFile = [];

    document.getElementById("file-input").addEventListener("change", function(event) {
        var file = event.target.files[0];
        var reader = new FileReader();

        mainFile = file;

        reader.onload = function(e) {
            var imagePreview = document.getElementById("image-preview");
            imagePreview.src = e.target.result;

            document.getElementById("file-input").classList.add('hidden');

            document.querySelector(".changebtn").classList.remove('hidden');
        };

        reader.readAsDataURL(file);
    });

    function editName() {
        var modal = document.querySelector('#myModal');
        modal.classList.remove('hidden');
    }

    document.querySelector('.close').addEventListener('click', function() {
        document.querySelector('.name').value = '';

        document.getElementById('myModal').classList.add('hidden');
    });

    function changePin() {
        var modal = document.querySelector('#myModal2');
        modal.classList.remove('hidden');
    }

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
        var uid = document.querySelector('#hf1').value;

        var first = document.querySelector('#first').value;
        var second = document.querySelector('#second').value;
        var third = document.querySelector('#third').value;
        var fourth = document.querySelector('#fourth').value;

        var pin = first + second + third + fourth;

        if (first == "" || second == "" || third == "" || fourth == "") {} else {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'scripts/change-pin.php', true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    var responseData = xhr.responseText;
                    if (responseData == "sucess") {
                        toastr.success('PIN Changes Sucessfully.', '', {
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-center'
                        });

                        document.getElementById('myModal2').classList.add('hidden');
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
            formData.append('id', uid);
            formData.append('pin', pin);

            xhr.send(formData);
        }
    }

    document.querySelector('.close2').addEventListener('click', function() {
        document.querySelector('#first').value = '';
        document.querySelector('#second').value = '';
        document.querySelector('#third').value = '';
        document.querySelector('#fourth').value = '';

        document.getElementById('myModal2').classList.add('hidden');
    });

    function changeName() {
        var uid = document.querySelector('#hf1').value;
        var input = document.querySelector('.name').value;

        var regex = /^[^a-zA-Z]/;

        if (regex.test(input)) {
            toastr.error('Invalid Username', '', {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-center',
            });
        } else {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'scripts/change-name.php', true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    var responseData = xhr.responseText;
                    if (responseData == "sucess") {
                        toastr.success('Username Changed Sucessfully.', '', {
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-center'
                        });

                        document.getElementById('myModal').classList.add('hidden');

                        location.reload();
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
            formData.append('id', uid);
            formData.append('name', input);

            xhr.send(formData);
        }
    }

    function image() {
        var uid = document.querySelector('#hf1').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'scripts/change-image.php', true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var responseData = xhr.responseText;
                if (responseData == "sucess") {
                    toastr.success('Image Updated Sucessfully.', '', {
                        closeButton: true,
                        progressBar: true,
                        positionClass: 'toast-center'
                    });

                    document.querySelector(".changebtn").classList.add('hidden');
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
        formData.append('id', uid);
        formData.append('image', mainFile);

        xhr.send(formData);
    }

    function logout() {
        var uid = document.querySelector('#hf1').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'scripts/logout.php', true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var responseData = xhr.responseText;
                location.reload();
            }
        };

        var formData = new FormData();
        formData.append('sender', uid);
        xhr.send(formData);
    }
</script>

</body>
<html>

</html>