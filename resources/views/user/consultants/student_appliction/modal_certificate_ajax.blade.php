<div class="modal fade" id="certificateModal{{ $application->id }}" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="audioModalLabel" style="color: black">Application ID: {{ @$application->application_code }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{ route('frontend.application-status', $application->id) }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="col-md-12">
                    <label class="title"><b>Change Status</b></label>
                    <select name="status" class="form-control">
                        
                        <option @if ($application->status == 1) Selected @endif value="1">Processing</option>
                        <option @if ($application->status == 2) Selected @endif value="2">Approved</option>
                        <option @if ($application->status == 3) Selected @endif value="3">Cancel</option>
                        <option @if ($application->status == 4) Selected @endif value="4">Not Submitted</option>
                        <option @if ($application->status == 5) Selected @endif value="5">Submitted</option>
                        <option @if ($application->status == 6) Selected @endif value="6">Pending</option>
                        <option @if ($application->status == 7) Selected @endif value="7">E-documents Qualified</option>
                        <option @if ($application->status == 8) Selected @endif value="8">Waiting Processing</option>
                        <option @if ($application->status == 9) Selected @endif value="9">Processing</option>
                        <option @if ($application->status == 10) Selected @endif value="10">More Documents Needed</option>
                        <option @if ($application->status == 11) Selected @endif value="11">Re-Submitted</option>
                        <option @if ($application->status == 12) Selected @endif value="12">Rejected</option>
                        <option @if ($application->status == 13) Selected @endif value="13">Transferred</option>
                        <option @if ($application->status == 14) Selected @endif value="14">Accepted</option>
                        <option @if ($application->status == 15) Selected @endif value="15">E-offer Delivered</option>
                        <option @if ($application->status == 16) Selected @endif value="16">Offer Delivered</option>
                </select>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" >Update</button>
            </div>
        </form>
    </div>
    </div>
</div>