<!--add_stockModel.php-->
<div class="modal fade" id="addstocknew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New STOCK</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="./actions/__add_stockModel.php">
                    
                    
                    
                    <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">STOCK:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" maxlength="20" name="stock_name" placeholder="Enter stock name" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">STOCK EXP:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" maxlength="50" name="stock_exp" placeholder="Enter stock category" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">STOCK CATEGORY:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  name="stock_cat" placeholder="Enter stock category" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">AMOUNT:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" maxlength="20" name="amount" placeholder="Enter stock amount" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">SUPPLIER:</label>
                            </div>
                            <div class="col-sm-10">
                                <?php
                                    require_once './db.php';  
                                    $sql = "SELECT * FROM `supplier`";
                                    $query = $conn->query($sql);
                                    echo "<select class='form-control' id='supplier' name='supplier'>";
                                    while ($row = $query->fetch_assoc()) {
                                        echo "<option value='" . $row['supplier_name'] . "'>" . $row['supplier_name'] . "</option>";
                                    }
                                    echo "</select>";
                                    $conn->close();
                                ?>
                            </div>
                            
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">SUPPLIED DATE:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" maxlength="20" name="date" placeholder="Enter stock amount" required>
                            </div>
                        </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
            </div>

            </form>
        </div>
    </div>
</div>
