@extends('admin.layouts.master')


@section('title')
    <title>{{__('Profile')}} | Hi-Tech</title>
@endsection

@section('css')

@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{__('Profile')}}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">{{__('My profile')}}</div>
                        <div class="card-tools">
                        {{-- <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                            <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                            </span>
                            Export
                        </a> 
                        <a class="btn btn-label-info btn-round btn-sm hover-btn" id="update-btn" data-content="Edit company information"
                        type="button" data-bs-toggle="modal" data-bs-target="#update-company">
                            <span class="btn-label">
                                <i class="far fa-edit"></i>
                            </span>
                            Edit
                        </a>--}}
                        </div>

                    </div>
                </div>

                <div class="card-body">
                    <div class="chart-container" style="min-height: auto">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 mx-auto d-flex align-items-center manage-label">
                                <div class="profile">
                                    <img src="{{ asset('backends/assets/img/profile.jpg') }}" alt="image profile" class="avatar-img rounded" />
                                </div>
                                <div class="bg-label">
                                    <p><span class="fw-bold">Name</span> : {{ @Auth::user()->name }}</p>
                                    <p><b>Username</b> : {{ @Auth::user()->email }}</p>
                                    <p><b>Role</b> : {{ @Auth::user()->role == 'superadmin' ? 'Super admin' : 'Admin' }}</p>
                                    <div class="d-flex align-items-center justify-content-between" >
                                        <p><b>Created at</b> : {{ @Auth::user()->created_at }}</p>
                                        {{-- <p class="btn rounded btn-secondary"><i class="ellipsis vertical icon"></i></p> --}}

                                        <div class="mini ui left pointing dropdown icon button circular">
                                            <i class="ellipsis vertical icon"></i>
                                            <div class="menu">
                                              {{-- <div class="ui left search icon input">
                                                <i class="search icon"></i>
                                                <input type="text" name="search" placeholder="Search issues...">
                                              </div> --}}
                                              <div class="header">
                                                <i class="cog icon"></i>
                                                Settings
                                              </div>
                                              <div class="item">
                                                <a href="{{ route('profile.password') }}">
                                                    <i class="lock icon"></i>
                                                    Password setting
                                                </a>
                                              </div>
                                              {{-- <div class="item">
                                                <a href="/hello/" class="text-danger">
                                                    <i class="power off icon"></i>
                                                    Disable your account
                                                </a>
                                              </div> --}}
                                              
                                            </div>
                                          </div>
                                    </div>
                                </div>
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
        // $(document).on('click','.save-btn', function (e) {
        //     e.preventDefault();

        //     var data = {
        //         'logo' : $('#pre_img').val(),
        //         'address' : $('#address').text(),
        //         'location_link' : $('#map_link').val(),
        //         'company_email' : $('#email').val(),
        //         'company_phone' : $('#phone').val(),
        //         'copy_right' : $('#copyright').val(),

        //     }
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     $.ajax(){
        //         type:'POST',
        //         url: '/company-save',
        //         data: data,
        //         dataType: 'json',
        //         success: function(respone){
        //             console.log(respone);
        //         }
        //     }
        //     console.log(data);
        // });
    </script>
    <script>
        $(document).ready(function () {           
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
@endsection