<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

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
  <div class="flex items-center min-h-screen bg-gray-50">
    <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
      <div class="flex flex-col md:flex-row">
        <div class="h-60 md:h-32 md:h-auto md:w-1/2">
          <img class="object-cover w-full h-full" src="images/pexels-pixabay-247676.jpg" alt="img" />

        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
          <div class="first w-full block">
            <h3 class="mb-4 text-lg font-semibold text-orange-600">Get Started</h3>

            <div class="w-full bg-gray-200 rounded-full">
              <div class="
                    w-36
                    p-[3px]
                    text-xs
                    font-medium
                    leading-none
                    text-center text-blue-100
                    bg-blue-600
                    rounded-full
                  ">
                Step 1
              </div>
            </div>

            <div class="mt-4 mb-4">
              <label class="block text-sm"> Name </label>
              <input type="text" class="
                    w-full
                    px-4
                    py-2
                    text-sm
                    border
                    rounded-md
                    focus:border-blue-400
                    focus:outline-none
                    focus:ring-1
                    focus:ring-blue-600
                  " placeholder="name" name='fname' id="fname" />
            </div>
            <div class="mb-4">
              <label class="block mb-2 text-sm"> UserName </label>
              <input type="text" class="
                    w-full
                    px-4
                    py-2
                    text-sm
                    border
                    rounded-md
                    focus:border-blue-400
                    focus:outline-none
                    focus:ring-1
                    focus:ring-blue-600
                  " placeholder="username" name='lname' id="lname" />
            </div>
            <div class="mb-4">
              <label class="block mb-2 text-sm"> Email </label>
              <input class="
                    w-full
                    px-4
                    py-2
                    text-sm
                    border
                    rounded-md
                    focus:border-blue-400
                    focus:outline-none
                    focus:ring-1
                    focus:ring-blue-600
                  " placeholder="email" type="text" name='email' id="email" />
              <div class="h-6 w-full flex justify-start items-center pl-1">
                <label class="hidden text-sm font-semibold text-red-500" id="email_error">hu</label>
              </div>
            </div>
            <div class="flex justify-end">
              <input type="button" value="Next" class="
                    px-6
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
                    hover:bg-blue-500
                    focus:outline-none
                    cursor-pointer
                  " onclick="next1()" />
            </div>
            <div class="mt-4 text-center">
              <p class="text-md">
                Already have account
                <a href="login.php" class="pl-2 font-semibold text-blue-600 hover:underline text-xl">
                  Sign in.</a>
              </p>
            </div>
          </div>

          <div class="middle w-full hidden">
            <h3 class="mb-4 text-lg font-semibold text-orange-600">Email Verification</h3>

            <p>email has been sucessfully sent.</p>

            <div id="otp" class="flex flex-row justify-start text-center py-4">
              <input class="m-2 ml-0 h-10 w-10 text-center" type="text" id="first" maxlength="1" oninput="moveToNextInput(this, 'second')" onkeydown="moveToPreviousInput(event, this, 'first')" onkeypress="return isNumberKey(event)" autocomplete="off" />
              <input class="m-2 h-10 w-10 text-center" type="text" id="second" maxlength="1" oninput="moveToNextInput(this, 'third')" onkeydown="moveToPreviousInput(event, this, 'first')" onkeypress="return isNumberKey(event)" autocomplete="off" />
              <input class="m-2 h-10 w-10 text-center" type="text" id="third" maxlength="1" oninput="moveToNextInput(this, 'fourth')" onkeydown="moveToPreviousInput(event, this, 'second')" autocomplete="off" />
              <input class="m-2 h-10 w-10 text-center" type="text" id="fourth" maxlength="1" onkeydown="moveToPreviousInput(event, this, 'third')" onkeypress="return isNumberKey(event)" autocomplete="off" />
            </div>

            <button class="mt-1 px-3 py-1.5 rounded-md bg-blue-600 text-white font-semibold cursor-pointer hover:bg-blue-500" onclick="verifyEmail()">Submit</button>
          </div>

          <div class="second w-full hidden">
            <h3 class="mb-4 text-lg font-semibold text-orange-600">Set Password</h3>

            <div class="w-full bg-gray-200 rounded-full">
              <div class="
                    w-[65%]
                    p-[3px]
                    text-xs
                    font-medium
                    leading-none
                    text-center text-blue-100
                    bg-blue-600
                    rounded-full">
                Step 2
              </div>
            </div>

            <div class="py-2" x-data="{ show: true }">
              <span class="text-sm">Password</span>
              <div class="relative mt-1">
                <input id="password" placeholder="Password" :type="show ? 'password' : 'text'" class="w-full
                    px-4
                    py-2
                    text-sm
                    border
                    rounded-md
                    focus:border-blue-400
                    focus:outline-none
                    focus:ring-1
                    focus:ring-blue-600">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">

                  <svg class="h-5 text-gray-700" fill="none" @click="show = !show" :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                    <path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                    </path>
                  </svg>

                  <svg class="h-5 text-gray-700" fill="none" @click="show = !show" :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                    <path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                    </path>
                  </svg>

                </div>
              </div>
            </div>

            <div class="py-2" x-data="{ show: true }">
              <span class="text-sm"> Confirm Password</span>
              <div class="relative mt-1">
                <input id="cnf_password" placeholder="Confirm Password" :type="show ? 'password' : 'text'" class="w-full
                    px-4
                    py-2
                    text-sm
                    border
                    rounded-md
                    focus:border-blue-400
                    focus:outline-none
                    focus:ring-1
                    focus:ring-blue-600">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">

                  <svg class="h-5 text-gray-700" fill="none" @click="show = !show" :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                    <path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                    </path>
                  </svg>

                  <svg class="h-5 text-gray-700" fill="none" @click="show = !show" :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                    <path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                    </path>
                  </svg>

                </div>
              </div>
            </div>

            <div class="flex justify-between pt-4">
              <input type="button" value="Back" class="
                    px-6
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
                    hover:bg-blue-700
                    focus:outline-none
                  " onclick="back1()" />

              <input type="button" value="Next" class="
                    px-6
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
                    hover:bg-blue-700
                    focus:outline-none
                  " onclick="next2()" />
            </div>

          </div>

          <div class="third w-full hidden">
            <h3 class="mb-4 text-lg font-semibold text-orange-600">Add Profile Picture</h3>

            <div class="w-full bg-gray-200 rounded-full">
              <div class="
                    w-full
                    p-[3px]
                    text-xs
                    font-medium
                    leading-none
                    text-center text-blue-100
                    bg-blue-600
                    rounded-full">
                Step 3
              </div>
            </div>

            <div class="min-h-80 w-full flex justify-center items-center flex-col pt-8">
              <input id="file-input" type="file" accept="image/*" class="hidden" name='image'>
              <div id="image-preview" class="w-32 h-32 border border-gray-700 rounded-full"></div>
              <label for="file-input" class="cursor-pointer mt-3 px-3 rounded-full font-semibold bg-green-500 hover:bg-green-400">Select a photo</label>
            </div>

            <div class="flex justify-between pt-4">
              <input type="button" value="Back" class="
                    px-6
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
                    hover:bg-blue-700
                    focus:outline-none
                  " onclick="back2()" />

              <input type="button" value="Submit" class="
                    px-6
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
                    hover:bg-blue-700
                    focus:outline-none" onclick="submit()" />
            </div>
          </div>
        </div>
      </div>
    </div>
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


  document.getElementById("file-input").addEventListener("change", function(event) {
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
      var imagePreview = document.getElementById("image-preview");
      imagePreview.innerHTML = "";

      var img = document.createElement("img");
      img.src = e.target.result;
      img.classList.add("w-full", "h-full", "object-cover", "rounded-full");
      imagePreview.appendChild(img);
    };

    reader.readAsDataURL(file);
  });

  // ---------------------------------------

  var first = document.querySelector('.first');
  var second = document.querySelector('.second');
  var third = document.querySelector('.third');
  var middle = document.querySelector('.middle');

  function verifyEmail() {
    var email = document.querySelector('#email').value;

    var first = document.querySelector('#first').value;
    var secondd = document.querySelector('#second').value;
    var third = document.querySelector('#third').value;
    var fourth = document.querySelector('#fourth').value;

    var code = first + secondd + third + fourth;

    if (first == "" || second == "" || third == "" || fourth == "") {} else {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'scripts/verify-code.php', true);

      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          var responseData = xhr.responseText;
          // alert(responseData);
          if (responseData == "sucess") {
            middle.style.display = 'none';
            second.style.display = 'block';
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
      formData.append('code', code);
      xhr.send(formData);
    }
  }


  function next1() {
    var fname = document.querySelector('#fname').value;
    var lname = document.querySelector('#lname').value;
    var email = document.querySelector('#email').value;
    var error = document.querySelector('#email_error');
    var emailRegex = /^\S+@\S+\.\S+$/;

    if (fname == "" || lname == "" || email == "") {
      toastr.error('please fill all details.', '', {
        closeButton: true,
        progressBar: true,
        positionClass: 'toast-center',
      });
    } else {
      if (!emailRegex.test(email)) {
        error.innerHTML = "Invalid Email";
        error.style.display = "block";
      } else {

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'scripts/check-email.php', true);

        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            var responseData = xhr.responseText;
            if (responseData == "done") {
              toastr.success('Email Sent Successfully.', 'Sucess', {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-center'
              });

              first.style.display = 'none';
              middle.style.display = 'block';
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
        xhr.send(formData);
      }
    }
  }

  function next2() {
    var password = document.querySelector('#password').value;
    var cnf_password = document.querySelector('#cnf_password').value;

    if (password == "" || cnf_password == "") {
      toastr.error('Textbox empty.', '', {
        closeButton: true,
        progressBar: true,
        positionClass: 'toast-center',
      });
    } else {
      if (password != cnf_password) {
        toastr.error('Passwords do not Match..', '', {
          closeButton: true,
          progressBar: true,
          positionClass: 'toast-center',
        });
      } else {
        second.style.display = 'none';
        third.style.display = 'block';
      }
    }
  }

  function back1() {
    first.style.display = 'block';
    second.style.display = 'none';
  }

  function back2() {
    second.style.display = 'block';
    third.style.display = 'none';
  }

  function submit() {
    var email = document.querySelector('#email').value;
    var fname = document.querySelector('#fname').value;
    var lname = document.querySelector('#lname').value;
    var password = document.querySelector('#password').value;
    var fileInput = document.querySelector('#file-input');

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'scripts/signup.php', true);

    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        var responseData = xhr.responseText;
        var containsInt = /\d/.test(responseData);
        if (!containsInt) {
          toastr.error(responseData, '', {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-center',
          });
        } else {
          var dataToSend = responseData;
          var url = "pin.php?id=" + encodeURIComponent(dataToSend);
          window.location.href = url;
        }
      }
    };

    var formData = new FormData();
    formData.append('fname', fname);
    formData.append('lname', lname);
    formData.append('email', email);
    formData.append('password', password);
    formData.append('image', fileInput.files[0]);

    console.log(fileInput.files[0]);

    xhr.send(formData);
  }
</script>

</html>