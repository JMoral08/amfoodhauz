<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="image/amfoodhauz.png">
    <title>J U N J I E | Login</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Anton&family=Montserrat:wght@500&family=Passion+One:wght@900&display=swap" rel="stylesheet">
</head>
<style type="text/css">
    a {
        text-decoration: none;
    }
    .app-register {
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .container {
        margin: 2rem 0 0 0;
        max-width: 400px;
        width: 100%;
    }
    .logo {
        margin: auto;
        padding: 20px 0;
        text-decoration: none;
        list-style-type: none;
    }
</style>
<body class="app-body">

<main class="app-register">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card shadow">
                    <div class="logo">
                        <a class="brand-first">a&m</a>
                        <a class="brand-second">foodhauz</a>
                    </div>
                    <hr>
                    <div class="card-body">
                        <form id="form-login" class="m-auto">
                            <div class="row">
                                <div class="col-sm-12 col-lg-12 mb-3">
                                    <input type="text" class="form-control" id="txt-username" placeholder="Email or phone number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-12 mb-3">
                                    <input type="password" class="form-control" id="txt-password" placeholder="Password">
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-primary" id="btn-login">Login</button>
                                <button class="btn btn-primary" type="button" id="btn-login-loading" disabled>
                                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                  Loading...
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="text-center"><a href="#">Forgot Password?</a></div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="text-center">
                                <span class="text-secondary">D F J | Tech © 2022</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
<script src="js/app.js"></script>
<script src="js/app/login.js"></script>
<script src="js/sweetalert2.js"></script>
</html>