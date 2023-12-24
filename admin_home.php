<?php
    require_once './includes/header.php';
    LogInCheck();
    require_once './includes/admin_nav.php';
    //var_dump($_SESSION);
    flash();
?>

<style>
    body {
        background-image: url('./assets/images/admin2.jpg');
        background-size: cover;
        background-position-y: -90px;
        background-repeat: no-repeat;
        margin: 0;
        padding: 0;
        top
    }

    .transparent-bg {
        background-color: rgba(255, 255, 255, 0.7);
    }
</style>
<?php

if ($_SESSION['role'] == 'admin')  {   ?>
    <div class="row">
        <div class="col-md-4">
            <?php
            require_once 'db.php';
            $sql = "SELECT COUNT(`supplier_id`) AS supplier_available FROM `supplier` WHERE 1";
            $result1 = $conn->query($sql);
            $row = $result1->fetch_assoc();
            $alert_supplier = ($row > 0) ? "<div class=''><h3 class='alert alert-success text-center'> Available Suppliers - " . $row['supplier_available'] . "</h3></div>" : "<div class=''><h3 CLASS='alert alert-danger text-center'> NO SUPPLIER AVAILABLE </h3></div>";
            echo $alert_supplier;
            ?>
        </div>
        <div class="col-md-4">
            <?php
            require_once 'db.php';
            $sql = "SELECT COUNT(`stock_id`) AS item_available FROM `stock` ";
            $result0 = $conn->query($sql);
            $row = $result0->fetch_assoc();
            $alert_item = ($row > 0) ? "<div class=''><h3 CLASS='alert alert-success text-center'> Items In Stock - " . $row['item_available'] . "</h3></div>" : "<div class=''><h3 CLASS='alert alert-danger'> NO ITEMS AVAILABLE </h3></div>";
            echo $alert_item;
            ?>
        </div>
        <div class="col-md-4">
            <?php
            require_once 'db.php';
            $sql = "SELECT COUNT(`dept_id`) AS dept_available FROM `department` WHERE `dept_id` <> '1'";
            $result0 = $conn->query($sql);
            $row = $result0->fetch_assoc();
            $alert_dept = ($row > 0) ? "<div class=''><h3 CLASS='alert alert-success text-center'> Total Departments - " . $row['dept_available'] . "</h3></div>" : "<div class=''><h3 CLASS='alert alert-danger'> NO DEPARTMENTS AVAILABLE </h3></div>";
            echo $alert_dept;
            ?>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron card card-body bg-light mt-5 transparent-bg">
                    <h2 class="text-center">Order Dashboard</h2>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Request ID</th>
                            <th>Item</th>
                            <th>Amount</th>
                            <th>Department</th>
                            <th>Due Date</th>
                            <th>Order Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include_once('db.php');
                        $sql = "SELECT * FROM `request` WHERE req_status IS NULL OR req_status = '' ";
                        $query = $conn->query($sql);

                        $i = 1;
                        while ($row = $query->fetch_assoc()) {
                            echo "<tr>
                                <td>" . $row['req_id'] . "</td>
                                <td>" . $row['req_item'] . "</td>
                                <td>" . $row['req_amount'] . "</td>
                                <td>" . $row['req_dept'] . "</td>
                                <td>" . $row['req_due_date'] . "</td>
                                <td>" . $row['req_status'] . "</td>
                            </tr>";
                            $i++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php } // Close the if statement here ?>

<?php
    //code for taking backup
    //$bak = backDb(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if ($bak == 1) {
        echo '<script>alert("back up taken");</script>';
    }
?>

<?php require_once './includes/footer.php'; ?>
