<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtifyMe</title>
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/login.css">
</head>
<body>
    <div class="hero container-fluid h-100 p-0">
        <div class="desktop-view d-none d-md-flex flex-column h-100">
            <div class="row h-100 align-items-center m-0">
                <div class="leftcard col-6 p-0">
                    <div class="rounded">
                        <div class="mb-2">
                            <p class="artifyme-text">ARTIFYME</p>
                        </div>
                        <div class="theme-text">
                            <p>DESIGN YOUR DIGITAL SELF</p>
                        </div>
                        
                        <p class="welcome-text fs-2 text-white fw-bold mt-5 mb-2"><b>WELCOME TO ARTIFYME !</b></p>
                        <p class="fs-5 text-white"><b>Sign up to create, manage, and customize your portfolio.</b></p>

                        <div class="dvlogo mt-3"></div>
                        
                    </div>
                </div>
                <div class="rightcard col-6">
                    <div class="showMsg"></div>

                    <div class="form-style w-75">
                        <p class="fs-2 fw-bold text-center mt-5" style="color: rgb(51, 123, 152);">SIGN UP HERE</p><br>
                        <form class="signupFormDesktop">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="text" name="name" id="name" class="form-control"><br>
                            <label id="nameError" class="showError"></label><br>
                            
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="text" name="email" id="email" class="form-control"><br>
                            <label id="emailError" class="showError"></label><br>

                            <label for="mobile" class="form-label fw-bold">Mobile</label>
                            <input type="text" name="mobile" id="mobile" class="form-control"><br>
                            <label id="mobileError" class="showError"></label><br>

                            <label for="country" class="form-label fw-bold">Choose Your Country</label>
                            <select name="country" id="country" class="form-select w-50"></select><br>
                            <label id="countryError" class="showError"></label><br>

                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control"><br>
                            <label id="passwordError" class="showError"></label><br>

                            <label for="confirmPassword" class="form-label fw-bold">Confirm Password</label>
                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control"><br>
                            <label id="cPasswordError" class="showError"></label><br>

                            <div class="d-flex justify-content-center m-auto my-3">
                                <input type="submit" value="Sign Up" class="logbtn btn btn-info px-4 fw-bold">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Layout -->
        <div class="mobile-view d-flex d-md-none flex-column w-100">
            <div class="row w-100 m-0 p-0">

                <div class="topcard p-0 col-12">
                    <div class="mobileRounded">
                        <p class="mobile-artifyme-text">ARTIFYME</p>
                        <p class="mobile-theme-text">DESIGN YOUR DIGITAL SELF</p>

                        <p class="welcome-text text-white fw-bold mt-2 mb-1">WELCOME TO ARTIFYME !</p>
                        <p class="text-white" style="font-weight: 500;">Log in to continue creating and customizing.</p>

                        <div class="mobile-dvlogo mx-auto"></div>

                    </div>
                </div>

                <div class="bottomcard col-12 form-parent">
                    <div class="showMsg"></div>

                    <div class="form-style w-75">
                        <p class="fw-bold text-center" style="color: rgb(51, 123, 152); font-size:1.4rem;">SIGN UP HERE</p>

                        <form class="signupFormMobile">
                            <label for="name_m" class="form-label fw-bold">Name</label>
                            <input type="text" name="name" id="name_m" class="form-control"><br>
                            <label id="nameError_m" class="showError"></label><br>
                            
                            <label for="email_m" class="form-label fw-bold">Email</label>
                            <input type="text" name="email" id="email_m" class="form-control"><br>
                            <label id="emailError_m" class="showError"></label><br>

                            <label for="mobile_m" class="form-label fw-bold">Mobile</label>
                            <input type="text" name="mobile" id="mobile_m" class="form-control"><br>
                            <label id="mobileError_m" class="showError"></label><br>

                            <label for="country_m" class="form-label fw-bold">Choose Your Country</label>
                            <select name="country" id="country_m" class="form-select w-50"></select><br>
                            <label id="countryError_m" class="showError"></label><br>

                            <label for="password_m" class="form-label fw-bold">Password</label>
                            <input type="password" name="password" id="password_m" class="form-control"><br>
                            <label id="passwordError_m" class="showError"></label><br>

                            <label for="confirmPassword_m" class="form-label fw-bold">Confirm Password</label>
                            <input type="password" name="confirmPassword_m" id="confirmPassword_m" class="form-control"><br>
                            <label id="cPasswordError_m" class="showError"></label><br>

                            <div class="d-flex justify-content-center m-auto my-3">
                                <input type="submit" value="Sign Up" class="logbtn btn btn-info px-4 fw-bold">
                            </div>
                        </form>
                    </div>
                    
                </div>

            </div>
        </div>

        

    <script src="./assets/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {

            $(".welcome-text").css({
                opacity: 0,
                position: "relative",
                top: "-50px"
            });

            $(".welcome-text").animate({ 
                opacity: 1,
                top: "0px"
            }, 600, "swing", function () {
                
                $(this).animate({ top: "-12px" }, 200)
                    .animate({ top: "0px" }, 200)
                    .animate({ top: "-6px" }, 150)
                    .animate({ top: "0px" }, 150);
            });
        });

        $.ajax({
            url: "https://countriesnow.space/api/v0.1/countries",
            method: "GET",
            dataType: "json",
            success: function(countries){
                let c = countries.data;
                $("#country").append(`<option value="">Select Country</option>`);
                $("#country_m").append(`<option value="">Select Country</option>`);
                c.forEach(function(coun){
                    $("#country").append(`<option value="${coun["country"]}">${coun["country"]}</option>`);
                    $("#country_m").append(`<option value="${coun["country"]}">${coun["country"]}</option>`);
                })
            }
        })

        $(".signupFormDesktop").submit(function(e){
            e.preventDefault();

            let name = $("#name").val().trim();
            let email = $("#email").val().trim().toLowerCase();
            let mobile = $("#mobile").val().trim();
            let country = $("#country").val();
            let password = $("#password").val();
            let confirmPassword = $("#confirmPassword").val();

            let error = false;

            let NameRegex = /^[A-Za-z ]+$/;
            if (name === "") {
                $("#nameError").html("Name is required!");
                error = true;
            } else if (!NameRegex.test(name)) {
                $("#nameError").html("Name can contain only characters!");
                error = true;
            } else {
                $("#nameError").html("");
            }

            let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (email === "") {
                $("#emailError").html("Email is required!");
                error = true;
            } else if (!emailRegex.test(email)) {
                $("#emailError").html("Please enter a valid Email!");
                error = true;
            } else {
                $("#emailError").html("");
            }

            let mobileRegex = /^[6-9][0-9]{9}$/;
            if (mobile === "") {
                $("#mobileError").html("Mobile is required");
                error = true;
            } else if (!mobileRegex.test(mobile)) {
                $("#mobileError").html("Invalid mobile number!");
                error = true;
            } else {
                $("#mobileError").html("");
            }

            if (country === "") {
                $("#countryError").html("Select a country!");
                error = true;
            } else {
                $("#countryError").html("");
            }

            if (password === "") {
                $("#passwordError").html("Password is required!");
                error = true;
            } else if (!/[a-z]/.test(password)) {
                $("#passwordError").html("Password must include lowercase letter!");
                error = true;
            } else if (!/[A-Z]/.test(password)) {
                $("#passwordError").html("Password must include uppercase letter!");
                error = true;
            } else if (!/[0-9]/.test(password)) {
                $("#passwordError").html("Password must include a number!");
                error = true;
            } else if (!/[@#$%^&]/.test(password)) {
                $("#passwordError").html("Password must include a special character!");
                error = true;
            } else if (password.length < 8 || password.length > 16) {
                $("#passwordError").html("Password length must be 8-16 characters!");
                error = true;
            } else {
                $("#passwordError").html("");
            }

            if (confirmPassword === "") {
                $("#cPasswordError").html("This field can't be empty!");
                error = true;
            } else if (confirmPassword !== password) {
                $("#cPasswordError").html("Passwords do not match!");
                error = true;
            } else {
                $("#cPasswordError").html("");
            }

            if (error) return;

            $.ajax({
                url: "checkEmail.php",
                method: "POST",
                data: { email: email },

                success: function (res) {
                    res = JSON.parse(res);

                    if (res === true) {
                        $(".showMsg")
                        .removeClass("successMsg")
                        .addClass("errorMsg")
                        .html("Can't sign up - email already exist!")
                        .animate({ top: "0px" }, 400);

                        setTimeout(function(){
                            $(".showMsg").animate({ top: "-80px" }, 600);
                        }, 3000);
                        return;
                    }

                    finalSubmit();
                }
            });

            function finalSubmit() {
                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: {
                        name: name,
                        email: email,
                        mobile: mobile,
                        country: country,
                        password: password
                    },
                    success: function (res) {
                        $(".showMsg")
                            .removeClass("errorMsg")
                            .addClass("successMsg")
                            .html("Sign up successful! Redirecting to Log in...")
                            .animate({ top: "0px" }, 400);
                            setTimeout(function(){
                                $(".showMsg").animate({ top: "-80px" }, 600);
                            }, 2000);

                            setTimeout(function(){
                                window.location.href = "login.php";
                            }, 2000); 
                    }
                });
            }

        });


        $(".signupFormMobile").submit(function(e){
            e.preventDefault();

            let name = $("#name_m").val().trim();
            let email = $("#email_m").val().trim().toLowerCase();
            let mobile = $("#mobile_m").val().trim();
            let country = $("#country_m").val();
            let password = $("#password_m").val();
            let confirmPassword = $("#confirmPassword_m").val();

            let error = false;

            let NameRegex = /^[A-Za-z ]+$/;
            if (name === "") {
                $("#nameError_m").html("Name is required!");
                error = true;
            } else if (!NameRegex.test(name)) {
                $("#nameError_m").html("Name can contain only characters!");
                error = true;
            } else {
                $("#nameError_m").html("");
            }

            let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (email === "") {
                $("#emailError_m").html("Email is required!");
                error = true;
            } else if (!emailRegex.test(email)) {
                $("#emailError_m").html("Please enter a valid Email!");
                error = true;
            } else {
                $("#emailError_m").html("");
            }

            let mobileRegex = /^[6-9][0-9]{9}$/;
            if (mobile === "") {
                $("#mobileError_m").html("Mobile is required");
                error = true;
            } else if (!mobileRegex.test(mobile)) {
                $("#mobileError_m").html("Invalid mobile number!");
                error = true;
            } else {
                $("#mobileError_m").html("");
            }

            if (country === "") {
                $("#countryError_m").html("Select a country!");
                error = true;
            } else {
                $("#countryError_m").html("");
            }

            if (password === "") {
                $("#passwordError_m").html("Password is required!");
                error = true;
            } else if (!/[a-z]/.test(password)) {
                $("#passwordError_m").html("Must include lowercase letter!");
                error = true;
            } else if (!/[A-Z]/.test(password)) {
                $("#passwordError_m").html("Must include uppercase letter!");
                error = true;
            } else if (!/[0-9]/.test(password)) {
                $("#passwordError_m").html("Must include a number!");
                error = true;
            } else if (!/[@#$%^&]/.test(password)) {
                $("#passwordError_m").html("Must include a special character!");
                error = true;
            } else if (password.length < 8 || password.length > 16) {
                $("#passwordError_m").html("Password length must be 8-16 characters!");
                error = true;
            } else {
                $("#passwordError_m").html("");
            }

            if (confirmPassword === "") {
                $("#cPasswordError_m").html("This field can't be empty!");
                error = true;
            } else if (confirmPassword !== password) {
                $("#cPasswordError_m").html("Passwords do not match!");
                error = true;
            } else {
                $("#cPasswordError_m").html("");
            }

            if (error) return;

            $.ajax({
                url: "checkEmail.php",
                method: "POST",
                data: { email: email },

                success: function (res) {
                    res = JSON.parse(res);

                    if (res === true) {
                        $(".showMsg")
                            .removeClass("successMsg")
                            .addClass("errorMsg")
                            .html("Can't sign up - email already exist!")
                            .animate({ top: "0px" }, 400);

                        setTimeout(function(){
                            $(".showMsg").animate({ top: "-80px" }, 600);
                        }, 3000);
                        return;
                    }

                    finalSubmit();
                }
            });

            function finalSubmit() {
                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: {
                        name: name,
                        email: email,
                        mobile: mobile,
                        country: country,
                        password: password
                    },
                    success: function (res) {
                        $(".showMsg")
                        .removeClass("errorMsg")
                        .addClass("successMsg")
                        .html("Sign up successful! Redirecting to Log in...")
                        .animate({ top: "0px" }, 400);
                        setTimeout(function(){
                            $(".showMsg").animate({ top: "-80px" }, 600);
                        }, 2000);

                        setTimeout(function(){
                            window.location.href = "login.php";
                        }, 2000);
                    }
                });
            }

        });


    </script>
    <script src="./bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>