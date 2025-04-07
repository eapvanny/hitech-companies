@extends('admin.layouts.master')


@section('title')
    <title>Our water | Hi-Tech</title>
@endsection

@section('css')

@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">Our water</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Water lists</div>
                        <div class="card-tools">
                        {{-- <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                            <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                            </span>
                            Export
                        </a> --}}
                        <a class="btn btn-label-info btn-round btn-sm hover-btn" id="update-btn" data-content="Add social media"
                            type="button" data-bs-toggle="modal" data-bs-target="#update-company">
                            <span class="btn-label">
                                <i class="fas fa-plus-circle"></i>
                            </span>
                            Add new
                        </a>
                        </div>
                    </div>
                </div>
               

                <div class="card-body">
                    <div class="chart-container" style="min-height: auto">
                        <table class="ui celled table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th colspan="2">Water bottle</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @php
                                $i = 1;
                            @endphp
                            <tbody>

                                @foreach ($waters as $social)
                                    <tr>
                                        <td>
                                            {{ $i++ }}
                                        </td>
                                        <td style="width: 100px">
                                            @if($social->bottle == '250ml')
                                                <img src="{{ asset('hitech-bottle/waters/250ml.png') }}" width="50px" alt="">
                                            @elseif ($social->bottle == '350ml')
                                                <img src="{{ asset('hitech-bottle/waters/350ml.png') }}" width="50px" alt="">
                                            @elseif ($social->bottle == '600ml')
                                                <img src="{{ asset('hitech-bottle/waters/600ml.png') }}" width="50px" alt="">
                                            @elseif ($social->bottle == '1500ml')
                                                <img src="{{ asset('hitech-bottle/waters/1500ml.png') }}" width="50px" alt="">
                                            @else
                                                <img src="{{ asset('hitech-bottle/waters/20l.png') }}" width="50px" alt="">
                                            @endif

{{--                                             
                                            @elseif ($social->bottle == '350ml')
                                                <img src="{{ asset('hitech-bottle/350ml-bottle.png') }}" width="50px" alt="">
                                            @elseif ($social->bottle == '600ml')
                                                <img src="{{ asset('hitech-bottle/600ml-bottle.png') }}" width="50px" alt="">
                                            @elseif ($social->bottle == '1500ml')
                                                <img src="{{ asset('hitech-bottle/1500ml-bottle.png') }}" width="50px" alt="">
                                            @else
                                                <img src="{{ asset('hitech-bottle/20l-bottle.png') }}" width="50px" alt="">
                                            @endif --}}
                                        </td>
                                        <td>
                                            {{ ucfirst($social->bottle) }}
                                        </td>
                                        <td>
                                            {{ ucfirst($social->title) }}
                                        </td>
                                        
                                        {{-- <td><i class="linkify icon"></i> <a href="{{ $social->link_social }}" target="_blank" class="link"  data-content="{{ $social->link_social }}">Link</a></td> --}}
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
                                                    <div class="item" type="button" data-bs-toggle="modal" data-bs-target="#detailModel{{$social->id}}">Detail</div>
                                                    @if (@Auth::user()->role == 'superadmin')

                                                    <div class="item text-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModel{{$social->id}}">Delete</div>
                                                   
                                                    @endif
                                                    <a href="{{ route('water.edit', ['id'=>$social->id]) }}" class="text-black item">Edit/Update</a>
                                                    <div class="item" type="button" data-bs-toggle="modal" data-bs-target="#activeStatus{{$social->id}}">Enable {{ ($social->active_status == '0') ? 'active' : 'inactive' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>   


                                    
                                    {{-- Detail modal  --}}
                                    <div class="modal fade modal-md" id="detailModel{{$social->id}}"  tabindex="-1" aria-labelledby="detailModel{{$social->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="detailModel{{$social->id}}Label">Water bottle detail</h1>
                                                </div>
                                                <div class="modal-body px-4">
                                                        <div class="text-center">
                                                            @if($social->bottle == '250ml')
                                                                <img src="{{ asset('hitech-bottle/waters/250ml.png') }}" width="30%" alt="">
                                                            @elseif ($social->bottle == '350ml')
                                                                <img src="{{ asset('hitech-bottle/waters/350ml.png') }}" width="30%" alt="">
                                                            @elseif ($social->bottle == '600ml')
                                                                <img src="{{ asset('hitech-bottle/waters/600ml.png') }}" width="30%" alt="">
                                                            @elseif ($social->bottle == '1500ml')
                                                                <img src="{{ asset('hitech-bottle/waters/1500ml.png') }}" width="30%" alt="">
                                                            @else
                                                                <img src="{{ asset('hitech-bottle/waters/20l.png') }}" width="30%" alt="">
                                                            @endif
                                                        </div>
                                                    
                                                        <div class="row mt-3">
                                                            <div class="col-md-3">
                                                                <p class="fw-bold">Water</p>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <p>:</p>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p>{{$social->bottle}}</p>

                                                            </div>
                                                        </div>

                                                        <p class="ui horizontal divider">
                                                            {{-- <i class="tag icon"></i> --}}
                                                            Khmer
                                                        </p>
                                                        <div class="row mt-3">
                                                            <div class="col-md-3">
                                                                <p class="fw-bold">Title</p>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <p>:</p>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p>{{$social->title_kh}}</p>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-md-3">
                                                                <p class="fw-bold">Description</p>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <p>:</p>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p>{{$social->description_kh}}</p>
                                                            </div>
                                                        </div>
                                                        <p class="ui horizontal divider">
                                                            {{-- <i class="tag icon"></i> --}}
                                                            English
                                                        </p>

                                                        <div class="row mt-3">
                                                            <div class="col-md-3">
                                                                <p class="fw-bold">Title</p>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <p>:</p>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p>{{$social->title}}</p>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-md-3">
                                                                <p class="fw-bold">Description</p>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <p>:</p>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p>{{$social->description}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-md-3">
                                                                {{-- <p class="fw-bold"></p> --}}
                                                            </div>
                                                            <div class="col-md-1">
                                                                {{-- <p>:</p> --}}
                                                            </div>
                                                            <div class="col-md-8">
                                                                @if ($social->active_status == 1)
                                                                    <div class="ui mini label blue">
                                                                        <i class="check circle icon"></i> Active
                                                                    </div>
                                                                @else
                                                                    <div class="ui mini label red">
                                                                        <i class="times circle icon"></i> Inactive
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal"> <i class="times icon"></i>Close</button>
                                                    {{-- <button type="submit" class="btn btn-danger btn-sm">Yes delete</button> --}}
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>


                                    @if (@Auth::user()->role == 'superadmin')

                                    {{-- Delete modal  --}}
                                    <div class="modal fade modal-sm" id="deleteModel{{$social->id}}"  tabindex="-1" aria-labelledby="deleteModel{{$social->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModel{{$social->id}}Label">Delete verify</h1>
                                            </div>
                                            <form action="{{ route('water.delete', ['id'=> $social->id]) }}" method="POST">
                                                <div class="modal-body text-center">
                                                        @csrf
                                                        <label for="" class="fw-bold text-danger text-center w-100">Do you want to delete <span class="fs-4 text-primary d-block text-center mt-2">Bottle {{ ucfirst($social->bottle) }}</span></label>
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
                                            <form action="{{ route('water.status', ['id'=> $social->id]) }}" method="POST">
                                                <div class="modal-body text-center">
                                                        @csrf
                                                        <label for="" class="fw-bold text-center w-100">Do you want to
                                                            @if ($social->active_status == '0')
                                                                <span class="text-primary">Enable active</span>
                                                            @else
                                                                <span class="text-danger">Enable inactive</span>
                                                            @endif
                                                            to<span class="fs-4 text-primary d-block text-center mt-2">Bottle {{ ucfirst($social->bottle) }}</span></label>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('Add water')}}</h1>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                {{-- <div class="modal-body">

                </div> --}}
                <form method="post" action="{{ route('water.save') }}" autocomplete="off">
                    <div class="container">
                        <div class="row p-4">
                            <div class="col-sm12 col-md-12 col-lg-12 col-xl-12">
                                <div class="ui form">
                                    <div class="field">
                                        @csrf

                                        <label for="bottle" class="fw-bold mt-2">Water bottle <span class="text-danger">*</span></label>
                                        <select class="ui search dropdown" id="bottle" name="bottle">
                                                {{-- <option ><i class="globe icon"></i> Facebook</option> --}}
                                                <option value="">Select water bottle</option>
                                                <option value="250ml"><i class="circle icon"></i>250 ml Water bottle</option>
                                                <option value="350ml"><i class="circle icon"></i>350 ml Water bottle</option>
                                                <option value="600ml"><i class="circle icon"></i>600 ml Water bottle</option>
                                                <option value="1500ml"><i class="circle icon"></i>1500 ml Water bottle</option>
                                                <option value="20L"><i class="circle icon"></i>20 L Water</option>
                                        </select>
                                    </div>
                                </div>

                                <p class="ui horizontal divider">
                                    {{-- <i class="tag icon"></i> --}}
                                    Khmer
                                </p>
                                
                                <label for="title" class="fw-bold mt-2">Title in Khmer <span class="text-danger">*</span></label>
                                <div class="ui input w-100">
                                    {{-- <i class="i cursor icon"></i> --}}
                                    <input type="text" placeholder="Enter title in khmer" id="title_kh" name="title_kh" value="{{ old('title_kh') }}">
                                    {{-- <a class="ui tag label"> link </a> --}}
                                </div>
                                <div class="ui form">
                                    <div class="field">
                                        <label for="description_kh" class="fw-bold mt-2">Description in Khmer<span class="text-danger">*</span></label>
                                        <textarea rows="4"  placeholder="Description in Khmer" name="description_kh">{{ old('description_kh') }}</textarea>
                                    </div>
                                </div>

                                <p class="ui horizontal divider">
                                    {{-- <i class="tag icon"></i> --}}
                                    English
                                </p>

                                <label for="title" class="fw-bold mt-2">Title in English<span class="text-danger">*</span></label>
                                <div class="ui input w-100">
                                    {{-- <i class="i cursor icon"></i> --}}
                                    <input type="text" placeholder="Enter title in English" id="title" name="title" value="{{ old('title') }}">
                                    {{-- <a class="ui tag label"> link </a> --}}
                                </div>
                                
                                <div class="ui form">
                                    <div class="field">
                                        <label for="description" class="fw-bold mt-2">Description in English<span class="text-danger">*</span></label>
                                        <textarea rows="4"  placeholder="Description in English" name="description">{{ old('description') }}</textarea>
                                    </div>
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

            $('#ourwater').addClass('active');
            // $('#homepagecollapse').addClass('collapse show');
            // $('.society').addClass('active');

        });
    </script>
@endsection