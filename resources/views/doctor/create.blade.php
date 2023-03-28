<!-- Modal -->
<div class="modal fade" id="addNewDoctor" tabindex="-1" aria-labelledby="addNewDoctorLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addNewDoctorLabel" style="font-size:16px!important">Add New Doctor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('doctor.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" required
                                    placeholder="Enter name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" required name="email"
                                    placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" required id="address" name="address"
                                    placeholder="Enter address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" required id="phone" name="phone"
                                    placeholder="Enter phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="specialist">Specialist <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" required id="specialist" name="specialist"
                                    placeholder="Enter specialist">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Details">Details <span class="text-danger">*</span></label>
                                <textarea class="form-control" required id="details" name="details"
                                    placeholder="Enter details"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" required
                                    placeholder="Enter password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password_confirmation" required
                                    name="password_confirmation" placeholder="Confirm password">
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
