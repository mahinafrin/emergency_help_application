<!-- Modal -->
<div class="modal fade" id="addHelper" tabindex="-1" aria-labelledby="addHelperLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-helper">
                <h5 class="modal-title" id="addHelperLabel" style="font-size:16px!important">Add New Social Worker
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('helper.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="group_name">Group Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="group_name" name="group_name"
                                    placeholder="Group Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact">Contact <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="contact" name="contact"
                                    placeholder="Contact">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="about_help">Details <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="about_help" name="about_help"
                                    placeholder="Details"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
