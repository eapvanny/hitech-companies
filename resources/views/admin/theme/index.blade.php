@extends('admin.layouts.master')


@section('title')
    <title>Theme setting | Hi-Tech</title>
@endsection

@section('css')
    <style>
        .ui.placeholder .image:not(.header):not(.ui){
            height: 70px;
        }
    </style>
@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">Theme setting</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>

    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Theme</div>
                        <div class="card-tools">
                        {{-- <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                            <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                            </span>
                            Export
                        </a> --}}
                        <a class="btn btn-label-info btn-round btn-sm hover-btn" id="update-btn" data-content="Update theme setting"
                        type="button" data-bs-toggle="modal" data-bs-target="#update-company">
                            <span class="btn-label">
                                <i class="far fa-edit"></i>
                            </span>
                            Edit
                        </a>
                        </div>
                    </div>
                </div>
               

                <div class="card-body">
                    <div class="chart-container" style="min-height: auto">
                        <h3>Theme decor</h3>
                        <img src="{{ asset(@$theme->decor) }}" alt="Theme decor image" width="50%">
                        <h3>Background water bottle</h3>
                        <img src="{{ asset(@$theme->water_bg) }}" alt="Theme decor image" width="50%">
                        <h3>Footer decor</h3>
                        <img src="{{ asset(@$theme->footer_decor) }}" alt="Theme decor image" width="50%">

                    </div>
                    <div id="myChartLegend"></div>
                </div>
            </div>
        </div>
    </div>
    {{-- ------------ Modal ADD --------------- --}}
        <div class="modal fade " id="update-company" tabindex="-1" aria-labelledby="update-company" aria-hidden="true">
            <div class="modal-dialog modal-l">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('Add social media')}}</h1>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                {{-- <div class="modal-body">

                </div> --}}
                <form method="post" action="{{ route('theme.save') }}" autocomplete="off" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row p-4">
                            <div class="col-sm12 col-md-12 col-lg-12 col-xl-12">
                                <div class="ui form">
                                    <div class="field">
                                        @csrf
                                        <label for="">Theme decor image</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="img" class="text-center p-2 label-image">
                                                    <img src="{{ asset('backends/assets/img/placeholder-image.webp') }}" id="pre_img" alt="img-placeholder" width="10%" class="m-auto">
                                                    <input type="file" id="img" name="img" class="w-50">
                                                    <div class="hover-bg">
                                                        <i class="fas fa-plus-circle fs-1"></i>
                                                    </div>
                                                </label> --}}
                                                <div class="ui placeholder segment">
                                                    <div class="ui icon header">
                                                      <i class="image outline icon d-none" id="icon1"></i>
                                                      <img src="{{ asset(@$theme->decor) }}" id="decor_pre" alt="pre_img" class="mx-auto d-block" style="width: 40%">
                                                        Upload image as PNG.
                                                    </div>
                                                    <label for="decor" class="ui primary button text-white">Browse to image</label>
                                                </div>
                                                <input type="file" id="decor" name="decor" class="w-50 d-none" accept="image/*">

                                            </div>
                                        </div>

                                        <label for="">Water background theme</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="img" class="text-center p-2 label-image">
                                                    <img src="{{ asset('backends/assets/img/placeholder-image.webp') }}" id="pre_img" alt="img-placeholder" width="10%" class="m-auto">
                                                    <input type="file" id="img" name="img" class="w-50">
                                                    <div class="hover-bg">
                                                        <i class="fas fa-plus-circle fs-1"></i>
                                                    </div>
                                                </label> --}}
                                                <div class="ui placeholder segment">
                                                    <div class="ui icon header">
                                                      <i class="image outline icon d-none" id="icon3"></i>
                                                      <img src="{{ asset(@$theme->water_bg) }}" id="water_bg_pre" alt="pre_img" class="mx-auto d-block" style="width: 40%">
                                                        Upload image as PNG.
                                                    </div>
                                                    <label for="water_bg" class="ui primary button text-white">Browse to image</label>
                                                </div>
                                                <input type="file" id="water_bg" name="water_bg" class="w-50 d-none" accept="image/*">

                                            </div>
                                        </div>

                                        <label for="">Footer theme image</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label for="img" class="text-center p-2 label-image">
                                                    <img src="{{ asset('backends/assets/img/placeholder-image.webp') }}" id="pre_img" alt="img-placeholder" width="10%" class="m-auto">
                                                    <input type="file" id="img" name="img" class="w-50">
                                                    <div class="hover-bg">
                                                        <i class="fas fa-plus-circle fs-1"></i>
                                                    </div>
                                                </label> --}}
                                                <div class="ui placeholder segment">
                                                    <div class="ui icon header">
                                                      <i class="image outline icon d-none" id="icon2"></i>
                                                      <img src="{{ asset(@$theme->footer_decor) }}" id="footer_theme_pre" alt="pre_img" class="mx-auto d-block" style="width: 40%">
                                                        Upload image.
                                                    </div>
                                                    <label for="footer_theme" class="ui primary button text-white">Browse to image</label>
                                                </div>
                                                <input type="file" id="footer_theme" name="footer_decor" class="w-50 d-none" accept="image/*">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                                
                                <div class="ui toggle checkbox px-0 mt-2">
                                    <input type="checkbox" value="1" id="checkBox" name="active_status" {{ @$theme->active_status == 1 ? 'checked' : '' }}>
                                    <label for="checkBox">Enable active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm save-btn">Save</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    {{-- ------------ END Modal ADD --------------- --}}


@endsection

@section('js')

    <script>
        // $(document).ready(function () { 
        //     $('#social').dropdown();
        //     // var selectUpdateValue = $('.item.active.selected').val();
        //     console.log($('.item.active.selected').val());


        //     $('#company_logo').on('change', function(event) {
        //         const file = event.target.files[0];
        //         if (file) {
        //             const reader = new FileReader();
        //             reader.onload = function(e) {
        //                 $('#pre_img').attr('src', e.target.result).show();
        //             };
        //             reader.readAsDataURL(file);
        //         }
        //     });
        // });

        $('#decor').on('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#decor_pre').removeClass('d-none');
                    $('#decor_pre').addClass('d-block');
                    $('#icon1').addClass('d-none');
                    $('#decor_pre').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);
            }
        });

        $('#footer_theme').on('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#footer_theme_pre').removeClass('d-none');
                    $('#footer_theme_pre').addClass('d-block');
                    $('#icon2').addClass('d-none');
                    $('#footer_theme_pre').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);
            }
        });


        $('#water_bg').on('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#water_bg_pre').removeClass('d-none');
                    $('#water_bg_pre').addClass('d-block');
                    $('#icon3').addClass('d-none');
                    $('#water_bg_pre').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            // $('#sidebar-menu li').remoeClass('active');
            // $('#sidebar-menu li ul li').remoeClass('active collapse');

            $('#settings').addClass('active');
            $('#settingcollapse').addClass('collapse show');
            $('.themsetting').addClass('active');

        });
    </script>
@endsection