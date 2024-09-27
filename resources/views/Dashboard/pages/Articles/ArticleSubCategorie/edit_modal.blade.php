<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div  class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ url('dashboard/article-subcategorie/update') }}" enctype="multipart/form-data">
                @csrf


                <div class="modal-body">
                    <input type="hidden" name="idarticlesubcategorie_id" class="id_articlecategorie_modal">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" required name="name" class="form-control name_articlecategorie_modal"
                            id="recipient-name">
                        <x-inline_alert name='name'></x-inline_alert>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label ">Categories:</label>
                        <select class="form-select categorieid_articlecategorie_modal" required
                            name="articlecategorie_id" aria-label="Default select example">
                            <option readonly disabled>Open this select menu</option>

                            @foreach ($articleCategories as $articleCategorie)
                                <option value="{{ $articleCategorie->id }}">{{ $articleCategorie->name }}</option>
                            @endforeach

                        </select>
                        <x-inline_alert name='articlecategorie_id'></x-inline_alert>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Small Descreption</span>
                        <textarea class="form-control descreption_model" name="descreption" aria-label="With textarea"></textarea>
                      </div>

                    <div class="mb-3" style="display: flex;justify-content: space-between;margin-top: 30px;">
                        <label for="formFileLg" class="form-label">Image:</label>
                        <input class="form-control form-control-lg formFileLg" id="formFileLg"
                            style="width: 533.6px; height: 37.6px;" name="image_name" type="file">
                        <img style="width: 79.6px; height: 79.6px;"
                            src="{{ URL::asset('Backend/Uploades/Users/profile.png') }}"
                            class="img-thumbnail image_name_modal" alt="Image User">
                        <x-inline_alert name='image_name'></x-inline_alert>
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
