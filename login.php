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
                        <p class="fs-5 text-white"><b>Log in to continue creating, managing, and customizing your portfolio.</b></p>

                        <div class="dvlogo mt-3"></div>
                        
                    </div>
                </div>
                <div class="rightcard col-6">
                    <div class="showMsg"></div>
                    <div class="form-style w-75">
                        <p class="fs-2 fw-bold text-center mt-5" style="color: rgb(51, 123, 152);">LOGIN HERE</p><br>
                        <form class="loginFormDesktop">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="text" name="email" id="email" class="form-control"><br>
                            <label for="emailError" id="emailError" class="showError"></label><br>

                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control"><br>
                            <label for="passwordError" id="passwordError" class="showError"></label><br>

                            <div class="d-flex justify-content-center m-auto my-3">
                                <input type="submit" value="Login" class="logbtn btn btn-info px-4 fw-bold">
                            </div>
                        </form>
                    </div>

                    <div class="d-flex justify-content-center align-items-center text-center fw-bold text-white m-0" style="height: 15vh">
                         <p style="color: black; font-size: 1.3rem;">New user ?<a href="register.php" class="register btn text-light fw-bold" style="font-size: 1.2rem">Sign Up</a> </p>
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

                <div class="bottomcard col-12">
                    <div class="showMsg"></div>
                    <div class="form-style">
                        <p class="fw-bold text-center" style="color: rgb(51, 123, 152); font-size:1.4rem;">LOGIN HERE</p>

                        <form class="loginFormMobile">
                            <label for="email_m" class="form-label fw-bold">Email</label>
                            <input type="email" name="email" id="email_m" class="form-control"><br>
                            <label for="emailError" id="emailError_m" class="showError"></label><br>

                            <label for="password_m" class="form-label fw-bold">Password</label>
                            <input type="password" name="password" id="password_m" class="form-control"><br>
                            <label for="passwordError" id="passwordError_m" class="showError"></label><br>

                            <div class="d-flex justify-content-center m-auto my-3">
                                <input type="submit" value="Login" class="logbtn btn btn-info px-4 fw-bold">
                            </div>
                        </form>
                    </div>

                    <p class="text-center mt-3" style="color:black; font-size:1.2rem; font-weight: bold;">
                        New user ? <a href="register.php" class="register fw-bold">Sign Up</a>
                    </p>
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

            $(".loginFormDesktop").submit(function(e){
                e.preventDefault();

                let email = $("#email").val().trim().toLowerCase();
                let password = $("#password").val().trim();

                let error = false;

                let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

                if (email === "") {
                    $("#emailError").html("Email is required!");
                    error = true;
                } 
                else if (!emailRegex.test(email)) {
                    $("#emailError").html("Please enter a valid Email!");
                    error = true;
                }
                else {
                    $("#emailError").html("");
                }

                if (password === "") {
                    $("#passwordError").html("Password is required!");
                    error = true;
                } 
                else {
                    $("#passwordError").html("");
                }

                if (error) return;

                $.ajax({
                    url: "checkLogin.php",
                    method: "POST",
                    data: { email: email, password: password },

                    success: function(res){
                        res = res.trim();

                        if (res === "invalid") {
                            $(".showMsg")
                            .removeClass("successMsg")
                            .addClass("errorMsg")
                            .html("Incorrect Email or Password")
                            .animate({ top: "0px" }, 400);

                            setTimeout(function(){
                                $(".showMsg").animate({ top: "-80px" }, 600);
                            }, 3000);
                            return;
                        }

                        $(".showMsg")
                        .removeClass("errorMsg")
                        .addClass("successMsg")
                        .html("Log in successful! Redirecting to Dashboard...")
                        .animate({ top: "0px" }, 400);
                        setTimeout(function(){
                            $(".showMsg").animate({ top: "-80px" }, 600);
                        }, 2000);

                        setTimeout(function(){
                            if (res === "user") {
                                window.location.href = "3user_dashboard/user_dashboard.php";
                            }
                            else if (res === "designer") {
                                window.location.href = "2designer_dashboard/designer_dashboard.php";
                            }
                            else if (res === "admin") {
                                window.location.href = "1admin_dashboard/admin_dashboard.php";
                            }
                            else {
                                alert("Unknown role: " + res);
                            }
                        }, 2000);
                    }

                });

            });


            $(".loginFormMobile").submit(function(e){
                e.preventDefault();

                let email = $("#email_m").val().trim().toLowerCase();
                let password = $("#password_m").val().trim();

                let error = false;

                let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

                if (email === "") {
                    $("#emailError_m").html("Email is required!");
                    error = true;
                } 
                else if (!emailRegex.test(email)) {
                    $("#emailError_m").html("Please enter a valid Email!");
                    error = true;
                }
                else {
                    $("#emailError_m").html("");
                }

                if (password === "") {
                    $("#passwordError_m").html("Password is required!");
                    error = true;
                }
                else {
                    $("#passwordError_m").html("");
                }

                if (error) return;

                $.ajax({
                    url: "checkLogin.php",
                    method: "POST",
                    data: { email: email, password: password },

                    success: function(res){
                        res = res.trim();

                        if (res === "invalid") {
                            $(".showMsg")
                                .removeClass("successMsg")
                                .addClass("errorMsg")
                                .html("Incorrect Email or Password")
                                .animate({ top: "0px" }, 400);
                            return;
                        }

                        $(".showMsg")
                            .removeClass("errorMsg")
                            .addClass("successMsg")
                            .html("Log in successful! Redirecting...")
                            .animate({ top: "0px" }, 400);

                        setTimeout(function(){
                            window.location.href = "3user_dashboard/user_dashboard.php";
                        }, 2000);
                    }
                });

            });

        });
    </script>
    <script src="./bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>