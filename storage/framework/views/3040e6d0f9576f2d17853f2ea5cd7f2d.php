<div class="" id="supportdocs">
    <div class="multisteps-form__panel shadow p-4 rounded" data-animation="scaleIn">

        <div class="multisteps-form__content">
            <div class="form-row">
                <div class="col-12">
                    <div class="list-group mt-2">
                        

                        <div id="required-attachments" style="height:auto; overflow-x:auto;">
                            <p class="border-design"><span class="ms-2" style="font-size: 19px;">Upload
                                    Documents</span> <span class="ms-4 text-danger fw-bold">N.B: You can upload multiple
                                    files at a time. Limit: 3 files.</span> </p>

                            <div class="document-section ms-5">
                                <!-- University Specific Documents -->
                                <div class="document-item">
                                    <span class="title"> <span class="text-danger me-1"
                                            style="font-size: 1.25rem; line-height:0;">*</span>
                                        University Specific Documents:</span>
                                    <p class="fw-bold d-inline mt-2" style="margin-top: 20px !important;">Document
                                        format: *jpg, *jpeg</p>
                                    <button class="btnn ms-2"
                                        onclick="document.getElementById('universitySpecific').click()">Add
                                        Document</button>
                                    <input type="file" multiple id="universitySpecific" accept=".jpg,.jpeg"
                                        style="display:none;"
                                        onchange="displayFilename(this, 'universitySpecificList')">
                                </div>
                                <ul id="universitySpecificList" class="list-unstyled mt-2"></ul>

                                <!-- Supporting Documents -->
                                <div class="document-item">
                                    <span class="title"><span class="text-danger me-1"
                                            style="font-size: 1.25rem; line-height:0;">*</span> Supporting
                                        Documents:</span>
                                    <p class="fw-bold d-inline mt-2" style="margin-top: 20px !important;">Document
                                        format: *jpg, *jpeg</p>
                                    <button class="btnn ms-2"
                                        onclick="document.getElementById('supporting').click()">Add Document</button>
                                    <input type="file" multiple id="supporting" accept=".jpg,.jpeg"
                                        style="display:none;" onchange="displayFilename(this, 'supportingList')">
                                </div>
                                <ul id="supportingList" class="list-unstyled mt-2"></ul>

                                <!-- Background Documents -->
                                <div class="document-item">
                                    <span class="title"><span class="text-danger me-1"
                                            style="font-size: 1.25rem; line-height:0;">*</span> Background
                                        Documents:</span>
                                    <p class="fw-bold d-inline mt-2" style="margin-top: 20px !important;">Document
                                        format: *jpg, *jpeg</p>
                                    <button class="btnn ms-2"
                                        onclick="document.getElementById('background').click()">Add Document</button>
                                    <input type="file" multiple id="background" accept=".jpg,.jpeg"
                                        style="display:none;" onchange="displayFilename(this, 'backgroundList')">
                                    </div>
                                    <ul id="backgroundList" class="list-unstyled mt-2"></ul>

                                <!-- Basic Documents -->
                                <div class="document-item">
                                    <span class="title"><span class="text-danger me-1"
                                            style="font-size: 1.25rem; line-height:0;">*</span> Basic Documents:</span>
                                    <p class="fw-bold d-inline mt-2" style="margin-top: 20px !important;">Document
                                        format: *jpg, *jpeg</p>
                                    <button class="btnn ms-2" onclick="document.getElementById('basic').click()">Add
                                        Document</button>
                                    <input type="file" multiple id="basic" accept=".jpg,.jpeg"
                                        style="display:none;" onchange="displayFilename(this, 'basicList')">
                                    </div>
                                    <ul id="basicList" class="list-unstyled mt-2"></ul>
                                <!-- Study Plan Documents -->
                                <div class="document-item">
                                    <span class="title"><span class="text-danger me-1"
                                            style="font-size: 1.25rem; line-height:0;">*</span> Study Plan
                                        Documents:</span>
                                    <p class="fw-bold d-inline mt-2" style="margin-top: 20px !important;">Document
                                        format: *jpg, *jpeg</p>
                                    <button class="btnn ms-2" onclick="document.getElementById('study').click()">Add
                                        Document</button>
                                    <input type="file" multiple id="study" accept=".jpg,.jpeg"
                                        style="display:none;" onchange="displayFilename(this, 'studyList')">
                                    </div>
                                    <ul id="studyList" class="list-unstyled mt-2"></ul>

                                <!-- Other Documents -->
                                <div class="document-item">
                                    <span class="title"><span class="text-danger me-1"
                                            style="font-size: 1.25rem; line-height:0;">*</span> Other Documents:</span>
                                    <p class="fw-bold d-inline mt-2" style="margin-top: 20px !important;">Document
                                        format: *jpg, *jpeg</p>
                                    <button class="btnn ms-2" onclick="document.getElementById('other').click()">Add
                                        Document</button>
                                    <input type="file" multiple id="other" accept=".jpg,.jpeg"
                                        style="display:none;" onchange="displayFilename(this, 'otherList')">

                                    </div>
                                    <ul id="otherList" class="list-unstyled mt-2"></ul>
                            </div>


                            <!-- Add more document types similarly... -->
                            <div class="button-row d-flex my-4">
                                <button class="btn btn-secondary js-btn-prev" type="button" title="Prev">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Previous
                                </button>

                                <button class="btn btn-primary btn-sm-bg js-btn-next ml-auto" type="button"
                                    title="Next">Next
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<script>
    function displayFilename(input, listId) {
        const fileList = document.getElementById(listId);
        const maxFiles = 3;

        let currentFiles = Array.from(input.files);
        let totalFiles = fileList.childElementCount + currentFiles.length;

        if (totalFiles > maxFiles) {
            alert('You can only upload up to 3 files in total.');
            input.value = '';
            return;
        }

        let formData = new FormData();

        currentFiles.forEach(file => {

            const li = document.createElement('li');
            li.style.margin = '10px 0';
            li.innerHTML =
                `${file.name} Uploaded. <button style="border: none;padding: 2px 10px;border-radius: 3px; background-color: white; color: red;" class="ms-2" onclick="deleteFile(this)">X</button>`;
            fileList.appendChild(li);


            formData.append('files[]', file);
        });

        var applicationId = '<?php echo e($id); ?>';
        formData.append('category', input.id);


        $.ajax({
            url: '/add-attachment/upload/' + applicationId,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.code === 0) {
                    alert(response.msg);
                } else {
                    alert(response.err);
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function deleteFile(button) {
        const li = button.parentElement;
        const fileName = li.innerText.split(' Uploaded.')[0];

        if (confirm(`Are you sure you want to delete ${fileName}?`)) {
            const applicationId = '<?php echo e($id); ?>'; // Application ID from backend

            // AJAX to delete file
            $.ajax({
                url: '/delete-attachment/' + applicationId,
                method: 'POST',
                data: {
                    file_name: fileName,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    if (response.code === 0) {
                        li.remove(); // Remove the file from UI
                        alert(response.msg);
                    } else {
                        alert(response.err);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    }
</script>

<style>
    .document-section {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .document-item {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .title {
        display: inline-block;
        width: 250px;
        font-weight: bold;
        text-align: right;
        margin-right: 10px;
        color: #959596;
    }

    .border-design {
        position: relative;
        padding: 5px;
        border-left: 5px solid rgba(0, 123, 255, 0.7);
        /* border-bottom: 1px solid #a2a3a4; */
    }

    .btnn {
        padding: 2px 7px;
        border: 1px solid rgba(0, 123, 255, 0.7);
        font-size: 14px;
        background: white;
        color: rgba(0, 123, 255, 0.7);
    }
</style>
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Frontend/university/apply-parts/document-panel.blade.php ENDPATH**/ ?>