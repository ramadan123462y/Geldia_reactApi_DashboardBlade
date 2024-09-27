<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ url('saller/dashboard/categories/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" name="name" class="form-control" id="recipient-name">
                        <x-inline_alert name='name'></x-inline_alert>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Meta title:</label>
                        <input type="text" name="meta_title" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">


                        <label for="recipient-name" class="col-form-label">Meta descrip:</label>
                        <input type="text" name="meta_descrip" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Metakeywords:</label>
                        <input type="text" name="meta_keywords" class="form-control" id="recipient-name">
                    </div>



                    <div class="form-check form-switch" style="margin-top: 10px;margin-bottom: 15px;">
                        <input class="form-check-input" type="checkbox" name="status" role="switch"
                            id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">
                            Active</label>
                    </div>

                    <div class="input-group">
                        <input type="file" class="form-control" name="file_name" id="inputGroupFile04"
                            aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea class="form-control" name="description" id="message-text"></textarea>
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
