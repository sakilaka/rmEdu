<div class="col-lg-6">
    <div class="form-group">
        <label for="address"><b><?php echo e($order); ?>. <?php echo e(__( $document->document_name )); ?></b></label>
        <input type="file" class="mt-3 mb-3" name="old_document_file[<?php echo e($document->id); ?>]" value="<?php echo e($document->document_file); ?>"/>
        <div class="row">
            <div class="col-md-5">
                <button style="margin-left: 18px" type="button" data-toggle="modal" data-target="#certificateModal<?php echo e($document->id); ?>" class="btn btn-primary"><i class="fa fa-solid fa-eye"></i> Details</button>
            </div>
        </div>
    </div>
</div>
							
							
<!-- Modal -->
<div class="modal fade" id="certificateModal<?php echo e($document->id); ?>" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="audioModalLabel" style="color: black"><?php echo e($document->document_name); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <?php if($document->extensions == 'pdf'): ?>
            <iframe src="<?php echo e($document->document_file_show); ?>" width="100%" height="500"></iframe>
        <?php else: ?>
        <img src="<?php echo e($document->document_file_show); ?>" alt="image" style="height: 300px; width:450px">
        <?php endif; ?>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div><?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Backend/student_appliction/ajax_document_load.blade.php ENDPATH**/ ?>