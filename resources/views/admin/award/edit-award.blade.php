@extends('admin.layouts.master')


@section('title')
    <title>{{ __('Edit post qulity award') }} | Hi-Tech</title>
@endsection

@section('css')

@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{__('Edit/Update post qulity award')}}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>

    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">{{__('Edit/Update post qulity award')}}</div>
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
                        <form method="post" action="{{ route('award.doEdit', ['id'=>$data->id]) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <div class="row p-4">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="ui form">
                                            <div class="field">
                                                <label for="img">Upload Images <span class="text-danger">*</span></label>
                                                <div class="ui placeholder segment" style="display: flex; flex-direction: row; gap: 20px; align-items: center;">
                                                    @php
                                                        // Safely handle $data->img, default to empty array if null
                                                        $images = is_array($data->img) ? $data->img : [];
                                                        // Pad the array to ensure 4 elements, filling with empty strings if needed
                                                        $images = array_pad($images, 4, '');
                                                    @endphp
                                            
                                                    <!-- Image 1 Section -->
                                                    <div style="flex: 1; text-align: center;">
                                                        <div class="ui icon header">
                                                            @if(empty($images[0]))
                                                                <i class="image icon" id="icon1"></i> 
                                                            @else
                                                                <i class="image icon d-none" id="icon1"></i>
                                                            @endif
                                                            <img src="{{ $images[0] ? asset($images[0]) : '' }}" id="pre_img1" alt="preview" class="{{ $images[0] ? '' : 'd-none' }} mx-auto" style="width: 100%;">
                                                            Upload image 1 for thumbnail.
                                                        </div>
                                                        <label for="img1" class="ui primary button text-white">Browse Image 1</label>
                                                    </div>
                                            
                                                    <!-- Image 2 Section -->
                                                    <div style="flex: 1; text-align: center;">
                                                        <div class="ui icon header">
                                                            @if(empty($images[1]))
                                                                <i class="image icon" id="icon2"></i>
                                                            @else
                                                                <i class="image icon d-none" id="icon2"></i>
                                                            @endif
                                                            <img src="{{ $images[1] ? asset($images[1]) : '' }}" id="pre_img2" alt="preview" class="{{ $images[1] ? '' : 'd-none' }} mx-auto" style="width: 100%;">
                                                            Upload image 2 for thumbnail.
                                                        </div>
                                                        <label for="img2" class="ui primary button text-white">Browse Image 2</label>
                                                    </div>
                                            
                                                    <!-- Image 3 Section -->
                                                    <div style="flex: 1; text-align: center;">
                                                        <div class="ui icon header">
                                                            @if(empty($images[2]))
                                                                <i class="image icon" id="icon3"></i>
                                                            @else
                                                                <i class="image icon d-none" id="icon3"></i>
                                                            @endif
                                                            <img src="{{ $images[2] ? asset($images[2]) : '' }}" id="pre_img3" alt="preview" class="{{ $images[2] ? '' : 'd-none' }} mx-auto" style="width: 100%;">
                                                            Upload image 3 for thumbnail.
                                                        </div>
                                                        <label for="img3" class="ui primary button text-white">Browse Image 3</label>
                                                    </div>
                                            
                                                    <!-- Image 4 Section -->
                                                    <div style="flex: 1; text-align: center;">
                                                        <div class="ui icon header">
                                                            @if(empty($images[3]))
                                                                <i class="image icon" id="icon4"></i>
                                                            @else
                                                                <i class="image icon d-none" id="icon4"></i>
                                                            @endif
                                                            <img src="{{ $images[3] ? asset($images[3]) : '' }}" id="pre_img4" alt="preview" class="{{ $images[3] ? '' : 'd-none' }} mx-auto" style="width: 100%;">
                                                            Upload image 4 for thumbnail.
                                                        </div>
                                                        <label for="img4" class="ui primary button text-white">Browse Image 4</label>
                                                    </div>
                                                </div>
                                            
                                                <!-- File inputs with unique IDs -->
                                                <input type="file" id="img1" name="img1" class="d-none" accept="image/*">
                                                <input type="file" id="img2" name="img2" class="d-none" accept="image/*">
                                                <input type="file" id="img3" name="img3" class="d-none" accept="image/*">
                                                <input type="file" id="img4" name="img4" class="d-none" accept="image/*">
                                            
                                                <!-- Error handling -->
                                                @error('img1')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                @error('img2')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                @error('img3')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                @error('img4')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <h5 class="ui horizontal divider mt-4 text-warning">
                                            <i class="globe icon"></i>
                                            Khmer text
                                        </h5>                               
                                        <label for="title" class="fw-bold mt-2">Title in Khmer<span class="text-danger">*</span></label>
                                        <div class="ui input w-100">
                                            {{-- <i class="i cursor icon"></i> --}}
                                            <input type="text" placeholder="Enter title" id="title" name="title_kh" value="{{ $data->title_kh }}">
                                            {{-- <a class="ui tag label"> link </a> --}}
                                        </div>
        
                                        
        
                                        <div class="ui form">
                                            <div class="field">
                                                <label for="description" class="fw-bold mt-2">Description <span class="text-danger">*</span></label>
                                                <textarea rows="4"  placeholder="Description" name="description_kh">{{ $data->description_kh }}</textarea>
                                            </div>
                                        </div>
        
                                        <h5 class="ui horizontal divider mt-4 text-warning">
                                            <i class="globe icon"></i>
                                            English text
                                        </h5>
        
        
                                        <label for="title" class="fw-bold mt-2">Title in English<span class="text-danger">*</span></label>
                                        <div class="ui input w-100">
                                            {{-- <i class="i cursor icon"></i> --}}
                                            <input type="text" placeholder="Enter title in English" id="title" name="title_en" value="{{ $data->title_en }}">
                                            {{-- <a class="ui tag label"> link </a> --}}
                                        </div>
        
        
                                        <div class="ui form">
                                            <div class="field">
                                                <label for="description" class="fw-bold mt-2">Description <span class="text-danger">*</span></label>
                                                <textarea rows="4"  placeholder="Description" name="description_en">{{ $data->description_en }}</textarea>
                                            </div>
                                        </div>

                                        <h5 class="ui horizontal divider mt-4 text-warning">
                                            {{-- <i class="globe icon"></i> --}}
                                            SEO
                                        </h5>

                                        <label for="title" class="fw-bold mt-2">SEO title</label>
                                        <div class="ui input w-100">
                                            {{-- <i class="i cursor icon"></i> --}}
                                            <input type="text" placeholder="Enter SEO title" id="title" name="seo_title" value="{{ $data->seo_title }}">
                                            {{-- <a class="ui tag label"> link </a> --}}
                                        </div>
        
        
                                        <div class="ui form">
                                            <div class="field">
                                                <label for="description" class="fw-bold mt-2">SEO description</label>
                                                <textarea rows="4"  placeholder="Description" name="seo_description">{{ $data->seo_description }}</textarea>
                                            </div>
                                        </div>
        
        
        
                                        <div class="ui toggle checkbox px-0 mt-2">
                                            <input type="checkbox" value="1" id="checkBox" name="active_status" {{ $data->active_status == 1 ? 'checked' : '' }}>
                                            <label for="checkBox">Enable active</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('home.award') }}" class="btn btn-label-warning btn-round btn-md hover-btn me-2">Back</a>
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
            // Handle the image preview for all file input fields dynamically
            $('input[type="file"]').on('change', function (e) {
                var inputId = $(this).attr('id'); // Get the ID of the input field (img1, img2, img3, etc.)
                var previewId = '#pre_' + inputId; // Corresponding preview image ID (pre_img1, pre_img2, pre_img3, etc.)
                var iconId = '#icon' + inputId.replace('img', ''); // Corresponding icon ID (icon1, icon2, icon3, etc.)

                var file = e.target.files[0]; // Get the selected file
                var reader = new FileReader();

                reader.onload = function (e) {
                    // Set the preview image source, make it visible, and hide the icon
                    $(previewId).attr('src', e.target.result).removeClass('d-none');
                    $(iconId).addClass('d-none'); // Hide the icon
                };

                if (file) {
                    reader.readAsDataURL(file); // Read the file as a data URL
                } else {
                    // If no file is selected, reset the preview and show the icon
                    $(previewId).attr('src', '').addClass('d-none');
                    $(iconId).removeClass('d-none'); // Show the icon
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
            $('.award').addClass('active');

        });
    </script>
@endsection