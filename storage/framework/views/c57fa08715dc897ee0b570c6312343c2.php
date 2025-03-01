<div class="row">
    <?php if($transaction): ?>
        <div class="col-12">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>Transaction ID</th>
                        <td>:</td>
                        <td style="font-size:1rem;"><?php echo e(strtoupper($transaction->transaction_id)); ?></td>
                    </tr>
                    <tr>
                        <th>Client Name</th>
                        <td>:</td>
                        <td style="font-size:1rem;"><?php echo e($transaction->client_name); ?></td>
                    </tr>
                    <tr>
                        <th>Client Phone</th>
                        <td>:</td>
                        <td style="font-size:1rem;"><?php echo e($transaction->client_phone); ?></td>
                    </tr>
                    <tr>
                        <th>Transaction Type</th>
                        <td>:</td>
                        <td style="font-size:1rem;"><?php echo e($transaction->transaction_type); ?></td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td>:</td>
                        <td style="font-size:1rem;"><?php echo e($transaction->category); ?></td>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <td>:</td>
                        <td style="font-size:1rem;"><?php echo e($transaction->amount); ?></td>
                    </tr>
                    <tr>
                        <th>Is Refundable</th>
                        <td>:</td>
                        <td style="font-size:1rem;"><?php echo e(ucfirst($transaction->is_refundable)); ?></td>
                    </tr>
                    <tr>
                        <th>Refundable Amount</th>
                        <td>:</td>
                        <td style="font-size:1rem;"><?php echo e($transaction->refundable_amount); ?></td>
                    </tr>
                    <tr>
                        <th>Refunded Amount</th>
                        <td>:</td>
                        <td style="font-size:1rem;"><?php echo e($transaction->refunded_amount); ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>:</td>
                        <td style="font-size:1rem;"><?php echo e($transaction->status); ?></td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>:</td>
                        <td style="font-size:1rem;"><?php echo e(date('d M, Y', strtotime($transaction->created_at))); ?></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>:</td>
                        <td style="font-size:1rem;"><?php echo e($transaction->description); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="col-12">
            <p class="text-center text-danger">
                Trasaction Not Found!
            </p>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/transactions/transaction_details.blade.php ENDPATH**/ ?>