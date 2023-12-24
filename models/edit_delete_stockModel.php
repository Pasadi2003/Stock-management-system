<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['stock_id']; ?>" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Item Details</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="./actions/__edit_stockModel.php">
                        <input type="hidden" class="form-control" name="stock_id" value="<?php echo $row['stock_id']; ?>">
                        
                        
                        
                        
                        <div class="row form-group">
                           
                        <div class="col-sm-2">
                                <label class="control-label modal-label">STOCK:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="stock_name"
                                       value="<?php echo $row['Stock_Item_name']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">CATEGORY:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="stock_cat"
                                       value="<?php echo $row['Stock_Item_cat']; ?>">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">AMOUNT:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="amount"
                                       value="<?php echo $row['Amount']; ?>" >
                                <?php //$conn->close();?>
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">DETAIL:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="stock_exp"
                                       value="<?php echo $row['Stock_Item_detail']; ?>">
                           </div>
                        </div>
                    
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">SUPPLIED ON:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date"
                                       value="<?php echo $row['Stock_supplied_date']; ?>" readonly>
                                <?php //$conn->close();?>
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
<div class="modal fade" id="delete_<?php echo $row['stock_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Item</h4></center>
            </div>
            <div class="modal-body">
                <p class="text-center">Are you sure you want to Delete</p>
                <h2 class="text-center"><?php echo $row['stock_name']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="./actions/__delete_stockModel.php?stock_id=<?php echo $row['stock_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>
<!--end-->
