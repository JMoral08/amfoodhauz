<?php
require "authentication/userauth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="image/amfoodhauz.png">
    <title>A&M FoodHauz</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Anton&family=Montserrat:wght@500&family=Passion+One:wght@900&display=swap" rel="stylesheet">
</head>
<body class="app-body">
    <header class="app-header">
        <span class="app-brand">
            <a class="brand-first" href="#">a&m</a>
            <a class="brand-second" href="#">foodhauz</a>
        </span>
        <a href="#" class="btn-toggle-show"><i class="fa fa-bars"></i></a>
        <nav class="navbar-nav">
            <ul class="side-nav">
                <li class="nav-link dropdown">
                    <a class="nav-item dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i> <?php echo $username ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li class="dropdown-header text-uppercase">Accounts</li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="navbar-user">
            <li class="dropdown">
                <span class="nav-item" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle"></i>
                </span>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li class="dropdown-header">Accounts</li>
                    <li class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right"></i> Log Out</a></li>
                </ul>
            </li>
        </div>
    </header>
    <aside class="app-sidebar">
    <ul class="sidebar">
            <li class="side-title">UI Elements</li>
            <li class="side-link">
                <a class="side-item" href="order.php"><i class="bi bi-upc-scan"></i> Order</a>
            </li>
            <li class="side-title">Reports</li>
            <li class="side-link">
                <a class="side-item" href="expenses.php"><i class="bi bi-graph-up-arrow"></i> Expenses</a>
            </li>
            <li class="side-link">
                <a class="side-item active" href="liabilities.php"><i class="bi bi-credit-card"></i> Liabilities</a>
            </li>
            <li class="side-footer">
                <p class="mt-1">Alrights Reserve @ <?php echo date('Y'); ?> </p>
            </li>
        </ul>
    </aside>
    <main class="app-main">
        <ul class="breadcrumb">
            <li><a href="#"><i class="bi bi-house-fill"></i></a></li>
            <li><a href="#"><?php echo $username ?></a></li>
            <li>Liabilities Page</li>
        </ul>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form id="form-liabilities">
                                <div class="row">
                                    <div class="col-sm-4 col-lg-4 mb-2">
                                        <label class="form-label">Type Customer name :</label>
                                        <input type="text" name="txt-customername" id="txt-customername" class="form-control" placeholder="Type Customer name ...">
                                    </div>
                                    <div class="col-sm-3 col-lg-3 mb-2">
                                        <label class="form-label">Date of Terms:</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="txt-dateofterms" id="txt-dateofterms" disabled>
                                            <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="justify-content-between">
                                <button type="button" class="btn btn-success" id="btn-search-customer"><i class="bi bi-search"></i> Search</button>
                                <span class="text-primary float-end m-1">DFJ Tech © 2022</span>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-secondary"><i class="bi bi-printer"></i> Print</button>
                                  <button type="button" class="btn btn-secondary" disabled><i class="bi bi-filetype-pdf"></i> PDF</button>
                                  <button type="button" class="btn btn-success" id="btn-update"><i class="bi bi-person-check-fill"></i> Update Payment</button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <th>Customer</th>
                                        <th>Product</th>
                                        <th>Amount</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Terms</th>
                                    </thead>
                                    <tbody id="tbody-customer">
                                        <tr>
                                            <table class="table table-bordered">
                                                <tr class="table-active">
                                                    <th colspan="7">Per Product Line Quantity</th>
                                                </tr>
                                                <tr>
                                                    <td colspan="6">Total Quantity</td>
                                                    <td id="td-total-qty" class="fw-bold">0</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6">Overall Total</td>
                                                    <td id="td-overalltotal" class="fw-bold">0</td>
                                                </tr>
                                            </table>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="text-primary small">DFJ Tech © 2022</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
<script src="js/app.js"></script>
<script src="js/app/liabilities.js"></script>
<script src="js/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('.btn-toggle-show').on('click', function() {
        if(!$('body').hasClass('show')) {
            $('body').addClass('show');

        } else {
            $('body').removeClass('show');
            $('body').removeClass('show-default'); // also remove default behaviour if set
        }

        if($(window).innerWidth() < 1025) {
            if(!$('body').hasClass('show-active')) {
                $('body').addClass('show-active');
            } else {
                $('body').removeClass('show-active');
                $('body').removeClass('show-default'); // also remove default behaviour if set
            }
        }
    });

    if( $('.sidebar').length > 0 ) {
        $('.sidebar').slimScroll({
            height: '95%',
            wheelStep: 5,
        });
    }
</script>
</html>