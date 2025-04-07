@extends('admin.layouts.master')


@section('title')
    <title>{{ __('Edit blog') }} | Hi-Tech</title>
@endsection

@section('css')

@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{__('Edit/Update blog')}}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">{{__('Edit/Update blog')}}</div>
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
                        <form method="post" action="{{ route('blog.doEdit', ['id'=>$blog->id]) }}" autocomplete="off" enctype="multipart/form-data">
                            <div class="container">
                                <div class="row p-4">
                                    <div class="col-sm12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="ui form">
                                            <div class="field">
                                                @csrf
                                                <label for="">Upload image <span class="text-danger">*</span></label>
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
                                                              <i class="image outline icon d-none" id="icon"></i>
                                                              <img src="{{ asset($blog->img) }}" id="pre_img" alt="pre_img" class="mx-auto d-block" style="width: 40%">
                                                                Upload image for thumbnail.
                                                            </div>
                                                            <label for="img" class="ui primary button text-white">Browse to image</label>
                                                        </div>
                                                        <input type="file" id="img" name="img" class="w-50 d-none" accept="image/*">
                                                        <input type="hidden" class="d-none" name="old_img" value="{{ $blog->img }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <label for="author" class="fw-bold mt-2">Author's name<span class="text-danger">*</span></label>
                                        <div class="ui input w-100">
                                            {{-- <i class="i cursor icon"></i> --}}
                                            <input type="text" placeholder="Enter author's name" id="author" name="author" value="{{ $blog->author }}">
                                            {{-- <a class="ui tag label"> link </a> --}}
                                        </div>


                                        <p class="ui horizontal divider">
                                            {{-- <i class="tag icon"></i> --}}
                                            Khmer
                                        </p>

                                        <label for="title_kh" class="fw-bold mt-2">Title in Khmer<span class="text-danger">*</span></label>
                                        <div class="ui input w-100">
                                            {{-- <i class="i cursor icon"></i> --}}
                                            <input type="text" placeholder="Enter title in Khmer" id="title_kh" name="title_kh" value="{{ $blog->title_kh }}">
                                            {{-- <a class="ui tag label"> link </a> --}}
                                        </div>
                                        
        
                                        <div class="ui form">
                                            <div class="field">
                                                <label for="short_text_kh" class="fw-bold mt-2">Short description in Khmer<span class="text-danger">*</span></label>
                                                <textarea rows="4"  placeholder="Short description in Khmer" name="short_text_kh">{{ $blog->short_text_kh }}</textarea>
                                            </div>
                                        </div>

                                        <div class="ui form">
                                            <div class="field">
                                                <label for="description_kh" class="fw-bold mt-2">Description in Khmer<span class="text-danger">*</span></label>
                                                <textarea rows="4" id="description_kh" placeholder="Description in Khmer" name="description_kh">{!! $blog->description_kh !!}</textarea>
                                            </div>
                                        </div>


                                        <p class="ui horizontal divider">
                                            {{-- <i class="tag icon"></i> --}}
                                            English
                                        </p>

                                        <label for="title" class="fw-bold mt-2">Title in English<span class="text-danger">*</span></label>
                                        <div class="ui input w-100">
                                            {{-- <i class="i cursor icon"></i> --}}
                                            <input type="text" placeholder="Enter title in English" id="title" name="title" value="{{ $blog->title }}">
                                            {{-- <a class="ui tag label"> link </a> --}}
                                        </div>
                                        
        
                                        <div class="ui form">
                                            <div class="field">
                                                <label for="short_text" class="fw-bold mt-2">Short description in English<span class="text-danger">*</span></label>
                                                <textarea rows="4"  placeholder="Short description in English" name="short_text">{{ $blog->short_text }}</textarea>
                                            </div>
                                        </div>

                                        <div class="ui form">
                                            <div class="field">
                                                <label for="description" class="fw-bold mt-2">Description in English<span class="text-danger">*</span></label>
                                                <textarea rows="4" id="description" placeholder="Description in English" name="description">{!! $blog->description !!}</textarea>
                                            </div>
                                        </div>



                                        <h5 class="ui horizontal divider mt-4 text-warning">
                                            SEO
                                        </h5>

                                        <label for="title" class="fw-bold mt-2">SEO title</label>
                                        <div class="ui input w-100">
                                            {{-- <i class="i cursor icon"></i> --}}
                                            <input type="text" placeholder="Enter SEO title" id="title" name="seo_title" value="{{ $blog->seo_title }}">
                                            {{-- <a class="ui tag label"> link </a> --}}
                                        </div>
        
        
                                        <div class="ui form">
                                            <div class="field">
                                                <label for="description" class="fw-bold mt-2">SEO description</label>
                                                <textarea rows="4"  placeholder="Description" name="seo_description">{{ $blog->seo_description }}</textarea>
                                            </div>
                                        </div>
        
        
        
                                        <div class="ui toggle checkbox px-0 mt-2">
                                            <input type="checkbox" value="1" id="checkBox" name="active_status" {{ $blog->active_status == 1 ? 'checked' : '' }}>
                                            <label for="checkBox">Enable active</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('blog.index') }}" class="btn btn-label-warning btn-round btn-md hover-btn me-2">Back</a>
                                <button type="submit" class="btn btn-success btn-round btn-md hover-btn">Edit/Update</button>
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

            $('#description_kh').summernote({
                placeholder: 'Description in Khmer',
                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
            });

            $('#description').summernote({
                placeholder: 'Description in English',
                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
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