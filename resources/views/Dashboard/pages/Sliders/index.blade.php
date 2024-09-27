@extends('Dashboard.Layouts.Master')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('DataTable/dataTables.bootstrap5.min.css') }}">


    <script src="{{ URL::asset('DataTable/jquery-3.7.0.js') }}"></script>
    <script src="{{ URL::asset('DataTable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('DataTable/dataTables.bootstrap5.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": false
            });
        });
    </script>
@endsection
@section('title_page')
    Slider
@endsection
@section('one')
    Slider
@endsection
@section('two')
    Slider
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <div class="data_buttons">
                            <h5 class="card-title">Slider Card </h5>

                            {{-- _______________________________ start Button _______________________________ --}}


                            <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#add"
                                data-bs-whatever="@mdo">Add Slider</a>


                            {{-- _______________________________ end Button _______________________________ --}}
                        </div>
                        {{-- _______________________________ Alert _______________________________ --}}


                        <x-alerts></x-alerts>

                        {{-- _______________________________ Alert _______________________________ --}}


                        <!-- Image Gallery -->
                        <div class="mt-4">
                            <h5>Image Slider</h5>
                            <div class="row">

                                @foreach ($sliders as $slider)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img src="{{ URL::asset('Backend/Uploades/Sliders/' . $slider->image_name) }}"
                                                class="card-img-top" alt="Image 1"style="height: 261.800px;">
                                            <div class="card-body"
                                                style="padding-top: 20px;padding-left: 0px;padding-right: 0px;display: flex;justify-content: space-around;">
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#edit"
                                                    data-image_name_btn="{{ $slider->image_name }}"
                                                    data-id_btn="{{ $slider->id }}"
                                                    class="btn btn-outline-warning edit_btn">Edit</button>

                                                <a href="{{ url('dashboard/slider/delete',$slider->id) }}" class="btn btn-outline-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div style="display: flex;justify-content: center;">

                        <div>

                            {{-- {!! $users->links() !!} --}}

                        </div>
                    </div>



                </div>
            </div>

        </div>


        </div>
    </section>
    {{-- add model ______________________________________________________________ --}}





    <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Image</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ url('dashboard/slider/store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3" style="display: flex; justify-content: space-between;">
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











    {{-- Edit ______________________________________ --}}



    <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Image</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ url('dashboard/slider/update') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="sliderId" class="id_model">

                    <div class="modal-body">
                        <div class="mb-3" style="display: flex; justify-content: space-between;">
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
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script>
        $(document).ready(function() {
            $('.formFileLg').on('change', function() {
                var file = this.files[0];

                if (file) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.image_name_modal').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".edit_btn").click(function() {

                let image_name_btn = $(this).data("image_name_btn");

                let id_btn = $(this).data("id_btn");

                $('.id_model').val(id_btn);


                let newSrc = '{{ URL::asset('Backend/Uploades/Sliders') }}/' + image_name_btn;
                $(".image_name_modal").attr("src", newSrc);
            });
        });
    </script>
@endsection
