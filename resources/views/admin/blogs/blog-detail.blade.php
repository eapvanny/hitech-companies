@extends('admin.layouts.master')


@section('title')
    <title> {{ __('Blog detail') }} | Hi-Tech</title>
@endsection

@section('css')

@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{__('Blog detail')}}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>
    </div>


    {{-- Message from execute manager  --}}
    <div class="row mt-5">
        <div class="ui">
            <div class="column">
                <div class="ui raised segment">
                    {{-- @if ($about->active_status == 1)
                        <a class="ui blue ribbon label">{{ __('Active') }}</a>
                    @else
                        <a class="ui red ribbon label">{{ __('Inactive') }}</a>
                    @endif --}}
                    <div class="card-header">
                        <div class="card-head-row align-items-center d-flex justify-content-between">
                            <div class="card-title" style="width: fit-content">{{__('Blog detail')}}</div>
                            <div class="card-tools" style="width: fit-content">
                                <a class="btn btn-label-warning btn-round btn-sm hover-btn " id="update-btn" data-content="Back to blogs"
                                    href="{{ route('blog.index') }}">
                                    <span class="btn-label">
                                        <i class="fas fa-angle-left"></i>
                                    </span>
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>                  
                                
                    <div class="chart-container mt-3" style="min-height: auto;">                          
                        <div class="bg-title" style="background-image: url('{{ asset($blog->img) }}')">

                        </div>
                        <div class="row title_blog shadow-sm">
                            <h1 class=" col-sm-12 col-md-11 fs-1 text-center mx-auto">
                                {{ $blog->title_kh }}
                                {{ $blog->title }}
                            </h1>
                            <div class=" col-sm-12 col-md-11 mx-auto mt-3">
                                <i class="user icon"></i>
                                Author: {{ $blog->author }}
                            </div>
                            <div class=" col-sm-12 col-md-11 mx-auto mt-3">
                                <i class="clock outline icon"></i>
                                Create: {{ $blog->created_at }}
                            </div>

                            <p class="ui horizontal divider">
                                {{-- <i class="tag icon"></i> --}}
                                Khmer
                            </p>

                            <div class=" col-sm-12 col-md-11 mx-auto mt-3">
                                {{ $blog->short_text_kh }}
                            </div>

                            <div class=" col-sm-12 col-md-11 mx-auto mt-3">
                                {!! $blog->description_kh !!}
                            </div>

                            <p class="ui horizontal divider">
                                {{-- <i class="tag icon"></i> --}}
                                English
                            </p>

                            <div class=" col-sm-12 col-md-11 mx-auto mt-3">
                                {{ $blog->short_text }}
                            </div>

                            <div class=" col-sm-12 col-md-11 mx-auto mt-3">
                                {!! $blog->description !!}
                            </div>
                            
                        </div>
                    </div>
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

            $('#blog').addClass('active');
            // $('#homepagecollapse').addClass('collapse show');
            // $('.society').addClass('active');

        });
    </script>
@endsection