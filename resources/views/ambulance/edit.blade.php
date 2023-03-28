<div class="modal fade" id="editAmbulance" tabindex="-1" aria-labelledby="editAmbulanceLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-ambulance">
                <h5 class="modal-title" id="editAmbulanceLabel" style="font-size:16px!important">Update Ambulance
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('ambulance.update')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="number" name="id" id="editId" class="d-none">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Driver Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="editName" name="driver_name"
                                    placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact">Contact Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="editContact" name="contact"
                                    placeholder="Enter Contact">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="editAddress" name="address"
                                    placeholder="Enter Address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ambulance_number">Ambulance Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="editAmbulanceNumber" name="ambulance_number"
                                    placeholder="Enter ambulance number">
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
