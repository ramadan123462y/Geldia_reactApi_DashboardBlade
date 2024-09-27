@extends('Dashboard.Layouts.Master')
@section('css')
@endsection
@section('title_page')
    Settings
@endsection
@section('one')
    Settings
@endsection
@section('two')
    Settings
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">


            </div>
            <div class="card">
                <div class="card-body">
                    {{-- <x-alerts></x-alerts> --}}
                    <h5 class="card-title">Edit Settings</h5>

                    <!-- General Form Elements -->
                    <form id="my-form" action="{{ url('dashboard/setting/update-or-create') }}" method="POST">
                        @csrf
                        @foreach ($settings as $setting)
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">{{ $setting->key }}</label>
                                <div class="col-sm-10">
                                    <input type="text" name="settings[{{ $setting->key }}]"
                                        value="{{ old("$settings.$setting->key", $setting->value) }}" class="form-control">
                                    <x-inline_alert name='settings.{{ $setting->key }}'></x-inline_alert>
                                </div>
                            </div>
                        @endforeach


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Submit Button</label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit Form</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>


        </div>




        </div>
    @endsection
    @section('js')
    @endsection
