@extends('admin.layouts.master')


@section('title')
    <title>Company info | Hi-Tech</title>
@endsection

@section('css')

@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">Company information</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>

    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Information detail</div>
                        <div class="card-tools">
                        {{-- <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                            <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                            </span>
                            Export
                        </a> --}}
                        <a class="btn btn-label-info btn-round btn-sm hover-btn" id="update-btn" data-content="Edit company information"
                        type="button" data-bs-toggle="modal" data-bs-target="#update-company">
                            <span class="btn-label">
                                <i class="far fa-edit"></i>
                            </span>
                            Edit
                        </a>
                        </div>
                    </div>
                </div>
               

                <div class="card-body">
                <div class="chart-container" style="min-height: auto">
                    <img src="{{ asset(@$info->logo) }}" alt="Logo" height="65" style="background: #4069a3" class="px-3 py-1 rounded-2">
                    <div class="mt-4">
                        <div class="row mt-2">
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
                                <i class="fas fa-map-marker-alt fs-5 text-info w-10"></i> <span class="fw-bold"> Address</span> 
                            </div>
                            
                            <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
                                <p> {{@$info->address}}</p>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
                                <i class="fas fa-link text-info w-10"></i> <span class="fw-bold"> Map link</span> 
                            </div>
                            
                            <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9 text-info text-decoration-underline">
                                <p>
                                    <a class="link" target="_blank" href="{{@$info->location_link}}" data-content="Go to google map."> Go to company map.</a>
                                </p>
                            </div>
                        </div>
                        
                        <div class="row mt-2">
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
                                <i class="fas fa-phone-volume fs-5 text-info  w-10"></i>
                                 <span class="fw-bold"> Phone</span> 
                            </div>
                            
                            <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
                                <p> {{@$info->company_phone}}</p>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
                                <i class="far fa-envelope fs-5 text-info  w-10"></i> <span class="fw-bold"> Email</span> 
                            </div>
                            
                            <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
                                <p> {{@$info->company_email}}</p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
                                <i class="far fa-copyright fs-5 text-info  w-10"></i> <span class="fw-bold"> Copyright</span> 
                            </div>
                            
                            <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
                                <p> {{@$info->copy_right}}</p>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
                <div id="myChartLegend"></div>
                </div>
            </div>
        </div>
    </div>
    {{-- ------------ Modal update --------------- --}}
        <div class="modal fade " id="update-company" tabindex="-1" aria-labelledby="update-company" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('Update company information')}}</h1>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                {{-- <div class="modal-body">

                </div> --}}
                <form method="post" enctype="multipart/form-data" action="{{ route('company.save') }}">
                    @csrf
                    <div class="container">
                        <div class="row p-4">
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label for="company_logo" class="label-image">
                                    {{-- <img src="{{ asset('backends/assets/img/placeholder-image.webp') }}" alt="logo" id="pre_img" class="pre_img"> --}}
                                    <img src="{{ asset(@$info->logo) }}" alt="logo" id="pre_img" class="pre_img">
                                    <div class="hover-bg">
                                        <i class="fas fa-plus-circle fs-1"></i>
                                    </div>
                                </label>
                                <input type="file" id="company_logo" class="d-none company_logo" name="logo">
                                <input type="hidden" name="old_img" value="{{@$info->address}}">
                                <small class="d-block mb-3 text-center">Upload company logo <span class="text-danger">*</span></small>

                            </div>
                            <div class="col-sm12 col-md-8 col-lg-8 col-xl-8">
                                <label for="address" class="fw-bold">Address</label>
                                <textarea id="address" cols="10" rows="3" name="address" class="form-control" placeholder="Enter company address">{{@$info->address}}</textarea>
                                

                                <label for="map_link" class="fw-bold mt-2">Map link</label>
                                <div class="ui right labeled left icon input w-100">
                                    <i class="linkify icon"></i>
                                    <input type="text" placeholder="Enter link" id="map_link" name="location_link" value="{{@$info->location_link}}">
                                    <a class="ui tag label">
                                        Map link
                                    </a>
                                </div>

                                <label for="map_link" class="fw-bold mt-2">Phone</label>
                                <div class="ui right labeled left icon input w-100">
                                    <i class="phone volume icon"></i>
                                    <input type="text" placeholder="Enter phone" id="phone" name="company_phone" value="{{@$info->company_phone}}">
                                    <a class="ui tag label">
                                        Phone
                                    </a>
                                </div>

                                <label for="email" class="fw-bold mt-2">Email</label>
                                <div class="ui right labeled left icon input w-100">
                                    <i class="envelope outline icon"></i>
                                    <input type="email" placeholder="Enter email" id="email" name="company_email" value="{{@$info->company_email}}">
                                    <a class="ui tag label">
                                        Email
                                    </a>
                                </div>

                                <label for="copyright" class="fw-bold mt-2">Copyright</label>
                                <div class="ui right labeled left icon input w-100">
                                    <i class="copyright outline icon"></i>
                                    <input type="text" placeholder="Enter copyright" id="copyright" name="copy_right" value="{{@$info->copy_right}}">
                                    <a class="ui tag label">
                                        Copyright
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm save-btn">Save update</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    {{-- ------------ END Modal update --------------- --}}


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
    <script>
        $(document).ready(function(){
            // $('#sidebar-menu li').remoeClass('active');
            // $('#sidebar-menu li ul li').remoeClass('active collapse');

            $('#settings').addClass('active');
            $('#settingcollapse').addClass('collapse show');
            $('.companyinfo').addClass('active');

        });
    </script>
@endsection