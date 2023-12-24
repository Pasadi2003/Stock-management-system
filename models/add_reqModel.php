<!-- add_reqModel.php-->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Request for stock</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="./actions/__add_reqModel.php">

                        <div class="form-group">
                       <label for="department" style="display: inline-block; width: 100px;">ITEM:</label>
    <select class="form-control" id="department" name="req_item" style="width: 430px; display: inline-block;">
         <?php
                            // Fetch departments from the database and populate the dropdown
                            $sqlDepartments = "SELECT stock_item_name FROM stock";
                            $resultDepartments = $conn->query($sqlDepartments);

                            while ($rowDepartment = $resultDepartments->fetch_assoc()) {
                                echo "<option value='" . $rowDepartment['stock_item_name'] . "'>" . $rowDepartment['stock_item_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>


 
                    <div class="form-group">
                       <label for="department" style="display: inline-block; width: 100px;">CATEGORY:</label>
    <select class="form-control" id="department" name="stock_item_cat" style="width: 430px; display: inline-block;">
         <?php
                            // Fetch departments from the database and populate the dropdown
                            $sqlDepartments = "SELECT stock_item_cat FROM stock";
                            $resultDepartments = $conn->query($sqlDepartments);

                            while ($rowDepartment = $resultDepartments->fetch_assoc()) {
                                echo "<option value='" . $rowDepartment['stock_item_cat'] . "'>" . $rowDepartment['stock_item_cat'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                      

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">AMOUNT:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" maxlength="50" name="req_amount" placeholder="Enter item amount" required>
                            </div>
                        </div>


                       <div class="form-group">
                       <label for="department" style="display: inline-block; width: 100px;">Department:</label>
    <select class="form-control" id="department" name="req_dept" style="width: 430px; display: inline-block;">
         <?php
                            // Fetch departments from the database and populate the dropdown
                            $sqlDepartments = "SELECT * FROM department";
                            $resultDepartments = $conn->query($sqlDepartments);

                            while ($rowDepartment = $resultDepartments->fetch_assoc()) {
                                echo "<option value='" . $rowDepartment['dept_name'] . "'>" . $rowDepartment['dept_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">DUE DATE :</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" maxlength="20" placeholder="Enter due date" name="req_due_date">
                            </div>
                        </div>

                      



                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
                    </form>
            </div>

        </div>
    </div>
</div>