<!-- process_allocation.php-->
<div class="modal fade" id="allocateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Allocate Stock</h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="./actions/__edit_allocatestock.php">

                <form id="allocationForm" action="process_allocation.php" method="post">

                    <!-- Your form fields go here -->

                    <div class="form-group">
                        <label for="department">DEPARTMENT:</label>
                        <select class="form-control" id="department" name="dept_id">
                            <?php
                            // Fetch departments from the database and populate the dropdown
                            $sqlDepartments = "SELECT dept_name FROM department";                                                      
                            $resultDepartments = $conn->query($sqlDepartments);

                            while ($rowDepartment = $resultDepartments->fetch_assoc()) {
                                echo "<option value='" . $rowDepartment['dept_name'] . "'>" . $rowDepartment['dept_name'] . "</option>";
                            }
                            ?>
                        </select>

                      </div>

                      <div class="form-group">
    <label for="requestedItem">Requested Item:</label>
    <select class="form-control" id="requestedItem" name="requestedItem">
        <?php
        // Fetch Stock_Item_name from the stock table
        $sqlStockItems = "SELECT Stock_Item_name FROM stock";
        $resultStockItems = $conn->query($sqlStockItems);

        while ($rowStockItem = $resultStockItems->fetch_assoc()) {
            echo "<option value='" . $rowStockItem['Stock_Item_name'] . "'>" . $rowStockItem['Stock_Item_name'] . "</option>";
        }
        ?>
    </select>
</div>
                    <div class="form-group">
                        <label for="allocatedAmount">Allocated Amount:</label>
                        <input type="text" class="form-control" id="allocatedAmount" name="allocatedAmount" required>
                    </div>
                  
                    <div class="form-group">
                        <label for="allocatedAmount">Category:</label>
                        <select class="form-control" id="requestedItemcat" name="requestedItemcat">
        <?php
        // Fetch Stock_Item_name from the stock table
        $sqlStockItems = "SELECT Stock_Item_cat FROM stock";
        $resultStockItems = $conn->query($sqlStockItems);

        while ($rowStockItem = $resultStockItems->fetch_assoc()) {
            echo "<option value='" . $rowStockItem['Stock_Item_cat'] . "'>" . $rowStockItem['Stock_Item_cat'] . "</option>";
        }
        ?>
    </select>
                    </div>

                    <div class="form-group">
                        <label for="allocatedAmount">Details:</label>
                        <input type="text" class="form-control" id="allocatedAmount" name="allocatedAmount" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Allocate</button>
                </form>
            </div>
        </div>
    </div>
</div>


