<!--stock.php-->
<!DOCTYPE html>
<html>
<?php
require_once './includes/header.php';
//if not logged in return him to login page
LogInCheck();
require_once './includes/admin_nav.php';
//var_dump($_SESSION);
?>

<?php include('add_stockModel.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>

<div class="col-sm-10 col-sm-offset-1">
    <div class="row">
        <!--place for error message flashing-->
        <?php
        //this will display any kind of error message as
        flash();
        ?>
    </div>
    <div class="row">
        <div class="row">
            <!-- New button to open the "Add Stock" modal -->
            <a href="#addstocknew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> New</a>
            <a href="reports/all_stock.php" target="_new" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> PDF</a>
        </div>
    </div>
    <div class="" style="height: 10px;"></div>
    <div class="row text-center">
        <div class="col-xs-12">
            <h3 class="text-muted">Main Branch Stock - Colombo</h3>
            <table id="myTable" class="table table-hover table-bordered table-striped table-responsive">
                <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 5%;">Stock ID</th>
                    <th style="width: 15%;">Stock Item</th>
                    <th style="width: 10%;">Category</th>
                    <th style="width: 15%;">Detail</th>
                    <th style="width: 10%;">Supplier</th>
                    <th style="width: 5%;">Amount</th>
                    <th style="width: 10%;">Supplied Date</th>
                    <th style="width: 10%;">Action</th>
                </tr>
                </thead>
                <tbody id="stockTableBody">
                <?php
                include_once('db.php');

                // Use the database query here
                $sql = "SELECT * FROM stock";
                $query = $conn->query($sql);
                $i = 1;
                while ($row = $query->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $i . "</td>
                            <td>" . $row['stock_id'] . "</td>
                            <td>" . $row['Stock_Item_name'] . "</td>
                            <td>" . $row['Stock_Item_cat'] . "</td>
                            <td>" . $row['Stock_Item_detail'] . "</td>
                            <td>" . $row['Stock_item_supplier'] . "</td>
                            <td>" . $row['Amount'] . "</td>
                            <td>" . $row['Stock_supplied_date'] . "</td>
                            <td>
                            <a href='#edit_" . $row['stock_id'] . "' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>

                                <a href='#delete_" . $row['stock_id'] . "' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
                            </td>
                          </tr>";
                    $i++;
                    include('models/edit_delete_stockModel.php');
                }
                ?>
                </tbody>
            </table>
            <hr>
        </div>
         <?php
            //add required models
            require_once 'models/add_stockModel.php';
            ?>
    </div>
</div>
 

          
<?php require_once './includes/footer.php'; ?>


