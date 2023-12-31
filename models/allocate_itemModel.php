<!--allocate_itemModel.php.php-->
<!-- Add New -->
<div class="modal fade" id="allocate_<?php echo $row['item_id'] ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Allocate Item</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="./actions/__allocate_itemModel.php">
                        <!--div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">ITEM:</label>
                            </div>
                            <div class="col-sm-10"-->
                               <!-- <input type="hidden" class="form-control" maxlength="20" name="item_id"  value="<?php echo $row['item_id'] ;?>">
                            /div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">CATEGORY</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" maxlength="20" name="category" placeholder="enter category" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">DETAILS:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" maxlength="255" placeholder="enter item details" name="details" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">BILL NO:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" maxlength="30" placeholder="enter Bill no" name="bill_no">
                            </div>
                        </div-->
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">CHOOSE DEPARTMENT:</label>
                            </div>
                            <div class="col-sm-10">
                                <!--begin option-->
                                <?php
                                //code for fetching the suppliers' information
                                require_once './db.php';
                                $sql = "SELECT * FROM `department` WHERE  `dept_id` <> '1'";

                                $query = $conn->query($sql);
                                echo "<select class='form-control id='dept_id' name='dept_id'>";
                                while($row = $query->fetch_assoc()){
                                    echo"<option value='".$row['dept_id']."'>".$row['dept_name']."'</option>";
                                }
                                echo"</select>";
                                //$conn->close();
                                ?>
                                <!--end-->
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">AMOUNT:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" maxlength="255" placeholder="Enter the number of stock" name="amount" required>
                            </div>
                        </div>
                        
                        
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Allocate</a></button>
                    </form>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            
            <script>
$(document).ready(function () {
    $('#allocateButton').on('click', function () {
        var selectedDept = $('#dept_id').val();
        var amountToAllocate = $('#amount').val();
        var stockId = $('#stockId').val();  // Use the correct ID from the modal
        var stockName = $('#stockName').val();  // Use the correct name from the modal

        $.ajax({
            url: '../check_stock.php',
            method: 'POST',
            data: { dept_id: selectedDept, amount: amountToAllocate },
            success: function (response) {
                if (response === 'success') {
                    $.ajax({
                        url: '../allocate_stock.php',
                        method: 'POST',
                        data: { dept_id: selectedDept, allocatedAmount: amountToAllocate, stock_id: stockId, stock_name: stockName },
                        success: function (updateResponse) {
                            if (updateResponse === 'updated') {
                                alert('Stock allocated successfully!');
                                $('#allocateModal').modal('hide');  // Close the modal
                                location.reload();
                            } else {
                                alert('Error allocating stock.');
                            }
                        }
                    });
                } else {
                    alert('Not enough stock available');
                }
            }
        });
    });
});
