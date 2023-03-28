<!-- Modal -->
<div class="modal fade" id="addNewAmbulance" tabindex="-1" aria-labelledby="addNewAmbulanceLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-ambulance">
                <h5 class="modal-title" id="addNewAmbulanceLabel" style="font-size:16px!important">Add New Ambulance
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('ambulance.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Driver Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="driver_name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact">Contact Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="contact" name="contact"
                                    placeholder="Enter Contact">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Enter Address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ambulance_number">Ambulance Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="ambulance_number" name="ambulance_number"
                                    placeholder="Enter ambulance number">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
