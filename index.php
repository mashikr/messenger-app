<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="asset/img/icon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&family=Nova+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>Messenger</title>
</head>
<body>

    <div class="wrapper">
        <div class="card custom-card shadow border-0">
            <div class="row h-100 px-3">
                <div class="col-5 w-100 part-1 text-white d-flex flex-column justify-content-start align-items-center" id="content">
                    <div class="logo-div align-self-start">
                        <img src="asset/img/icon.png" class="img-fluid mr-1" alt="Logo">
                        Messenger
                    </div>
                    <div class="px-4 pb-2 mb-4 d-flex media-body flex-column justify-content-center align-items-center">
                        <h3 class="mb-3">Welcome Back!</h3>
                        <p class="text-center">To keep connected with your friends login with your personal info</p>      
                        <button class="btn btn-info btn-border" id="toggler">SIGN IN</button>
                    </div>
                </div>

                <div class="col part-2 text-info d-flex justify-content-center align-items-center">
                    
                    <div class="sign-up w-75">
                        <h3 class="text-center">Create account</h3>
                        <div class="d-flex justify-content-center">
                            <div class="icon-div shadow-sm border">
                                <i class="fab fa-facebook-f"></i>
                            </div>
                            <div class="icon-div shadow-sm border">
                                <i class="fab fa-instagram"></i>
                            </div>
                            <div class="icon-div shadow-sm border">
                                <i class="fab fa-linkedin-in"></i>
                            </div>
                        </div>
                        <p class="small-text">or use your email for registration</p>
                        <form action="" method="">
                            <div class="input">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Name">
                            </div>
                            <div class="name-error error"></div> 
                            <div class="input">
                                <i class="far fa-envelope"></i>
                                <input type="email" placeholder="Email">                             
                            </div>
                            <div class="email-error error"></div> 
                            <div class="input">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="password">                            
                            </div>
                            <div class="password-error error"></div> 
                            
                        </form>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-info btn-border">SIGN UP</button>
                        </div>
                    </div>

                    <div class="sign-in w-75">
                        <h3 class="text-center mb-4">Log in account</h3>
                        
                        <form action="" method="">
                            <div class="input">
                                <i class="far fa-envelope"></i>
                                <input type="email" placeholder="Email">                             
                            </div>
                            <div class="email-err error"></div> 
                            <div class="input">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="password">                            
                            </div>
                            <div class="password-err error"></div> 
                        </form>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-info btn-border">SIGN IN</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    
    </div>
    
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/custom.js"></script>
</body>
</html>