<?php
require "authentication/adminauth.php";
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
                <li class="nav-link">
                    <a class="nav-item position-relative" href="settings.php"><i class="bi bi-gear"></i></a>
                </li>
                <div class="vr"></div>
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
                <a class="side-item" href="user.php"><i class="bi bi-person"></i> User</a>
            </li>
            <li class="side-link">
                <a class="side-item" href="people.php"><i class="bi bi-people"></i> People</a>
            </li>
            <li class="side-link">
                <a class="side-item active" href="product.php"><i class="bi bi-box2"></i> Product</a>
            </li>
            <li class="side-link">
                <a class="side-item" href="statementofaccount.php"><i class="bi bi-journals"></i> Statement of Account</a>
            </li>
            <li class="side-title">Reports</li>
            <li class="side-link">
                <a class="side-item" href="inventory.php"><i class="bi bi-bar-chart-line"></i> Inventory</a>
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
            <li>Product Page</li>
        </ul>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-sm-4 col-lg-4 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="fw-bold text-uppercase"><span id="lbl-update-product" class="text-muted">Add New</span> Product</h4>
                            <hr>
                            <span class="text-center" id="message"></span>
                            <form method="" action="" id="form-product">
                                <div class="col-sm-12 col-lg-12 mb-2">
                                    <label for="product" class="form-label">Product name:</label>
                                    <input type="text" data-target="txt-poduct" name="txt-product" id="txt-product" class="form-control">
                                </div>
                                <div class="col-sm-12 col-lg-12 mb-2">
                                    <label for="amount" class="form-label">Amount:</label>
                                    <input type="number" data-target="txt-amount" name="txt-amount" id="txt-amount" class="form-control">
                                </div>
                                <div class="col-sm-12 col-lg-12 mb-2">
                                    <label for="status" class="form-label">Categories:</label>
                                    <select class="form-select" data-target="txt-status" name="txt-status" id="txt-categories">
                                        <option value="Break Fast">Break Fast</option>
                                        <option value="BBQ Grilled">BBQ Grilled</option>
                                        <option value="Softdrinks">Softdrinks</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-lg-12 mb-2">
                                    <label for="status" class="form-label">Status:</label>
                                    <select class="form-select" data-target="txt-status" name="txt-status" id="txt-status" disabled>
                                        <option value="Active">Active</option>
                                        <option value="InActive">InActive</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-success" id="btn-add-product"><i class="bi bi-plus-square"></i> Add Product</button>
                            <button type="button" class="btn btn-success" id="btn-update-product"><i class="bi bi-check-square"></i> Update Product</button>
                            <button type="button" class="btn btn-danger" id="btn-cancel-product"><i class="bi bi-dash-square"></i> Cancel</button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 col-lg-8 mb-2">
                    <div class="card">
                        <!-- <div class="card-header">
                            <strong><h4 class="text-muted">Product List</h4> </strong>
                        </div> -->
                        <div class="card-body">
                            <h4 class="fw-bold text-uppercase"><span class="text-muted">Product </span>List</h4>
                            <hr>
                            <div class="table-responsive-sm">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <th>Product</th>
                                        <th>Amount</th>
                                        <th>Categories</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody id="tbody-product">
                                        <tr>
                                            <td colspan="5">no data found ...</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="js/app.js"></script>
<script src="js/app/product.js"></script>
<script src="js/sweetalert2.js"></script>
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