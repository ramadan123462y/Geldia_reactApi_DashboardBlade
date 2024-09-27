@extends('Dashboard.Layouts.Master')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('DataTable/dataTables.bootstrap5.min.css') }}">
    <style>
        div[style="z-index:9999;width:100%;position:relative"] {
            display: none !important;
        }
    </style>

@endsection
@section('title_page')
    Article
@endsection
@section('one')
    Article
@endsection
@section('two')
    Article
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <x-alerts></x-alerts>
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <div class="data_buttons">
                            <h5 class="card-title">Article Card </h5>

                            {{-- _______________________________ start Button _______________________________ --}}


                            <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#add"
                                data-bs-whatever="@mdo">Add</a>


                            {{-- _______________________________ end Button _______________________________ --}}
                        </div>



                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>


                                    <th>Image</th>
                                    <th>Title</th>

                                    <th>SubCategorie</th>
                                    <th>User</th>
                                    <th>actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- _______________________________ start foreach _______________________________ --}}

                                @foreach ($articles as $article)
                                    <tr>

                                        <td>
                                            <img style="width: 60px;height:60px"
                                                src="{{ URL::asset("Backend\Uploades\Articles\\$article->image_file") }}"
                                                alt="">


                                        </td>
                                        <td>{{ $article->title }}</td>

                                        <td>{{ $article->articlesubcategorie->name }}</td>
                                        <td>{{ $article->user->name }}</td>


                                        <td>



                                            <a href="{{ url('dashboard/article/edit', $article->id) }}"
                                                class="btn btn-outline-warning edit_btn">Edit</a>
                                            <a href="{{ url('dashboard/article/delete', $article->id) }}"
                                                class="btn btn-outline-danger">Delete</a>

                                        </td>

                                    </tr>
                                @endforeach





                                {{-- _______________________________ end foreach _______________________________ --}}

                                </tfoot>
                        </table>


                        <div style="display: flex;justify-content: center;">

                            <div>

                                {!! $articles->links() !!}

                            </div>
                        </div>



                    </div>
                </div>

            </div>


        </div>
    </section>

    @include('Dashboard.pages.Articles.Article.add_model')

    {{-- end model ---- ______________________________________________________________ --}}
@endsection
@section('js')
    @include('Dashboard.pages.Articles.Article.scripts')
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#add').modal('show');
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('#submit_add').click(function() {

                $(this).hide();

                $('#loading').show();
                setTimeout(function() {
                    $('#loading').hide();
                    $('#submit_add').show();
                }, 6000);
            })
        });
    </script>
@endsection
