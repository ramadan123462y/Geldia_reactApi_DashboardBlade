<div class="modal fade" id="add"data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="my-form" action="{{ url('dashboard/article/store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Title:</label>
                        <input type="text" name="main_title" class="form-control " value="{{ old('main_title') }}"
                            id="recipient-name">
                        <x-inline_alert name='title'></x-inline_alert>
                    </div>
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Is New </label>
                        <div class="col-sm-10">
                            <input type="date" name="is_new" value="{{ old('is_new') }}" class="form-control">
                        </div>
                    </div>

                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Most famous </legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="most_famous" id="gridRadios1"
                                    value="1">
                                <label class="form-check-label" for="gridRadios1">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="most_famous" id="gridRadios2"
                                    value="0" checked>
                                <label class="form-check-label" for="gridRadios2">
                                    No
                                </label>
                            </div>


                        </div>
                    </fieldset>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Show In Home Page </legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="home_page" id="home_page1"
                                    value="1">
                                <label class="form-check-label" for="home_page1">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="home_page" id="home_page2"
                                    value="0" checked>
                                <label class="form-check-label" for="home_page2">
                                    No
                                </label>
                            </div>

                        </div>
                    </fieldset>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">SubCategorie:</label>
                        <select class="form-select" required name="articlesubcategorie_id"
                            aria-label="Default select example">
                            <option readonly disabled>Open this select menu</option>

                            @foreach ($subCategories as $subCategorie)
                                <option @selected($subCategorie->id == old('articlesubcategorie_id')) value="{{ $subCategorie->id }}">
                                    {{ $subCategorie->name }}
                                </option>
                            @endforeach

                        </select>
                        <x-inline_alert name='articlesubcategorie_id'></x-inline_alert>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">User:</label>


                        <select class="form-select" aria-label="select example" name="user_id" required>
                            <option selected disabled>Open this select menu</option>
                            @foreach ($users as $user)
                                <option @selected($user->id == old('user_id')) value="{{ $user->id }}">{{ $user->name }}
                                </option>
                            @endforeach
                        </select>

                        <x-inline_alert name='user_id'></x-inline_alert>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Sub Users:</label>


                        <select class="form-select" multiple aria-label="multiple select example" name="sub_user_ids[]">
                            <option selected disabled>Open this select menu</option>
                            @foreach ($users as $user)
                                <option
                                    {{ in_array($user->id, (array) old('sub_user_ids', []) ?? []) ? 'selected' : '' }}
                                    value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>

                        <x-inline_alert name='sub_user_ids'></x-inline_alert>
                    </div>
                    <label for="recipient-name" class="col-form-label">Descreption :</label>
                    <div class="mb-3 parent_text_editor sortable"
                        style="display: flex;justify-content: space-between;align-items: center;margin-right: -10px;flex-wrap: wrap;">

                        {{-- __________________________________ strat row --}}
                        <div style="width: 100%;display: flex;justify-content: space-between;align-items: center"
                            class="main_row">
                            <div class="row rounded"
                                style="background: #8080801a;margin-bottom: 20px;width: 1000px;margin-left: 0px;">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default" name="title[]"
                                        aria-describedby="inputGroup-sizing-default">
                                </div>
                                <textarea name="froala_content[]" id="editor" class="editor"></textarea>
                            </div>

                            <div class="actions" style="display: flex;flex-direction: column;">

                                <input type="number" name="order[]" min="1" value="1"  class="form-control order"
                                    style="width: 75.6px;margin-bottom: 40px;margin-top: 0px;">


                                <button type="button" style="height: 50px;margin-bottom: 10px;"
                                    class="btn btn-outline-primary add_row">Add</button>
                                <button type="button" style="height: 50px;"
                                    class="btn btn-outline-danger delete_row">Delete</button>

                            </div>

                        </div>


                        {{-- __________________________________ strat row --}}


                    </div>
                    <div class="mb-3">
                        <div>
                            <label for="formFileLg" class="form-label"> Image:</label>
                            <input class="form-control form-control-lg" id="formFileLg" name="image_file"
                                type="file">
                            <x-inline_alert name='image_file'></x-inline_alert>
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Choose One </legend>
                        <div class="col-sm-10">

                            {{-- _____________________________ --}}
                            <div class="form-check">
                                <input class="form-check-input options" type="radio" name="option" id="banner"
                                    value="banner">
                                <label class="form-check-label" for="banner">
                                    Banner
                                </label>
                            </div>

                            {{-- _____________________________ --}}

                            {{-- _____________________________ --}}
                            <div class="form-check">
                                <input class="form-check-input options" type="radio" name="option" id="gallery"
                                    value="gallery">
                                <label class="form-check-label" for="gallery">
                                    Gallery
                                </label>
                            </div>

                            {{-- _____________________________ --}}
                            {{-- _____________________________ --}}
                            <div class="form-check">
                                <input class="form-check-input options" type="radio" name="option" id="video"
                                    value="video">
                                <label class="form-check-label" for="video">
                                    Video
                                </label>
                            </div>

                            {{-- _____________________________ --}}

                            {{-- _____________________________ --}}
                            <div class="form-check">
                                <input class="form-check-input options" type="radio" name="option"
                                    id="before_after" value="before_after">
                                <label class="form-check-label" for="before_after">
                                    Before After
                                </label>
                            </div>

                            {{-- _____________________________ --}}





                            {{-- ||||||||||||| --}}
                        </div>
                    </fieldset>
                    <div class="mb-3" style="margin-top: 40px;">
                        {{-- ||||||||||||| --}}

                        <div class="row mb-3 banner d-none">
                            <label for="inputNumber" class="col-sm-2 col-form-label"> Upload Banner</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="formFile" name="banner">
                            </div>
                        </div>
                        {{-- ||||||||||||| --}}
                        {{-- ||||||||||||| --}}
                        <div class="row mb-3 gallery d-none">
                            <label for="inputNumber" class="col-sm-2 col-form-label"> Upload Gallery</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="formFile" multiple name="gallery[]">
                            </div>
                        </div>
                        {{-- ||||||||||||| --}}
                        {{-- ||||||||||||| --}}
                        <div class="row mb-3 video d-none">
                            <label class="col-sm-2 col-form-label"> Upload Video</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="file" name="video">
                            </div>
                            <fieldset class="col-4 row mb-3">
                                <legend class="col-form-label col-sm-8 pt-0">Show In Home Page </legend>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="video_home_page"
                                            id="home_page_video1" value="1">
                                        <label class="form-check-label" for="home_page_video1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="video_home_page"
                                            id="home_page_video2" value="0" checked>
                                        <label class="form-check-label" for="home_page_video2">
                                            No
                                        </label>
                                    </div>

                                </div>
                            </fieldset>

                        </div>
                        {{-- ||||||||||||| --}}


                        {{-- ||||||||||||| --}}

                        <div class="before_after d-none">

                            <div class="row mb-3 ">
                                <label for="inputNumber" class="col-sm-2 col-form-label"> Upload Before</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="formFile" name="before">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label"> Upload After</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="formFile" name="after">
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit_add">Submit</button>
                    <div id="loading" style="display: none;"> Loading...</div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        function hideFroalaMessage() {
            $('div[style="z-index:9999;width:100%;position:relative"]').hide();
        }

        hideFroalaMessage();

        $(document).on('click keyup', function() {
            hideFroalaMessage();
        });
    });
</script>
