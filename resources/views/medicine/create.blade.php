<!-- Modal -->
<div class="modal fade" id="addNewMedicine" tabindex="-1" aria-labelledby="addNewMedicineLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-medicine text-white">
                <h5 class="modal-title" id="addNewMedicineLabel" style="font-size:16px!important">Add New
                    Medicine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('medicine.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Medicine Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Medicine Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cost">Medicine Cost <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="cost" name="cost"
                                    placeholder="Enter Medicine Price">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact">Contact <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="contact" name="contact"
                                    placeholder="Enter Medicine Contact">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Enter Medicine Address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pharmacy_name">Pharmacy Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="pharmacy_name" name="pharmacy_name"
                                    placeholder="Enter Pharmacy Name">
                            </div>
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
