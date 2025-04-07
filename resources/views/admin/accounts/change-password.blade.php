@extends('admin.layouts.master')


@section('title')
    <title>{{ __('Password setting') }} | Hi-Tech</title>
@endsection

@section('css')

@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{__('Password setting')}}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>

    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">{{__('Change password')}}</div>
                        <div class="card-tools">
                        {{-- <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                            <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                            </span>
                            Export
                        </a> --}}
                        {{-- <a class="btn btn-label-info btn-round btn-sm hover-btn" id="update-btn" data-content="Add social media"
                        type="button" data-bs-toggle="modal" data-bs-target="#update-company">
                            <span class="btn-label">
                                <i class="fas fa-plus-circle"></i>
                            </span>
                            Add new
                        </a> --}}
                        </div>
                    </div>
                </div>
               

                <div class="card-body">
                    <div class="chart-container" style="min-height: auto">
                        <form method="post" class="ui form" action="{{ route('password.change') }}" autocomplete="off" id="changPassowrd">
                            <div class="container">
                                <div class="row px-4">
                                    <div class="col-sm12 col-md-12 col-lg-12 col-xl-12">
                                        @csrf
                                        <label for="password" class="fw-bold mt-2">Current password <span class="text-danger">*</span></label>
                                        <div class="ui field left icon input w-100">
                                            <i class="unlock alternate icon"></i>
                                            <input type="password" placeholder="Enter current password" id="password" name="password">
                                            {{-- <a class="ui tag label"> link </a> --}}
                                        </div>

                                        <label for="new_password" class="fw-bold mt-2">New password <span class="text-danger">*</span></label>
                                        <div class="ui field left icon input w-100">
                                            <i class="key icon"></i>
                                            <input type="password" placeholder="Enter new password" id="new_password" name="new_password">
                                            {{-- <a class="ui tag label"> link </a> --}}
                                        </div>

                                        <label for="c_new_password" class="fw-bold mt-2">Confirm new password <span class="text-danger">*</span></label>
                                        <div class="ui field left icon input w-100">
                                            <i class="key icon"></i>
                                            <input type="password" placeholder="Enter confirm new password" id="c_new_password" name="c_new_password">
                                            {{-- <a class="ui tag label"> link </a> --}}
                                        </div>

                                        <div class="ui error message mb-4"></div>
                                        <div class="modal-footer">
                                            <a href="{{ route('profile') }}" class="btn btn-label-warning btn-round btn-md hover-btn me-2 btn-sm">Back</a>
                                            <button type="submit" class="btn btn-success btn-round btn-md hover-btn btn-sm">Save change</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <div id="myChartLegend"></div> --}}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script>
        function select (e){
            alert(this.val());

        };
    </script>

    <script>
        $(document).ready(function () { 
            $('#social').dropdown();
            // var selectUpdateValue = $('.item.active.selected').val();
            // console.log($('.item.active.selected').val());


            $('#img').on('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#pre_img').removeClass('d-none');
                        $('#pre_img').addClass('d-block');
                        $('#icon').addClass('d-none');
                        $('#pre_img').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection