<!-- Modal -->
<div class="modal fade" id="addNewblood" tabindex="-1" aria-labelledby="addNewbloodLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="addNewbloodLabel" style="font-size:16px!important">Add New Blood Group</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('blood.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Donner Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" required name="donner_name"
                                    placeholder="Enter Donner Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="blood_group">Blood Group <span class="text-danger">*</span></label>
                                <select name="blood_group" id="blood_group" class="form-control" style="cursor:pointer">
                                    <option style="cursor:pointer" value="">Select Blood Group</option>
                                    <option style="cursor:pointer" value="A+">A+</option>
                                    <option style="cursor:pointer" value="A-">A-</option>
                                    <option style="cursor:pointer" value="B+">B+</option>
                                    <option style="cursor:pointer" value="B-">B-</option>
                                    <option style="cursor:pointer" value="AB+">AB+</option>
                                    <option style="cursor:pointer" value="AB-">AB-</option>
                                    <option style="cursor:pointer" value="O+">O+</option>
                                    <option style="cursor:pointer" value="O-">O-</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="phone" required name="phone"
                                    placeholder="Enter Donner phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" required name="address"
                                    placeholder="Enter address">
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
