<!-- Modal -->
<div class="modal fade" id="addNewHospital" tabindex="-1" aria-labelledby="addNewHospitalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-hospital">
                <h5 class="modal-title" id="addNewHospitalLabel" style="font-size:16px!important">Add New Hospital</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('hospital.store')}}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Hospital Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Hospital Name">
                    </div>
                    <div class="form-group">
                        <label for="address">Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact">
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
