@extends('admin.layouts.master')

@section('title')
    <title>{{ __('Post ads') }} | Hi-Tech</title>
@endsection

@section('css')
    <style>
        .label-image {
            position: relative;
            cursor: pointer;
        }
        .hover-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
        }
        .label-image:hover .hover-bg {
            display: flex;
        }
    </style>
@endsection

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">{{ __('Add New Post ads') }}</h3>
            <h6 class="op-7 mb-2">{{ config('app.company') }}</h6>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-9">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">{{ __('New Post ads') }}</div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('ads.add') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="row p-4">
                                <div class="col-12">
                                    <div class="ui form">
                                        <div class="field">
                                            <label for="img">Upload Images <span class="text-danger">*</span></label>
                                            <div class="ui placeholder segment" style="display: flex; flex-direction: row; gap: 20px; align-items: center;">
                                                <!-- Image 1 Section -->
                                                <div style="flex: 1; text-align: center;">
                                                    <div class="ui icon header">
                                                        <i class="image icon" id="icon1"></i>
                                                        <img src="{{ old('img1', session('img1')) ?? '' }}" id="pre_img1" alt="preview" class="{{ session('img1') ? '' : 'd-none' }} mx-auto" style="width: 100%;">
                                                        Upload image 1 for thumbnail.
                                                    </div>
                                                    <label for="img1" class="ui primary button text-white">Browse Image 1</label>
                                                </div>
                                        
                                                <!-- Image 2 Section -->
                                                <div style="flex: 1; text-align: center;">
                                                    <div class="ui icon header">
                                                        <i class="image icon" id="icon2"></i>
                                                        <img src="{{ old('img2', session('img2')) ?? '' }}" id="pre_img2" alt="preview" class="{{ session('img2') ? '' : 'd-none' }} mx-auto" style="width: 100%;">
                                                        Upload image 2 for thumbnail.
                                                    </div>
                                                    <label for="img2" class="ui primary button text-white">Browse Image 2</label>
                                                </div>
                                        
                                                
                                            </div>
                                        
                                            <!-- File inputs with unique IDs -->
                                            <input type="file" id="img1" name="img1" class="d-none" accept="image/*">
                                            <input type="file" id="img2" name="img2" class="d-none" accept="image/*">
                                        
                                            <!-- Error handling -->
                                            @error('img1')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            @error('img2')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        

                                        <div class="ui toggle checkbox mt-2">
                                            <input type="checkbox" value="1" id="active_status" name="active_status" {{ old('active_status') ? 'checked' : '' }}>
                                            <label for="active_status">Enable Active</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('home.ads') }}" class="btn btn-label-warning btn-round btn-md hover-btn me-2">Back</a>
                            <button type="submit" class="btn btn-info btn-round btn-md hover-btn">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Function to handle image preview and icon toggle
            function handleImagePreview(inputSelector, previewSelector, iconSelector) {
                $(inputSelector).on('change', function() {
                    const file = this.files[0];
                    const $preview = $(previewSelector);
                    const $icon = $(iconSelector);

                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            $preview.attr('src', e.target.result).removeClass('d-none'); // Show the preview image
                            $icon.addClass('d-none'); // Hide the icon
                        };
                        reader.readAsDataURL(file);
                    } else {
                        $preview.attr('src', '').addClass('d-none'); // Hide the preview image
                        $icon.removeClass('d-none'); // Show the icon
                    }
                });
            }

            // Set up previews for all three inputs
            handleImagePreview('#img1', '#pre_img1', '#icon1');
            handleImagePreview('#img2', '#pre_img2', '#icon2');

            $('#homepage').addClass('active');
            $('#homepagecollapse').addClass('collapse show');
            $('.ads').addClass('active');
        });
    </script>
@endsection