@extends('admin.layouts.master')


@section('title')
    <title>{{__('Slide show')}} | Hi-Tech</title>
@endsection

@section('css')

@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{__('Slide show')}}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">{{__('Slide lists')}}</div>
                        <div class="card-tools">
                        {{-- <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                            <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                            </span>
                            Export
                        </a> --}}
                        <a class="btn btn-label-info btn-round btn-sm hover-btn" id="update-btn" data-content="Add new slide show"
                            type="button" data-bs-toggle="modal" data-bs-target="#update-company">
                            <span class="btn-label">
                                <i class="fas fa-plus-circle"></i>
                            </span>
                            Post new
                        </a>
                        </div>
                    </div>
                </div>
               

                <div class="card-body">
                    <div class="chart-container" style="min-height: auto">
                        <table class="ui celled table">
                            <thead>
                                <tr>
                                    <th class="w-10">No.</th>
                                    <th>Image</th>
                                    <th>Title in Khmer</th>
                                    <th>Title in English</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @php
                                $i = 1;
                            @endphp
                            <tbody>

                                @foreach ($slides as $social)
                                    <tr>
                                        <td>
                                            {{ $i++ }}
                                        </td>
                                        <td>
                                            <img src="{{ asset($social->img) }}" width="70px" alt="">
                                        </td>
                                        <td>
                                            {{ $social->title_kh }}
                                        </td>
                                        <td>
                                            {{ $social->title_en }}

                                        </td>
                                        
                                        <td style="width: 120px">
                                            @if ($social->active_status == '0')
                                            <div class="ui mini label red">
                                                <i class="times circle icon"></i> Inactive
                                            </div>
                                            @else
                                            <div class="ui mini label blue">
                                                <i class="check circle icon"></i> Active
                                            </div>
                                            @endif
                                            
                                        </td>
                                        <td><small>{{ $social->created_at }}</small></td>
                                        <td class="right aligned top">
                                            <div class="circular ui icon button ui icon top left right bottom pointing dropdown">
                                                <i class="cog icon" id="menu{{ $social->id }}"></i>
                                                <div class="menu" id="menu{{ $social->id }}">
                                                    <div class="header">Actions</div>
                                                    @if (@Auth::user()->role == 'superadmin')
                                                        <div class="item text-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModel{{$social->id}}">Delete</div>
                                                    @endif
                                                    <a href="{{ route('slide.edit', ['id'=>$social->id]) }}" class="text-black item">Edit/Update</a>
                                                    <div class="item" type="button" data-bs-toggle="modal" data-bs-target="#activeStatus{{$social->id}}">Enable {{ ($social->active_status == '0') ? 'active' : 'inactive' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>   

                                   


                                    @if (@Auth::user()->role == 'superadmin')

                                    {{-- Delete modal  --}}
                                    <div class="modal fade modal-sm" id="deleteModel{{$social->id}}"  tabindex="-1" aria-labelledby="deleteModel{{$social->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModel{{$social->id}}Label">Delete verify</h1>
                                            </div>
                                            <form action="{{ route('slide.delete', ['id'=> $social->id]) }}" method="POST">
                                                <div class="modal-body text-center">
                                                        @csrf
                                                        <label for="" class="fw-bold text-danger text-center w-100">Do you want to delete 
                                                            <span class="fs-4 text-primary d-block text-center mt-2">Slide show</span>
                                                        </label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger btn-sm">Yes delete</button>
                                                </div>
                                            </form>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @endif

                                    {{-- Active Status modal  --}}
                                    <div class="modal fade modal-sm" id="activeStatus{{$social->id}}"  tabindex="-1" aria-labelledby="activeStatus{{$social->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="activeStatus{{$social->id}}Label">Enable active/inactive </h1>
                                            </div>
                                            <form action="{{ route('slide.status', ['id'=> $social->id]) }}" method="POST">
                                                <div class="modal-body text-center">
                                                        @csrf
                                                        <label for="" class="fw-bold text-center w-100">Do you want to
                                                            @if ($social->active_status == '0')
                                                                <span class="text-primary">Enable active</span>
                                                            @else
                                                                <span class="text-danger">Enable inactive</span>
                                                            @endif
                                                            to<span class="fs-4 text-primary d-block text-center mt-2">Slide show</span></label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
                                                </div>
                                            </form>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    
                                @endforeach

                            </tbody>
                        </table>
                        
                        
                    </div>
                    <div id="myChartLegend"></div>
                </div>
            </div>
        </div>
    </div>


    {{-- ------------ Modal ADD --------------- --}}
        <div class="modal fade " id="update-company" tabindex="-1" aria-labelledby="update-company" aria-hidden="true">
            <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('Post new slide show')}}</h1>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                {{-- <div class="modal-body">

                </div> --}}
                <form method="post" action="{{ route('slide.post') }}" autocomplete="off" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row p-4">
                            <div class="col-sm12 col-md-12 col-lg-12 col-xl-12">
                                <div class="ui placeholder segment">
                                    <div class="ui icon header">
                                      <i class="image outline icon" id="icon"></i>
                                      <img src="" id="pre_img" alt="pre_img" class="d-none mx-auto" style="width: 40%">
                                        Upload image for thumbnail.
                                    </div>
                                    <label for="img" class="ui primary button text-white">Browse to image</label>
                                    <small class="text-center ui text-danger mt-1">Image support for PNG only.</small>
                                </div>
                                <input type="file" id="img" name="img" class="w-50 d-none" accept=".png">
                                @csrf
                                                                
                                <label for="title" class="fw-bold mt-2">Title in Khmer<span class="text-danger">*</span></label>
                                <div class="ui input w-100">
                                    {{-- <i class="i cursor icon"></i> --}}
                                    <input type="text" placeholder="Enter title in Khmer" id="title" name="title_kh" value="{{ old('title_kh') }}">
                                    {{-- <a class="ui tag label"> link </a> --}}
                                </div>

                                <label for="title" class="fw-bold mt-2">Title in English<span class="text-danger">*</span></label>
                                <div class="ui input w-100">
                                    {{-- <i class="i cursor icon"></i> --}}
                                    <input type="text" placeholder="Enter title in English" id="title" name="title_en" value="{{ old('title_en') }}">
                                    {{-- <a class="ui tag label"> link </a> --}}
                                </div>

                                <div class="ui toggle checkbox px-0 mt-2">
                                    <input type="checkbox" value="1" id="checkBox" name="active_status">
                                    <label for="checkBox">Enable active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm save-btn">Save</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    {{-- ------------ END Modal ADD --------------- --}}


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
        });
    </script>
    <script>
        $(document).ready(function(){
            // $('#sidebar-menu li').remoeClass('active');
            // $('#sidebar-menu li ul li').remoeClass('active collapse');

            $('#homepage').addClass('active');
            $('#homepagecollapse').addClass('collapse show');
            $('.slide').addClass('active');

        });
    </script>
@endsection