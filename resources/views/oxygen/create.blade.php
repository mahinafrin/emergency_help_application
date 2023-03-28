<!-- Modal -->
<div class="modal fade" id="addNewoxygen" tabindex="-1" aria-labelledby="addNewoxygenLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="addNewoxygenLabel" style="font-size:16px!important">Add New
                    Oxygen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('oxygen.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="quantity">Quantity (ML)<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="quantity" name="quantity" required
                            placeholder="Enter quantity">
                    </div>
                    <div class="form-group">
                        <label for="price">Cost <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" required id="price" name="price"
                            placeholder="Enter Cost">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact">
                    </div>
                    <div class="form-group">
                        <label for="location">Location <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="location" required name="location"
                            placeholder="Enter location">
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
