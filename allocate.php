<?php
require_once './includes/header.php';
require_once './includes/admin_nav.php';
include_once('db.php');
LogInCheck();
?>
<div class="col-sm-10 col-sm-offset-1">  
    <div class="row">
    <marquie><h3 class="text-muted text-center">ALLOCATE STOCKS</h3></marquie>
        <a href="#allocateModal" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Allocate stock</a>
        <?php
        flash();
        ?>
    </div>
    <div class="" style="height: 10px;">
    </div>
    <div class="row">
        <table id="myTable" class="table table-bordered table-hover table-striped table-responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Stock Item</th>
                    <th>Department</th>
                    <th>Due date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once('./db.php');
                // SQL query for stock table
                $sql = "SELECT * FROM request ORDER BY req_id DESC";

                $result = $conn->query($sql);
                $i = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $i . "</td>
                     
                        <td>" . $row['req_item'] . "</td>
                      
                        <td>" . $row['req_dept'] . "</td>
                        <td>" . $row['req_due_date'] . "</td>
                        <td>
                        <a href='#edit_" . $row['req_id'] . "' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>

                        </td>
                    </tr>";
                    $i++;
                    include('models/process_allocation.php');
                    include('models/add_deleteAllocate.php');
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
