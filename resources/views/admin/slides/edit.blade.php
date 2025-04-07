@extends('admin.layouts.master')


@section('title')
    <title>{{ __('Edit slide show') }} | Hi-Tech</title>
@endsection

@section('css')

@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{__('Edit/Update slide show')}}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>

    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">{{__('Edit/Update slide show')}}</div>
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
                        <form method="post" action="{{ route('slide.doEdit', ['id'=>$slide->id]) }}" autocomplete="off" enctype="multipart/form-data">
                            <div class="container">
                                <div class="row p-4">
                                    <div class="col-sm12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="ui placeholder segment">
                                            <div class="ui icon header">
                                              <i class="image outline icon d-none" id="icon"></i>
                                              <img src="{{ asset($slide->img) }}" id="pre_img" alt="pre_img" class="d-block mx-auto" style="width: 40%">
                                                Upload image for thumbnail.
                                            </div>
                                            <label for="img" class="ui primary button text-white">Browse to image</label>
                                            <small class="text-center ui text-danger mt-1">Image support for PNG only.</small>
                                        </div>
                                        <input type="file" id="img" name="img" class="w-50 d-none" accept=".png">
                                        @csrf
                                                                        
                                        <label for="title" class="fw-bold mt-2">Title in Khmer<span class="text-danger">*</span></label>
                                        <div class="ui input w-100">
                                            {{-- <i class="i cursor icon"></i> --}}
                                            <input type="text" placeholder="Enter title in Khmer" id="title" name="title_kh" value="{{ $slide->title_kh }}">
                                            {{-- <a class="ui tag label"> link </a> --}}
                                        </div>
        
                                        <label for="title" class="fw-bold mt-2">Title in English<span class="text-danger">*</span></label>
                                        <div class="ui input w-100">
                                            {{-- <i class="i cursor icon"></i> --}}
                                            <input type="text" placeholder="Enter title in English" id="title" name="title_en" value="{{ $slide->title_en }}">
                                            {{-- <a class="ui tag label"> link </a> --}}
                                        </div>
        
                                        <div class="ui toggle checkbox px-0 mt-2">
                                            <input type="checkbox" value="1" id="checkBox" name="active_status" {{ $slide->active_status == 1? 'checked' : '' }}>
                                            <label for="checkBox">Enable active</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('home.slide') }}" class="btn btn-warning btn-sm me-2">Back</a>
                                <button type="submit" class="btn btn-success btn-sm save-btn">Edit/Update</button>
                            </div>
                        </form>
                    </div>
                    <div id="myChartLegend"></div>
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

<script>
    $(document).ready(function(){
        // $('#sidebar-menu li').remoeClass('active');
        // $('#sidebar-menu li ul li').remoeClass('active collapse');

        $('#homepage').addClass('active');
        $('#homepagecollapse').addClass('collapse show');
        $('.slide').addClass('active');

    });
</script>
@endsection