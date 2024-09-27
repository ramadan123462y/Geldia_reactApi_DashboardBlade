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
    Users
@endsection
@section('one')
    Users
@endsection
@section('two')
    Users
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <div class="data_buttons">
                            <h5 class="card-title">Users Card </h5>

                            {{-- _______________________________ start Button _______________________________ --}}


                            <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#add"
                                data-bs-whatever="@mdo">Add</a>


                            {{-- _______________________________ end Button _______________________________ --}}
                        </div>
                        {{-- _______________________________ Alert _______________________________ --}}


                        {{-- <x-alerts></x-alerts> --}}

                        {{-- _______________________________ Alert _______________________________ --}}


                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>

                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Edit/Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- _______________________________ start foreach _______________________________ --}}



                                @foreach ($users as $user)
                                    <tr>

                                        <td><img style="width: 79.6px;height: 79.6px;"
                                                src="{{ URL::asset("Backend/Uploades/Users/$user->image_name") }}"
                                                class="img-thumbnail" alt="Image User"></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>

                                            <button type="button" data-bs-toggle="modal" data-bs-target="#edit"
                                                data-id_user_btn="{{ $user->id }}"
                                                data-name_user_btn="{{ $user->name }}"
                                                data-email_user_btn="{{ $user->email }}"
                                                data-phone_user_btn="{{ $user->phone_number }}"
                                                data-image_name_btn="{{ $user->image_name }}"
                                                class="btn btn-outline-warning edit_btn">Edit</button>

                                            <a href="{{ url('dashboard/user/delete', $user->id) }}"
                                                class="btn btn-outline-danger">Delete</a>

                                        </td>

                                    </tr>
                                @endforeach





                                {{-- _______________________________ end foreach _______________________________ --}}

                                </tfoot>
                        </table>


                        <div style="display: flex;justify-content: center;">

                            <div>

                                {!! $users->links() !!}

                            </div>
                        </div>



                    </div>
                </div>

            </div>


        </div>
    </section>
    {{-- add model ______________________________________________________________ --}}





    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ url('dashboard/user/store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" required name="name" class="form-control" id="recipient-name">
                            <x-inline_alert name='name'></x-inline_alert>
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="email" required name="email" class="form-control" id="recipient-name">
                            <x-inline_alert name='email'></x-inline_alert>
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Phone Number:</label>
                            <input type="text" required name="phone_number" class="form-control" id="recipient-name">
                            <x-inline_alert name='phone_number'></x-inline_alert>

                        </div>

                        <div class="mb-3">
                            <label for="formFileLg" class="form-label">Image:</label>
                            <input class="form-control form-control-lg"  required
                                name="image_name"type="file">
                            <x-inline_alert name='image_name'></x-inline_alert>

                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Password:</label>
                            <input type="password" required name="password" class="form-control" id="recipient-name">
                            <x-inline_alert name='password'></x-inline_alert>
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














    {{-- @include('Backend.Saller.Categories.modles.add') --}}

    {{-- end model ______________________________________________________________ --}}

    {{-- edit model ______________________________________________________________ --}}

    <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ url('dashboard/user/update') }}" enctype="multipart/form-data" >
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_user" value="" class="id_user_modal">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" required name="name" class="form-control   name_user_modal"
                                id="recipient-name">
                            <x-inline_alert name='name'></x-inline_alert>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="email" required name="email" class="form-control  email_user_modal"
                                id="recipient-name">
                            <x-inline_alert name='email'></x-inline_alert>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Phone Number:</label>
                            <input type="text" required name="phone_number" class="form-control  phone_user_modal"
                                id="recipient-name">
                            <x-inline_alert name='phone_number'></x-inline_alert>

                        </div>
                        <div class="mb-3" style="display: flex; justify-content: space-between;">
                            <label for="formFileLg" class="form-label">Image:</label>
                            <input class="form-control form-control-lg" id="formFileLg"
                                   style="width: 533.6px; height: 37.6px;" name="image_name" type="file">
                            <img style="width: 79.6px; height: 79.6px;"
                                 src="{{ URL::asset('Backend/Uploades/Users/profile.png') }}"
                                 class="img-thumbnail image_name_modal" alt="Image User">
                            <x-inline_alert name='image_name'></x-inline_alert>
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Password:</label>
                            <input type="password" name="password" class="form-control" id="recipient-name">
                            <x-inline_alert name='password'></x-inline_alert>
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


    {{-- end model ---- ______________________________________________________________ --}}
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function() {
            $(".edit_btn").click(function() {
                let id_user_btn = $(this).data("id_user_btn");
                let name_user_btn = $(this).data("name_user_btn");
                let email_user_btn = $(this).data("email_user_btn");
                let phone_user_btn = $(this).data("phone_user_btn");
                let image_name_btn = $(this).data("image_name_btn");

                $(".id_user_modal").val(id_user_btn);
                $(".name_user_modal").val(name_user_btn);
                $(".email_user_modal").val(email_user_btn);
                $(".phone_user_modal").val(phone_user_btn);
                let newSrc = '{{ URL::asset('Backend/Uploades/Users') }}/' + image_name_btn;
                $(".image_name_modal").attr("src", newSrc);
            });
        });
    </script>
<script>
    $(document).ready(function() {
        $('#formFileLg').on('change', function() {
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
@endsection
