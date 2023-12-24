<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['req_id']; ?>" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Allocate Items to branches</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="./actions/__edit_allocatestock.php">
                        <input type="hidden" class="form-control" name="req_id" value="<?php echo $row['req_id']; ?>">
                        
                        <div class="form-group">
                            <label for="req_item">ITEM:</label>
                            <input type="text" class="form-control" id="req_item_<?php echo $row['req_id']; ?>" name="req_item" >
                        </div>

                        <div class="form-group">
                            <label for="req_id_dropdown">Select REQ ID:</label>
                            <select class="form-control" id="req_id_dropdown" name="req_id">
                                <?php
                                $sqlRequestList = "SELECT req_id, req_item FROM request";
                                $resultRequestList = $conn->query($sqlRequestList);

                                while ($rowRequestList = $resultRequestList->fetch_assoc()) {
                                    echo "<option value='" . $rowRequestList['req_id'] . "'>" . $rowRequestList['req_id'] . " - " . $rowRequestList['req_item'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="req_item">REQ ID:</label>
                            <input type="text" class="form-control" id="req_item_id_<?php echo $row['req_id']; ?>" name="req_id2" >
                        </div>

                        <div class="form-group">
                            <label for="req_amount">AMOUNT:</label>
                            <input type="text" class="form-control" id="req_amount_<?php echo $row['req_id']; ?>" name="req_amount" >
                        </div>

                        
                        <div class="form-group">
                            <label for="req_status">CATEGORY:</label>

                            
                            <input type="text" class="form-control" id="req_item_cat_<?php echo $row['req_id']; ?>" name="req_item_cat" >
                        </div>

                        <div class="form-group">
                            <label for="req_status">DETAILS:</label>
                            <input type="text" class="form-control" id="req_item_exp_<?php echo $row['req_id']; ?>" name="req_item_exp" >
                        </div>

                        <div class="form-group">
                            <label for="req_dept">DEPARTMENT:</label>
                            <input type="text" class="form-control" id="req_dept_<?php echo $row['req_id']; ?>" name="req_dept" >
                        </div>

                        <div class="form-group">
                            <label for="req_dept">DEPARTMENT ID:</label>
                            <input type="text" class="form-control" id="req_dept_id_<?php echo $row['req_id']; ?>" name="req_dept_id" >
                        </div>

                       

                        <div class="form-group">
                            <label for="req_status">STATUS:</label>
                            <input type="text" class="form-control" id="req_status_<?php echo $row['req_id']; ?>" name="req_status" >
                        </div>


                        <div class="form-group">
                         
                                <?php
                                $selectedReqId = $row['req_id'];
                                $sqlRequestDetails = "SELECT req_id, req_item, req_amount, req_dept, req_status, req_item_cat, req_item_exp, req_dept_id FROM request WHERE req_id = $selectedReqId";
                                $resultRequestDetails = $conn->query($sqlRequestDetails);

                                // Display details in the dropdown list
                                while ($rowRequestDetails = $resultRequestDetails->fetch_assoc()) {
                                    // Set the values of req_item, req_amount, and req_dept in the text boxes
                                    echo "<script>
                                    document.getElementById('req_item_id_$selectedReqId').value = '" . $rowRequestDetails['req_id'] . "';

                                            document.getElementById('req_item_$selectedReqId').value = '" . $rowRequestDetails['req_item'] . "';
                                            document.getElementById('req_amount_$selectedReqId').value = '" . $rowRequestDetails['req_amount'] . "';
                                            document.getElementById('req_item_cat_$selectedReqId').value = '" . $rowRequestDetails['req_item_cat'] . "';
                                            document.getElementById('req_item_exp_$selectedReqId').value = '" . $rowRequestDetails['req_item_exp'] . "';

                                            document.getElementById('req_dept_$selectedReqId').value = '" . $rowRequestDetails['req_dept'] . "';
                                           
                                            document.getElementById('req_status_$selectedReqId').value = '" . $rowRequestDetails['req_status'] . "';
                                            document.getElementById('req_dept_id_$selectedReqId').value = '" . $rowRequestDetails['req_dept_id'] . "';

                                          
                                          </script>";
                                }
                                ?>
                           
                        </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span
                            class="glyphicon glyphicon-remove"></span> Cancel
                </button>
                <button type="submit" name="edit" class="btn btn-success"><span
                            class="glyphicon glyphicon-check"></span> Update</button>

                            <button type="submit" name="add_to_branch" class="btn btn-primary" formaction="./actions/__add_to_branch.php"><span class="glyphicon glyphicon-plus"></span> Add to Branch</button>


                            </form>
                            
            </div>

        </div>
    </div>
</div>



<!--Delete  Item Modal begin-->
<div class="modal fade" id="delete_<?php echo $row['req_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Item</h4></center>
            </div>
            <div class="modal-body">
                <p class="text-center">Are you sure you want to Delete</p>
                <h2 class="text-center"><?php echo $row['req_item']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="./actions/__delete_reqModel.php?req_item=<?php echo $row['req_item']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>
<!--end-->
