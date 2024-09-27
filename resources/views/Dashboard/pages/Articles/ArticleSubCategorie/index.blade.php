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
    Articlesubcategorie
@endsection
@section('one')
    Articlesubcategorie
@endsection
@section('two')
    Articlesubcategorie
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <div class="data_buttons">
                            <h5 class="card-title">Articlesubcategorie Card </h5>

                            {{-- _______________________________ start Button _______________________________ --}}
                            <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#add"
                                data-bs-whatever="@mdo">Add</a>
                            {{-- _______________________________ end Button _______________________________ --}}
                        </div>


                        {{-- _______________________________ Alert _______________________________ --}}


                        <x-alerts></x-alerts>

                        {{-- _______________________________ Alert _______________________________ --}}
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>

                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>ArticleCategorie</th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- _______________________________ start foreach _______________________________ --}}

                                @foreach ($articleSubCategories as $articleSubCategorie)
                                    <tr>

                                        <td><img style="width: 79.6px;height: 79.6px;"
                                                src="{{ URL::asset("Backend/Uploades/Articles/SubCategories/$articleSubCategorie->image_name") }}"
                                                class="img-thumbnail" alt="Image User"></td>
                                        <td>{{ $articleSubCategorie->name }}</td>
                                        <td>{{ $articleSubCategorie->articlecategorie->name }}</td>

                                        <td>

                                            <button type="button" data-bs-toggle="modal" data-bs-target="#edit"
                                                data-id_articlecategorie_btn="{{ $articleSubCategorie->id }}"
                                                data-name_articlecategorie_btn="{{ $articleSubCategorie->name }}"
                                                data-categorieid_articlecategorie_btn="{{ $articleSubCategorie->articlecategorie_id }}"
                                                data-image_name_btn="{{ $articleSubCategorie->image_name }}"
                                                data-descreption_btn="{{ $articleSubCategorie->descreption }}"
                                                class="btn btn-outline-warning edit_btn">Edit</button>


                                            <a href="{{ url('dashboard/article-subcategorie/delete', $articleSubCategorie->id) }}"
                                                class="btn btn-outline-danger">Delete</a>

                                        </td>

                                    </tr>
                                @endforeach

                                {{-- _______________________________ end foreach _______________________________ --}}

                                </tfoot>
                        </table>


                        <div style="display: flex;justify-content: center;">

                            <div>

                                {!! $articleSubCategories->links() !!}

                            </div>
                        </div>



                    </div>
                </div>

            </div>


        </div>
    </section>

    {{-- add model ______________________________________________________________ --}}

    @include('Dashboard.pages.Articles.ArticleSubCategorie.add_modal')

    {{-- Edit model ______________________________________________________________ --}}

    @include('Dashboard.pages.Articles.ArticleSubCategorie.edit_modal')
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function() {
            $(".edit_btn").click(function() {
                let id_articlecategorie_btn = $(this).data("id_articlecategorie_btn");
                let name_articlecategorie_btn = $(this).data("name_articlecategorie_btn");
                let categorieid_articlecategorie_btn = $(this).data("categorieid_articlecategorie_btn");
                let descreption_btn = $(this).data("descreption_btn");


                $(".id_articlecategorie_modal").val(id_articlecategorie_btn);
                $(".name_articlecategorie_modal").val(name_articlecategorie_btn);
                $(".categorieid_articlecategorie_modal").val(categorieid_articlecategorie_btn);
                $(".descreption_model").val(descreption_btn);

            });
        });
    </script>
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


                let newSrc = '{{ URL::asset('Backend/Uploades/Articles/SubCategories') }}/' +
                    image_name_btn;
                $(".image_name_modal").attr("src", newSrc);
            });
        });
    </script>
@endsection
