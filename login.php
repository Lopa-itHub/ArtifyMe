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
    <div class="hero container-fluid h-100">
        <div class="desktop-view d-none d-md-flex flex-column h-100">
            <div class="row g-2 h-100 align-items-center m-0">
                <div class="leftcard m-auto col-3 ms-5">
                    <div class="row h-100 m-0">
                        <div class="col-10 h-100">
                            <div class="dvlogo  mt-4 ms-2">
                            </div>
                            <div class="theme-text ms-2">
                                <p class="mt-2">DESIGN<br>YOUR<br>DIGITAL<br>SELF</p>
                            </div>
                        </div>
                        <div class="col-2 mt-4">
                            
                            <p class="artifyme-text">A</p>
                            <p class="artifyme-text">R</p>
                            <p class="artifyme-text">T</p>
                            <p class="istyle ms-1">I</p>
                            <p class="artifyme-text">F</p>
                            <p class="artifyme-text">Y</p>
                            <p class="artifyme-text">M</p>
                            <p class="artifyme-text mb-0">E</p>
                        </div>
                    </div>

                </div>
                <div class="rightcard ms-1 me-auto col-6 m-5 w-20 p-4">
                    <div class="form-style p-4">
                        <form>
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" name="email" id="email" class="form-control"><br>

                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control"><br>
                            <div class="d-flex justify-content-center m-auto my-3">
                                <input type="submit" value="Login" class="logbtn btn btn-info px-4 fw-bold">
                            </div>
                        </form>
                    </div>
                    <div class="d-flex justify-content-center align-items-center text-center fw-bold text-white m-0" style="height: 15vh">
                         <p style="text-shadow: 1.5px 1.5px rgba(9, 116, 116, 1); font-size: 1.2rem;">New user ?<a href="register.php" class="register btn text-light fw-bold" style="font-size: 1.2rem">Sign Up</a> </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Layout -->
        <div class="mobile-view d-flex d-md-none flex-column">
            <div class="row g-2 h-100 align-items-center m-0 p-1">
                <div class="topcard col-12 ms-auto mt-2 mb-3">
                    <div class="row height-100">
                        <div class="mvlogo col-4">
                        </div>
                        <div class="artifyme-textmv col-8 fs-1 my-3 text-center"><span style="letter-spacing: 6px;">ART<span class="istylemv">I</span>FYME</span></div>
                    </div>
                    <div>
                        <p class="theme-text text-left ms-1 mt-1" style="font-size: 1.4rem;">DESIGN YOUR DIGITAL SELF</p>
                    </div>
                </div>
                <div class="bottomcard col-12 mt-2 m-auto p-3">
                    <div class="form-style-mv bg-white p-4">
                        <form>
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" name="email" id="email" class="form-control form-control-sm"><br>

                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-xm"><br>
                            <div class="d-flex justify-content-center mb-auto">
                                <input type="submit" value="Login" class="logbtn btn btn-info px-4 fw-bold">
                            </div>
                        </form>
                    </div>
                    <div class="d-flex justify-content-center align-items-center text-center fw-bold text-white mt-4 mb-auto" style="height: 5vh">
                        <p style="text-shadow: 1.2px 1.2px rgba(9, 116, 116, 1)">New user ? <a href="register.php" class="register btn text-white fw-bold" style="font-size: 1.1rem; text-shadow: 1.2px 1.2px black !important;">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <script src="./bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>