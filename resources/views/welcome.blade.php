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
    Categorie
@endsection
@section('one')
    Categories
@endsection
@section('two')
    Index
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <div class="data_buttons">
                            <h5 class="card-title">Example Card</h5>

                            {{-- _______________________________ start Button _______________________________ --}}


                            {{-- <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#add"
                                data-bs-whatever="@mdo">Add</a> --}}


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


                                    <th>Status</th>
                                    <th>Description</th>
                                    <th>Edit/Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- _______________________________ start foreach _______________________________ --}}





                                {{-- @foreach ($categories as $categorie)
                                    <tr>
                                        <td>

                                            <img width="50px" height="50px"
                                                src={{ URL::asset("storage/Images/Categories/$categorie->file_name") }}>


                                        </td>
                                        <td>{{ $categorie->name }}</td>
                                        <td>

                                            @if ($categorie->status == true)
                                                <div class="form-check form-switch"
                                                    style="margin-top: 10px;margin-bottom: 15px;">
                                                    <input class="form-check-input" disabled checked type="checkbox"
                                                        name="status" role="switch" id="flexSwitchCheckDefault">

                                                </div>
                                            @else
                                                <div class="form-check form-switch"
                                                    style="margin-top: 10px;margin-bottom: 15px;">
                                                    <input class="form-check-input" type="checkbox" disabled name="status"
                                                        role="switch" id="flexSwitchCheckDefault">

                                                </div>
                                            @endif

                                        </td>
                                        <td>{{ $categorie->description }}</td>
                                        <td>
                                            <a href="{{ url("saller/dashboard/categories/delete/$categorie->id") }}"
                                                class="btn btn-outline-danger">Delete</a>

                                            <a type="button" class="btn btn-outline-warning editbtn" id="editbtn"
                                                data-bs-toggle="modal" data-bs-target="#edit" data-id="{{ $categorie->id }}"
                                                data-name="{{ $categorie->name }}" data-status="{{ $categorie->status }}"
                                                data-description="{{ $categorie->description }}"
                                                data-file_name="{{ $categorie->file_name }}"
                                                data-bs-whatever="@mdo">Edit</a>

                                                   <a href="{{ url("saller/dashboard/categories/force_delete_archive/$categorie->id") }}"
                                                class="btn btn-outline-danger">Delete</a>

                                        </td>


                                    </tr>
                                @endforeach --}}




                                {{-- _______________________________ end foreach _______________________________ --}}

                                </tfoot>
                        </table>



                    </div>
                </div>

            </div>


        </div>
    </section>
    {{-- add model ______________________________________________________________ --}}



    {{-- @include('Backend.Saller.Categories.modles.add') --}}

    {{-- end model ______________________________________________________________ --}}

    {{-- edit model ______________________________________________________________ --}}

    {{-- @include('Backend.Saller.Categories.modles.edit') --}}

    {{-- end model ---- ______________________________________________________________ --}}
@endsection
@section('js')
    {{-- jquery modle  model ---- ___________________________________________________ --}}
    {{--
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function() {
            $('.editbtn').click(function() {

                var id = $(this).data('id');
                var name = $(this).data('name');
                var status = $(this).data('status');
                var description = $(this).data('description');

                $('.id_model').val(id);
                $('.name_model').val(name);

                var file_name = $(this).data('file_name');
                $('.myImage').attr('src', `{{ URL::asset('storage/Images/Categories/${file_name}') }}`);

                if (status) {
                    $('.status_model').prop('checked', true);
                } else {
                    $('.status_model').prop('checked', false);
                }

            })


        });
    </script> --}}


    {{-- jquery modle  model ---- ____________________________________________________ --}}
@endsection
