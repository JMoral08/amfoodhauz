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
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.min.css"> -->
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
                <a class="side-item active" href="order.php"><i class="bi bi-upc-scan"></i> Order</a>
            </li>
            <li class="side-title">Reports</li>
            <li class="side-link">
                <a class="side-item" href="expenses.php"><i class="bi bi-graph-up-arrow"></i> Expenses</a>
            </li>
            <li class="side-link">
                <a class="side-item" href="liabilities.php"><i class="bi bi-credit-card"></i> Liabilities</a>
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
            <li>Order Page</li>
        </ul>
        <div class="container-fluid mt-5">
            <div class="row justify-content-center"> 
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h1 class="text-muted">Customer Order</h1>
                        </div> -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 col-lg-4">
                                    <h2 class="text-center text-uppercase fw-bold"><span class="text-muted">Billing </span>Section</h2>
                                    <hr>
                                    <form method="post" action="" id="form-order">
                                        <div class="">
                                            <div class="col-sm-12 col-lg-12 mb-3">
                                                <label class="form-label">Product :</label>  
                                                <select class="form-select text-uppercase" id="select-product" name="select-product">
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-lg-12 mb-3">
                                                <label class="form-label">Quantity :</label>  
                                                <input type="number" name="txt-qty" id="txt-qty" class="form-control" placeholder="0.00">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="col-sm-12 col-lg-12 mb-3">
                                        <button type="button" class="btn btn-primary col-6" id="btn-add-order"><i class="bi bi-cart-fill"></i> Add Order </button>
                                        <button type="button" class="btn btn-primary col-6" id="btn-update-order">Update Order </button>
                                        <button type="button" class="btn btn-danger" id="btn-cancel-order"><i class="bi bi-cart-x-fill"></i> Cancel Order</button>
                                    </div>
                                    <form id="form-customer-details">
                                        <div class="col-12 col-lg-12 mb-3">
                                            <input type="number" name="txt-amount" id="txt-amount" class="form-control" placeholder="Amount 0.00" disabled>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 col-lg-8 mb-3">
                                                <input type="text" name="txt-customer" id="txt-customer" class="form-control" placeholder="Customername ..." disabled>
                                            </div>
                                            <div class="col-6 col-lg-4 mb-3">
                                                <select class="form-select" id="txt-status" disabled>
                                                    <option value="0">Cash</option>
                                                    <option value="1">Utang</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-12 mb-3 d-grid gap-2">
                                            <button type="button" class="btn btn-primary" id="btn-add-amount" disabled><i class="bi bi-cash-stack"></i> Add</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="col-sm-6 m-1">
                                        <p class="my-auto text-uppercase">Customer : <span class="text-uppercase" id="td-customer"></span></p>
                                    </div>
                                    <div class="col-sm-6 m-1">
                                        <p class="my-auto text-uppercase">Users : <span id="td-user" hidden><?php echo $id ?></span> <?php echo $username ?></p>
                                    </div>
                                    <div class="col-sm-6 m-1">
                                        <p class="my-auto">TIN : 000-000-000-000</p>
                                    </div>
                                    <div class="col-sm-6 m-1">
                                        <p class="my-auto text-uppercase">Date : <span id="lbl-date"></span></p>
                                    </div>
                                    <div class="table-responsive-sm">
                                        <table class="table table-sm table-hover table-dark" id="tble-order">
                                            <thead class="thead-dark">
                                                <th>Product</th>
                                                <th>Amount</th>
                                                <th class="text-end">Qty</th>
                                                <th class="text-start">Total</th>
                                                <th class="text-center">Action</th>
                                            </thead>
                                            <tbody id="tbody-order">
                                            
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered table-sm">
                                            <tr>
                                                <th colspan="4" class="table-active">Total Price of Product</th>          
                                            </tr>
                                            <tr>
                                                <td>Total Quantity :</td>
                                                <td colspan="4" id="td-total-qty"></td>
                                            </tr>
                                            <tr>
                                                <td>Total Amount :</td>
                                                <td colspan="4" id="td-overall-total"></td>
                                            </tr>
                                            <tr>
                                                <td>Cash Amount :</td>
                                                <td colspan="4" id="td-amount">0</td>
                                            </tr>
                                            <tr>
                                                <td>Change :</td>
                                                <td colspan="4" id="td-change">0</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-end">
                                <button class="btn btn-success" id="btn-add-payment"><i class="bi bi-receipt-cutoff"></i> Proceed to Payment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="js/app.js"></script>
<script src="js/sweetalert2.js"></script>
<script src="js/app/order.js"></script>
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