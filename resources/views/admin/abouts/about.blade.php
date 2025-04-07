@extends('admin.layouts.master')


@section('title')
    <title> {{ __('Overview') }} | Hi-Tech</title>
@endsection

@section('css')

@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{__('About us')}}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">{{ __('Overview') }}</div>
                        <div class="card-tools">
                        {{-- <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                            <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                            </span>
                            Export
                        </a> --}}
                        <a class="btn btn-label-info btn-round btn-sm hover-btn" id="update-btn" data-content="Edit about page"
                            href="{{ route('about.edit') }}">
                            <span class="btn-label">
                                <i class="far fa-edit"></i>
                            </span>
                            Edit
                        </a>
                        </div>
                    </div>
                </div>
               

                <div class="card-body">
                    <div class="chart-container px-2" style="min-height: auto">
                        <div class="row align-items-center">
                            <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
                                <h3 class="card-title mb-3">Short descript in Khmer</h3>
                                <p>
                                    {!! @$about->title_kh !!}
                                </p>
                                <h3 class="card-title mb-3">Short descript in English</h3>   
                                <p class="mb-3">
                                    {!! @$about->title_en !!}
                                </p>
                            </div>
                            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                <img src="{{ asset(@$about->img) }}" style="width:100%" alt="Thumbnail" class="d-block ms-auto ">
                            </div>
                        </div>

                        {{-- <div class="row align-items-center">
                            <div class="col-12">
                                <h3 class="card-title mb-3">Descript in Khmer</h3>
                                {!! $about->description_kh !!}

                                
                                
                                <h3 class="card-title mb-3 mt-3">Descript in English</h3>
                                {!! $about->description_en !!}

                                
                            </div>
                        </div> --}}
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
            console.log($('.item.active.selected').val());


            $('#company_logo').on('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
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

            $('#about').addClass('active');
            $('#aboutpage').addClass('collapse show');
            $('.overview').addClass('active');

        });
    </script>
@endsection