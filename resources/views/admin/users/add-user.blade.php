@extends('admin.layouts.master')


@section('title')
    <title>{{ __('Add new user') }} | Hi-Tech</title>
@endsection

@section('css')

@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{__('Add new user')}}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>

    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">{{__('Add new user')}}</div>
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
                        <form method="post" class="ui form" action="{{ route('user.save') }}" autocomplete="off" id="addUserForm">
                            <div class="container">
                                <div class="row px-4">
                                    <div class="col-sm12 col-md-12 col-lg-12 col-xl-12">
                                        
                                        @csrf

                                        <label for="name" class="fw-bold mt-2">Fullname <span class="text-danger">*</span></label>
                                        <div class="ui field left icon input w-100 d-block">
                                            <i class="user outline icon"></i>
                                            <input type="text" class="w-100" placeholder="Enter fullname" id="name" name="name" value="{{ old('name') }}">
                                            
                                        </div>


                                        <label for="username" class="fw-bold mt-2">Username <span class="text-danger">*</span></label>
                                        <div class="ui field left icon input w-100">
                                            <i class="user icon"></i>
                                            <input type="text" placeholder="Enter username" id="username" name="email" value="{{ old('username') }}">
                                            {{-- <a class="ui tag label"> link </a> --}}
                                        </div>

                                        <label for="password" class="fw-bold mt-2">Password <span class="text-danger">*</span></label>
                                        <div class="ui field left icon input w-100">
                                            <i class="unlock alternate icon"></i>
                                            <input type="password" placeholder="Enter password" id="password" name="password">
                                            {{-- <a class="ui tag label"> link </a> --}}
                                        </div>

                                        <label for="c_password" class="fw-bold mt-2">Confirm password <span class="text-danger">*</span></label>
                                        <div class="ui field left icon input w-100">
                                            <i class="key icon"></i>
                                            <input type="password" placeholder="Enter confirm password" id="c_password" name="c_password">
                                            {{-- <a class="ui tag label"> link </a> --}}
                                        </div>

                                        <label for="user_role" class="fw-bold mt-2">User role <span class="text-danger">*</span></label>
                                        <div class="wide field">
                                            <div class="field w-100">
                                                <select class="ui fluid search dropdown w-100" name="role">
                                                    <option value="admin"><i class="fas fa-user pe-1" style="color: #ed9911;"></i> Admin</option>
                                                    <option value="superadmin"><i class="fas fa-user-shield pe-1" style="color: #1061b3;"></i> Super admin</option>
                                                </select>
                                            </div>  
                                        </div>
                                        
        
                                        <div class="ui toggle checkbox px-0 mt-2">
                                            <input type="checkbox" value="1" id="checkBox" name="active_status">
                                            <label for="checkBox">Enable active</label>
                                        </div>
                                        <div class="ui error message mb-4"></div>
                                        <div class="modal-footer">
                                            <a href="{{ route('user.index') }}" class="btn btn-label-warning btn-round btn-md hover-btn me-2 btn-sm">Back</a>
                                            <button type="submit" class="btn btn-info btn-round btn-md hover-btn btn-sm">Save</button>
                                        </div>
                                    </div>

                                </div>
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

            $('#description').summernote({
                placeholder: 'Description',
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

        $('#users').addClass('active');
        // $('#settingcollapse').addClass('collapse show');
        // $('.socialmedia').addClass('active');

    });
</script>
@endsection