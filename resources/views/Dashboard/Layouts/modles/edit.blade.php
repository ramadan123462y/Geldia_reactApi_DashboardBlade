<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ url('saller/dashboard/categories/update') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="text" class="id_model" value="" hidden name="id" id="">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label ">Name:</label>
                        <input type="text" name="name" value="" class="form-control name_model"
                            id="recipient-name">


                        <div class="form-check form-switch" style="margin-top: 10px;margin-bottom: 15px;">
                            <input class="form-check-input status_model"  type="checkbox" name="status"
                                role="switch" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">
                                Active</label>
                        </div>

                        <div class="input-group">
                            <img width="50px" height="50px" class="myImage" src="">

                        </div>

                        <div class="input-group">
                            <input type="file" class="form-control file_name_model" name="file_name" value=""
                                id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>
