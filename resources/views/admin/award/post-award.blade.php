@extends('admin.layouts.master')

@section('title')
    <title>{{ __('Post Quality Award') }} | Hi-Tech</title>
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
            <h3 class="fw-bold mb-3">{{ __('Add New Post Quality Award') }}</h3>
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
                        <div class="card-title">{{ __('New Post Quality Award') }}</div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('award.add') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="row p-4">
                                <div class="col-12">
                                    <div class="ui form">
                                        <div class="field">
                                            <label for="img">Upload Image <span class="text-danger">*</span></label>
                                            <div class="ui placeholder segment">
                                                <div class="ui icon header">
                                                    <i class="image outline icon" id="icon"></i>
                                                    <img src="" id="pre_img" alt="preview" class="d-none mx-auto" style="width: 40%">
                                                    Upload image for thumbnail.
                                                </div>
                                                <label for="img" class="ui primary button text-white">Browse to Image</label>
                                            </div>
                                            <input type="file" id="img" name="img" class="d-none" accept="image/*">
                                            @error('img')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <h5 class="ui horizontal divider mt-4 text-warning">
                                            <i class="globe icon"></i> Khmer Text
                                        </h5>

                                        <div class="field">
                                            <label for="title_kh">Title in Khmer <span class="text-danger">*</span></label>
                                            <input type="text" id="title_kh" name="title_kh" placeholder="Enter title" value="{{ old('title_kh') }}">
                                            @error('title_kh')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="field">
                                            <label for="description_kh">Description <span class="text-danger">*</span></label>
                                            <textarea rows="4" id="description_kh" name="description_kh" placeholder="Description">{{ old('description_kh') }}</textarea>
                                            @error('description_kh')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <h5 class="ui horizontal divider mt-4 text-warning">
                                            <i class="globe icon"></i> English Text
                                        </h5>

                                        <div class="field">
                                            <label for="title_en">Title in English <span class="text-danger">*</span></label>
                                            <input type="text" id="title_en" name="title_en" placeholder="Enter title in English" value="{{ old('title_en') }}">
                                            @error('title_en')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="field">
                                            <label for="description_en">Description <span class="text-danger">*</span></label>
                                            <textarea rows="4" id="description_en" name="description_en" placeholder="Description">{{ old('description_en') }}</textarea>
                                            @error('description_en')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <h5 class="ui horizontal divider mt-4 text-warning">SEO</h5>

                                        <div class="field">
                                            <label for="seo_title">SEO Title</label>
                                            <input type="text" id="seo_title" name="seo_title" placeholder="Enter SEO title" value="{{ old('seo_title') }}">
                                            @error('seo_title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="field">
                                            <label for="seo_description">SEO Description</label>
                                            <textarea rows="4" id="seo_description" name="seo_description" placeholder="Description">{{ old('seo_description') }}</textarea>
                                            @error('seo_description')
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
                            <a href="{{ route('home.award') }}" class="btn btn-label-warning btn-round btn-md hover-btn me-2">Back</a>
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
        $(document).ready(function () {
            $('#img').on('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#pre_img').removeClass('d-none').addClass('d-block');
                        $('#icon').addClass('d-none');
                        $('#pre_img').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });

            $('#homepage').addClass('active');
            $('#homepagecollapse').addClass('collapse show');
            $('.award').addClass('active');
        });
    </script>
@endsection