<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['req_id']; ?>" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit item request</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="./actions/__edit_reqModel.php">
                        <input type="hidden" class="form-control" name="req_id" value="<?php echo $row['req_id']; ?>">
                        
                        
                        
                        
                        <div class="row form-group">
                           
                        <div class="col-sm-2">
                                <label class="control-label modal-label">AMOUNT:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="req_amount"
                                       value="<?php echo $row['req_amount']; ?>">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">DUE DATE:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="req_due_date"
                                       value="<?php echo $row['req_due_date']; ?>">
                            </div>
                        </div>

                        


                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">STATUS:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="req_status"
                                       value="<?php echo $row['req_status']; ?>">
                           </div>
                        </div>
                    
                        

                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span
                            class="glyphicon glyphicon-remove"></span> Cancel
                </button>
                <button type="submit" name="edit" class="btn btn-success"><span
                            class="glyphicon glyphicon-check"></span> Update</a>
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
                <center><h4 class="modal-title" id="myModalLabel">Delete Request Item</h4></center>
            </div>
            <div class="modal-body">
                <p class="text-center">Are you sure you want to Delete</p>
                <h2 class="text-center"><?php echo $row['req_item']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="./actions/__delete_reqModel.php?req_id=<?php echo $row['req_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>
<!--end-->
