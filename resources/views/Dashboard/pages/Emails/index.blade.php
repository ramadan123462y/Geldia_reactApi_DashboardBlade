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
    Emails
@endsection
@section('one')
    Emails
@endsection
@section('two')
    Emails
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <div class="data_buttons">
                            <h5 class="card-title">Emails Card </h5>

                        </div>
                        {{-- _______________________________ Alert _______________________________ --}}


                        {{-- <x-alerts></x-alerts> --}}

                        {{-- _______________________________ Alert _______________________________ --}}


                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Email </th>
                                    <th>User Type </th>

                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- _______________________________ start foreach _______________________________ --}}

                                @foreach ($emails as $email)
                                    <tr>

                                        <td>{{ $email->name }}</td>
                                        <td>{{ $email->phone }}</td>
                                        <td>{{ $email->email }}</td>
                                        <td>{{ $email->usertype->type }}</td>

                                        <td>

                                            <button type="button" data-bs-toggle="modal" data-bs-target="#show"
                                                data-btn_message="{{ $email->content }}"
                                                class="btn btn-outline-warning show_btn">Show Message</button>


                                            <a href="{{ url('dashboard/contact-email/delete', $email->id) }}"
                                                class="btn btn-outline-danger">Delete</a>

                                        </td>
                                    </tr>
                                @endforeach

                                {{-- _______________________________ end foreach _______________________________ --}}

                                </tfoot>
                        </table>


                        <div style="display: flex;justify-content: center;">

                            <div>

                                {!! $emails->links() !!}

                            </div>
                        </div>



                    </div>
                </div>

            </div>


        </div>
    </section>
    {{-- edit model ______________________________________________________________ --}}
    <div class="modal fade" id="show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Message </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <textarea  readonly class="form-control model_message" style="height: 100px"></textarea>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

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
        $(document).ready(function () {
            $(".show_btn").click(function () {
                let message = $(this).data("btn_message");

                $(".model_message").val(message);
            });
        });
    </script>

@endsection
