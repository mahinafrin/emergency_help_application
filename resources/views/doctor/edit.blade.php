<!-- Modal -->
<div class="modal fade" id="editDoctor" tabindex="-1" aria-labelledby="editDoctorLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="editDoctorLabel" style="font-size:16px!important">Update Doctor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('doctor.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="number" class="form-control d-none" id="editId" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="editName" name="name"
                                    placeholder="Enter name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="editEmail" name="email"
                                    placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editAddress">Address</label>
                                <input type="text" class="form-control" id="editAddress" name="address"
                                    placeholder="Enter address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editPhone">Phone</label>
                                <input type="text" class="form-control" id="editPhone" name="phone"
                                    placeholder="Enter phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editSpecialist">Specialist</label>
                                <input type="text" class="form-control" id="editSpecialist" name="specialist"
                                    placeholder="Enter specialist">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="editDetails">Details</label>
                                <textarea class="form-control" id="editDetails" name="details"
                                    placeholder="Enter details"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" value=""
                                    placeholder="Enter password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Confirm password">
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
