@extends('admin.layouts.master')


@section('title')

    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}


    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script> --}}
    <!-- Include Summernote CSS and JS -->
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script> --}}
    <title>{{__('Post a new core value')}} | Hi-Tech</title>
@endsection

@section('css')
    <style>

    </style>
@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{__('Post new core value')}}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">{{__('Post new core value')}}</div>
                        <div class="card-tools">
                        </div>
                    </div>
                </div>
               

                <div class="card-body">
                    <div class="chart-container px-2" style="min-height: auto">
                        <form action="{{ route('corevalue.save') }}" method="post">
                            @csrf
                            <div class="row align-items-center">
                                <h3 class="card-title my-3">Title in Khmer</h3>
                                <div class="ui input">
                                    <input type="text" name="title_kh" placeholder="Title in Khmer" value="{{ old('title_kh') }}">
                                </div>
                                <h3 class="card-title my-3">Title in English</h3>
                                <div class="ui input">
                                    <input type="text" name="title_en" placeholder="Title in English" value="{{ old('title_en') }}">
                                </div>


                                <h3 class="card-title my-3">Description in Khmer</h3>
                                <div class="ui form">
                                    <div class="field">
                                        <textarea name="description_kh" rows="4" placeholder="Description in Khmer">{{ old('description_kh') }}</textarea>
                                    </div>
                                </div>

                                <h3 class="card-title my-3">Description in English</h3>
                                <div class="ui form">
                                    <div class="field">
                                        <textarea name="description_en" rows="4" placeholder="Description in English">{{ old('description_en') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="ui toggle checkbox px-0 mt-2">
                                <input type="checkbox" value="1" id="check" name="active_status">
                                <label for="check">Enable active</label>
                            </div>
                            <div>
                                <a href="{{ route('about.company') }}" class="btn btn-warning btn-sm rounded-2 me-1">Back</a>
                                <button type="submit" class="btn btn-primary btn-sm rounded-2">Save post</button>
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
        // $('#title_kh').summernote({
        //     placeholder: 'Short title in Khmer',
        //     height: 300, // set editor height
        //     tabsize: 2,
        //     // minHeight: null, // set minimum height of editor
        //     // maxHeight: null, // set maximum height of editor
        //     // focus: true // set focus to editable area after initializing summernote
        // });
        $(document).ready(function() {
            // $('#title_kh').summernote({
            //     placeholder: 'Short description in Khmer...',
            //     tabsize: 2,
            //     height: 150
            // });

            $('#title_kh').summernote({
                placeholder: 'Message in Khmer...',
                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    // ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                // callbacks: {
                //     onImageUpload: function(files) {
                //         let reader = new FileReader();
                //         reader.onload = function(e) {
                //             const imgName = files[0].name;
                //             const sanitizedName = sanitizeName(truncateName(imgName));
                //             // Upload the image using sanitizedName
                //         };
                //         reader.readAsDataURL(files[0]);
                //     }
                // },
            });

            $('#title_en').summernote({
                placeholder: 'Message in English...',
                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    // ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                // callbacks: {
                //     onImageUpload: function(files) {
                //         let reader = new FileReader();
                //         reader.onload = function(e) {
                //             const imgName = files[0].name;
                //             const sanitizedName = sanitizeName(truncateName(imgName));
                //             // Upload the image using sanitizedName
                //         };
                //         reader.readAsDataURL(files[0]);
                //     }
                // },
            });

            $('#description_kh').summernote({
                placeholder: 'Description in Khmer...',
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
                // callbacks: {
                //     onImageUpload: function(files) {
                //         let reader = new FileReader();
                //         reader.onload = function(e) {
                //             const imgName = files[0].name;
                //             const sanitizedName = sanitizeName(truncateName(imgName));
                //             // Upload the image using sanitizedName
                //         };
                //         reader.readAsDataURL(files[0]);
                //     }
                // },
            });
            $('#description_en').summernote({
                placeholder: 'Description in English...',
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

                // callbacks: {
                //     onImageUpload: function(files) {
                //         let reader = new FileReader();
                //         reader.onload = function(e) {
                //             const imgName = files[0].name;
                //             const sanitizedName = sanitizeName(truncateName(imgName));
                //             // Upload the image using sanitizedName
                //         };
                //         reader.readAsDataURL(files[0]);
                //     }
                // },
            });



        });

        $('#img').on('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // $('#img').addClass('d-done');
                    $('#img').addClass('d-none');
                    $('#pre_img').removeClass('d-none');
                    $('#pre_img').addClass('d-block');
                    $('#pre_img').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);
            }
        });
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



        // $('#title_kh').summernote({
        //     callbacks: {
        //         onImageUpload: function(files) {
        //             let reader = new FileReader();
        //             reader.onload = function(e) {
        //                 const imgName = files[0].name;
        //                 const sanitizedName = sanitizeName(truncateName(imgName));
        //                 // Upload the image using sanitizedName
        //             };
        //             reader.readAsDataURL(files[0]);
        //         }
        //     }
        // });
        // $('#title_en').summernote({
        //     callbacks: {
        //         onImageUpload: function(files) {
        //             let reader = new FileReader();
        //             reader.onload = function(e) {
        //                 const imgName = files[0].name;
        //                 const sanitizedName = sanitizeName(truncateName(imgName));
        //                 // Upload the image using sanitizedName
        //             };
        //             reader.readAsDataURL(files[0]);
        //         }
        //     }
        // });

        // $('#description_kh').summernote({
        //     callbacks: {
        //         onImageUpload: function(files) {
        //             let reader = new FileReader();
        //             reader.onload = function(e) {
        //                 const imgName = files[0].name;
        //                 const sanitizedName = sanitizeName(truncateName(imgName));
        //                 // Upload the image using sanitizedName
        //             };
        //             reader.readAsDataURL(files[0]);
        //         }
        //     }
        // });
        // $('#description_en').summernote({
        //     callbacks: {
        //         onImageUpload: function(files) {
        //             let reader = new FileReader();
        //             reader.onload = function(e) {
        //                 const imgName = files[0].name;
        //                 const sanitizedName = sanitizeName(truncateName(imgName));
        //                 // Upload the image using sanitizedName
        //             };
        //             reader.readAsDataURL(files[0]);
        //         }
        //     }
        // });
    </script>
        <script>
            $(document).ready(function(){
                // $('#sidebar-menu li').remoeClass('active');
                // $('#sidebar-menu li ul li').remoeClass('active collapse');
    
                $('#about').addClass('active');
                $('#aboutpage').addClass('collapse show');
                $('.company').addClass('active');
    
            });
        </script>
@endsection